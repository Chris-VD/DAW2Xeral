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
        $user = $pssw = $city = $webs = $role = $mail = $payroll = $selfS = "";
        $errorPssw = $errorUser = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["user"])) {$errorUser = " Required";}
            if (empty($_POST["pssw"])) {$errorPssw = " Required";}
            $user = test_input($user);
            $pssw = test_input($pssw);
            $city = test_input($city);
            $webs = test_input($webs);
            $role = test_input($role);
            $mail = test_input($mail);
            $payroll = test_input($payroll);
            $selfS = test_input($selfS);
        }
    ?>

    <h2>Novell services login</h2>

    <form action="<?echo htmlspecialchars(($_SERVER["PHP_SELF"]))?>" method="POST">
        <label for="idUser">Username: </label>
        <input type="text" id="idUser" name="user" value="<?$user?>">
        <span class="error"><?php echo $errorUser?></span><br>
        <label for="idPssw">Password: </label>
        <input type="text" id="idPssw" name="pssw" value="<?$pssw?>">
        <span class="error"><?php echo $errorPssw?></span><br>
        <label for="idCity">City: </label>
        <input type="text" id="idCity" name="city" value="<?$city?>"><br>
        <label for="idWebServ">Web Service: </label>
        <select name="webS" id="idWebServ">
            <option value="apache">Apache</option>
            <option value="nginx">Nginx</option>
            <option value="tomcat">Tomcat</option>
        </select><br>
        <label>Role: </label><br>
            <input type="radio" name="role" <?php if (isset($role) && $role=="admin") echo "checked";?> value="admin">Admin<br>
            <input type="radio" name="role" <?php if (isset($role) && $role=="engineer") echo "checked";?> value="engineer">Engineer<br>
            <input type="radio" name="role" <?php if (isset($role) && $role=="manager") echo "checked";?> value="manager">Manager<br>
            <input type="radio" name="role" <?php if (isset($role) && $role=="guest") echo "checked";?> value="guest">Guest<br><br>
        <label>Single Sing-on to the following: </label><br>
            <input type="checkbox" id="mail" value="mail">Mail<br>
            <input type="checkbox" id="payroll" value="payroll">Payroll<br>
            <input type="checkbox" id="selfS" value="selfS">Self-service<br><br>
        <input type="submit" value="Send">
    </form>
</body>
</html>