<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Power</title>
</head>
<body>
    <?php declare(strict_types=1);
        function pow(int $num1, int $num2 = 2){
            return pow($num1, $num2);
        }
        
        $n1 = 2;
        $n2 = 2;
        echo "<p>$n1 to the $n2 is ".pow($n1, $n2)."</p>";
    ?>
</body>
</html>