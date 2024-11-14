<?php
require_once '../controller/FooterController.php';

$footerController = new FooterController();
$footer = $footerController->getFooter();
?>
<style>
    .footer p {
    white-space: pre-wrap; 
    line-height: 1.5; 
}

.footer img {
    max-width: 100px; 
    height: auto;
}

</style>
<footer class="footer bg-dark text-white pt-4 pb-2">
        <div class="container " >
            <div class="row">
                <div class="col-md-4">
                    <h5>Liên Hệ</h5>
                    <p><?php echo nl2br(htmlspecialchars($footer['Lienhe']));?></p>
                </div>
                <div class="col-md-4">
                    <h5>Mạng xã hội</h5>
                    <a href="#" class="text-white mr-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white mr-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                </div>
                <div class="col-md-4">
                    <h5>Thương hiệu</h5>
                    <p><?php echo htmlspecialchars($footer['Thuonghieu']); ?></p >
                    <img src="<?php echo htmlspecialchars("/baitaplonweb/".$footer['Avatar']); ?>" alt="Logo" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <h5>Chính sách</h5>
                    <p><?php echo nl2br(htmlspecialchars($footer['Chinhsach'])); ?></p>
                </div>
            </div>
        </div>
        <div class="text-center py-3">© 2024 Đồ Thể Thao HDDT</div>
</footer>
