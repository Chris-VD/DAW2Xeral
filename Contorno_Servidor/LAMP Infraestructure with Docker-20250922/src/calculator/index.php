<?php declare (strict_types = 1);
    include "calcClass.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <?
        $firstCalcule = new Calculator();
        $firstCalcule->setN1(4);
        $firstCalcule->setN2(6);
        echo $firstCalcule->getN1()."<br>";
        echo $firstCalcule->getN2()."<br>";

        $secondCalcule = new Calculator(2, 3);
        echo $secondCalcule->toString()."<br>";
        echo $secondCalcule->suma()."<br>";
        echo $secondCalcule->multi()."<br>";
    ?>
</body>
</html>