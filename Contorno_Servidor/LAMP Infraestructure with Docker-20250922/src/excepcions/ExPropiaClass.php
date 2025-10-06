<?php require "./ExPropia.php";
    class ExPropiaClass{
        public static function testNumber(int $num) {
            if ($num == 0) throw new Exception("O número é 0");
            else return $num;
        }
    }
?>