<?php
    class RoomModel extends Database{
        
        public static $db;
        public function __construct()
        {
            self::$db = self::open();
        }

        public function getRooms()
        {
            $sql = "SELECT * FROM `room`";
            $result = self::$db->query($sql);
            return $result;
        }

        public function newroom($data)
        {
            $sql = "INSERT INTO `room`(`name`, `mota`, `count`, `manager`) VALUES (?,?,?,?)";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("ssii", $data['name'], $data['mota'], $data['count'], $data['manager']);
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            } else{
                return array('code' => 0, 'message' => 'Thêm thành công');
            }
        }

        public function updateManager($manager, $name)
        {
            $sql = "UPDATE `room` SET `manager`=? WHERE `manager`=?";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("ii", $manager, $name);
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            } else{
                return array('code' => 0, 'message' => 'update success');
            }
        }

        public function getRoomNotManager()
        {
            $sql = "SELECT * FROM `room` WHERE `manager`=-1";
            $result = self::$db->query($sql);
            return $result;
        }

        public function getRoomByName($name)
        {
            $sql = "SELECT * FROM `room` WHERE `name`=?";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("s", $name);
            
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            } 
            $result = $stm->get_result();
            $item = $result->fetch_assoc();
            return array('code' => 0, 'message' => $item);
        }

        public function getRoomById($id)
        {
            $sql = "SELECT * FROM `room` WHERE `id`=?";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("i", $id);
            
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            } 
            $result = $stm->get_result();
            $item = $result->fetch_assoc();
            return array('code' => 0, 'message' => $item);
        }

        public function updateRoom($data)
        {
            $sql = "UPDATE `room` SET `name`=?,`mota`=?,`count`=?,`manager`=? WHERE `id`=?";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("ssiii", $data['name'], $data['mota'], $data['count'], $data['manager'], $data['id']);
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            } else{
                return array('code' => 0, 'message' => 'update success');
            }
        }
    }
?>