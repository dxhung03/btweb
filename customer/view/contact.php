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
</head>
<body>
    <?php
    include '../view/header.php';
    include '../view/nav.php';
    ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Liên Hệ</h2>
        <form action="contact_process.php" method="POST">
            <div class="form-group">
                <label for="fullName">Họ & Tên *</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
            </div>
            <div class="form-group">
                <label for="company">Công Ty</label>
                <input type="text" class="form-control" id="company" name="company">
            </div>
            <div class="form-group">
                <label for="address">Địa Chỉ</label>
                <input type="text" class="form-control" id="address" name="address">
            </div>
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="website">Trang Web</label>
                <input type="text" class="form-control" id="website" name="website">
            </div>
            <div class="form-group">
                <label for="phone">Điện Thoại</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="form-group">
                <label for="fax">Fax</label>
                <input type="text" class="form-control" id="fax" name="fax">
            </div>
            <button type="submit" class="btn btn-primary">Gửi Thông Tin</button>
            <button type="reset" class="btn btn-secondary">Nhập Lại</button>
        </form>
    </div>

    <?php
    include '../view/footer.php';
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
