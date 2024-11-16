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
            $avatarPath = "/baitaplonweb/" . $product['Avatar'];
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
    
    public function displayProductCategory($categoryId, $page = 1) {
        $limit = 6; // Số sản phẩm trên mỗi trang
        $totalProducts = $this->productModel->getTotalProductsByCategory($categoryId); // Tổng số sản phẩm theo danh mục
        $totalPages = ceil($totalProducts / $limit); // Tổng số trang
        $products = $this->productModel->getProductsByCategoryAndPage($categoryId, $page, $limit); // Sản phẩm theo danh mục và trang

        if (empty($products)) {
            echo "<p>Không có sản phẩm nào trong danh mục này.</p>";
            return;
        }
    
        echo '<ul class="product-list">';
        foreach ($products as $product) {
            echo '<li class="product-item">';
            echo '<img src="/baitaplonweb/' . htmlspecialchars($product['Avatar']) . '" alt="' . htmlspecialchars($product['TenSP']) . '" class="product-image">';
            echo '<div class="product-details">';
            echo '<h3 class="product-name"><a href="../view/Product-view.php?action=detail&MaSp=' . $product['MaSP'] . '">' . htmlspecialchars($product['TenSP']) . '</a></h3>';
            echo '<p class="product-price">Giá: ' . number_format($product['Gia'], 0, ',', '.') . ' VNĐ</p>';
            if ($product['GiaKM']) {
                echo '<p class="product-discount-price">Giá KM: ' . number_format($product['GiaKM'], 0, ',', '.') . ' VNĐ</p>';
            }
            echo '</div>';
            echo '</li>';
        }
        echo '</ul>';
        echo '<div class="pagination">';
        if ($page > 1) {
            echo '<a href="?category=' . $categoryId . '&page=' . ($page - 1) . '">&laquo;</a>';
        }
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $page) {
                echo '<strong>' . $i . '</strong> ';
            } else {
                echo '<a href="?category=' . $categoryId . '&page=' . $i . '">' . $i . '</a> ';
            }
        }
        if ($page < $totalPages) {
            echo '<a href="?category=' . $categoryId . '&page=' . ($page + 1) . '">&raquo;</a>';
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
