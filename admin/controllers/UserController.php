<?php
require_once 'Models/DBAccess.php';
require_once 'Models/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->userModel = new User($db);
    }

    // Phương thức login để xử lý đăng nhập người dùng
    public function login() {
        $error = ''; // Khởi tạo biến lỗi rỗng
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Lấy thông tin từ form
            $username = htmlspecialchars(trim($_POST['username']));
            $password = htmlspecialchars(trim($_POST['password']));
    
            // Kiểm tra thông tin đăng nhập qua User model
            $user = $this->userModel->checkLogin($username, $password);
    
            if ($user) {
                // Kiểm tra quyền admin
                if ($user['Maquyen'] == 1) { // Giả sử `Maquyen = 1` là quyền admin
                    // Thiết lập session cho người dùng đã đăng nhập
                    session_start();
                    $_SESSION['user'] = $user;
                    $_SESSION['is_admin'] = true; // Đánh dấu là admin
    
                    // Chuyển đến trang chủ sau khi đăng nhập thành công
                    header("Location: index.php?controller=dashboard&action=index");
                    exit();
                } else {
                    // Nếu không có quyền admin
                    $error = "Bạn không có quyền truy cập.";
                }
            } else {
                // Nếu sai tên đăng nhập hoặc mật khẩu
                $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
            }
        }
    
        // Hiển thị form đăng nhập cùng với lỗi (nếu có)
        require 'Views/User/login.php';
    }
    

    // Phương thức logout để xử lý đăng xuất người dùng
    public function logout() {
        session_start();
        session_unset(); // Xóa toàn bộ session
        session_destroy(); // Hủy session
        header("Location: index.php?controller=user&action=login"); // Chuyển về trang đăng nhập
        exit();
    }
}
