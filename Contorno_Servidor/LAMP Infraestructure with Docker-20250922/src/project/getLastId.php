<?
    $oper = include "./MySQLConnect.php";
    $sqlT = "select max(id) as max_id from threads";
    $resultT = $oper->prepare($sqlT);
    $resultT->execute();
    $tablaT = $resultT->fetch();
    $max_idT = $tablaT["max_id"];

    $sqlR = "select max(id) as max_id from post";
    $resultR = $oper->prepare($sqlR);
    $resultR->execute();
    $tablaR = $resultR->fetch();
    $max_idR = $tablaR["max_id"];
    if ($max_idR > $max_idT) return $max_idR;
    else return $max_idT;
?>