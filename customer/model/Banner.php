<?php
require_once '../../config/connect.php';

class Banner {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Lấy tất cả các banner từ cơ sở dữ liệu
    public function getAllBanners() {
        $query = "SELECT * FROM banner";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
