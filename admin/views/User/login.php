<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <style>
        /* Đặt hình nền cho toàn bộ trang */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Arial Black', sans-serif;
            background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAghulx_sxPHkQCx5CyymbPgxh01qTv-yiWiHTWfF0aHuIg6w7ybRhk-YDiY3lvAxP6cM&usqp=CAU') no-repeat center center/cover;
            color: #fff;
        }

        form {
            background: linear-gradient(135deg, #3b82f6, #4ade80);
            padding: 30px 40px;
            border-radius: 16px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            transition: transform 0.3s ease;
        }

        form:hover {
            transform: translateY(-5px) scale(1.02);
        }

        /* Thiết kế cho thông báo lỗi */
        .error-message {
            color: #ff4757;
            margin-top: 10px;
            font-size: 14px;
            text-align: left;
            font-weight: bold;
            background-color: rgba(255, 71, 87, 0.1);
            padding: 8px;
            border-radius: 8px;
        }

        /* Thiết kế cho các phần tử trong form */
        form div {
            margin-bottom: 20px;
            position: relative;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #fff;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .input-container {
            display: flex;
            align-items: center;
            position: relative;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            transition: box-shadow 0.3s ease, background-color 0.3s ease;
            background-color: rgba(255, 255, 255, 0.8);
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            box-shadow: 0 0 8px 4px rgba(255, 255, 255, 0.4);
            background-color: rgba(255, 255, 255, 1);
        }

        /* Nút hiển thị mật khẩu */
        .toggle-password {
            position: absolute;
            right: 10px;
            cursor: pointer;
            color: #333;
            font-size: 20px;
        }

        /* Thiết kế cho nút đăng nhập */
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            background: linear-gradient(135deg, #ff007f, #ff1e56);
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        button[type="submit"]:hover {
            background: linear-gradient(135deg, #ff6f61, #ff4747);
            transform: translateY(-4px);
        }

        button[type="submit"]:active {
            transform: translateY(0);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Thiết kế cho checkbox và nhãn */
        .checkbox-container {
            display: flex;
            align-items: center;
            font-size: 16px;
            color: #ffeb3b;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        .checkbox-container label {
            margin: 0;
        }
    </style>
    <!-- Thêm link tới Font Awesome để sử dụng các icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <form action="index.php?controller=user&action=login" method="post">
        <div>
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" required autofocus>
        </div>
        <div>
            <label for="password">Mật khẩu:</label>
            <div class="input-container">
                <input type="password" id="password" name="password" required>
                <i class="fas fa-eye toggle-password" onclick="togglePassword()" id="toggleIcon"></i>
            </div>
        </div>

        <!-- Hiển thị thông báo lỗi ngay bên dưới ô nhập mật khẩu nếu có lỗi -->
        <?php if (!empty($error)): ?>
            <div class="error-message">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <div class="checkbox-container">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Ghi nhớ tên đăng nhập</label>
        </div>
        <div>
            <button type="submit">Đăng Nhập</button>
        </div>
    </form>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById("password");
            const toggleIcon = document.getElementById("toggleIcon");
            
            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
