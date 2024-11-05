<?php
class AdminController {
    public function login() {
        include "../views/login.php";
    }

    public function dashboard() {
        include "../views/dashboard.php";
    }

    public function authenticate($username, $password) {
        // Mã xác thực ví dụ (dùng prepared statements để bảo mật khi triển khai thực tế)
        if ($username == "admin" && $password == "password") {
            $_SESSION['admin'] = true;
            header("Location: index.php?action=dashboard");
        } else {
            echo "Thông tin đăng nhập không hợp lệ.";
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php");
    }
}
?>
