<?php declare (strict_types = 1);
    require_once "./Operations.php";
    if(isset($_POST["send"])){  
        $next;
        $dni = $_POST["dni"];
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
        if ($next) header("Location: confirm.php");
        else header("Location: failure.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <h1>Delete Student</h1>
    <form action="" method="POST">
        <label for="dni">DNI: </label>
        <input type="text" name="dni" id="dni"><br>
        <input type="submit" name="send" value="Add">
    </form>
</body>
</html>