<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh mục</title>
    <link rel="stylesheet" href="Styles/styles.css">
</head>
<body>
    <?php include 'Views/header.php'; ?>

    <div class="main-container">
        <?php include 'Views/sidebar.php'; ?>

        <div class="main-content">
            <h2>Danh sách danh mục</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>MaDM</th>
                        <th>Tên danh mục</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($categories as $category): ?>
        <tr>
            <td><?php echo $category['MaDM']; ?></td>
            <td><?php echo $category['Ten']; ?></td> <!-- Hiển thị tên danh mục -->
            <td>
                <a href="index.php?controller=category&action=edit&id=<?php echo $category['MaDM']; ?>">Sửa</a> |
                <a href="index.php?controller=category&action=delete&id=<?php echo $category['MaDM']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
