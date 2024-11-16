<?php
session_start();
require_once '../model/User.php'; // Đảm bảo model User đã được tạo

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username']; // Thay đổi từ email sang username
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập
    $userModel = new User();
    $user = $userModel->login($username, $password);

    if ($user) {
        $_SESSION['user_id'] = $user['MaTK']; // Lưu ID người dùng vào session
        header('Location: home.php'); // Chuyển đến trang sản phẩm
        exit();
    } else {
        $error = "Thông tin đăng nhập không chính xác.";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/home.css">
</head>
<style>
    /* Kiểu dáng cho toàn bộ trang đăng nhập */
body {
    background-color: #f8f9fa; /* Màu nền sáng */
    font-family: Arial, sans-serif;
}

/* Container cho form đăng nhập */
.container {
    max-width: 400px; /* Độ rộng tối đa cho form */
    margin: 100px auto; /* Căn giữa theo chiều dọc và chiều ngang */
    padding: 20px;
    background-color: #fff; /* Màu nền trắng */
    border-radius: 8px; /* Bo góc cho container */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Hiệu ứng bóng */
}

/* Tiêu đề của form */
h2 {
    text-align: center; /* Căn giữa tiêu đề */
    color: #007bff; /* Màu chữ cho tiêu đề */
}

/* Cảnh báo lỗi */
.alert {
    margin-bottom: 15px; /* Khoảng cách dưới cảnh báo */
}

/* Kiểu dáng cho label */
.form-group label {
    font-weight: bold; /* Đậm chữ */
    color: #333; /* Màu chữ */
}

/* Kiểu dáng cho input */
.form-control {
    border: 1px solid #ced4da; /* Viền cho input */
    border-radius: 4px; /* Bo góc cho input */
    padding: 10px; /* Khoảng cách trong input */
    transition: border-color 0.3s; /* Hiệu ứng chuyển màu viền */
}

/* Thay đổi màu viền khi input có focus */
.form-control:focus {
    border-color: #007bff; /* Màu viền khi focus */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Hiệu ứng shadow */
}

/* Nút đăng nhập */
.btn-primary {
    background-color: #007bff; /* Màu nền cho nút */
    border: none; /* Không viền */
    border-radius: 4px; /* Bo góc cho nút */
    padding: 10px 20px; /* Khoảng cách cho nút */
    font-size: 16px; /* Kích thước chữ */
    width: 100%; /* Độ rộng 100% */
    transition: background-color 0.3s; /* Hiệu ứng chuyển màu nền */
}

.btn-primary:hover {
    background-color: #0056b3; /* Màu nền khi hover */
}

/* Nút quay lại */
.btn-secondary {
    width: 100%; /* Độ rộng 100% */
    margin-top: 10px; /* Khoảng cách trên nút quay lại */
    background-color: #6c757d; /* Màu nền cho nút quay lại */
}

.btn-secondary:hover {
    background-color: #5a6268; /* Màu nền khi hover cho nút quay lại */
}

</style>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Đăng Nhập</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Tên Tài Khoản:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Đăng Nhập</button>
            <div class="register-link mt-3 text-center">
    <p>Chưa có tài khoản? <a href="register.php">Đăng Ký</a></p>
</div>

            <a href="Product-view.php" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
