<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khách hàng</title>
    <link rel="stylesheet" href="Styles/styles.css">
</head>
<body>
    <?php include 'Views/header.php'; ?>

    <div class="main-container">
        <?php include 'Views/sidebar.php'; ?>

        <div class="main-content">
            <h2>Danh sách khách hàng</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Tên khách hàng</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
                foreach ($customers as $customer) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($customer['TenTK']) . "</td>";
                    echo "<td>" . htmlspecialchars($customer['Password']) . "</td>";
                    echo "<td>" . htmlspecialchars($customer['TenKH']) . "</td>";
                    echo "<td>" . htmlspecialchars($customer['Email']) . "</td>";
                    echo "<td>" . htmlspecialchars($customer['Phone']) . "</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
