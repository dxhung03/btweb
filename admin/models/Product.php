<?php
require_once '../../config/connect.php';

class Product {
    private $conn;
    private $table_name = "sanpham";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllProducts() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $price, $quantity) {
        $query = "INSERT INTO " . $this->table_name . " (TenSP, Gia, Soluong) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$name, $price, $quantity]);
    }
    
    // Các phương thức CRUD khác...
}
?>
