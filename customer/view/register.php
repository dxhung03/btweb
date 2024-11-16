<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link rel="stylesheet" href="../public/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="register-form">
            <h2 class="text-center">Đăng Ký</h2>
            <form action="../controller/RegisterController.php" method="POST">
                <div class="form-group">
                    <label for="username">Tên Tài Khoản:</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Số điện thoại:</label>
                    <input type="text" id="phone" name="phone" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Đăng Ký</button>
            </form>
            <div class="back-button mt-3 text-center">
                <a href="login.php" class="btn btn-secondary">Quay lại Đăng Nhập</a>
            </div>
        </div>
    </div>
</body>
</html>
