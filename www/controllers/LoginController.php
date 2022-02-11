<?php

    class LoginController extends BaseController{

        public function __construct()
        {
            $this->folder = 'pages';
        }

        public function Checklogin()
        {
            $user = new UserModel();
            $result = $user->login($_POST['username'], $_POST['password']);
            if(!$result['code']){
                $_SESSION['logged_in'] = true;
                
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['password'] = $_POST['password'];
                $_SESSION['acctype'] = $result['message'];
                include_once('lib/admin.php');
                $_SESSION['changepass'] = true;
                if ($_SESSION['acctype'] == 'admin'){
                    $_SESSION['changepass'] = false;
                } else if ($_SESSION['username'] != $_SESSION['password']){
                    $_SESSION['changepass'] = false;
                }
                header('Location: index.php');
            } else {
                $_SESSION['error'] = $result['message'];
            }
            
        }

        public function login()
        {
            $data = array('message' => '', 'title' => 'Login');
            $this->render('login','base', $data);
        }

    }
    
?>