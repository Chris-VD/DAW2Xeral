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
        $x = 6;
        $total = 1;
        for ($i = $x; $i > 0; $i--) {
            $total = $total * $i;
        }
        echo "O factorial de $x é $total\n";
    ?>
    </p>
</body>
</html>