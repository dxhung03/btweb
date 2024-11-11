<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bán hàng - Thêm Sản Phẩm</title>
    <link rel="stylesheet" href="Styles/styles.css">
</head>
<body>
    <?php include 'Views/header.php'; ?>    

    <div class="main-container">
        <?php include 'Views/sidebar.php'; ?>

        <div class="main-content">
            <h2>Thêm mới sản phẩm</h2>
            <form action="index.php?controller=product&action=add" method="POST" enctype="multipart/form-data">
                <table class="table">
                    <tr>
                        <td><label for="TenSP">Tên sản phẩm:</label></td>
                        <td><input type="text" name="TenSP" required></td>
                    </tr>
                    <tr>
                        <td><label for="Gia">Đơn giá:</label></td>
                        <td><input style="width: 50%; height: 30px;" type="number" name="Gia" required></td>
                    </tr>
                    <tr>
                        <td><label for="GiaKM">Giá KM:</label></td>
                        <td><input style="width: 50%; height: 30px;" type="number" name="GiaKM" required></td>
                    </tr>  
                    <tr>
                        <td><label for="Soluong">Số lượng:</label></td>
                        <td><input style="width: 50%; height: 30px;" type="number" name="Soluong" required></td>
                    </tr>
                    <tr>
                        <td><label for="Mota">Mô tả sản phẩm:</label></td>
                        <td><textarea style="width: 100%; height: 50px;" name="Mota" required></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="MaDM">Chọn Danh Mục</label></td>
                        <td>
                            <select name="Danhmuc" id="Danhmuc" required>
                                <option value="">-- Chọn Danh Mục --</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['MaDM']; ?>">
                                        <?php echo $category['Ten']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    <td><label for="Avatar">Hình ảnh:</label></td>
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
