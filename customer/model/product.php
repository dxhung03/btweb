<?php
require_once '../../config/connect.php';

class Product {
    private $conn;
    private $table_name = "sanpham";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getTotalProducts() {
        $query = "SELECT COUNT(*) as Gia FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['Gia']; 
    }

    public function getProductById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name . " WHERE MaSp = :MaSp");
        $stmt->bindParam(':MaSp', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getProductsByPage($page, $limit) {
        // Kiểm tra giá trị của page và limit
        if ($page < 1) $page = 1;
        if ($limit < 1) $limit = 10; // Thiết lập một giá trị mặc định

        $offset = ($page - 1) * $limit; // Tính toán offset
        $query = "SELECT * FROM " . $this->table_name . " LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
