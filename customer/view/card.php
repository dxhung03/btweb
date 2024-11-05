<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Đồ Thể Thao HDDT - Cửa hàng đồ thể thao chất lượng hàng đầu tại Việt Nam">
    <title>Trang chủ - Đồ thể thao</title>
    <link rel="stylesheet" href="../public/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<?php
session_start();
require_once '../controller/CartController.php';

$cartController = new CartController();
$userId = $_SESSION['user_id'] ?? 0; // Lấy ID người dùng từ session
$cartItemCount = $cartController->getCartItemCount($userId);
$userName = ''; // Khởi tạo biến tên người dùng

// Nếu đã đăng nhập, bạn có thể lấy tên người dùng từ cơ sở dữ liệu hoặc session
if ($userId > 0) {
    // Giả sử bạn đã lưu tên người dùng trong session khi đăng nhập
    $userName = $_SESSION['user_name'] ?? 'Người dùng'; // Sử dụng tên người dùng hoặc 'Người dùng' nếu không có
}
?>
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
                    <input type="text" placeholder="Từ khóa tìm kiếm..." class="form-control" aria-label="Từ khóa tìm kiếm">
                    <button class="btn btn-primary">Tìm kiếm</button>
                </div>              
                <div class="cart">
                    <a href="cart.php" class="btn btn-primary">
                        GIỎ HÀNG / <?php echo $cartItemCount; ?>
                    </a>
                </div>
                <div class="contact-number">
                    <a href="tel:000000000" >ZALO: 000000000</a>
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
    <nav>
        <div class="scrolling-banner">
            <marquee behavior="scroll" direction="left">Welcome to the sportswear shop</marquee>
        </div>
    </nav>
    <section class="banner">
        <div class="container">
            <h2 style="text-align:center">Áo bóng đá</h2>
            <div class="banner-images">
                <img src="https://i.imgur.com/4uMux6X.jpeg" alt="Banner 1" class="img-fluid active">
                <img src="https://i.imgur.com/OuGAwbX.jpeg" alt="Banner 2" class="img-fluid">
                <img src="https://i.imgur.com/skd6iTP.jpeg" alt="Banner 3" class="img-fluid">
            </div>
            <button class="prev" onclick="changeImage(-1)">&#10094;</button>
            <button class="next" onclick="changeImage(1)">&#10095;</button>
        </div>
    </section>
    <section class="introduction">
    <div class="container mt-5">
        <h2 class="text-center">Giỏ Hàng</h2>
        <div class="row">
            <div class="col-md-8">
                <div class="cart-item">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Tạm Tính</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            session_start();
                            $userId = $_SESSION['user_id']; // Giả sử ID người dùng lưu trong session
                            $cartController = new CartController();
                            $cartItems = $cartController->displayCart($userId);
                            
                            foreach ($cartItems as $item):
                            ?>
                            <tr>
                                <td>
                                    <img src="<?php echo htmlspecialchars($item['Avatar']); ?>" alt="Sản phẩm" class="img-fluid" style="width: 100px;">
                                    <div><?php echo htmlspecialchars($item['TenSP']); ?></div>
                                </td>
                                <td><?php echo number_format($item['Gia'], 0, ',', '.'); ?> đ</td>
                                <td>
                                    <button class="btn btn-secondary btn-sm">-</button>
                                    <input type="number" class="form-control d-inline" style="width: 60px; display: inline;" value="<?php echo htmlspecialchars($item['SoLuong']); ?>">
                                    <button class="btn btn-secondary btn-sm">+</button>
                                </td>
                                <td><?php echo number_format($item['Gia'] * $item['SoLuong'], 0, ',', '.'); ?> đ</td>
                                <td><button class="btn btn-danger btn-sm">Xóa</button></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <button class="btn btn-primary">Cập Nhật Giỏ Hàng</button>
                    <a href="Product-view.php" class="btn btn-secondary">Tiếp Tục Xem Sản Phẩm</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="cart-summary">
                    <h4>Cộng Giỏ Hàng</h4>
                    <p>Tạm Tính: <span>1.050.000 đ</span></p> <!-- Cập nhật giá trị tạm tính -->
                    <p>Giao Hàng: <span>Tùy chọn giao hàng sẽ được cập nhật trong quá trình thanh toán</span></p>
                    <h5>Tổng: <span>1.050.000 đ</span></h5> <!-- Cập nhật tổng -->
                    <button class="btn btn-success btn-block">Tiến Hành Thanh Toán</button>
                </div>
            </div>
        </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
