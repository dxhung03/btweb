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
$orderItems = $_SESSION['orderItems'] ?? [];
$totalAmount = $_SESSION['totalAmount'] ?? 0;
// Tính tổng giá trị giỏ hàng
if ($userId > 0 && !empty($cartItems)) {
    foreach ($cartItems as $item) {
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
    <title>Cảm ơn - Đặt hàng thành công</title>
    <link rel="stylesheet" href="../public/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <section class = "thankyou">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Cảm ơn bạn đã đặt hàng!</h2>
        <p class="text-center">Chúng tôi đã nhận được đơn hàng của bạn và đang xử lý nó. Chi tiết đơn hàng như sau:</p>

        <div class="order-summary mt-4">
            <h4>Thông Tin Đơn Hàng Của Bạn</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Giá</th>
                        <th>Tạm Tính</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($orderItems) > 0): ?>
                        <?php foreach ($orderItems as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['TenSP']); ?></td>
                                <td><?php echo $item['Soluong']; ?></td>
                                <td><?php echo number_format($item['GiaKM'], 0, ',', '.'); ?> đ</td>
                                <td><?php echo number_format($item['GiaKM'] * $item['Soluong'], 0, ',', '.'); ?> đ</td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4" class="text-center">Không có sản phẩm nào trong đơn hàng này.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3" class="text-right">Tổng cộng</th>
                        <th><?php echo number_format($totalAmount, 0, ',', '.'); ?> đ</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="../view/Product-view.php" class="btn btn-primary">Tiếp tục mua sắm</a>
        </div>
    </div>
    </section>
    
    <?php
    // Include footer file
    include '../view/footer.php';
    ?>
</body>
</html>
