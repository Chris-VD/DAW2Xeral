<?php require_once "./MyGuests.php";
    class Operations{
        private $conn;
        public function openConnection(){
            $conn = include "./MySQLConnect.php";
        }
        public function closeconnection(){
            $this->conn = null;
        }
    }
?>