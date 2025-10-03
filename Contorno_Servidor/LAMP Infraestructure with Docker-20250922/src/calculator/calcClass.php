<? declare (strict_types = 1);

    class Calculator{
        //
        private int $n1;
        private int $n2;

        // Constructor
        public function __construct($n1 = 0, $n2 = 0){
            $this->setN1($n1);
            $this->setN2($n2);
        }

        // Getters & Setters
        public function setN1(int $n1){
            $this->n1 = $n1;
        }
        public function setN2(int $n2){
            $this->n2 = $n2;
        }
        public function getN1(){
            return $this->n1;
        }
        public function getN2(){
            return $this->n2;
        }
        public function toString(){
            return "n1 = ".$this->n1."<br>n2 = ".$this->n2;
        }

        // Methods
        public function suma(){
            return $this->n1+$this->n2;
        }
        public function resta(){
            return $this->n1-$this->n2;
        }
        public function multi(){
            return $this->n1*$this->n2;
        }
        public function divi(){
            return $this->n1/$this->n2;
        }
    }
?>