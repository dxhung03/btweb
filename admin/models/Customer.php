<?php
class Customer {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllCustomer() {
        $sql = "SELECT tk.TenTK, tk.Password, kh.TenKH, kh.Phone, kh.Email
                FROM taikhoan tk
                JOIN khachhang kh ON tk.MaTK = kh.MaTK"; // Sửa JOIN để dùng MaTK
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
