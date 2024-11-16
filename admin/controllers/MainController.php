<?php
require_once 'Models/DBAccess.php';
class MainController {
    public function handleRequest() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'home';
        $controller = isset($_GET['controller']) ? $_GET['controller'] : '';

        switch($controller) {
            case 'product': 
                require_once 'Controllers/ProductController.php';
                $productController = new ProductController();
                switch($action) {
                    case 'list':
                        $productController->index();
                        break;
                    case 'add':
                        $productController->add();
                        break;
                    case 'edit':
                        $productController->edit();
                        break;
                    case 'delete':
                        $productController->delete();
                        break;
                    default:
                        $productController->index();
                }
                break;
                case 'banner': 
                    require_once 'Controllers/BannerController.php';
                    $bannerController = new BannerController();
                    switch($action) {
                        case 'list':
                            $bannerController->index();
                            break;
                        case 'add':
                            $bannerController->add();
                            break;
                        case 'edit':
                            $bannerController->edit();
                            break;
                        case 'delete':
                            $bannerController->delete();
                            break;
                        default:
                            $bannerController->index();
                    }
                    break;
                    case 'footer': 
                        require_once 'Controllers/FooterController.php';
                        $footerController = new FooterController();
                        switch($action) {
                            case 'list':
                                $footerController->index();
                                break;
                            case 'add':
                                $footerController->add();
                                break;
                            case 'edit':
                                $footerController->edit();
                                break;
                            case 'delete':
                                $footerController->delete();
                                break;
                            default:
                                $footerController->index();
                        }
                        break;
                        case 'category': 
                            require_once 'Controllers/CategoryController.php';
                            $categoryController = new CategoryController();
                            switch($action) {
                                case 'list':
                                    $categoryController->index();
                                    break;
                                case 'add':
                                    $categoryController->add();
                                    break;
                                case 'edit':
                                    $categoryController->edit();
                                    break;
                                case 'delete':
                                    $categoryController->delete();
                                    break;
                                default:
                                    $categoryController->index();
                            }
                            break;
                            case 'customer': 
                                require_once 'Controllers/CustomerController.php';
                                $customerController = new CustomerController();
                                switch($action) {
                                    case 'list':
                                        $customerController->index();
                                        break;
                                    default:
                                        $customerController->index();
                                    }
                                    break ; 
                            case 'contact': 
                                require_once 'Controllers/ContactController.php';
                                $contactController = new ContactController();
                                switch($action) {
                                    case 'list':
                                        $contactController->index();
                                        break;
                                    default:
                                        $contactController->index();
                                    }
                                    break ; 
                            case 'user':
                                require_once 'Controllers/UserController.php';
                                $userController = new UserController();
                                switch($action) {
                                     case 'login':
                                        $userController->login();
                                        break;
                                    case 'logout':
                                        $userController->logout();
                                        break;
                                    default:
                                        $userController->login();
                                    }
                                    break;
                                
            default:
                include 'Views/home.php';
        }
    }
}