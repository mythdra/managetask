<?php
    // Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó
    require_once('controllers/BaseController.php');
    if (file_exists('controllers/' . ucfirst($controller) . 'Controller.php')){
        include_once('controllers/' . ucfirst($controller) . 'Controller.php');
        // Tạo ra tên controller class từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.
        $klass = ucfirst($controller) . 'Controller';
        $controller = new $klass;
        if (method_exists($controller, $action)){
            $controller->$action();
        } else{
            // $controller->error();
            include_once('controllers/HomeController.php');
            $controller = new HomeController();
            $controller->index();
        }
    } else{
        // $controller->error();
        include_once('controllers/HomeController.php');
        $controller = new HomeController();
        $controller->index();
    }
    
?>