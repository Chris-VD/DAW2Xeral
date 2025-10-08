<?php
    class Student{
        private $id;
        private $dni;
        private $name;
        private $surname;
        private $age;

        public function getId(){
            return $this->id;
        }
        public function setId($id){
            $this->id = $id;
        }
        public function getDni(){
            return $this->dni;
        }
        public function setDni($dni){
            $this->dni = $dni;
        }
        public function getName(){
            return $this->name;
        }
        public function setName($name){
            $this->name = $name;
        }
        public function getSurname(){
            return $this->surname;
        }
        public function setSurname($surname){
            $this->surname = $surname;
        }
        public function getAge(){
            return $this->age;
        }
        public function setAge($age){
            $this->age = $age;
        }
        public function toString(){
            return "ID: ".$this->getId()."<br>DNI: ".$this->getDni()."<br>Name: ".$this->getName()."<br>Surname: ".$this->getSurname()."<br>Age: ".$this->getAge();
        }
    }
?>