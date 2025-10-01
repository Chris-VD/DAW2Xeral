<?php declare (strict_types = 1)?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage</title>
</head>
<body>
    <?php
        $subjectArr = ["Java Programming", "Web Design", "Dockers administration", "Django framework", "Mango database"];
        $types = ["ipc" => "In-Person Classes", "dc" => "Distance Classes"];
        $name = $_POST["name"];
        $subject = $subjectArr[$_POST["subject"]];
        if(!empty($_POST["type"])) $type = $types[$_POST["type"]];
    ?>
    <h2><?echo $name?> wants to enrrol in <?echo $subject; if (!empty($type)) echo " and ".$type."."?></h2>
    <form action="manage2.php" method="POST">
        <input type="hidden" name="name" value="<?echo $name?>">
        <input type="hidden" name="subject" value="<?echo $_POST["subject"]?>">
        <?if (empty($type)) echo "<input type=\"submit\" value=\"Send\">"?>
    </form>
</body>
</html>