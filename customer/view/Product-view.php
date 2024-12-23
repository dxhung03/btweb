<?php
session_start();
require_once '../controller/CartController.php';
require_once '../controller/ProductController.php';
$cartController = new CartController();
$userId = $_SESSION['user_id'] ?? 0;
$cartItems = $cartController->displayCart($userId);
$cartItemCount = count($cartItems);
$totalAmount = 0;
if ($userId > 0 && !empty($cartItems)) {
    foreach ($cartItems as $item) {
        $totalAmount += $item['GiaKM'] * $item['Soluong'];
    }
}
$userName = $_SESSION['user_name'] ?? 'Người dùng';
$controller = new ProductController();
$categoryId = isset($_GET['category']) ? (int)$_GET['category'] : 0;
$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['MaSp']) ? (int)$_GET['MaSp'] : 0;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm - Đồ thể thao</title>
    <link rel="stylesheet" href="../public/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
<?php
    include '../view/header.php';
    include '../view/nav.php';
    ?>
    <section class="products">
        <div class="container">
            <ul class="product-list">
            <?php
                if ($action === 'detail' && $id > 0) {
                    echo '<div class="product-detail">';
                    $controller->displayProductDetail($id);
                    echo '</div>';
                } elseif ($categoryId > 0) {
                    $controller->displayProductCategory($categoryId, $page);
                } else {
                    $controller->displayProduct($page);
                }
            ?>
            </ul>
        </div>
    </section>
    <?php
    include '../view/footer.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
