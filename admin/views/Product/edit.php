<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bán hàng - Sửa sản phẩm</title>
    <link rel="stylesheet" href="Styles/styles.css">
</head>
<body>
    <?php include 'Views/header.php'; ?>    

    <div class="main-container">
        <?php include 'Views/sidebar.php'; ?>

        <div class="main-content">
            <h2>Sửa sản phẩm</h2>
            <form action="index.php?controller=product&action=edit" method="POST" enctype="multipart/form-data">
                <!-- Trường ẩn để lưu mã sản phẩm -->
                <input type="hidden" name="MaSP" value="<?php echo $product['MaSP']; ?>">
                <input type="hidden" name="AvatarCurrent" value="<?php echo $product['Avatar']; ?>"> <!-- Lưu đường dẫn ảnh hiện tại nếu không thay đổi -->
                
                <table class="table">
                    <tr>
                        <td><label for="TenSP">Tên sản phẩm:</label></td>
                        <td><input type="text" name="TenSP" value="<?php echo htmlspecialchars($product['TenSP']); ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="Gia">Đơn giá:</label></td>
                        <td><input style="width: 50%; height: 30px;" type="number" name="Gia" value="<?php echo htmlspecialchars($product['Gia']); ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="GiaKM">Giá KM:</label></td>
                        <td><input style="width: 50%; height: 30px;" type="number" name="GiaKM" value="<?php echo htmlspecialchars($product['GiaKM']); ?>" required></td>
                    </tr>  
                    <tr>
                        <td><label for="Soluong">Số lượng:</label></td>
                        <td><input style="width: 50%; height: 30px;" type="number" name="Soluong" value="<?php echo htmlspecialchars($product['Soluong']); ?>" required></td>
                    </tr>
                    <tr>
                        <td><label for="Mota">Mô tả sản phẩm:</label></td>
                        <td><textarea style="width: 100%; height: 50px;" name="Mota" required><?php echo htmlspecialchars($product['Mota']); ?></textarea></td>
                    </tr>
                    <tr>
                        <td><label for="Danhmuc">Chọn Danh Mục</label></td>
                        <td>
                            <select name="Danhmuc" id="Danhmuc" required>
                                <option value="">-- Chọn Danh Mục --</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['MaDM']; ?>" 
                                        <?php echo $product['MaDM'] == $category['MaDM'] ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($category['Ten']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                    <td><label for="Avatar">Hình ảnh :</label></td>
                        <td>
                            <input type="file" name="Avatar" accept="image/*">
                            <br>
                            
                            <img src="<?php echo htmlspecialchars("/baitaplonweb/".$product['Avatar']); ?>" alt="Hình ảnh" style="width: 100px; height: auto; margin-top: 10px;">
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
