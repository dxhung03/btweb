<?php
require_once '../../config/connect.php';

class Customer {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // Lấy thông tin khách hàng
    public function getCustomerById($userId) {
        $query = "SELECT * FROM khachhang WHERE MaTK = :userId";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cập nhật thông tin khách hàng
    public function updateCustomer($userId, $name, $email, $phone, $address, $age, $sex) {
        try {
            $query = "UPDATE khachhang SET TenKH = :name, Email = :email, Phone = :phone, Diachi = :address, Age = :age, Sex = :sex WHERE MaTK = :userId";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':sex', $sex);
            $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    
            if ($stmt->execute()) {
                return true;
            } else {
                print_r($stmt->errorInfo()); // In lỗi SQL nếu truy vấn thất bại
                return false;
            }
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    
}
?>
