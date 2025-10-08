<?php declare (strict_types = 1);
    if (isset($_POST['add'])) header("Location: add.php");
    else if (isset($_POST["delete"])) header("Location: delete.php");
    else if (isset($_POST["search"])) header("Location: search.php");
    else if (isset($_POST["modify"])) header("Location: modify.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student manager</title>
</head>
<body>
    <h1>Student manager</h1>
    <form method="POST" action=''>
        <input type="submit" name="add"  value="Add">
        <input type="submit" name="delete"  value="Delete">
        <input type="submit" name="search"  value="Search">
        <input type="submit" name="modify"  value="Modify">
    </form>
</body>
</html>