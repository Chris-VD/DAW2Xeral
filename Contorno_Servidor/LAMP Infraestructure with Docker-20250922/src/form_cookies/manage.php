<?php
    declare (strict_types = 1);
    session_start();
	if(!isset($_SESSION['name'])){	
		header("Location: formulario.php");
	}	
    $subjectArr = ["Java Programming", "Web Design", "Dockers administration", "Django framework", "Mango database"];
    $types = ["ipc" => "In-Person Classes", "dc" => "Distance Classes"];
    $name = $_SESSION["name"];
    $subject = $subjectArr[$_SESSION["subject"]];
    if(!empty($_SESSION["type"])) $type = $types[$_SESSION["type"]];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage</title>
</head>
<body>
    <h2><?echo $name?> wants to enrrol in <?echo $subject; if (!empty($_SESSION["type"])) echo " and ".$type."."?></h2>
    <p>Ir á <a href="manage2.php">seguinte páxina</a></p>
</body>
</html>