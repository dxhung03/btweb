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
            <h2>Danh sách Banner</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã Banner</th>
                        <th>Tên Banner</th>
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($banners as $banner) {
                        echo "<tr>";
                        echo "<td>{$banner['MaBanner']}</td>";
                        echo "<td>{$banner['Name']}</td>";
                        echo "<td><img src='{$banner['Avatar']}' alt='Hình Ảnh banner' style='width: 100px; height: auto;'></td>";
                        echo "<td>";
                        echo "<a href='index.php?controller=banner&action=edit&id={$banner['MaBanner']}'>Sửa</a> | ";
                        echo "<a href='index.php?controller=banner&action=delete&id={$banner['MaBanner']}' onclick='return confirm(\"Bạn có chắc chắn muốn xóa banner này không?\")'>Xóa</a>";
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
