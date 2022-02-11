<?php
    class TaskModel extends Database{
        
        public static $db;
        public function __construct()
        {
            self::$db = self::open();
        }

        public function getTasks($room)
        {
            $sql = "SELECT * FROM `task` WHERE `room`=?";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("s", $room);
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            }
            $result = $stm->get_result();
            return array('code' => 0, 'message' => $result);
        }

        public function newtask($data)
        {
            $sql = "INSERT INTO `task`(`title`, `mota`, `time`, `idnv`, `room`, `status`) VALUES (?,?,?,?,?,?)";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("sssiss", $data['title'], $data['mota'], $data['time'], $data['idnv'], $data['room'], $data['status']);
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            } else{
                return array('code' => 0, 'message' => 'Thêm thành công');
            }
        }

        public function getTasksByUser($id)
        {
            $sql = "SELECT * FROM `task` WHERE (`idnv`=? AND `status` <> 'Canceled')";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("s", $id);
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            }
            $result = $stm->get_result();
            return array('code' => 0, 'message' => $result);
        }


        public function getTaskById($id)
        {
            $sql = "SELECT * FROM `task` WHERE `id`=?";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("i", $id);
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            }
            $result = $stm->get_result();
            $item = $result->fetch_assoc();
            return array('code' => 0, 'message' => $item);
        }


        public function changeTaskStatus($id, $status)
        {
            $sql = "UPDATE `task` SET `status`=? WHERE `id`=?";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("si", $status, $id);
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            } else{
                return array('code' => 0, 'message' => 'update success');
            }
        }

        
    }
?>