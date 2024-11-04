<?php
require_once '../../config/connect.php';

class Banner {
    private $conn;
    private $table_name = "banner";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllBanners() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBannerById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaBanner = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createBanner($name, $avatar) {
        $query = "INSERT INTO " . $this->table_name . " (Name, Avatar) VALUES (:name, :avatar)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":avatar", $avatar);
        return $stmt->execute();
    }

    public function updateBanner($id, $name, $avatar) {
        $query = "UPDATE " . $this->table_name . " SET Name = :name, Avatar = :avatar WHERE MaBanner = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":avatar", $avatar);
        return $stmt->execute();
    }

    public function deleteBanner($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE MaBanner = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
