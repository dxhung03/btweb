<!-- <?php
require_once '../models/Product.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function index() {
        $products = $this->productModel->getAllProducts();
        include 'views/admin/product.php';
    }

    public function create($name, $price, $quantity) {
        $this->productModel->create($name, $price, $quantity);
        header("Location: index.php?action=products");
    }

    // Các phương thức khác như edit, delete...
}
?> -->
