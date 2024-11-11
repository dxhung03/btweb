<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="../public/home.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="product-detail">
            <h2 class="text-center">Chi tiết Sản phẩm</h2>
            <h3><?php echo htmlspecialchars($product['TenSP']); ?></h3>
            <img src="<?php echo htmlspecialchars("/baitaplonweb/".$product['Avatar']); ?>" alt="<?php echo htmlspecialchars($product['TenSP']); ?>" class="img-fluid">
            <div class="product-description mt-3">
                <p>Mô tả: <?php echo htmlspecialchars($product['Mota']); ?></p>
                <p class="product-price">Giá: <?php echo number_format($product['Gia'], 0, ',', '.'); ?> VNĐ</p>
                <p class="product-discount-price">Giá KM: <?php echo number_format($product['GiaKM'], 0, ',', '.'); ?> VNĐ</p>
            </div>
            <form method="POST" action="../controller/CartController.php" class="mt-3">
                <input type="hidden" name="product_id" value="<?php echo $product['MaSP']; ?>">
                <div class="form-group">
                    <label for="quantity">Số lượng:</label>
                    <input type="number" id="quantity" name="quantity" value="1" min="1" max="<?php echo $product['Soluong']; ?>" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
            </form>

            <div class="back-button mt-3">
                <a href="Product-view.php" class="btn btn-secondary">Quay lại danh sách sản phẩm</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
