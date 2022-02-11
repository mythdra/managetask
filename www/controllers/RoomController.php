<?php
    
    class RoomController extends BaseController{
        function __construct()
        {
            $this->folder = 'pages';
        }    

        public function showRooms()
        {
            $room = new RoomModel();
            $result = $room->getRooms();
            $type = $_SESSION['acctype'].'dashboard';
            $menu = $type();
            $data = array(
                'title' => 'Rooms',
                'result' => $result,
                'menu' => $menu);
            $this->render('showRooms','application', $data);
        }

        public function newroom()
        {
            $user = new UserModel();
            $result = $user->getUsersNotManager($_SESSION['username'], '');
            $type = $_SESSION['acctype'].'dashboard';
            $menu = $type();
            $data = array(
                'title' => 'New Room',
                'user' => $result['message'],
                'menu' => $menu
            );
            
            $this->render('newroom','application', $data);
        }


        public function changeroom()
        {
            
            $type = $_SESSION['acctype'].'dashboard';
            $menu = $type();
            $data = array(
                'title' => 'Rooms',
                'menu' => $menu);
            $this->render('changeroom','application', $data);
        }

        public function roominfo()
        {           
            $room = new RoomModel();
            $result = $room->getRoomById($_POST['id']);
            $users = (new UserModel())->getUserByRoom($result['message']['name']);
            $type = $_SESSION['acctype'].'dashboard';
            $numbtask = (((new TaskModel())->getTasks($result['message']['id']))['message'])->num_rows;
            $menu = $type();
            $data = array(
                'title' => 'Room Info',
                'info' => $result['message'],
                'menu' => $menu,
                'users' => $users['message'],
                'numbTasks' => $numbtask,
            );
            
            $this->render('roominfo','application', $data);
        }
    }

?>