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
    function test_input($data){
        $data = htmlspecialchars(stripslashes(trim($data)));
        return $data;
    }
    if(isset($_POST["send"])){  
        $next = false;
        $student = new Student();
        $student->setDni(test_input($_POST["dni"]));
        $student->setName(test_input($_POST["name"]));
        $student->setSurname(test_input($_POST["surname"]));
        $student->setAge(test_input($_POST["age"]));
        $student->setId(test_input($_POST["id"]));
        if (!($student->isValid())) header("Location: failure.html");
        else {
            try {
                $oper = new Operations();
                $oper->openConnection();
                $next = $oper->modifyStudent($student);
            } catch (PDOException $e) {
                echo "Database connection failed: " . $e->getMessage();
                $next = false;
            } finally {
                $oper->closeconnection();
            }
            if ($next) header("Location: success.html");
            else header("Location: failure.html");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify</title>
</head>
<body>
    <h1>Modify Student</h1>
    <form action="" method="POST">
        <label for="dni">DNI: </label>
        <input type="text" name="dni" id="dni" value="<?echo $dni?>"><br>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" value="<?echo $name?>"><br>
        <label for="surname">Surname: </label>
        <input type="text" name="surname" id="surname" value="<?echo $surname?>"><br>
        <label for="age">Age: </label>
        <input type="text" name="age" id="age" value="<?echo $age?>"><br>
        <label for="age">ID: </label>
        <input type="text" name="id" id="id" value="<?echo $id?>"><br>
        <input type="submit" name="send" value="Modify">
    </form>
    <a href="./studentManager.php">Back to the student manager...</a>
</body>
</html>