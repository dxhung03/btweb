<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý banner</title>
    <link rel="stylesheet" href="Styles/styles.css">
</head>
<body>
    <?php include 'Views/header.php'; ?>    

    <div class="main-container">
        <?php include 'Views/sidebar.php'; ?>

        <div class="main-content">
            <h2>Sửa Footer</h2>
            <form action="index.php?controller=footer&action=edit" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="MaFooter" value="<?php echo $footer['MaFooter']; ?>">
                <table class="table">
                    <tr>
                        <td><label for="Name">Tên Footer:</label></td>
                        <td><input type="text" name="Name" value="<?php echo $footer['Name']; ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="Avatar">Hình ảnh Footer:</label></td>
                        <td>
                            <input type="file" name="Avatar" accept="image/*">
                            <br>
                            <img src="<?php echo $footer['Avatar']; ?>" alt="Hình ảnh Footer" style="width: 100px; height: auto; margin-top: 10px;">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input type="submit" value="Lưu thay đổi">
                            <input type="button" value="Quay lại" onclick="history.back();">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
