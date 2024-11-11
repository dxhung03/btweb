<?php
require_once 'Models/DBAccess.php';
require_once 'Models/Banner.php';

class BannerController {
    private $bannerModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->bannerModel = new Banner($db); // Đảm bảo class Banner đã được include và tên chính xác
    }
  
    public function index() {
        $banners = $this->bannerModel->getAllBanners();
        require 'Views/Banner/list.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Kiểm tra và gán giá trị mặc định nếu không có giá trị đầu vào
            $name = isset($_POST['Name']) ? $_POST['Name'] : '';
    
             // Tạo thư mục uploads nếu chưa tồn tại
             $targetDir = "uploads/";
             if (!is_dir($targetDir)) {
                 mkdir($targetDir, 0777, true);
             }
     
             // Xử lý tệp hình ảnh (Avatar) nếu có
             $avatar = '';
             if (!empty($_FILES['Avatar']['name'])) {
                 $avatarFileName = basename($_FILES['Avatar']['name']);
                 $targetFilePath = $targetDir . $avatarFileName;
     
                 // Di chuyển file đến thư mục đích
                 if (move_uploaded_file($_FILES['Avatar']['tmp_name'], $targetFilePath)) {
                     $avatar = $targetFilePath;
                 } else {
                     echo "Có lỗi khi tải lên tệp hình ảnh.";
                     return;
                 }
             }
    
            // Thêm footer vào cơ sở dữ liệu
            $result = $this->bannerModel->addBanner($name, $avatar);
    
            if ($result) {
                header("Location: index.php?controller=banner&action=list");
                exit;
            } else {
                echo "Có lỗi xảy ra khi thêm banner";
            }
        } else {
            require 'Views/Banner/add.php';
        }
    }
    
    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['MaBanner'];
    
            // Tạo thư mục uploads nếu chưa tồn tại
            $targetDir = "uploads/";
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }
    
            // Xử lý tệp hình ảnh (Avatar) nếu có
            $avatar = isset($_POST['OldAvatar']) ? $_POST['OldAvatar'] : '';
            if (!empty($_FILES['Avatar']['name'])) {
                $avatarFileName = basename($_FILES['Avatar']['name']);
                $targetFilePath = $targetDir . $avatarFileName;
    
                // Di chuyển file đến thư mục đích
                if (move_uploaded_file($_FILES['Avatar']['tmp_name'], $targetFilePath)) {
                    $avatar = $targetFilePath;
                } else {
                    echo "Có lỗi khi tải lên tệp hình ảnh.";
                    return;
                }
            }
    
            $result = $this->bannerModel->updateBanner(
                $id,
                $_POST['Name'],
                $avatar
            );
    
            if ($result) {
                header("Location: index.php?controller=footer&action=list");
            } else {
                echo "Có lỗi xảy ra khi cập nhật footer";
            }
        } else {
            $id = $_GET['id'];
            $banner = $this->bannerModel->getBannerById($id);
            if ($banner) {
                require 'Views/Banner/edit.php';
            } else {
                echo "Không tìm thấy banner";
            }
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $this->bannerModel->deleteBanner($id);
            if ($result) {
                header("Location: index.php?controller=banner&action=list");
            } else {
                echo "Có lỗi xảy ra khi xóa banner";
            }
        }
    }
}