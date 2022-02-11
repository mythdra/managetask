<?php
    class HomeController extends BaseController{
        function __construct()
        {
            $this->folder = 'pages';
        }

        public function index()
        {
            $type = $_SESSION['acctype'].'dashboard';
            $menu = $type();
            $data = array(
                'name' => 'Sang Beo',
                'age' => 22,
                'title' => 'Home',
                'menu' => $menu,
            );
            $this->render('home','application', $data);
        }
        

        public function error(){
            $this->render('error','base');
        }
    }
?>