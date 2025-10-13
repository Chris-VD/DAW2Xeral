<?php declare (strict_types = 1);
    require_once "./Operations.php";
    $dni = $_COOKIE["dni"];
    $oper = new Operations();
    $oper->openConnection();
    $student = $oper->getStudent($dni);
    $name = $student->getName();
    $surname = $student->getSurname();
    $age = $student->getAge();
    $id = $student->getId();
    $oper->closeconnection();
    if(isset($_POST["yes"])) header("Location: modifyFinal.php");
    else if(isset($_POST["no"])) header("Location: studentManager.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <h1>Student result</h1>
    <h2><?echo $name." ".$surname;?></h2>
    <p><?echo "ID: ".$id?></p>
    <p><?echo "Age: ".$age?></p>
    <p><?echo "DNI: ".$dni?></p>
    <form action="" method="POST">
        <label>Would you like to modify this student?</label><br>
        <input type="submit" name="yes" value="Yes">
        <input type="submit" name="no" value="No">
    </form>
</body>
</html>