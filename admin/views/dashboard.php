<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../public/admin.css"> 
</head>
<body>
    <div class="sidebar">
        <h2>Quản lý hệ thống</h2>
        <ul>
            <li><a href="index.php?action=dashboard">Tổng quan</a></li>
            <li><a href="index.php?action=banner">Quản lý Banner</a></li>
            <li><a href="index.php?action=members">Quản lý Thành viên</a></li>
            <li><a href="index.php?action=categories">Quản lý Danh mục</a></li>
            <li><a href="index.php?action=products">Quản lý Sản phẩm</a></li>
            <li><a href="index.php?action=footer">Quản lý Footer</a></li>
            <li><a href="index.php?action=logout">Đăng xuất</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h1>Trang quản trị</h1>
            <p>Chào mừng bạn đến với trang quản lý</p>
        </header>
        
        <section class="overview">
            <h2>Tổng quan</h2>
            <div class="cards">
                <div class="card">
                    <h3>Banners</h3>
                    <p>Số lượng: <strong>10</strong></p>
                    <a href="index.php?action=banner" class="btn">Quản lý</a>
                </div>
                <div class="card">
                    <h3>Thành viên</h3>
                    <p>Số lượng: <strong>50</strong></p>
                    <a href="index.php?action=members" class="btn">Quản lý</a>
                </div>
                <div class="card">
                    <h3>Danh mục</h3>
                    <p>Số lượng: <strong>15</strong></p>
                    <a href="index.php?action=categories" class="btn">Quản lý</a>
                </div>
                <div class="card">
                    <h3>Sản phẩm</h3>
                    <p>Số lượng: <strong>200</strong></p>
                    <a href="index.php?action=products" class="btn">Quản lý</a>
                </div>
                <div class="card">
                    <h3>Footer</h3>
                    <p>Cài đặt footer</p>
                    <a href="index.php?action=footer" class="btn">Quản lý</a>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
