<?php
require_once '../model/Checkout.php';
require_once '../model/Cart.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'checkout') {
    $checkout = new Checkout();
    $cartModel = new Cart();

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $userId = $_SESSION['user_id'] ?? 0;

    if ($userId > 0) {
        // Nhận dữ liệu từ form
        $fullName = $_POST['fullName'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $email = $_POST['email'] ?? '';
        $address = $_POST['address'] ?? '';
        $note = $_POST['note'] ?? '';

        // Lấy thông tin giỏ hàng của người dùng
        $cartItems = $cartModel->getCartItems($userId);

        // Tính tổng giá trị giỏ hàng
        $totalAmount = 0;
        foreach ($cartItems as $item) {
            $totalAmount += $item['GiaKM'] * $item['Soluong'];
        }

        if (!empty($cartItems) && $fullName && $phone && $address) {
            // Thực hiện lưu đơn hàng và lấy về orderId
            $orderId = $checkout->saveOrder($userId, $fullName, $phone, $email, $address, $note, $cartItems, $totalAmount);
            if ($orderId) {
                // Lấy lại thông tin đơn hàng bằng orderId để hiển thị
                $orderItems = $checkout->getOrderItems($orderId);

                // Xóa giỏ hàng sau khi lưu đơn hàng thành công
                foreach ($cartItems as $item) {
                    $cartModel->removeFromCart($userId, $item['MaSP']);
                }

                // Chuyển thông tin đơn hàng và các sản phẩm trong đơn hàng sang thank-you-view.php
                $_SESSION['orderItems'] = $orderItems; // lưu vào session để truyền sang view
                $_SESSION['totalAmount'] = $totalAmount;
                header('Location: ../view/thank-you-view.php?orderId=' . $orderId);
                exit();
            } else {
                echo "Đã xảy ra lỗi khi lưu đơn hàng. Vui lòng thử lại.";
            }
        } else {
            echo "Thông tin không đầy đủ hoặc giỏ hàng trống. Vui lòng kiểm tra lại.";
        }
    } else {
        echo "Bạn cần đăng nhập để tiến hành thanh toán.";
    }
} else {
    echo "Yêu cầu không hợp lệ.";
}
