<?php 
    class MyGuests{
        private $id;
        private $firstname;
        private $lastname;
        private $email;
        private $reg_date;

        public function getFirstname(){
            return $this->firstname;
        }
        public function setFirstname($firstname){
            $this->firstname = $firstname;
        }
        public function getLastname(){
            return $this->lastname;
        }
        public function setLastname($lastname){
            $this->lastname = $lastname;
        }
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function getReg_date(){
            return $this->reg_date;
        }
        public function setReg_date($reg_date){
            $this->reg_date = $reg_date;
        }
        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }

        public function toString(){
            return $this->firstname ." ". $this->lastname ." ";
        }
    }
?>