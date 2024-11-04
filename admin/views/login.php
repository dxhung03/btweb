<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập Admin</title>
</head>
<body>
    <h2>Đăng nhập Admin</h2>
    <form action="index.php?action=authenticate" method="post">
        <input type="text" name="username" placeholder="Tên đăng nhập" required><br>
        <input type="password" name="password" placeholder="Mật khẩu" required><br>
        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>
