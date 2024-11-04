<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý sản phẩm</title>
</head>
<body>
    <h2>Danh sách sản phẩm</h2>
    <a href="index.php?action=add_product">Thêm sản phẩm mới</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?= $product['MaSP'] ?></td>
                <td><?= htmlspecialchars($product['TenSP']) ?></td>
                <td><?= htmlspecialchars($product['Gia']) ?></td>
                <td><?= htmlspecialchars($product['Soluong']) ?></td>
                <td>
                    <a href="index.php?action=edit_product&id=<?= $product['MaSP'] ?>">Sửa</a>
                    <a href="index.php?action=delete_product&id=<?= $product['MaSP'] ?>">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
