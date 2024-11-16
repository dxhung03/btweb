<?php
require_once '../controller/ProfileController.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$userId = $_SESSION['user_id'];
$profileController = new ProfileController();

// Nếu là POST (cập nhật thông tin)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($userId, $_POST); // Kiểm tra giá trị userId và dữ liệu được gửi lên
    if ($profileController->updateProfile($userId, $_POST)) {
        echo "<script>alert('Cập nhật thông tin thành công!');</script>";
        header("Refresh:0");
        exit;
    } else {
        echo "<script>alert('Cập nhật thông tin thất bại! Vui lòng thử lại.');</script>";
    }
}

// Lấy thông tin khách hàng
$customer = $profileController->showProfile($userId);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Cá Nhân</title>
    <link rel="stylesheet" href="../public/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Cập Nhật Thông Tin Cá Nhân</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Họ và Tên:</label>
                <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($customer['TenKH'] ?? ''); ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($customer['Email'] ?? ''); ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="phone">Số Điện Thoại:</label>
                <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($customer['Phone'] ?? ''); ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Địa Chỉ:</label>
                <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($customer['Diachi'] ?? ''); ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="age">Tuổi:</label>
                <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($customer['Age'] ?? ''); ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="sex">Giới Tính:</label>
                <select id="sex" name="sex" class="form-control">
                    <option value="nam" <?php echo isset($customer['Sex']) && $customer['Sex'] === 'nam' ? 'selected' : ''; ?>>Nam</option>
                    <option value="nu" <?php echo isset($customer['Sex']) && $customer['Sex'] === 'nu' ? 'selected' : ''; ?>>Nữ</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Cập Nhật</button>
        </form>
        <div class="back-button mt-3 text-center">
            <a href="../view/home.php" class="btn btn-secondary">Quay Lại Trang Chủ</a>
        </div>
    </div>
</body>
</html>
