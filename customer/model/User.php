<?php
require_once '../../config/connect.php';

class User {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Kiểm tra thông tin đăng nhập
    public function login($username, $password) {
        // Truy vấn để lấy thông tin người dùng dựa trên tên tài khoản và mật khẩu
        $query = "SELECT * FROM taikhoan WHERE TenTK = :username AND Password = :password";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
