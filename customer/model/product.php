<?php
// ob_start();
// session_start(); // Bắt đầu phiên làm việc
include('connect.php');

class Product {
    private $conn;
    private $table_name = "sanpham";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();

        // Khởi tạo giỏ hàng nếu chưa tồn tại
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    // Lấy tất cả sản phẩm với phân trang
    public function getAllProducts($limit, $offset) {
        $query = "SELECT * FROM " . $this->table_name . " LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm theo ID
    public function getProductById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaSP = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Lấy tổng số sản phẩm
    public function getTotalProducts() {
        $query = "SELECT COUNT(*) as total FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($productId, $quantity) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $quantity; 
        } else {
            $_SESSION['cart'][$productId] = $quantity; 
        }
    }

    // Lấy giỏ hàng
    public function getCart() {
        return $_SESSION['cart'];
    }

    // Xóa giỏ hàng
    public function clearCart() {
        unset($_SESSION['cart']);
    }
}
?>
