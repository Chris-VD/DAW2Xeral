<?php declare (strict_types = 1)?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>triples</title>
</head>
<body>
    <?php
        function triplesCheck(array $triples) : bool {
            $rep = 1;
            for ($i = 0; $i < count($triples)-1; $i++) {
                $nt = $triples[($i + 1)];
                $curr = $triples[$i];
                if ($curr == $nt){
                    //echo $i. " - " .$nt."<br>";
                    $rep++;
                } else $rep = 1;
                if ($rep == 3) return true;
            }
            return false;
        }
        $arr = [1,1,2,2,2,1,];
        echo var_dump($arr);
        if (triplesCheck($arr)){
            echo "<br>True!<br>";
        } else{ echo "False!";}
    ?>
</body>
</html>