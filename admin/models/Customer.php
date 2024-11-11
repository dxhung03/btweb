<?php
class Customer {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllCustomer() {
        $sql = "SELECT tk.TenTK, tk.Password, kh.TenKH, kh.Phone, kh.Email
                FROM taikhoan tk
                JOIN khachhang kh ON tk.MaKH = kh.MaKH";
        $stmt = $this->conn->prepare($sql); // Đảm bảo dùng $this->conn
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
