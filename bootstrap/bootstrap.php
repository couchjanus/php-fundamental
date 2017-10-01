<?php
    // require_once (realpath(__DIR__).'/../controllers/HomeController.php');
    switch ($_SERVER['REQUEST_URI']) {
        case '/':
            # code...
            require_once realpath(__DIR__).'/../controllers/HomeController.php';
            break;
    
        case '/about':
            # code...
            require_once realpath(__DIR__).'/../controllers/AboutController.php';
            break;
        
        default:
            # code...
            require_once realpath(__DIR__).'/../views/404.php';
    }
?>