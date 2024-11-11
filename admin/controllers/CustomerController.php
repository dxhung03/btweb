<?php
require_once 'Models/DBAccess.php';
require_once 'Models/Customer.php';

class CustomerController {
    private $customerModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->customerModel = new Customer($db);
    }

    // Phương thức index để hiển thị danh sách khách hàng
    public function index() {
        $customers = $this->customerModel->getAllCustomer(); // Đảm bảo tên biến là $customers
        if (!$customers) {
            $customers = []; // Đảm bảo biến $customers là mảng, ngay cả khi không có dữ liệu
        }
        require 'Views/Customer/list.php'; // Gọi view để hiển thị danh sách khách hàng
    }
}
