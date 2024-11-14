<?php
require_once '../model/Banner.php';

class BannerController {
    private $bannerModel;

    public function __construct() {
        $this->bannerModel = new Banner();
    }

    // Phương thức lấy tất cả các banner và trả về kết quả
    public function getBanners() {
        return $this->bannerModel->getAllBanners();
    }

    // Phương thức lấy tất cả các banner và truyền chúng cho View (không cần dùng trong trường hợp này)
    public function showAllBanners() {
        $banners = $this->bannerModel->getAllBanners();
        include '../view/home.php';
    }
}
?>
