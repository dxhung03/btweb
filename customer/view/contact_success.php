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
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ - Đồ thể thao HDDT</title>
    <link rel="stylesheet" href="../public/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <?php
    include '../view/header.php';
    include '../view/nav.php';
    ?>
    <section class = "contact">
    <div class="container mt-5">
        <h2 class="text-center text-success">Gửi Thông Tin Thành Công!</h2>
        <p class="text-center">Cảm ơn bạn đã liên hệ với chúng tôi. Chúng tôi sẽ phản hồi bạn trong thời gian sớm nhất.</p>
        <div class="text-center mt-4">
            <a href="../view/contact.php" class="btn btn-primary">Quay Lại Trang Liên Hệ</a>
            <a href="../view/home.php" class="btn btn-secondary">Quay Lại Trang Chủ</a>
        </div>
    </div>
    </section>
<?php
    include '../view/footer.php';
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>