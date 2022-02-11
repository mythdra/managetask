<?php
    class UserModel extends Database{
        
        public static $db;
        public function __construct()
        {
            self::$db = self::open();
        }

        public static function login($username, $password)
        {
            $sql = "SELECT * FROM `account` WHERE username=?";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("s", $username);
            
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            }
            $result = $stm->get_result();
            $item = $result->fetch_assoc();

            if (empty($item) || !password_verify($password, $item['password'])){
                return array('code' => 1, 'message' => 'Tai khoan hoac mat khau ban nhap khong chinh xac');
            } else{
                return array('code' => 0, 'message' => $item['type'], 'username' => $item['username'], 'password' => $password);
            }
            
        }

        public static function changePass($username, $password)
        {
            $sql = "UPDATE `account` SET `password`=? WHERE `username`=?";
            $stm = self::$db->prepare($sql);
            $hash = password_hash($password, PASSWORD_BCRYPT); 
            $stm->bind_param("ss", $hash, $username);
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            } else{
                return array('code' => 0, 'message' => 'update success');
            }
        }

        public static function getUserByName($name){
            $sql = "SELECT * FROM `account` WHERE `username`=?";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("s", $name);
            
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            }
            $result = $stm->get_result();
            $item = $result->fetch_assoc();
            return array('code' => 0, 'message' => $item);
        }

        public static function getUserById($id){
            $sql = "SELECT * FROM `account` WHERE `id`=?";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("i", $id);
            
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            }
            $result = $stm->get_result();
            $item = $result->fetch_assoc();
            return array('code' => 0, 'message' => $item);
        }

        public static function getUsers($username){
            $sql = "SELECT * FROM `account` WHERE `username`<>?";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("s", $username);
            
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            }
            $result = $stm->get_result();
            return array('code' => 0, 'message' => $result);
        }

        public function resetpass($username)
        {
            $sql = "UPDATE `account` SET `password`=? WHERE `username`=?";
            $stm = self::$db->prepare($sql);
            $hash = password_hash($username, PASSWORD_BCRYPT); 
            $stm->bind_param("ss", $hash, $username);
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            } else{
                return array('code' => 0, 'message' => 'update success');
            }
        }

        public function newaccount($data)
        {
            $data['type'] = 'nv';
            $sql = "INSERT INTO `account`(`username`, `password`, `type`, `name`, `room`, `gender`, `birthday`) VALUES (?,?,?,?,?,?,?)";
            $stm = self::$db->prepare($sql);
            $hash = password_hash($data['username'], PASSWORD_BCRYPT);
            $stm->bind_param("sssssss", $data['username'], $hash, $data['type'], $data['name'], $data['room'], $data['gender'], $data['birthday']);
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            } else{
                return array('code' => 0, 'message' => 'Thêm thành công');
            }
        }

        public function removeaccount($username, $id)
        {
            $sql = "DELETE FROM `account` WHERE `username` = ?";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("s", $username);
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            } else{
                $room = new RoomModel();
                $room->updateManager(-1, $id);
                return array('code' => 0, 'message' => 'Xóa thành công');
            }
        }

        public static function getUsersNotManager($username, $room){
            $sql = "SELECT * FROM `account` WHERE (`username`<> ? AND `type` <> 'qly' AND `room`=?)";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("ss", $username, $room);
            
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            }
            $result = $stm->get_result();
            return array('code' => 0, 'message' => $result);
        }

        public function updateType($id, $type)
        {
            $sql = "UPDATE `account` SET `type`=? WHERE `id`=?";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("si", $type, $id);
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            } else{
                return array('code' => 0, 'message' => 'update success');
            }
        }

        public function updateRoom($roomO, $roomN)
        {
            $sql = "UPDATE `account` SET `room`=? WHERE `room`=?";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("ss", $roomN, $roomO);
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            } else{
                return array('code' => 0, 'message' => 'update success');
            }
        }

        public static function getUserByRoom($room){
            $sql = "SELECT * FROM `account` WHERE (`room`=? AND `type` <> 'qly')";
            $stm = self::$db->prepare($sql);
            $stm->bind_param("s", $room);
            
            if(!$stm->execute()){
                return array('code' => 1, 'message' => self::$db->error);
            }
            $result = $stm->get_result();
            return array('code' => 0, 'message' => $result);
        }
    }
?>