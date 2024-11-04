<?php
require_once '../../config/connect.php';

class Footer {
    private $conn;
    private $table_name = "footer";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllFooters() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFooterById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE MaFooter = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createFooter($name, $avatar) {
        $query = "INSERT INTO " . $this->table_name . " (Name, Avatar) VALUES (:name, :avatar)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":avatar", $avatar);
        return $stmt->execute();
    }

    public function updateFooter($id, $name, $avatar) {
        $query = "UPDATE " . $this->table_name . " SET Name = :name, Avatar = :avatar WHERE MaFooter = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":avatar", $avatar);
        return $stmt->execute();
    }

    public function deleteFooter($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE MaFooter = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
