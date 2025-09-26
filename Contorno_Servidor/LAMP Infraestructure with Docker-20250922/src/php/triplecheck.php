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
        } else{ echo "<br>False!<br>";}

        function countries(array $countries):void {
            foreach($countries as $country => $capital){
                echo "<p>The capital of ".$country." is ".$capital."</p>";
            }
        }

        $ceu = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen",
        "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin",
        "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid",
        "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague",
        "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw") ;

        countries($ceu);
    ?>
</body>
</html>