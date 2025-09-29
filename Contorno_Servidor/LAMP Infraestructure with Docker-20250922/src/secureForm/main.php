<?php declare (strict_types = 1)?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <?php
        function test_input($data){
            $data = htmlspecialchars(stripslashes(trim($data)));
            return $data;
        }

        $name = $email = "";
        $nameErr = $emailErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["name"])) {$nameErr = " Required";}
            if (empty($_POST["email"])) {$emailErr = " Required";}
            $name = test_input($_POST["name"]);
            $email = test_input($_POST["email"]);
            echo "<p>Name: ".$_POST["name"]."<br>Email: ".$_POST["email"]."</p>";
        }
    ?>
    <h2>Form</h2>
    <form method="post">
        <label for="idName">Name: </label>
        <input type="text" id="idName" name="name">
        <span class="error">*<?php echo $nameErr;?><br></span>
        <label for="idmail">Mail: </label>
        <input type="text" id="idmail" name="email">
        <span class="error">*<?php echo $emailErr;?><br></span>
        <input type="submit" value="Send">
    </form>
</body>
</html>