<?php declare (Strict_Types = 1);
    require_once "./Operations.php";
    $oper = new Operations();
    $oper->openConnection();
    $students = $oper->studentList();
    $oper->closeConnection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students</title>
</head>
<body>
    <?      
        foreach ($students as $student) 
            echo "<p>Student ID: ".$student->getId()."<br>Name: ".$student->getName()."<br>DNI: ".$student->getDni()."</p>";        
    ?>
    <a href="./studentManager.php">Back to the student manager...</a>
</body>
</html>