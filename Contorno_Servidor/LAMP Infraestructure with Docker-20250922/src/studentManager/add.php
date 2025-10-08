<?php declare (strict_types = 1);
    require_once "./Operations.php";
    if(isset($_POST["send"])){  
        $next;
        $student = new Student();
        $student->setDni($_POST["dni"]);
        $student->setName($_POST["name"]);
        $student->setSurname($_POST["surname"]);
        $student->setAge($_POST["age"]);
        try {
            $oper = new Operations();
            $oper->openConnection();
            $next = $oper->addStudent($student);
        } catch (PDOException $e) {
            echo "Database connection failed: " . $e->getMessage();
            $next = false;
        } finally {
            $oper->closeconnection();
        }
        if ($next) header("Location: success.html");
        else header("Location: failure.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>
<body>
    <form action="" method="POST">
        <label for="dni">DNI: </label>
        <input type="text" name="dni" id="dni"><br>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name"><br>
        <label for="surname">Surname: </label>
        <input type="text" name="surname" id="surname"><br>
        <label for="age">Age: </label>
        <input type="text" name="age" id="age"><br>
        <input type="submit" name="send" value="Add">
    </form>
</body>
</html>