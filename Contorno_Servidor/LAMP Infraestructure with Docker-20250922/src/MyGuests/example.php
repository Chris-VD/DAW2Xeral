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
            echo "Database connection successful!";
        } catch (PDOException $e) {
            // Handle connection errors
            echo "Database connection failed: " . $e->getMessage();
        } finally {
            $oper->closeconnection();
        }
    ?>
</body>
</html>