<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Sản Phẩm</title>
    <link href="../../public/css/style.css" rel="stylesheet">
</head>
<style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1; 
        }
</style>
<body>
    <?php include '..../partials/header.php'; ?>

    <div class="container">
        <h2><?= $product['name'] ?></h2>
        <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
        <p>Giá: <?= number_format($product['price'], 0, ',', '.') ?> VND</p>
        <p>Thông tin chi tiết về sản phẩm sẽ ở đây.</p>
    </div>

    <?php include '../partials/footer.php'; ?>
</body>
</html>
