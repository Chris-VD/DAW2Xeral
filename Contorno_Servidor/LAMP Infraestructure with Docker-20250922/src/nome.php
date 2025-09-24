<?php declare (strict_types = 1) ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nome</title>
</head>
<body>
    <?php
        function nome(string $nome, int $idade, string $apelido = "Apelido"):void {
            echo "<b>".$nome." ".$apelido." is ".$idade." years old</b>";
        }
        nome("Erm", 10);
    ?>
</body>
</html>