<?php
require_once 'Models/DBAccess.php';
require_once 'Models/Footer.php';

class FooterController {
    private $footerModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->footerModel = new Footer($db);
    }
  
    public function index() {
        $footers = $this->footerModel->getAllFooters();
        if (!$footers) {
            $footers = []; // Đảm bảo biến footers là mảng, ngay cả khi không có dữ liệu
        }
        require 'Views/Footer/list.php';
    }

    public function add() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Kiểm tra và gán giá trị mặc định nếu không có giá trị đầu vào
        $name = isset($_POST['Name']) ? $_POST['Name'] : '';

        // Tạo thư mục uploads nếu chưa tồn tại
        $targetDir = "../uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Xử lý tệp hình ảnh (Avatar) nếu có
        $avatar = '';
        if (!empty($_FILES['Avatar']['name'])) {
            // Tạo tên file duy nhất để tránh ghi đè
            $avatarFileName = time() . '_' . basename($_FILES['Avatar']['name']);
            $targetFilePath = $targetDir . $avatarFileName;

            // Kiểm tra loại file
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $allowedTypes = ['jpg', 'jpeg', 'png', 'gif']; // Các loại file hợp lệ
            if (in_array($fileType, $allowedTypes)) {
                // Di chuyển file đến thư mục đích
                if (move_uploaded_file($_FILES['Avatar']['tmp_name'], $targetFilePath)) {
                    $avatar = $targetFilePath;
                } else {
                    echo "Có lỗi khi tải lên tệp hình ảnh.";
                    return;
                }
            } else {
                echo "Chỉ cho phép các file có đuôi jpg, jpeg, png, và gif.";
                return;
            }
        }

        // Thêm footer vào cơ sở dữ liệu
        $result = $this->footerModel->addFooter($name, $avatar);

        if ($result) {
            header("Location: index.php?controller=footer&action=list");
            exit;
        } else {
            echo "Có lỗi xảy ra khi thêm footer";
        }
    } else {
        require 'Views/Footer/add.php';
    }
}

    
    
    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['MaFooter'];
    
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
    
            $result = $this->footerModel->updateFooter(
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
            $footer = $this->footerModel->getFooterById($id);
            if ($footer) {
                require 'Views/Footer/edit.php';
            } else {
                echo "Không tìm thấy footer";
            }
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $this->footerModel->deleteFooter($id);
            if ($result) {
                header("Location: index.php?controller=footer&action=list");
            } else {
                echo "Có lỗi xảy ra khi xóa footer";
            }
        }
    }
}