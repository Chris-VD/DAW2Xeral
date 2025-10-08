<?php declare (strict_types=1);
    require_once "./Operations.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>example</title>
</head>
<body>
    <h1>Database</h1>
    <?
        try {
            $oper = new Operations();
            $oper->openConnection();
            echo "Database connection successful!<br>";
            // echo $oper->getMyGuest(1); // Solo se se empregou fetch() en vez de fetchObject()
            echo $oper->getMyGuest(1)->toString();
        } catch (PDOException $e) {
            // Handle connection errors
            echo "Database connection failed: " . $e->getMessage();
        } finally {
            $oper->closeconnection();
        }
    ?>
</body>
</html>