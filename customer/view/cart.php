<?php 
session_start();
require_once '../controller/CartController.php';
require_once '../controller/ProductController.php';
// Khởi tạo controller để lấy thông tin giỏ hàng của người dùng
$cartController = new CartController();
$userId = $_SESSION['user_id'] ?? 0;
$cartItems = $cartController->displayCart($userId); // Lấy danh sách sản phẩm trong giỏ hàng

$cartItemCount = count($cartItems);
$totalAmount = 0;

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
    <title>Giỏ hàng của bạn</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../public/home.css">
</head>
<body>
<section>
<div class="container mt-5">
        <div class="row">
            <!-- Danh sách sản phẩm trong giỏ hàng -->
            <div class="col-lg-8 col-md-7">
                <h2 class="mb-4">Giỏ hàng của bạn</h2>
                <?php if (count($cartItems) > 0): ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SẢN PHẨM</th>
                                <th>GIÁ</th>
                                <th>SỐ LƯỢNG</th>
                                <th>TẠM TÍNH</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cartItems as $item): ?>
                                <tr>
                                    <td class="d-flex align-items-center">
                                        <img src="<?php echo htmlspecialchars("/baitaplonweb/" . $item['Avatar']); ?>" 
                                             alt="<?php echo htmlspecialchars($item['TenSP']); ?>" 
                                             class="img-thumbnail mr-3" style="width: 80px; height: auto;">
                                        <div>
                                            <strong><?php echo htmlspecialchars($item['TenSP']); ?></strong><br>
                                        </div>
                                    </td>
                                    <td><?php echo number_format($item['GiaKM'], 0, ',', '.'); ?> ₫</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="../controller/CartController.php?action=decrease&product_id=<?php echo $item['MaSP']; ?>" 
                                               class="btn btn-light mr-2">-</a>
                                            <input type="text" value="<?php echo $item['Soluong']; ?>" 
                                                   class="form-control text-center mx-2" style="width: 60px;" readonly>
                                            <a href="../controller/CartController.php?action=increase&product_id=<?php echo $item['MaSP']; ?>" 
                                               class="btn btn-light ml-2">+</a>
                                        </div>
                                    </td>
                                    <td><?php echo number_format($item['GiaKM'] * $item['Soluong'], 0, ',', '.'); ?> ₫</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between">
                        <a href="../view/Product-view.php" class="btn btn-outline-primary">← Tiếp tục xem sản phẩm</a>
                        <a href="../controller/CartController.php?action=update" class="btn btn-primary">Cập nhật giỏ hàng</a>
                    </div>
                <?php else: ?>
                    <p>Giỏ hàng của bạn hiện đang trống.</p>
                <?php endif; ?>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="border p-4 mt-4 mt-md-0">
                    <h4 class="mb-4">Cộng giỏ hàng</h4>
                    <div class="d-flex justify-content-between">
                        <span>Tạm tính</span>
                        <span><?php echo number_format($totalAmount, 0, ',', '.'); ?> ₫</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <span>Giao hàng</span>
                        <span>Chưa bao gồm phí vận chuyển</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <strong>Tổng</strong>
                        <strong><?php echo number_format($totalAmount, 0, ',', '.'); ?> ₫</strong>
                    </div>
                    <a href="../view/Checkout.php" class="btn btn-primary btn-block mt-4">Tiến hành thanh toán</a>
                </div>
            </div>
        </div>
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
