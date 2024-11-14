<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý footer</title>
    <link rel="stylesheet" href="Styles/styles.css">
</head>
<body>
    <?php include 'Views/header.php'; ?>    

    <div class="main-container">
        <?php include 'Views/sidebar.php'; ?>

        <div class="main-content">
            <h2>Thêm mới Footer</h2>
            <form action="index.php?controller=footer&action=add" method="POST" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <td><label for="Name">Tên Footer:</label></td>
                        <td><input type="text" name="Name" required></td>
                    </tr>
                    <tr>
                        <td><label for="Chinhsach">Chính sách:</label></td>
                        <td><input type="text" name="Chinhsach" required></td>
                    </tr>
                    <tr>
                        <td><label for="Thuonghieu">Thương hiệu:</label></td>
                        <td><input type="text" name="Thuonghieu" required></td>
                    </tr>
                    <tr>
                        <td><label for="Lienhe">Liên hệ:</label></td>
                        <td><input type="text" name="Lienhe" required></td>
                    </tr>
                    <tr>
                        <td><label for="Avatar">Hình ảnh Footer:</label></td>
                        <td><input type="file" name="Avatar" accept="image/*" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input type="submit" value="Thêm mới">
                            <input type="button" value="Quay lại" onclick="history.back();">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>
