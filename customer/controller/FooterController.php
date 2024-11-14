<?php
require_once '../model/Footer.php';

class FooterController {
    private $footerModel;

    public function __construct() {
        $this->footerModel = new Footer();
    }

    // Lấy thông tin footer
    public function getFooter() {
        return $this->footerModel->getFooter();
    }
    
}
?>
