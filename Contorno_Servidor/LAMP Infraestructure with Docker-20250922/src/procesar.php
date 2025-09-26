<?php declare (strict_types=1)?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>procesar</title>
</head>
<body>
    <h1>main</h1>
    <?php
        echo "<p> Name: ".$_POST["vName"]."</p>";
        echo "<p> Mail: ".$_POST["vmail"]."</p>";
    ?>
    <h3><a href=
    "next.php?vName=<?php echo $_POST["vName"]?>&vmail=<?php echo $_POST["vmail"]?>"
    >Next</a></h3>
    <form action="next.php" method="post">
        <!--Se o type é hidden non aparece na web
            pero temos que engadir outro botón de submit polo que non é optimo facelo así
        -->
        <input type="hidden" name="vName" value="<?php echo $_POST["vName"]?>">
        <input type="hidden" name="vmail" value="<?php echo $_POST["vmail"]?>">
        <input type="submit" value="Send">
    </form>
</body>
</html>