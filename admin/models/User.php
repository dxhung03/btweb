<?php
class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
    
public function checkLogin($username, $password) {
    $sql = "SELECT * FROM taikhoan 
            JOIN taikhoan_quyen ON taikhoan.MaTK = taikhoan_quyen.MaTK 
            WHERE TenTK = ? AND Password = ? AND taikhoan_quyen.Maquyen = 1";
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$username, $password]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}
