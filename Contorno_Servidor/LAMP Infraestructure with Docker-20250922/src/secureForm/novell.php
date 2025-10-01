<?php declare (strict_types = 1)?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>novell</title>
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
        $user = $pssw = $city = $webS = $role = $mail = $payroll = $selfS = "";
        $errorPssw = $errorUser = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["user"])) $errorUser = " * Required";
            if (empty($_POST["pssw"])) $errorPssw = " * Required";
            $user = test_input($_POST["user"]);
            $pssw = test_input($_POST["pssw"]);
            if (!empty($_POST["city"])) $city = test_input($_POST["city"]);
            if (!empty($_POST["webS"])) $webS = test_input($_POST["webS"]);
            if (!empty($_POST["role"])) $role = test_input($_POST["role"]);
            if (!empty($_POST["mail"])) $mail = "mail";
            if (!empty($_POST["payroll"])) $payroll = "payroll";
            if (!empty($_POST["selfS"])) $selfS = "selfS";
        }
    ?>

    <h2>Novell services login</h2>

    <form action="<?echo htmlspecialchars(($_SERVER["PHP_SELF"]))?>" method="POST">
        <label for="idUser">Username: </label>
        <input type="text" id="idUser" name="user" value="<?echo $user?>">
        <span class="error"><?php echo $errorUser?></span><br>
        <label for="idPssw">Password: </label>
        <input type="password" id="idPssw" name="pssw" value="<?echo $pssw?>">
        <span class="error"><?php echo $errorPssw?></span><br>
        <label for="idCity">City: </label>
        <input type="text" id="idCity" name="city" value="<?echo $city?>"><br>
        <label for="idWebServ">Web Service: </label>
        <select name="webS" id="idWebServ">
            <option <?php if (isset($webS) && $webS=="apache") echo "selected";?> value="apache">Apache</option>
            <option <?php if (isset($webS) && $webS=="nginx") echo "selected";?> value="nginx">Nginx</option>
            <option <?php if (isset($webS) && $webS=="tomcat") echo "selected";?> value="tomcat">Tomcat</option>
        </select><br>
        <label>Role: </label><br>
            <input type="radio" name="role" <?php if (isset($role) && $role=="admin") echo "checked";?> value="admin">Admin<br>
            <input type="radio" name="role" <?php if (isset($role) && $role=="engineer") echo "checked";?> value="engineer">Engineer<br>
            <input type="radio" name="role" <?php if (isset($role) && $role=="manager") echo "checked";?> value="manager">Manager<br>
            <input type="radio" name="role" <?php if (isset($role) && $role=="guest") echo "checked";?> value="guest">Guest<br><br>
        <label>Single Sing-on to the following: </label><br>
            <input type="checkbox" name="mail" <?php if (isset($mail) && $mail == "mail") echo "checked";?> value="mail">Mail<br>
            <input type="checkbox" name="payroll" <?php if (isset($payroll) && $payroll == "payroll") echo "checked";?> value="payroll">Payroll<br>
            <input type="checkbox" name="selfS" <?php if (isset($selfS) && $selfS == "selfS") echo "checked";?> value="selfS">Self-service<br><br>
        <input type="submit" value="Send">
    </form>
</body>
</html>