<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once '../controller/CartController.php';
require_once '../controller/BannerController.php';

// Lấy thông tin giỏ hàng
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

// Lấy tên người dùng
$userName = $_SESSION['user_name'] ?? 'Người dùng';

// Lấy danh sách banner từ controller
$bannerController = new BannerController();
$banners = $bannerController->getBanners();

include '../view/header.php';
include '../view/nav.php';
?>

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

<body>
    <nav>
        <div class="scrolling-banner">
            <marquee behavior="scroll" direction="left">Welcome to the sportswear shop</marquee>
        </div>
    </nav>
    <section class="banner">
            <div class="banner-images">
            <?php foreach ($banners as $banner): ?>
                <img src="<?php echo htmlspecialchars("/baitaplonweb/".$banner['Avatar']); ?>" alt="<?php echo htmlspecialchars($banner['Name']); ?>" class="img-fluid">
            <?php endforeach; ?>
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
    <?php
    // Include footer file
    include '../view/footer.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    let currentIndex = 0;
const images = document.querySelectorAll('.banner-images img');
const totalImages = images.length;
function showImage(index) {
    images.forEach((img, i) => {
        img.style.display = i === index ? 'block' : 'none';
    });
}
function changeImage(direction) {
    currentIndex = (currentIndex + direction + totalImages) % totalImages;
    showImage(currentIndex);
}
function autoChangeImage() {
    changeImage(1);
}
showImage(currentIndex);
setInterval(autoChangeImage, 3000); 
    </script>
</body>
</html>
