<?php
session_start();
require_once '../controller/CartController.php';
require_once '../controller/ProductController.php';

// Xử lý giỏ hàng
$cartController = new CartController();
$userId = $_SESSION['user_id'] ?? 0;
$cartItems = $cartController->displayCart($userId);
$cartItemCount = count($cartItems);
$totalAmount = 0;

// Tính tổng giá trị giỏ hàng
if ($userId > 0 && !empty($cartItems)) {
    foreach ($cartItems as $item) {
        $totalAmount += $item['GiaKM'] * $item['Soluong'];
    }
}

$userName = $_SESSION['user_name'] ?? 'Người dùng'; // Tên người dùng

// Xử lý hiển thị sản phẩm theo danh mục hoặc phân trang
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
</head>
<body>
    <header class="header">
        <div class="top-bar">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="contact-info">
                    <span>Email: ab@gmail.com</span> | 
                    <span>09:00 - 18:00</span>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="header-content d-flex justify-content-between align-items-center py-3">
                <div class="logo">
                    <a href="#"><img src="../../picture/logo.png" alt="Logo" height="50"></a>
                </div>
                <div class="search-bar">
                    <input type="text" placeholder="Từ khóa tìm kiếm..." class="form-control">
                    <button class="btn btn-primary">Tìm kiếm</button>
                </div>              
                <div class="cart">
                    <a href="../view/Cart.php" class="cart-icon">
                        GIỎ HÀNG / <span id="cart-count"><?php echo $cartItemCount; ?></span>
                        <div class="cart-dropdown">
                            <div class="cart-items">
                                <?php if (count($cartItems) > 0): ?>
                                    <?php foreach ($cartItems as $item): ?>
                                        <div class="cart-item">
                                            
                                        <img src="<?php echo htmlspecialchars("/baitaplonweb/".$item['Avatar']); ?>" alt="<?php echo htmlspecialchars($item['TenSP']); ?>" class="cart-item-image">
                                            <div class="cart-item-details">
                                                
                                                <span class="cart-item-name"><?php echo htmlspecialchars($item['TenSP']); ?></span>
                                                <span class="cart-item-price"><?php echo number_format($item['GiaKM'], 0, ',', '.'); ?> VNĐ</span>
                                                <span class="cart-item-quantity"><?php echo $item['Soluong']; ?></span>
                                                
                                            </div>
                                            <a href="../controller/CartController.php?action=remove&product_id=<?php echo $item['MaSP']; ?>" class="btn btn-danger btn-sm remove-item">✖</a>
                                            </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>Giỏ hàng trống.</p>
                                <?php endif; ?>
                            </div>
                            <div class="cart-total">
                                <strong>Tổng:</strong> <span id="cart-total"><?php echo number_format($totalAmount, 0, ',', '.'); ?> VNĐ</span>
                            </div>
                            <a href="../view/Cart.php" class="btn btn-primary">Xem Giỏ Hàng</a>
                            <a href="../view/Checkout.php" class="btn btn-secondary">Thanh Toán</a>
                        </div>
                    </a>
                </div>
                <div class="contact-number">
                    <a href="tel:000000000">ZALO: 000000000</a>
                </div>
                <div class="login">
                    <?php if ($userId > 0): ?>
                        <span class="text-black">Xin chào, <?php echo htmlspecialchars($userName); ?>!</span>
                        <a href="logout.php" class="text-black">Đăng xuất</a>
                    <?php else: ?>
                        <a href="login.php" class="text-black">
                            <img src="../../picture/sign-in-vector-icon-png_262162.jpg" alt="Đăng nhập" height="30"> Đăng nhập
                        </a>
                    <?php endif; ?>
                </div>
            </div>        
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="../view/home.php">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../view/Product-view.php">Sản phẩm</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="../view/Product-view.php?category=1" id="dropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Áo bóng đá
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                        <a class="dropdown-item" href="../view/Product-view.php?category=5">Áo câu lạc bộ</a>
                        <a class="dropdown-item" href="../view/Product-view.php?category=6">Áo đội tuyển quốc gia</a>
                        <a class="dropdown-item" href="../view/Product-view.php?category=7">Áo bóng đá không logo</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../view/Product-view.php?category=2">Áo bóng chuyền</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../view/Product-view.php?category=3">Áo bóng rổ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../view/Product-view.php?category=4">Áo game</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Liên hệ</a>
                </li>
            </ul>
        </div>
    </nav>

    <section class="products">
        <div class="container">
            <ul class="product-list">

            <?php
                if ($action === 'detail' && $id > 0) {
                    // Hiển thị chi tiết sản phẩm
                    echo '<div class="product-detail">';
                    $controller->displayProductDetail($id);
                    echo '</div>';
                } elseif ($categoryId > 0) {
                    // Hiển thị sản phẩm theo danh mục
                    $controller->displayProductCategory($categoryId);
                } else {
                    $controller->displayProduct($page);
                }
            ?>
            </ul>
        </div>
    </section>

    <footer class="footer bg-dark text-white pt-4 pb-2">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Liên Hệ</h5>
                    <p>Email: ab@gmail.com</p>
                    <p>Điện thoại: 000000000</p>
                </div>
                <div class="col-md-4">
                    <h5>Mạng xã hội</h5>
                    <a href="#" class="text-white mr-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white mr-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                </div>
                <div class="col-md-4">
                    <h5>Thông tin khác</h5>
                    <ul>
                        <li><a href="#" class="text-white">Chính sách bảo mật</a></li>
                        <li><a href="#" class="text-white">Điều khoản sử dụng</a></li>
                        <li><a href="#" class="text-white">Giới thiệu</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center py-3">© 2024 Đồ Thể Thao HDDT</div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
