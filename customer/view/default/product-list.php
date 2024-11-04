<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
    <link href="../../public/css/style.css" rel="stylesheet">
    <style>
        /* Bố cục tổng thể */
        .container {
        display: flex;
        justify-content: space-between;
        gap: 20px;
    }

    /* Phần danh mục (bên trái) */
    .categories {
        width: 20%;
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 8px;
    }

    .categories h3 {
        margin-bottom: 15px;
    }

    .categories ul {
        list-style-type: none;
        padding: 0;
    }

    .categories ul li {
        margin-bottom: 10px;
    }

    /* Phần sản phẩm (ở giữa) */
    .product-grid {
        width: 55%;
    }

    .product-grid h2 {
        margin-bottom: 20px;
        font-size: 1.8rem;
    }

    .product-card {
        text-align: center;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .product-card img {
        width: 100%;
        max-width: 150px;
        height: auto;
        border-radius: 4px;
    }

    .product-card h5 {
        font-size: 1.2rem;
        margin: 10px 0;
    }

    .product-card p {
        font-size: 0.9rem;
    }

    /* Phần tìm kiếm và giỏ hàng (bên phải) */
    .right-section {
        width: 25%;
    }

    .search-box {
        margin-bottom: 20px;
    }

    .cart {
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .cart h4 {
        font-size: 1.2rem;
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .cart h4 img {
        margin-right: 10px;
    }

    .cart-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.9rem;
        margin-bottom: 8px;
    }

    .cart-total {
        font-weight: bold;
        margin-top: 10px;
    }   
    </style>
</head>
<body>
    <?php include '../partials/header.php'; ?>
    <?php
    // Bao gồm tệp kết nối và lớp Product
    include_once '../../model/product.php'; // Đường dẫn đến product.php
    $productModel = new Product(); // Tạo một đối tượng Product

    // Lấy danh sách sản phẩm
    $limit = 10; // Số sản phẩm trên mỗi trang
    $offset = 0; // Vị trí bắt đầu (có thể thay đổi cho phân trang)
    $products = $productModel->getAllProducts($limit, $offset); // Gọi phương thức để lấy sản phẩm

    // Lấy danh mục sản phẩm (nếu có)
    $categories = []; // Bạn có thể lấy danh mục từ một lớp khác hoặc một phương thức tương tự

    // Lấy giỏ hàng (nếu có)
    $cartItems = []; // Tương tự, bạn có thể lấy giỏ hàng từ một lớp khác
    $cartTotal = 0; // Tổng giá trị giỏ hàng
    ?>
    <section class="product-list" style="min-height:600px">
        <div class="container">
            <!-- Danh mục sản phẩm (bên trái) -->
            <div class="categories">
                <h3>Danh mục</h3>
                <?php if (isset($categories) && is_array($categories) && count($categories) > 0): ?>
                    <ul>
                        <?php foreach ($categories as $category): ?>
                            <li>
                                <a href="index.php?controller=product&action=list&category_id=<?= $category['id'] ?>">
                                    <?= htmlspecialchars($category['name']) ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <p>Không có danh mục nào để hiển thị.</p>
                <?php endif; ?>
            </div>
            
            <!-- Danh sách sản phẩm (ở giữa) -->
            <div class="product-grid">
                <h2>Danh Sách Sản Phẩm</h2>
                <?php if (isset($products) && is_array($products) && count($products) > 0): ?>
                    <div class="row">
                    <?php foreach ($products as $product): ?>
                        <div class="col-md-4">
                            <div class="product-card">
                                <h5><?= htmlspecialchars($product['TenSP']) ?></h5>
                                <?php if (isset($product['Avatar']) && !empty($product['Avatar'])): ?>
                                    <img src="<?= htmlspecialchars($product['Avatar']) ?>" alt="<?= htmlspecialchars($product['TenSP']) ?>">
                                <?php else: ?>
                                    <img src="default-image.jpg" alt="Hình ảnh không có sẵn">
                                <?php endif; ?>
                                
                                <p>
                                    <span style="text-decoration: line-through;"><?= number_format($product['Gia'], 0, ',', '.') ?> VND</span>
                                    <br>
                                    <span style="color: red;"><?= number_format($product['GiaKM'], 0, ',', '.') ?> VND</span>
                                </p>
                                <a href="product-detail.php?controller=ProductController&action=detail&id=<?= $product['MaSP'] ?>" class="btn btn-primary">Xem chi tiết</a>
                                <a href="product-list.php?controller=cart&action=add&id=<?= $product['MaSP'] ?>" class="btn btn-success">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p>Không có sản phẩm nào để hiển thị.</p>
                <?php endif; ?>
            </div>

            <!-- Phần tìm kiếm và giỏ hàng (bên phải) -->
            <div class="right-section">
                <!-- Thanh tìm kiếm -->
                <div class="search-box">
                    <form action="index.php" method="GET">
                        <input type="hidden" name="controller" value="product">
                        <input type="hidden" name="action" value="search">
                        <input type="text" name="query" placeholder="Tìm kiếm sản phẩm..." required>
                        <button type="submit">Tìm kiếm</button>
                    </form>
                </div>

                <!-- Phần giỏ hàng nhỏ gọn -->
                <div class="cart">
                    <h4>
                        <img src="../../../picture/pngtree-shopping-cart-convenient-icon-image_1287807.jpg" alt="Giỏ hàng" width="20">
                        Giỏ hàng
                    </h4>
                    <?php if (isset($cartItems) && is_array($cartItems) && count($cartItems) > 0): ?>
                        <?php foreach ($cartItems as $item): ?>
                            <div class="cart-item">
                                <p><?= htmlspecialchars($item['name']) ?> (x<?= $item['quantity'] ?>)</p>
                                <p><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?> VND</p>
                            </div>
                        <?php endforeach; ?>
                        <div class="cart-total">
                            Tổng: <?= number_format($cartTotal, 0, ',', '.') ?> VND
                        </div>
                        <a href="index.php?controller=cart&action=checkout" class="btn btn-primary btn-sm">Thanh toán</a>
                    <?php else: ?>
                        <p>Giỏ hàng trống.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
