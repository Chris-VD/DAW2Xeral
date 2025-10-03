<?php declare (strict_types = 1); include "alienClass.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aleins</title>
</head>
<body>
    <?php
        function createAliens(){
            for ($i = 0; $i < 5; $i++) {
                new Alien();
            }
            echo Alien::getNumberOfAliens()."<br>"; // sintaxis fea 
            for ($i = 0; $i < 2; $i++) {
                new Alien();
            }
            echo Alien::getNumberOfAliens()."<br>";
        }
        createAliens();
    ?>
</body>
</html>