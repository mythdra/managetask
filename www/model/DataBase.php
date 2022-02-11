<?php
    class Database 
    {
        private static $db;
        public function __construct()
        {
        }

        public static function open()
        {
            if (self::$db === NULL){
                self::$db = new mysqli('mysql-server','root','root','product_management');
            }   
            return self::$db;
        }

        public static function close()
        {
            self::$db->close();
        }
    }
    
?>