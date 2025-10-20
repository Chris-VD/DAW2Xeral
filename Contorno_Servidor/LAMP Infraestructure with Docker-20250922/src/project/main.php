<?php declare (strict_types= 1);
    require_once "./Operations.php";
    $oper = new Operations();
    $oper->openConnection();
    $threadList = $oper->getAllThreads();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link rel="stylesheet" href="styleMain.css">
</head>
<body>
    <header>
        <h1>Threads</h1>
        <a href="gallery.php">Gallery</a>
    </header>
    <main>
        <a href="createThread.php">Create new Thread</a>
        <?
            foreach ($threadList as $thread){
                echo "<div>
                    <section class=\"image\">
                        <p class=\"imgName\">".$thread->getPicture()."</p>
                        <img src=\"./images/".$thread->getPicture()."\" alt=\"".$thread->getPicture()."\">
                    </section>
                    <section class=\"info\">
                        <h2>".$thread->getTitle()."</h2>
                        <p class=\"user\">Posted by ".$thread->getUser()."</p>
                        <p class=\"subj\">".$thread->getSubject()."</p>
                        <a href=\"thread.php?id=".$thread->getId()."\">See full thread</a>
                    </section>
                </div>";
            }
        ?>
    </main>
</body>
</html>