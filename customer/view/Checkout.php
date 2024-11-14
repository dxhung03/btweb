<?php
session_start();
require_once '../controller/CartController.php';
require_once '../controller/CheckoutController.php';

$userId = $_SESSION['user_id'] ?? 0;
$cartController = new CartController();
$checkout = new Checkout();

// Lấy thông tin giỏ hàng
$cartItems = $cartController->displayCart($userId);
$cartItemCount = count($cartItems);
$totalAmount = 0;

// Tính tổng giá trị giỏ hàng
if ($userId > 0 && !empty($cartItems)) {
    foreach ($cartItems as $item) {
        $totalAmount += $item['GiaKM'] * $item['Soluong'];
    }
}

// Lấy thông tin đơn hàng từ model
$orderItems = $checkout->getCartItems($userId);

// Đảm bảo `$orderItems` có dữ liệu hợp lệ trước khi tính tổng
if (!empty($orderItems)) {
    foreach ($orderItems as $item) {
        $totalAmount += $item['GiaKM'] * $item['Soluong'];
    }
}

$userName = $_SESSION['user_name'] ?? 'Người dùng';
include '../view/header.php';
include '../view/nav.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiến hành thanh toán - Đồ thể thao</title>
    <link rel="stylesheet" href="../public/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <!-- Thông tin thanh toán -->
            <div class="col-lg-7 col-md-7">
                <h4 class="mb-4">THÔNG TIN THANH TOÁN</h4>
                <form action="../controller/CheckoutController.php?action=checkout" method="POST">
                    <div class="form-group">
                        <label for="fullName">Họ & Tên *</label>
                        <input type="text" id="fullName" name="fullName" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Số điện thoại *</label>
                        <input type="text" id="phone" name="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Địa chỉ email (tùy chọn)</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ *</label>
                        <input type="text" id="address" name="address" class="form-control" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="note">Ghi chú đơn hàng (tùy chọn)</label>
                        <textarea id="note" name="note" class="form-control" rows="4"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-4">ĐẶT HÀNG</button>
                </form>
            </div>
            <div class="col-lg-5 col-md-5">
                <div class="order-summary border p-4">
                    <h4 class="mb-4">ĐƠN HÀNG CỦA BẠN</h4>
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>SẢN PHẨM</th>
                                <th class="text-right">TẠM TÍNH</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cartItems as $item): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($item['TenSP']); ?> x <?php echo $item['Soluong']; ?></td>
                                    <td class="text-right"><?php echo number_format($item['GiaKM'] * $item['Soluong'], 0, ',', '.'); ?> đ</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Tạm tính</th>
                                <th class="text-right"><?php echo number_format($totalAmount, 0, ',', '.'); ?> đ</th>
                            </tr>
                            <tr>
                                <th>Giao hàng</th>
                                <th class="text-right">Chưa bao gồm phí vận chuyển</th>
                            </tr>
                            <tr>
                                <th>Tổng</th>
                                <th class="text-right"><?php echo number_format($totalAmount, 0, ',', '.'); ?> đ</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    // Include footer file
    include '../view/footer.php';
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
