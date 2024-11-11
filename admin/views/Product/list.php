<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="Styles/styles.css">
</head>
<body>
    <?php include 'Views/header.php'; ?>

    <div class="main-container">
        <?php include 'Views/sidebar.php'; ?>

        <div class="main-content">
            <h2>Danh sách sản phẩm</h2>

            <!-- Form bộ lọc danh mục -->
            <form method="GET" action="index.php">
                <input type="hidden" name="controller" value="product">
                <input type="hidden" name="action" value="list">
                <label for="Danhmuc">Lọc theo danh mục:</label>
                <select name="filterDanhmuc" id="Danhmuc">
                    <option value="">-- Tất cả --</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['MaDM']; ?>" 
                            <?php echo isset($_GET['filterDanhmuc']) && $_GET['filterDanhmuc'] == $category['MaDM'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($category['Ten']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Hiển Thị</button>
            </form>

            <table class="table">
                <thead>
                    <tr>
                        <th>MaSP</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Giá KM</th>
                        <th>Số lượng</th>
                        <th>Số lượng mua</th>
                        <th>Mô tả</th>
                        <th>Danh mục</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($products as $product) {
                    echo "<tr>";
                    echo "<td>{$product['MaSP']}</td>";
                    echo "<td>";
                    
                    if (!empty($product['Avatar'])) {
                        // Giả sử đường dẫn Avatar lưu trong DB là dạng: 'picture/L6bE5e7.jpeg'
                        $avatarPath = "/baitaplonweb/" . $product['Avatar'];
            
                        echo "<img src='{$avatarPath}' alt='Hình Ảnh' style='width: 50px; height: auto; margin-right: 10px; vertical-align: middle;'>";
                    } else {
                        echo "<img src='' alt='Hình Ảnh' style='width: 50px; height: auto; margin-right: 10px; vertical-align: middle;'>";
                    }
                    
                    echo "{$product['TenSP']}</td>";
                    echo "<td>" . number_format($product['Gia'], 0, ',', '.') . " VND</td>";
                    echo "<td>" . number_format($product['GiaKM'], 0, ',', '.') . " VND</td>";
                    echo "<td>{$product['Soluong']}</td>";
                    echo "<td>{$product['Soluotmua']}</td>";
                    echo "<td>" . htmlspecialchars($product['Mota']) . "</td>";
                    echo "<td>" . htmlspecialchars($product['TenDanhMuc']) . "</td>";
                    echo "<td>";
                    echo "<a href='index.php?controller=product&action=edit&id={$product['MaSP']}'>Sửa</a> | ";
                    echo "<a href='index.php?controller=product&action=delete&id={$product['MaSP']}' onclick='return confirm(\"Bạn có chắc chắn muốn xóa sản phẩm này không?\")'>Xóa</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
