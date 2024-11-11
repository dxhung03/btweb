<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Sản phẩm theo Danh mục</title>
    <link rel="stylesheet" href="../public/home.css">
</head>
<body>

<div class="container">
    <h2 class="text-center">Danh sách Sản phẩm theo Danh mục</h2>
    <ul class="product-list">
        <?php foreach ($products as $product): ?>
            <li class="product-item">
                <img src="<?php echo htmlspecialchars("/baitaplonweb/" . $product['Avatar']); ?>" alt="<?php echo htmlspecialchars($product['TenSP']); ?>" class="product-image">
                <h3 class="product-name"><a href="../view/Product-view.php?action=detail&MaSp=<?php echo $product['MaSP']; ?>"><?php echo htmlspecialchars($product['TenSP']); ?></a></h3>
                <p class="product-price">Giá: <?php echo number_format($product['Gia'], 0, ',', '.'); ?> VNĐ</p>
                <?php if ($product['GiaKM']): ?>
                    <p class="product-discount-price">Giá KM: <?php echo number_format($product['GiaKM'], 0, ',', '.'); ?> VNĐ</p>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
