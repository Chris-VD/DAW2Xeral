<?php declare (strict_types = 1);
    class Alien{
        //
        private $name;
        public static $numberOfAliens = 0;

        // Constructor
        public function __construct($nome = ""){
            $this->setName($nome);
            self::$numberOfAliens += 1; // feaaaaaaa
        }

        // Getter & Setters 
        public function getName(){
            return $this->name;
        }
        public function setName($name){
            $this->name = $name;
        }

        // Methods
        public static function getNumberOfAliens(){
            return self::$numberOfAliens; // sintaxis fea carallo
        }
    }
?>