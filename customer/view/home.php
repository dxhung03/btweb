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
                                                <a href="../controller/CartController.php?action=remove&product_id=<?php echo $item['MaSP']; ?>" class="remove-item">x</a>
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
        <div class="container">
            <h2>Giới thiệu về Website Đồ Thể Thao HDDT</h2>
            <p>Chào mừng bạn đến với Đồ Thể Thao HDDT - địa chỉ mua sắm đáng tin cậy cho những tín đồ yêu thích thể thao và phong cách sống năng động. Với nhiều năm kinh nghiệm trong lĩnh vực cung cấp trang phục và dụng cụ thể thao, chúng tôi tự hào mang đến cho khách hàng các sản phẩm chất lượng cao, giúp tối ưu hóa hiệu suất luyện tập và tăng cường sức khỏe.</p>
            
            <h3>Tầm Nhìn và Sứ Mệnh</h3>
            <p>Tại Đồ Thể Thao HDDT, chúng tôi không chỉ là một cửa hàng mà còn là người bạn đồng hành cùng bạn trên con đường chinh phục các đỉnh cao thể thao. Với tầm nhìn trở thành thương hiệu hàng đầu trong lĩnh vực thể thao tại Việt Nam, chúng tôi cam kết cung cấp sản phẩm tốt nhất, dịch vụ khách hàng tận tâm và trải nghiệm mua sắm tiện lợi. Sứ mệnh của chúng tôi là giúp bạn tự tin, khỏe mạnh, và phong cách trong mọi hoạt động.</p>
            
            <h3>Sản Phẩm Nổi Bật</h3>
            <ul>
                <li><strong>Trang phục thể thao:</strong> Đa dạng từ áo, quần, đến đồ lót thể thao dành cho các môn như bóng đá, chạy bộ, tập gym, yoga... Sản phẩm của chúng tôi được làm từ chất liệu cao cấp, đảm bảo thoải mái, thoáng mát và hỗ trợ tối ưu trong mọi điều kiện luyện tập.</li>
            </ul>
            
            <h3>Lợi Ích Khi Mua Sắm Tại Đồ Thể Thao HDDT</h3>
            <ul>
                <li><strong>Dễ dàng tìm kiếm sản phẩm:</strong> Website được thiết kế thân thiện, dễ sử dụng, với các danh mục rõ ràng và tính năng tìm kiếm thông minh giúp bạn nhanh chóng tìm thấy sản phẩm mình cần.</li>
                <li><strong>Thông tin chi tiết sản phẩm:</strong> Mỗi sản phẩm đều có trang chi tiết với thông tin đầy đủ về chất liệu, tính năng, hướng dẫn sử dụng và bảo quản, giúp bạn tự tin lựa chọn.</li>
                <li><strong>Đặt hàng và thanh toán thuận tiện:</strong> Chúng tôi cung cấp nhiều phương thức thanh toán và dịch vụ giao hàng nhanh chóng, đảm bảo bạn nhận được sản phẩm trong thời gian ngắn nhất.</li>
                <li><strong>Chăm sóc khách hàng chu đáo:</strong> Đội ngũ hỗ trợ tận tâm của chúng tôi sẵn sàng giải đáp mọi thắc mắc của bạn qua điện thoại, email và chat trực tuyến, mang lại trải nghiệm mua sắm tốt nhất.</li>
            </ul>
            
            <p>Hãy cùng Đồ Thể Thao HDDT chinh phục mọi thử thách, nâng cao sức khỏe và phong cách sống. Chúng tôi rất hân hạnh được đồng hành cùng bạn!</p>
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
    <script>
                let currentIndex = 0;
const images = document.querySelectorAll('.banner-images img');
const totalImages = images.length;

// Hiển thị ảnh hiện tại
function showImage(index) {
    images.forEach((img, i) => {
        img.style.display = i === index ? 'block' : 'none';
    });
}

// Chuyển ảnh qua lại
function changeImage(direction) {
    currentIndex = (currentIndex + direction + totalImages) % totalImages;
    showImage(currentIndex);
}

// Tự động chuyển ảnh sau mỗi 3 giây
function autoChangeImage() {
    changeImage(1); // Chuyển đến ảnh tiếp theo
}

// Khởi tạo ảnh đầu tiên
showImage(currentIndex);

// Thiết lập interval để tự động chuyển ảnh
setInterval(autoChangeImage, 3000); // Thay đổi mỗi 3 giây}
    </script>
</body>
</html>
