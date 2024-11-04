<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Banner</title>
</head>
<body>
    <h1>Quản lý Banner</h1>
    <a href="index.php?action=banner&action=create">Thêm Banner</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên Banner</th>
            <th>Hình Ảnh</th>
            <th>Hành động</th>
        </tr>
        <?php if (!empty($banners) && is_array($banners)): ?>
            <?php foreach ($banners as $banner): ?>
            <tr>
                <td><?php echo $banner['MaBanner']; ?></td>
                <td><?php echo $banner['Name']; ?></td>
                <td><img src="<?php echo $banner['Avatar']; ?>" width="100"></td>
                <td>
                    <a href="index.php?action=banner&action=edit&id=<?php echo $banner['MaBanner']; ?>">Sửa</a> |
                    <a href="index.php?action=banner&action=delete&id=<?php echo $banner['MaBanner']; ?>">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Không có dữ liệu banner</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
