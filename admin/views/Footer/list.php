<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Footer</title>
    <link rel="stylesheet" href="Styles/styles.css">
</head>
<body>
    <?php include 'Views/header.php'; ?>

    <div class="main-container">
        <?php include 'Views/sidebar.php'; ?>

        <div class="main-content">
            <h2>Danh sách Footer</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Mã Footer</th>
                        <th>Tên Footer</th>
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($footers as $footer) {
                        echo "<tr>";
                        echo "<td>{$footer['MaFooter']}</td>";
                        echo "<td>{$footer['Name']}</td>";
                        echo "<td><img src='{$footer['Avatar']}' alt='Hình Ảnh Footer' style='width: 100px; height: auto;'></td>";
                        echo "<td>";
                        echo "<a href='index.php?controller=footer&action=edit&id={$footer['MaFooter']}'>Sửa</a> | ";
                        echo "<a href='index.php?controller=footer&action=delete&id={$footer['MaFooter']}' onclick='return confirm(\"Bạn có chắc chắn muốn xóa banner này không?\")'>Xóa</a>";
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
