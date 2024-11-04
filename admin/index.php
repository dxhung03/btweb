<?php
// Bắt đầu session để quản lý đăng nhập nếu cần
session_start();

// Bao gồm các file cấu hình cần thiết
include_once '../admin/controllers/BannerController.php';
// include_once 'controllers/FooterController.php';
// Thêm các controller khác nếu cần, ví dụ: MemberController, ProductController

// Lấy giá trị của `action` từ URL
$action = isset($_GET['action']) ? $_GET['action'] : 'dashboard';

// Xử lý yêu cầu dựa trên `action`
switch ($action) {
    case 'dashboard':
        include '../admin/views/dashboard.php';
        break;

    case 'banner':
        $controller = new BannerController();
        $controller->index();
        break;

    case 'footer':
        $controller = new FooterController();
        $controller->index();
        break;

    // Các trang quản trị khác
    case 'members':
        $controller = new MemberController();
        $controller->index();
        break;

    case 'categories':
        $controller = new CategoryController();
        $controller->index();
        break;

    case 'products':
        $controller = new ProductController();
        $controller->index();
        break;

    case 'logout':
        // Xử lý đăng xuất, ví dụ hủy session
        session_destroy();
        header("Location: login.php");
        exit;

    default:
        // Nếu không có action nào khớp, quay lại trang dashboard
        include '../admin/views/dashboard.php';
        break;
}
?>
