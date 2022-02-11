<?php
    session_start();
    require_once('controllers/BaseController.php');
    require_once('model/DataBase.php');
    require_once("model/UserModel.php");
    require_once("model/RoomModel.php");
    require_once("model/TaskModel.php");
    if (isset($_SESSION['acctype'])){
        require_once('lib/dashboard.php');
    }
    
    // chưa đăng nhập thì chạy vào hàm đăng nhập
    
    if(!isset($_SESSION['username'])){
        $controller ='login';
        $action = 'login';
    }else {
        // nếu đã đăng nhập nhưng cần đổi pass thì phải chạy vào đổi pass
        if ($_SESSION['changepass']){
            $controller = 'account';
            $action = 'changepass';
        }
        // đã đăng nhập thì kiểm tra get controller và action 
        else {
            if(isset($_GET['controller'])){
                $controller = $_GET['controller'];
                if(isset($_GET['action'])){
                    $action = $_GET['action'];
                }
            } else{
                $controller = 'home';
                $action = 'index';
            }
        }        
        if(isset($_GET['controller']) && isset($_GET['action'])){
            if (($_GET['controller'] == 'account') && ($_GET['action'] == 'logout')){
                $controller = 'account';
                $action = 'logout';
            }
        }
    }
    require_once('routes.php');
?>
