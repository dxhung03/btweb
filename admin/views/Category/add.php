<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bán hàng - Thêm Danh Mục</title>
    <link rel="stylesheet" href="Styles/styles.css">
</head>
<body>
    <?php include 'Views/header.php'; ?>    

    <div class="main-container">
        <?php include 'Views/sidebar.php'; ?>

        <div class="main-content">
            <h2>Thêm mới danh mục</h2>
            <form action="index.php?controller=category&action=add" method="POST">
            <table class="table">
                <tr>
                    <td><label for="Ten">Tên danh mục:</label></td>
                    <td><input type="text" name="Ten" required></td>
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
