<?php declare (strict_types = 1) ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>
<body>
    <?php
        // Index array
        $nums = array(1,2,3,4,5,6,7,8,9,10);
        $nums1 = [1,2,3,4,5,6,7,8,9,10];
        echo "<p>table 2</p><ol>";
        foreach ($nums as $num) {
            echo "<li>" . $num * 2 . "</li>";
        }
        echo "</ol><p>table 3</p><ol>";
        foreach ($nums1 as $num) {
            echo "<li>" . $num * 3 . "</li>";
        }
        echo "</ol>";

        // Associative array (dict)
        $dict = ["erm" => 1, "lol" => 2, "lmao" => 3];
        foreach ($dict as $key => $value) {
            echo "nome: ". $key ." - valor:". $value ."<br>";
        }

        // Mutidimentsional array (nodes)
        $node = [
            ["1", "erm", "ñ"],
            ["2", "lol", "ç"],
            ["3", "lmao", "ó"]
        ];
        foreach ($node as $line) {
            echo "<br>";
            foreach ($line as $value) {
                echo "". $value ." ";
            }
        }
        /**
         * [] list
         * [ => ] dict
         * combinations infinite
         */
    ?>
</body>
</html>