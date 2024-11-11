<?php
require_once 'Models/DBAccess.php';
require_once 'Models/Category.php';

class CategoryController {
    private $categoryModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->categoryModel = new Category($db);
    }

    // Phương thức lấy và hiển thị tất cả danh mục
    public function index() {
        $categories = $this->categoryModel->getAllCategories(); // Lấy tất cả danh mục từ model
        require 'Views/Category/list.php'; // Truyền $categories vào view để hiển thị
    }

    // Phương thức thêm danh mục mới
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Kiểm tra và gán giá trị mặc định nếu không có đầu vào
            $name = isset($_POST['Ten']) ? $_POST['Ten'] : ''; 

            // Thêm danh mục vào cơ sở dữ liệu
            $result = $this->categoryModel->addCategory($name);

            if ($result) {
                header("Location: index.php?controller=category&action=list");
                exit;
            } else {
                echo "Có lỗi xảy ra khi thêm danh mục";
            }
        } else {
            require 'Views/Category/add.php';
        }
    }

    // Phương thức chỉnh sửa danh mục
    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['MaDM'];
            $name = isset($_POST['Ten']) ? $_POST['Ten'] : ''; // Sử dụng 'Ten' để phù hợp với cột trong bảng

            $result = $this->categoryModel->updateCategory($id, $name);

            if ($result) {
                header("Location: index.php?controller=category&action=list");
            } else {
                echo "Có lỗi xảy ra khi cập nhật danh mục";
            }
        } else {
            $id = $_GET['id'];
            $category = $this->categoryModel->getCategoryById($id);
            if ($category) {
                require 'Views/Category/edit.php';
            } else {
                echo "Không tìm thấy danh mục";
            }
        }
    }

    // Phương thức xóa danh mục
    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $this->categoryModel->deleteCategory($id);
            if ($result) {
                header("Location: index.php?controller=category&action=list");
            } else {
                echo "Có lỗi xảy ra khi xóa danh mục";
            }
        }
    }
}
