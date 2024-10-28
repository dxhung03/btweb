<?php
require_once '../controller/productcontroller.php';

$controller = $_GET['controller'] ?? 'product';
$action = $_GET['action'] ?? 'list';

$productController = new ProductController();

if ($controller === 'product') {
    if ($action === 'list') {
        $productController->list();
    } elseif ($action === 'detail') {
        $productController->detail();
    }
}
?>
