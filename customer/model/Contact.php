<?php
require_once '../../config/connect.php';

class ContactModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Hàm lưu thông tin liên hệ
    public function saveContact($fullName, $company, $address, $email, $website, $phone, $note, $fax) {
        try {
            $sql = "INSERT INTO contacts (full_name, company, address, email, website, phone, note, fax) 
                    VALUES (:fullName, :company, :address, :email, :website, :phone, :note, :fax)";
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':fullName', $fullName);
            $stmt->bindParam(':company', $company);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':website', $website);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':note', $note);
            $stmt->bindParam(':fax', $fax);      

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
