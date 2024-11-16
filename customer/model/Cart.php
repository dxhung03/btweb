<?php
require_once '../../config/connect.php';

class Cart {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($customerId, $productId, $quantity) {
        $query = "SELECT * FROM giohang WHERE MaTK = :customerId AND MaSP = :productId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':customerId', $customerId, PDO::PARAM_INT);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            // Nếu sản phẩm đã có trong giỏ hàng, cập nhật số lượng
            $query = "UPDATE giohang SET Soluong = Soluong + :quantity WHERE MaTK = :customerId AND MaSP = :productId";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':customerId', $customerId, PDO::PARAM_INT);
            $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        } else {
            // Nếu sản phẩm chưa có, thêm mới vào giỏ hàng
            $query = "INSERT INTO giohang (MaTK, MaSP, Soluong) VALUES (:customerId, :productId, :quantity)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':customerId', $customerId, PDO::PARAM_INT);
            $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        }
        
        return $stmt->execute(); // Trả về true nếu thực hiện thành công
    }

    // Lấy danh sách sản phẩm trong giỏ hàng của người dùng
    public function getCartItems($customerId) {
        $query = "SELECT sp.MaSP, sp.TenSP, sp.GiaKM, sp.Avatar, gh.Soluong 
                  FROM giohang gh 
                  JOIN sanpham sp ON gh.MaSP = sp.MaSP 
                  WHERE gh.MaTK = :customerId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':customerId', $customerId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về danh sách sản phẩm
    }

    // Lấy tổng số lượng sản phẩm trong giỏ hàng của người dùng
    public function getCartItemCount($customerId) {
        $query = "SELECT SUM(Soluong) as total FROM giohang WHERE MaTK = :customerId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':customerId', $customerId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0; // Trả về tổng số sản phẩm hoặc 0 nếu không có
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart($customerId, $productId) {
        $query = "DELETE FROM giohang WHERE MaTK = :customerId AND MaSP = :productId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':customerId', $customerId, PDO::PARAM_INT);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
        return $stmt->execute(); // Trả về true nếu xóa thành công
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function updateProductQuantity($customerId, $productId, $quantity) {
        // Kiểm tra nếu số lượng <= 0, thì xóa sản phẩm khỏi giỏ hàng
        if ($quantity <= 0) {
            return $this->removeFromCart($customerId, $productId);
        } else {
            // Nếu số lượng > 0, thì cập nhật lại số lượng
            $query = "UPDATE giohang SET Soluong = :quantity WHERE MaTK = :customerId AND MaSP = :productId";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':customerId', $customerId, PDO::PARAM_INT);
            $stmt->bindParam(':productId', $productId, PDO::PARAM_INT);
            $stmt->bindParam(':quantity', $quantity, PDO::PARAM_INT);
            return $stmt->execute(); // Trả về true nếu cập nhật thành công
        }
    }
    
}
