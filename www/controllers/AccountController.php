<?php
    class AccountController extends BaseController{
        function __construct()
        {
            $this->folder = 'pages';
        }
        
        public function changepass()
        {
            $type = $_SESSION['acctype'].'dashboard';
            $menu = $type();
            $data = array(
                'title' => 'Change Pass',
                'menu' => $menu);
            $this->render('changepass','application', $data);
        }

        public function error(){
            $this->render('error','base');
        }

        public function logout()
        {
            unset($_SESSION['username']);
            unset($_SESSION['password']);
            unset($_SESSION['changepass']);
            header('Location: index.php');
        }

        public function showinfo()
        {
            $type = $_SESSION['acctype'].'dashboard';
            $menu = $type();
            $user = new UserModel();
            $result = $user->getUserByName($_SESSION['username']);
            $data = array(
                'infor' => $result['message'], 
                'title' => 'Show Information',
                'menu' => $menu);
            $this->render('showinfo','application', $data);
        }

        public function changeinfo()
        {
            $type = $_SESSION['acctype'].'dashboard';
            $menu = $type();
            $data = array(
                'title' => 'Change Information',
                'menu' => $menu);
            
            $this->render('changeinfo','application', $data);

        }

        public function showEmpls()
        {
            $user = new UserModel();
            $result = $user->getUsers($_SESSION['username']);
            $type = $_SESSION['acctype'].'dashboard';
            $menu = $type();
            $data = array(
                'result' => $result, 
                'title' => 'Show Employees',
                'menu' => $menu);
            $this->render('showEmpls','application', $data);
        }

        public function showEmpl()
        {

            $user = new UserModel();
            $result = $user->getUserByName($_POST['username']);
            $type = $_SESSION['acctype'].'dashboard';
            $menu = $type();
            $data = array(
                'infor' => $result['message'], 
                'title' => 'Show Employee',
                'menu' => $menu);
            $this->render('showinfo','application', $data);
        }

        public function resetpass()
        {
            $user = new UserModel();
            $user->resetpass($_POST['username']);
            $this->showEmpls();
        }

        public function newaccount()
        {
            $type = $_SESSION['acctype'].'dashboard';
            $menu = $type();
            
            $data = array(
                'title' => 'New Account',
                'menu' => $menu);
            
            $this->render('newaccount','application', $data);
        }

        public function removeaccount()
        {
            $type = $_SESSION['acctype'].'dashboard';
            $menu = $type();
            $user = new UserModel();
            $user->removeaccount($_POST['username'], $_POST['id']);
            $this->showEmpls();
        }

    }
?>