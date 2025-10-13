<?php declare (strict_types = 1);
    require_once "./Operations.php";
    if(isset($_POST["yes"])){  
        $next = false;
        $dni = $_COOKIE["dni"];
        try {
            $oper = new Operations();
            $oper->openConnection();
            $next = $oper->deleteStudent($dni);
        } catch (PDOException $e) {
            echo "Database connection failed: " . $e->getMessage();
            $next = false;
        } finally {
            $oper->closeconnection();
        }
        if ($next) header("Location: success.html");
        else header("Location: failure.html");
    } else if(isset($_POST["no"])) header("Location: studentManager.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>
</head>
<body>
    <form action="" method="POST">
        <label>Are you sure you want to delete student <?echo $_COOKIE["dni"]?>? </label><br>
        <input type="submit" name="yes" value="Yes">
        <input type="submit" name="no" value="No">
    </form>
</body>
</html>