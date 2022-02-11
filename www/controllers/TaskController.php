<?php
    
    class TaskController extends BaseController{
        function __construct()
        {
            $this->folder = 'pages';

        }
        
        public function showTasks()
        {
            $task = new TaskModel();
            $user = new UserModel();
            $room = $user->getUserByName($_SESSION['username'])['message']['room'];
            $result = $task->getTasks((new RoomModel())->getRoomByName($room)['message']['id']);
            $type = $_SESSION['acctype'].'dashboard';
            $menu = $type();
            $data = array(
                'title' => 'Rooms',
                'result' => $result,
                'room' => $room,
                'menu' => $menu);
            $this->render('showtask','application', $data);
        }

        public function newtask()
        {
            $user = new UserModel();
            $room = $user->getUserByName($_SESSION['username'])['message']['room'];
            $result = $user->getUsersNotManager($_SESSION['username'], $room);
            $type = $_SESSION['acctype'].'dashboard';
            $menu = $type();
            $data = array(
                'title' => 'New Task',
                'user' => $result['message'],
                'menu' => $menu
            );
            
            $this->render('newtask','application', $data);
        }

        public function receiveTask()
        {
            $task = new TaskModel();
            $user = new UserModel();
            $id = $user->getUserByName($_SESSION['username'])['message']['id'];
            $result = $task->getTasksByUser($id);
            $type = $_SESSION['acctype'].'dashboard';
            $menu = $type();
            $data = array(
                'title' => 'Rooms',
                'result' => $result,
                'menu' => $menu);
            $this->render('showrectask','application', $data);
        }

        public function updateTask()
        {
            $task = (new TaskModel())->getTaskById($_POST['id']);
            $type = $_SESSION['acctype'].'dashboard';
            $menu = $type();
            $data = array(
                'title' => 'Rooms',
                'info' => $task['message'],
                'menu' => $menu);
            $this->render('updateTask','application', $data);
        }

        public function starttask()
        {
            $task = (new TaskModel())->getTaskById($_POST['id'])['message'];
            if($task['status'] == "New"){
                (new TaskModel)->changeTaskStatus($_POST['id'], "In progress");
            }
            $this->receiveTask();
        }

        public function taskinfo()
        {
            
        }
    }
?>