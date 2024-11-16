<?php
require_once '../model/Customer.php';

class ProfileController {
    private $customerModel;

    public function __construct() {
        $this->customerModel = new Customer();
    }

    // Lấy thông tin khách hàng
    public function showProfile($MaTK) {
        return $this->customerModel->getCustomerById($MaTK);
    }

    // Cập nhật thông tin khách hàng
    public function updateProfile($MaTK, $data) {
        $name = trim($data['name']);
        $email = trim($data['email']);
        $phone = trim($data['phone']);
        $address = trim($data['address']);
        $age = trim($data['age']);
        $sex = trim($data['sex']);

        return $this->customerModel->updateCustomer($MaTK, $name, $email, $phone, $address, $age, $sex);
    }
}
?>
