<?php
require_once '../model/Cart.php';

class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new Cart();
    }
    public function addProductToCart() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); 
        }
        $userId = $_SESSION['user_id'] ?? 0; 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productId = $_POST['product_id'] ?? 0; 
            $quantity = $_POST['quantity'] ?? 1;

            if ($userId > 0 && $productId > 0 && $quantity > 0) {
                if ($this->cartModel->addToCart($userId, $productId, $quantity)) {
                    header('Location: ../view/Product-view.php?message=Thêm sản phẩm thành công!');
                    exit();
                } else {
                    error_log("Không thể thêm sản phẩm vào giỏ hàng: UserID $userId, ProductID $productId, Quantity $quantity");
                    header('Location: ../view/Product-view.php?error=Không thể thêm sản phẩm vào giỏ hàng.');
                    exit();
                }
            } else {
                header('Location: ../view/login.php?error=Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
                exit();
            }
        }
    }
    public function getCartItemCount($userId) {
        if ($userId > 0) {
            return $this->cartModel->getCartItemCount($userId);
        }
        return 0; 
    }
    public function displayCart($userId) {
        if ($userId > 0) {
            return $this->cartModel->getCartItems($userId);
        }
        return []; 
    }
    public function removeProductFromCart() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); 
        }
        $userId = $_SESSION['user_id'] ?? 0; 

        if ($userId > 0 && isset($_GET['product_id'])) {
            $productId = $_GET['product_id'];
            if ($this->cartModel->removeFromCart($userId, $productId)) {
                header('Location: ../view/Product-view.php?message=Sản phẩm đã được xóa khỏi giỏ hàng.');
                exit();
            } else {
                header('Location: ../view/Product-view.php?error=Không thể xóa sản phẩm.');
                exit();
            }
        } else {
            header('Location: ../view/Product-view.php?error=Không thể xóa sản phẩm.');
            exit();
        }
    }
    
}
$cartController = new CartController();
$cartController->addProductToCart(); 
if (isset($_GET['action'])) {
    if ($_GET['action'] === 'remove') {
        $cartController->removeProductFromCart(); // Gọi phương thức xóa sản phẩm
    } else {
        $cartController->addProductToCart(); // Gọi phương thức thêm sản phẩm
    }
}
?>
