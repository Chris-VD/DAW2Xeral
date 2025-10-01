<?php declare (strict_types = 1)?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage 2</title>
</head>
<body>
    <?php
        function test_input($data){
            $data = htmlspecialchars(stripslashes(trim($data)));
            return $data;
        }
        $subjectArr = array("Java Programming", "Web Design", "Dockers administration", "Django framework", "Mango database");
        $name = $_POST["name"];
        $subject = $subjectArr[$_POST["subject"]];
        $nameErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_POST["name"])) $nameErr = " * Required";
            $name = test_input($_POST["name"]);
            if(!empty($_POST["subject"])) $subject = test_input($_POST["subject"]);
        }
    ?>
    <h1>First practice using forms</h1>
    <?//echo htmlspecialchars(($_SERVER["PHP_SELF"]))?>
    <form action="manage.php" method="POST">
        <label for="idname">Name and surnames: </label>
        <input type="text" name="name" id="idname" value="<?echo $name?>">
        <span class="error"><?echo $nameErr?></span><br>
        <label for="idsubject">Subject to enroll: </label>
        <select name="subject" id="idsubject">
            <?php
                foreach ($subjectArr as $key => $value) {
                    echo "<option "; if (isset($subject) && $subject==$key) echo "selected "; echo "value=\"". $key ."\">". $value ."</option>";
                }
            ?>
        </select><br>
        <label >Type of clases: </label><br>
            <input type="radio" name="type" value="ipc">In-Person Classes<br>
            <input type="radio" name="type" value="dc">Distance Classes<br>
        <input type="submit" value="Send">
    </form>
</body>
</html>