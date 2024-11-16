<?php
require_once 'Models/DBAccess.php';
require_once 'Models/Contact.php';

class ContactController {
    private $contactModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->contactModel = new Contact($db);
    }

    // Phương thức index để hiển thị danh sách khách hàng
    public function index() {
        $contacts = $this->contactModel->getAllContact(); // Đảm bảo tên biến là $customers
        if (!$contacts) {
            $contacts = []; // Đảm bảo biến $customers là mảng, ngay cả khi không có dữ liệu
        }
        require 'Views/Contact/list.php'; // Gọi view để hiển thị danh sách khách hàng
    }
}
