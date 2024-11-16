<?php
require_once '../../config/connect.php';

class Checkout {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Lấy thông tin giỏ hàng dựa vào tài khoản người dùng
    public function getCartItems($userId) {
        $query = "SELECT sp.MaSP, sp.TenSP, sp.GiaKM, gh.Soluong 
                  FROM giohang gh 
                  JOIN sanpham sp ON gh.MaSP = sp.MaSP 
                  WHERE gh.MaTK = :userId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function saveOrder($userId, $fullName, $phone, $email, $address, $note, $cartItems, $totalAmount) {
        try {
            $this->conn->beginTransaction();
            $totalQuantity = 0;
            foreach ($cartItems as $item) {
                $totalQuantity += $item['Soluong'];
            }

            $query = "INSERT INTO donhang (MaTK, Ngaydat, Soluong, Dongia, Trangthai) 
                      VALUES (:userId, NOW(), :totalQuantity, :totalAmount, 0)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':totalQuantity', $totalQuantity, PDO::PARAM_INT);
            $stmt->bindParam(':totalAmount', $totalAmount, PDO::PARAM_STR);
            $stmt->execute();
            $orderId = $this->conn->lastInsertId();
            foreach ($cartItems as $item) {
                $queryItem = "INSERT INTO chitiet_donhang (MaDH, MaSP, Soluong, Gia) 
                              VALUES (:orderId, :productId, :quantity, :price)";
                $stmtItem = $this->conn->prepare($queryItem);
                $stmtItem->bindParam(':orderId', $orderId, PDO::PARAM_INT);
                $stmtItem->bindParam(':productId', $item['MaSP'], PDO::PARAM_INT);
                $stmtItem->bindParam(':quantity', $item['Soluong'], PDO::PARAM_INT);
                $stmtItem->bindParam(':price', $item['GiaKM'], PDO::PARAM_STR);
    
                // Thực thi câu lệnh lưu chi tiết đơn hàng
                $stmtItem->execute();
            }
    
            // Commit transaction nếu không có lỗi xảy ra
            $this->conn->commit();
            return $orderId; // Trả về ID của đơn hàng
    
        } catch (Exception $e) {
            // Rollback nếu có lỗi xảy ra
            $this->conn->rollBack();
            echo "Đã xảy ra lỗi: " . $e->getMessage();
            return false;
        }
    }    
    public function getOrderItems($orderId) {
        $query = "SELECT sp.TenSP, sp.GiaKM, ctdh.Soluong
                  FROM chitiet_donhang ctdh
                  JOIN sanpham sp ON ctdh.MaSP = sp.MaSP
                  WHERE ctdh.MaDH = :orderId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':orderId', $orderId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function decreaseProductQuantity($productId, $quantity) {
        $sql = "UPDATE sanpham SET Soluong = Soluong - ? WHERE MaSP = ? AND Soluong >= ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$quantity, $productId, $quantity]);
    }
    
}
?>
