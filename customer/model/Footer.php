<?php
require_once '../../config/connect.php';

class Footer {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Lấy thông tin footer từ cơ sở dữ liệu
    public function getFooter() {
        $query = "SELECT * FROM footer "; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
