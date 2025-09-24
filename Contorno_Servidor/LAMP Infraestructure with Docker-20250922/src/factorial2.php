<?php declare (strict_types= 1);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Try</title>
</head>
<body>
    <p>
    <?php
        function factorial(int $x): float|int {
            if ($x < 0) throw new Exception("O número non pode ser menor que 0");
            $total = 1;
            for ($i = $x; $i > 0; $i--) {
                $total = $total * $i;
            }
            return $total;
        }
        $x = 4;
        $total = factorial($x);
        echo "O factorial de $x é $total\n";
    ?>
    </p>
</body>
</html>