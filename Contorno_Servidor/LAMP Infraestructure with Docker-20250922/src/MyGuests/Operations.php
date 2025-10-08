<?php require_once "./MyGuests.php";
    class Operations{
        private $conn;
        public function openConnection(){
            $this->conn = include "./MySQLConnect.php";
        }
        public function closeconnection(){
            $this->conn = null;
        }
        public function getMyGuest($id){
            $sqlString = "select firstname from MyGuests where id=?"; // A string de SQL con ? no sitio das variables
            $querry = $this->conn->prepare($sqlString); // Crea unha clase PDOStatement (querry) que ten como comando o sqlString
            $querry->execute([$id]); // Colle os argumentos do array e inclúdeos no SQLString, sustituindo os ?
            $myGuest = $querry->fetchObject("MyGuests"); // Executa a querry e garda o resultado nunha clase de tipo "MyGuests", devolve esa clase
            // $arrayGuest = $querry->fetch(); // Executa a querry e devolve toda a información en forma de diccionario que ten como chaves os atributos da tabla
            // return $arrayGuest["firstname"];
            return $myGuest;
        }   
    }
?>