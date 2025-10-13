<?php declare (strict_types = 1);
    require_once "./Operations.php";
    function test_input($data){
        $data = htmlspecialchars(stripslashes(trim($data)));
        return $data;
    }
    if(isset($_POST["send"])){  
        $next;
        $dni = test_input($_POST["dni"]);
        try {
            $oper = new Operations();
            $oper->openConnection();
            $student = $oper->getStudent($dni);
            $next = $student->getDni()!="";
            setcookie("dni",$dni, time() + 86400,"/");
        } catch (PDOException $e) {
            echo "Database connection failed: " . $e->getMessage();
            $next = false;
        } finally {
            $oper->closeconnection();
        }
        if ($next) header("Location: modifyFinal.php");
        else header("Location: failure.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
    <h1>Search Student</h1>
    <form action="" method="POST">
        <label for="dni">DNI: </label>
        <input type="text" name="dni" id="dni"><br>
        <input type="submit" name="send" value="Modify">
    </form>
    <a href="./studentManager.php">Back to the student manager...</a>
</body>
</html>