<?php
include_once '../model/product.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
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
}
?>
