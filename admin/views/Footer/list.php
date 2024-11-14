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
                        <th>Chính sách</th>
                        <th>Thương hiệu</th>
                        <th>Liên hệ</th>
                        <th>Hình ảnh</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($footers as $footer) {
                            $avatarPath = "/baitaplonweb/" . $footer['Avatar'];
                        echo "<tr>";
                        echo "<td>{$footer['MaFooter']}</td>";
                        echo "<td>{$footer['Name']}</td>";
                        echo "<td>{$footer['Chinhsach']}</td>";
                        echo "<td>{$footer['Thuonghieu']}</td>";
                        echo "<td>{$footer['Lienhe']}</td>";
                        echo "<td><img src='{$avatarPath}' alt='Hình Ảnh' style='width: 50px; height: auto; margin-right: 10px; vertical-align: middle;'></td>";
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
