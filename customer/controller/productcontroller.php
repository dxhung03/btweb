<?php
require_once '../../config/connect.php';
require_once '../model/Product.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function displayProduct($page = 1) {
        $limit = 6;
        $totalProducts = $this->productModel->getTotalProducts(); 
        $totalPages = ceil($totalProducts / $limit); 
        $productList = $this->productModel->getProductsByPage($page, $limit);

        if (empty($productList)) {
            echo "Không có sản phẩm nào.";
            return;
        }
        foreach ($productList as $product) {
            echo '<li class="product-item">';
            $avatarPath = htmlspecialchars($product['Avatar']);
            $avatarPath = str_replace('\\', '/', $avatarPath);
            echo '<img src="' . $avatarPath . '" alt="' . htmlspecialchars($product['TenSP']) . '" class="product-image">';
            echo '<div class="product-details">';
            echo '<h3 class="product-name"><a href="../view/Product-view.php?action=detail&MaSp=' . $product['MaSP'] . '">' . htmlspecialchars($product['TenSP']) . '</a></h3>';
            echo '<p class="product-price">Giá: ' . number_format($product['Gia'], 0, ',', '.') . ' VNĐ</p>';
            echo '<p class="product-discount-price">Giá KM: ' . number_format($product['GiaKM'], 0, ',', '.') . ' VNĐ</p>'; // Hiển thị giá khuyến mãi
            echo '</div>';
            echo '</li>';
        }
        echo '<div class="pagination">';
        if ($page > 1) {
            echo '<a href="?page=' . ($page - 1) . '">&laquo;</a>'; 
        }
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $page) {
                echo '<strong>' . $i . '</strong> '; 
            } else {
                echo '<a href="?page=' . $i . '">' . $i . '</a> '; 
            }
        }
        if ($page < $totalPages) {
            echo '<a href="?page=' . ($page + 1) . '">&raquo;</a>'; 
        }

        echo '</div>'; 
    }
    public function displayProductDetail($id) {
        $product = $this->productModel->getProductById($id);
        if (!$product) {
            echo "Sản phẩm không tồn tại.";
            return;
        }else{
            include '../view/Product-detail.php';
        }

    }
    public function removeProductFromCart($userId) {
        if ($userId > 0 && isset($_GET['product_id'])) {
            $productId = $_GET['product_id'];
            // Logic xóa sản phẩm khỏi giỏ hàng
            $this->cartModel->removeFromCart($userId, $productId);
            header('Location: ../view/Cart.php?message=Sản phẩm đã được xóa khỏi giỏ hàng.');
            exit();
        } else {
            header('Location: ../view/Cart.php?error=Không thể xóa sản phẩm.');
            exit();
        }
    }
}
?>
