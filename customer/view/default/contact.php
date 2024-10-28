<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <link href="../../public/css/style.css" rel="stylesheet">
</head>
<style>
    h2 {
            text-align: center; 
        }

        form {
            display: flex; 
            flex-direction: column; 
        }
        label {
            margin-top: 10px; 
        }

        input {
            padding: 10px; 
            margin-top: 5px; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
        }

        button {
            margin-top: 20px; 
            padding: 10px; 
            background-color: #007bff; 
            color: white; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
        }

        button[type="reset"] {
            background-color: #6c757d; 
        }

        button:hover {
            opacity: 0.9; 
        }
</style>
<body>
    <?php include '../partials/header.php'; ?>
    
    <div class="container">
        <h2>Liên Hệ Với Chúng Tôi</h2>
        <form action="index.php?controller=contact&action=submit" method="post">
            <label for="name">Họ tên (*)</label>
            <input type="text" name="name" required><br><br>

            <label for="company">Công ty</label>
            <input type="text" name="company"><br><br>

            <label for="address">Địa chỉ</label>
            <input type="text" name="address"><br><br>

            <label for="email">Email (*)</label>
            <input type="email" name="email" required><br><br>

            <label for="website">Trang web</label>
            <input type="text" name="website"><br><br>

            <label for="phone">Điện thoại</label>
            <input type="text" name="phone"><br><br>

            <label for="fax">Fax</label>
            <input type="text" name="fax"><br><br>

            <button type="submit">Gửi thông tin</button><br><br>
            <button type="reset">Nhập lại</button><br><br>
        </form>
    </div>
    <?php include '../partials/footer.php'; ?>
</body>
</html>
