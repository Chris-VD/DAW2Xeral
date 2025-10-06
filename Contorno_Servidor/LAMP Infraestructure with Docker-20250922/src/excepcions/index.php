<?php declare (strict_types = 1);
    require "./ExPropiaClass.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <?
        try {
            echo ExPropiaClass::testNumber(1)."<br>";
            echo ExPropiaClass::testNumber(5)."<br>";
            echo ExPropiaClass::testNumber(0)."<br>";
        }
        catch(Exception $e){
            echo $e;
        }
    ?>
</body>
</html>