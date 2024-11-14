<?php
require_once 'Models/DBAccess.php';
require_once 'Models/Product.php';
require_once 'Models/Category.php';

class ProductController {
    private $productModel;
    private $categoryModel;
    private $db; // Thêm thuộc tính $db để lưu kết nối cơ sở dữ liệu

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection(); // Khởi tạo kết nối cơ sở dữ liệu
        $this->productModel = new Product($this->db); // Khởi tạo Product model với kết nối $db
        $this->categoryModel = new Category($this->db); // Khởi tạo Category model với kết nối $db
    }
  
    public function index() {
        // Kiểm tra xem có tham số filterDanhmuc trong URL không
        $filterDanhmuc = isset($_GET['filterDanhmuc']) ? $_GET['filterDanhmuc'] : null;
    
        // Nếu có filterDanhmuc, lấy sản phẩm theo danh mục; nếu không, lấy tất cả sản phẩm
        if ($filterDanhmuc) {
            $products = $this->productModel->getProductsByCategory($filterDanhmuc);
        } else {
            $products = $this->productModel->getAllProducts();
        }
    
        // Lấy tất cả danh mục để hiển thị trong bộ lọc
        $categories = $this->categoryModel->getAllCategories();
    
        require 'Views/Product/list.php';
    }
    

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tenSP = isset($_POST['TenSP']) ? $_POST['TenSP'] : '';
            $gia = isset($_POST['Gia']) ? $_POST['Gia'] : 0;
            $giaKM = isset($_POST['GiaKM']) ? $_POST['GiaKM'] : 0;
            $soluong = isset($_POST['Soluong']) ? $_POST['Soluong'] : 0;
            $soluotmua = isset($_POST['Soluotmua']) ? $_POST['Soluotmua'] : 0;
            $mota = isset($_POST['Mota']) ? $_POST['Mota'] : '';
            $danhmuc = isset($_POST['Danhmuc']) ? $_POST['Danhmuc'] : '';
           $avatar = '';
           $targetDir = __DIR__ . '/../../picture/';
           if (!empty($_FILES['Avatar']['name'])) {
            $avatarFileName = basename($_FILES['Avatar']['name']);
            $targetFilePath = $targetDir . $avatarFileName;

            // Kiểm tra nếu thư mục chưa tồn tại thì tạo mới
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // Thực hiện tải tệp lên
            if (move_uploaded_file($_FILES['Avatar']['tmp_name'], $targetFilePath)) {
                $avatar = 'picture/' . $avatarFileName; // Lưu đường dẫn tương đối để lưu vào cơ sở dữ liệu
            } else {
                echo "Có lỗi khi tải lên tệp hình ảnh.";
                return;
            }
        }
        $result = $this->productModel->addProduct($tenSP, $gia, $giaKM, $soluong, $soluotmua, $mota, $danhmuc, $avatar);

        if ($result) {
            header("Location: index.php?controller=product&action=list");
            exit;
        } else {
            echo "Có lỗi xảy ra khi thêm sản phẩm";
        }
    } else {
        $categories = $this->categoryModel->getAllCategories(); 
        require 'Views/Product/add.php';
    }
}
    public function edit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['MaSP'];
            $tenSP = isset($_POST['TenSP']) ? $_POST['TenSP'] : '';
            $gia = isset($_POST['Gia']) ? $_POST['Gia'] : 0;
            $giaKM = isset($_POST['GiaKM']) ? $_POST['GiaKM'] : 0;
            $soluong = isset($_POST['Soluong']) ? $_POST['Soluong'] : 0;
            $soluotmua = isset($_POST['Soluotmua']) ? $_POST['Soluotmua'] : 0;
            $mota = isset($_POST['Mota']) ? $_POST['Mota'] : '';
            $danhmuc = isset($_POST['Danhmuc']) ? $_POST['Danhmuc'] : '';
            
            $targetDir = __DIR__ . '/../../picture/';
           // Xử lý tệp hình ảnh (Avatar) nếu có
           $avatar = isset($_POST['OldAvatar']) ? $_POST['OldAvatar'] : '';
           if (!empty($_FILES['Avatar']['name'])) {
            $avatarFileName = basename($_FILES['Avatar']['name']);
            $targetFilePath = $targetDir . $avatarFileName;

            // Kiểm tra nếu thư mục chưa tồn tại thì tạo mới
            if (!is_dir($targetDir)) {
                mkdir($targetDir, 0777, true);
            }

            // Thực hiện tải tệp lên
            if (move_uploaded_file($_FILES['Avatar']['tmp_name'], $targetFilePath)) {
                $avatar = 'picture/' . $avatarFileName; // Lưu đường dẫn tương đối để lưu vào cơ sở dữ liệu
            } else {
                echo "Có lỗi khi tải lên tệp hình ảnh.";
                return;
            }
           }
    
            // Cập nhật sản phẩm vào cơ sở dữ liệu
            $result = $this->productModel->updateProduct(
                $id,
                $tenSP,
                $gia,
                $giaKM,
                $soluong,
                $soluotmua,
                $mota,
                $danhmuc,
                $avatar
            );
    
            if ($result) {
                header("Location: index.php?controller=product&action=list");
            } else {
                echo "Có lỗi xảy ra khi cập nhật sản phẩm";
            }
        } else {
            $id = $_GET['id'];
            $product = $this->productModel->getProductById($id);
            
            if ($product) {
                // Lấy danh sách danh mục để hiển thị trong form chỉnh sửa
                $categories = $this->categoryModel->getAllCategories(); // Sử dụng $this->categoryModel để lấy danh mục
                
                require 'Views/Product/edit.php';
            } else {
                echo "Không tìm thấy sản phẩm";
            }
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = $this->productModel->deleteProduct($id);
            if ($result) {
                header("Location: index.php?controller=product&action=list");
            } else {
                echo "Có lỗi xảy ra khi xóa sản phẩm";
            }
        }
    }
}
