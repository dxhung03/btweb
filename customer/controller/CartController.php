<?php
require_once '../model/Cart.php';

class CartController {
    private $cartModel;

    public function __construct() {
        $this->cartModel = new Cart();
    }

    // Thêm sản phẩm vào giỏ hàng
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
                    header('Location: ../view/product-view.php?message=Thêm sản phẩm thành công!');
                    exit();
                } else {
                    error_log("Không thể thêm sản phẩm vào giỏ hàng: UserID $userId, ProductID $productId, Quantity $quantity");
                    header('Location: ../view/product-view.php?error=Không thể thêm sản phẩm vào giỏ hàng.');
                    exit();
                }
            } else {
                header('Location: ../view/login.php?error=Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
                exit();
            }
        }
    }

    // Giảm số lượng sản phẩm trong giỏ hàng
    public function decreaseProductQuantity($productId) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); 
        }
        $userId = $_SESSION['user_id'] ?? 0;

        if ($userId > 0 && $productId > 0) {
            $cartItems = $this->cartModel->getCartItems($userId);
            foreach ($cartItems as $item) {
                if ($item['MaSP'] == $productId) {
                    $newQuantity = $item['Soluong'] - 1;
                    if ($newQuantity > 0) {
                        // Cập nhật lại số lượng khi > 0
                        $this->cartModel->updateProductQuantity($userId, $productId, $newQuantity);
                    } else {
                        // Nếu số lượng giảm xuống 0 thì không cho phép giảm thêm nữa
                        $this->cartModel->removeFromCart($userId, $productId);
                    }
                    header('Location: ../view/cart.php?message=Cập nhật giỏ hàng thành công!');
                    exit();
                }
            }
        } else {
            header('Location: ../view/cart.php?error=Không thể cập nhật giỏ hàng.');
            exit();
        }
    }

    // Tăng số lượng sản phẩm trong giỏ hàng
    public function increaseProductQuantity($productId) {
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); 
        }
        $userId = $_SESSION['user_id'] ?? 0;

        if ($userId > 0 && $productId > 0) {
            $cartItems = $this->cartModel->getCartItems($userId);
            foreach ($cartItems as $item) {
                if ($item['MaSP'] == $productId) {
                    $newQuantity = $item['Soluong'] + 1;
                    $this->cartModel->updateProductQuantity($userId, $productId, $newQuantity);
                    header('Location: ../view/cart.php?message=Cập nhật giỏ hàng thành công!');
                    exit();
                }
            }
        } else {
            header('Location: ../view/cart.php?error=Không thể cập nhật giỏ hàng.');
            exit();
        }
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeProductFromCart() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start(); 
        }
        $userId = $_SESSION['user_id'] ?? 0; 

        if ($userId > 0 && isset($_GET['product_id'])) {
            $productId = $_GET['product_id'];
            if ($this->cartModel->removeFromCart($userId, $productId)) {
                header('Location: ../view/cart.php?message=Sản phẩm đã được xóa khỏi giỏ hàng.');
                exit();
            } else {
                header('Location: ../view/cart.php?error=Không thể xóa sản phẩm.');
                exit();
            }
        } else {
            header('Location: ../view/cart.php?error=Không thể xóa sản phẩm.');
            exit();
        }
    }

    // Hiển thị giỏ hàng của người dùng
    public function displayCart($userId) {
        if ($userId > 0) {
            return $this->cartModel->getCartItems($userId);
        }
        return []; 
    }
}

// Khởi tạo đối tượng CartController và xử lý các hành động dựa trên yêu cầu
$cartController = new CartController();

// Xử lý các hành động dựa trên `GET['action']`
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $productId = $_GET['product_id'] ?? 0;

    if ($action === 'remove') {
        $cartController->removeProductFromCart(); // Gọi phương thức xóa sản phẩm
    } elseif ($action === 'decrease' && $productId > 0) {
        $cartController->decreaseProductQuantity($productId); // Gọi phương thức giảm số lượng
    } elseif ($action === 'increase' && $productId > 0) {
        $cartController->increaseProductQuantity($productId); // Gọi phương thức tăng số lượng
    } else {
        $cartController->addProductToCart(); // Gọi phương thức thêm sản phẩm
    }
} else {
    // Mặc định thêm sản phẩm vào giỏ hàng nếu có POST request
    $cartController->addProductToCart();
}
?>
