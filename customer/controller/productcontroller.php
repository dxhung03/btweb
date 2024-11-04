<?php
include_once '../model/product.php';
include_once '../model/cart.php'; // Thêm dòng này để sử dụng mô hình giỏ hàng

class ProductController {
    private $productModel;
    private $cartModel; // Khai báo mô hình giỏ hàng

    public function __construct() {
        $this->productModel = new Product();
        $this->cartModel = new Cart(); // Khởi tạo mô hình giỏ hàng
    }

    public function list() {
        $limit = 9;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $limit;

        $products = $this->productModel->getAllProducts($limit, $offset);
        $totalProducts = $this->productModel->getTotalProducts();
        $totalPages = ceil($totalProducts / $limit);

        include '../view/default/product-list.php';
    }

    public function detail() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $product = $this->productModel->getProductById($id);
            if ($product) {
                include '../view/default/product-detail.php';
            } else {
                echo "Không tìm thấy sản phẩm.";
            }
        } else {
            echo "ID sản phẩm không hợp lệ.";
        }
    }

    // Thêm phương thức để thêm sản phẩm vào giỏ hàng
    public function addToCart() {
        $productId = $_POST['MaGH'] ?? null; // Lấy ID sản phẩm từ POST
        $quantity = $_POST['SoLuong'] ?? 1; // Lấy số lượng từ POST, mặc định là 1

        if ($productId) {
            $this->cartModel->addToCart($productId, $quantity); // Thêm sản phẩm vào giỏ hàng
            echo "Sản phẩm đã được thêm vào giỏ hàng.";
        } else {
            echo "ID sản phẩm không hợp lệ.";
        }
    }
}
?>
