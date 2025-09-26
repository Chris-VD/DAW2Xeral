<?php declare (strict_types = 1)?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>26</title>
</head>
<body>
    <?php
        $main = [
            "cocacola" => ["text" => "Coca Cola", "precio" => 2.1],
            "pepsicola" => ["text" => "Pepsi Cola", "precio"=>2],
            "fantanaranja" => ["text" => "Fanta Naranja", "precio"=>2.5],
            "trinamanzana" => ["text" => "Trina Manzana", "precio"=>2.3]
        ];

        echo "<select name=\"opcion\">";
        foreach ($main as $key => $value) {
            echo "<option value=\"". $key ."\">". $value["text"] ." (".$value["precio"]."€)</option>";
        }
        echo "</select>";
    ?>
</body>
</html>