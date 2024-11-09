<?php
session_start();
require_once '../controller/CartController.php';

$cartController = new CartController();
$userId = $_SESSION['user_id'] ?? 0; 
$cartItems = $cartController->displayCart($userId); // Lấy danh sách sản phẩm trong giỏ hàng
$cartItemCount = count($cartItems);
$totalAmount = 0; // Khởi tạo tổng số tiền

// Tính toán tổng giá trị giỏ hàng
if ($userId > 0 && !empty($cartItems)) {
    foreach ($cartItems as $item) {
        $totalAmount += $item['GiaKM'] * $item['Soluong']; // Giả định GiaKM là giá đã giảm
    }
}

$userName = $_SESSION['user_name'] ?? 'Người dùng'; // Lấy tên người dùng
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
                                            
                                        <img src="<?php echo htmlspecialchars($item['Avatar']); ?>" alt="<?php echo htmlspecialchars($item['TenSP']); ?>" class="cart-item-image">
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
                    <a class="nav-link text-white dropdown-toggle" href="#" id="dropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Áo bóng đá
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                        <a class="dropdown-item" href="#">Áo câu lạc bộ</a>
                        <a class="dropdown-item" href="#">Áo đội tuyển quốc gia</a>
                        <a class="dropdown-item" href="#">Áo bóng đá không logo</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Áo bóng chuyền</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Áo bóng rổ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">Áo game</a>
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
                require_once '../controller/ProductController.php';
                $controller = new ProductController();
                $action = isset($_GET['action']) ? $_GET['action'] : '';
                $id = isset($_GET['MaSp']) ? (int)$_GET['MaSp'] : 0;

                if ($action === 'detail' && $id > 0) {
                    echo '<div class="product-detail">';
                    $controller->displayProductDetail($id);
                } else {
                    // Hiển thị danh sách sản phẩm khi không có action hoặc action không phải là detail
                    echo '<h2 class="text-center">Danh sách Sản phẩm</h2>';
                    echo '<ul class="product-list">';
                    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $controller->displayProduct($page);
                    echo '</ul>';
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
                    <p>Điện thoại: 0000 000 000</p>
                    <p>Địa chỉ: 123 Đường ABC, Quận ABC, Thành phố Hà Nội</p>
                </div>
                <div class="col-md-4">
                    <h5>Liên Kết Nhanh</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-white">Giới thiệu</a></li>
                        <li><a href="products.php" class="text-white">Sản phẩm</a></li>
                        <li><a href="#" class="text-white">Tin tức</a></li>
                        <li><a href="#" class="text-white">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Theo Dõi Chúng Tôi</h5>
                    <ul class="list-unstyled d-flex">
                        <li><a href="#" class="text-white mr-3">Facebook</a></li>
                        <li><a href="#" class="text-white mr-3">Instagram</a></li>
                        <li><a href="#" class="text-white">Twitter</a></li>
                    </ul>
                </div>
            </div>
            <hr class="bg-white">
            <div class="text-center">
                <p>&copy; 2024 Đồ Thể Thao HDDT. Bảo lưu mọi quyền.</p>
            </div>
            <div class="logo" style="text-align: center">
                <a href="#"><img src="../../picture/logo.png" alt="Logo" height="50"></a>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
