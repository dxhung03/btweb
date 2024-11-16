<?php
class Contact {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAllContact() {
        $sql = "SELECT * FROM contacts";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
