<?php declare (strict_types = 1)?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formSale</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <?php
        $main = [
            "cocacola" => ["text" => "Coca Cola", "precio" => 2.1],
            "pepsicola" => ["text" => "Pepsi Cola", "precio"=>2],
            "fantanaranja" => ["text" => "Fanta Naranja", "precio"=>2.5],
            "trinamanzana" => ["text" => "Trina Manzana", "precio"=>2.3]
        ];

        function test_input($data){
            $data = htmlspecialchars(stripslashes(trim($data)));
            if (!is_numeric($data)) {$data = 0;}
            return $data;
        }

        $cantidade = "";
        $cantidadeErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["cantidade"])) {$cantidadeErr = " Required";}
            $cantidade = test_input($_POST["cantidade"]);
            echo "<p>You have asked for ".$cantidade." bottle(s) of ".$main[$_POST["opcion"]]["text"].
                ". Price to pay: ".($cantidade*$main[$_POST["opcion"]]["precio"])."€</p>";
        }
    ?>

    <form action="<?echo htmlspecialchars(($_SERVER["PHP_SELF"]))?>" method="POST">
        <?php
            echo "<select name=\"opcion\">";
            foreach ($main as $key => $value) {
                echo "<option value=\"". $key ."\">". $value["text"] ." (".$value["precio"]."€)</option>";
            }
            echo "</select>";
        ?>
        <label for="idCantidade">Cantidade: </label>
        <input type="text" id="idCantidade" name="cantidade" value="<?php echo $_POST["cantidade"]?>" required>
        <span class="error">*<?php echo $cantidadeErr;?><br></span>
        <input type="submit" value="Send">
    </form>
</body>
</html>