
<header class="header">
        <div class="top-bar">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="contact-info">
                    <span>Email: ab@gmail.com</span> | 
                    <span>09:00 - 18:00</span>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="header-content d-flex justify-content-between align-items-center py-3">
                <div class="logo">
                    <a href="#"><img src="../../picture/logo.png" alt="Logo" height="50"></a>
                </div>
                <div class="search-bar">
    <input type="text" id="search-box" placeholder="Tìm kiếm sản phẩm..." class="form-control">
    <div id="search-results" class="dropdown-menu"></div>
</div>            
                <div class="cart">
                    <a href="../view/Cart.php" class="cart-icon">
                        GIỎ HÀNG / <span id="cart-count"><?php echo $cartItemCount; ?></span>
                        <div class="cart-dropdown">
                            <div class="cart-items">
                                <?php if (count($cartItems) > 0): ?>
                                    <?php foreach ($cartItems as $item): ?>
                                        <div class="cart-item">                            
                                        <img src="<?php echo htmlspecialchars("/baitaplonweb/".$item['Avatar']); ?>" alt="<?php echo htmlspecialchars($item['TenSP']); ?>" class="cart-item-image">
                                            <div class="cart-item-details">                                                
                                                <span class="cart-item-name"><?php echo htmlspecialchars($item['TenSP']); ?></span>
                                                <span class="cart-item-price"><?php echo number_format($item['GiaKM'], 0, ',', '.'); ?> VNĐ</span>
                                                <span class="cart-item-quantity"><?php echo $item['Soluong']; ?></span>                                               
                                            </div>
                                            <a href="../controller/CartController.php?action=remove&product_id=<?php echo $item['MaSP']; ?>" class="btn btn-danger btn-sm remove-item">✖</a>
                                            </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>Giỏ hàng trống.</p>
                                <?php endif; ?>
                            </div>
                            <div class="cart-total">
                                <strong>Tổng:</strong> <span id="cart-total"><?php echo number_format($totalAmount, 0, ',', '.'); ?> VNĐ</span>
                            </div>
                            <a href="../view/Cart.php" class="btn btn-primary">Xem Giỏ Hàng</a>
                            <a href="../view/Checkout.php" class="btn btn-secondary">Thanh Toán</a>
                        </div>
                    </a>
                </div>
                <div class="contact-number">
                    <a href="tel:000000000">ZALO: 000000000</a>
                </div>
                <div class="login">
                    <?php if ($userId > 0): ?>
                        <span class="text-black">Xin chào, <?php echo htmlspecialchars($userName); ?>!</span>
                        <a href="logout.php" class="text-black">Đăng xuất</a>
                    <?php else: ?>
                        <a href="login.php" class="text-black">
                            <img src="../../picture/sign-in-vector-icon-png_262162.jpg" alt="Đăng nhập" height="30"> Đăng nhập
                        </a>
                    <?php endif; ?>
                </div>
            </div>        
        </div>
    </header>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    document.getElementById('search-box').addEventListener('input', function () {
        let query = this.value.trim();
        if (query.length > 0) {
            fetch(`../controller/SearchController.php?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    let results = document.getElementById('search-results');
                    results.innerHTML = ""; // Xóa kết quả cũ
                    if (data.length > 0) {
                        data.forEach(product => {
                            let item = document.createElement('a');
                            item.href = `Product-view.php?action=detail&MaSp=${product.MaSP}`;
                            item.className = 'dropdown-item';
                            item.textContent = product.TenSP;
                            results.appendChild(item);
                        });
                        results.style.display = 'block';
                    } else {
                        results.innerHTML = '<span class="dropdown-item">Không tìm thấy sản phẩm.</span>';
                    }
                });
        } else {
            document.getElementById('search-results').style.display = 'none';
        }
    });

    // Ẩn kết quả tìm kiếm khi click bên ngoài
    document.addEventListener('click', function (e) {
        if (!document.querySelector('.search-bar').contains(e.target)) {
            document.getElementById('search-results').style.display = 'none';
        }
    });
</script>