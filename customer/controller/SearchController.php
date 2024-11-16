<?php
require_once '../../config/connect.php';

class SearchController {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function searchProducts($query) {
        $query = "%" . $query . "%";
        $stmt = $this->conn->prepare("SELECT MaSP, TenSP FROM sanpham WHERE TenSP LIKE :query");
        $stmt->bindParam(':query', $query, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

if (isset($_GET['query'])) {
    $search = new SearchController();
    $results = $search->searchProducts($_GET['query']);
    echo json_encode($results);
}
