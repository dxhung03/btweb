<?php
require_once '../models/Banner.php';

class BannerController {
    private $bannerModel;

    public function __construct() {
        $this->bannerModel = new Banner();
    }

    public function index() {
        $banners = $this->bannerModel->getAllBanners();
        include '../views/banner/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $avatar = $_POST['avatar'];
            $this->bannerModel->createBanner($name, $avatar);
            header('Location: index.php?action=banner');
        } else {
            include 'views/admin/banner/create.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $avatar = $_POST['avatar'];
            $this->bannerModel->updateBanner($id, $name, $avatar);
            header('Location: index.php?action=banner');
        } else {
            $banner = $this->bannerModel->getBannerById($id);
            include 'views/admin/banner/edit.php';
        }
    }

    public function delete($id) {
        $this->bannerModel->deleteBanner($id);
        header('Location: index.php?action=banner');
    }
}
?>
