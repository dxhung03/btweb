<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý liên hệ</title>
    <link rel="stylesheet" href="Styles/styles.css">
</head>
<body>
    <?php include 'Views/header.php'; ?>

    <div class="main-container">
        <?php include 'Views/sidebar.php'; ?>

        <div class="main-content">
            <h2>Danh sách liên hệ</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Họ tên khách hàng</th>
                        <th>Công ty</th>
                        <th>Địa chỉ</th>
                        <th>Trang web</th>
                        <th>Số điện thoại</th>
                        <th>Fax</th>
                        <th>Ghi chú</th>
                        <th>Ngày gửi thông tin</th>                
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($contacts as $contact) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($contact['full_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($contact['company']) . "</td>";
                    echo "<td>" . htmlspecialchars($contact['address']) . "</td>";
                    echo "<td>" . htmlspecialchars($contact['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($contact['phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($contact['fax']) . "</td>";
                    echo "<td>" . htmlspecialchars($contact['note']) . "</td>";
                    echo "<td>" . htmlspecialchars($contact['created_at']) . "</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
