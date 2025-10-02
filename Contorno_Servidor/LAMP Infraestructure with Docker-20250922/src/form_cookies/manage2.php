<?php
    declare (strict_types = 1);
    session_start();
	if(!isset($_SESSION['name'])){	
		header("Location: formulario.php");
	}	
    function test_input($data){
        $data = htmlspecialchars(stripslashes(trim($data)));
        return $data;
    }
    $subjectArr = array("Java Programming", "Web Design", "Dockers administration", "Django framework", "Mango database");
    $name = $_SESSION["name"];
    $subject = $subjectArr[$_SESSION["subject"]];
    $nameErr = $typeErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_SESSION["name"])) $nameErr = " * Required";
        $name = test_input($_SESSION["name"]);
        if(!empty($_SESSION["subject"])) $subject = test_input($_SESSION["subject"]);
        if(empty($_SESSION["name"])) $typeErr = " * Required";
        $_SESSION["type"] = $_POST["type"];
        header("Location: manage.php");
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage 2</title>
</head>
<body>
    <h1>First practice using forms</h1>
    <?//echo htmlspecialchars(($_SERVER["PHP_SELF"]))?>
    <form action="<?echo htmlspecialchars(($_SERVER["PHP_SELF"]))?>" method="POST">
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
            <span class="error"><?echo $typeErr?></span><br>
        <input type="submit" value="Send">
    </form>
</body>
</html>