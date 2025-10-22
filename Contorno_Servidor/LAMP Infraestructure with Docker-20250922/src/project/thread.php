<?php declare(strict_types= 1);
    require_once "./Operations.php";
    $threadId = (int) $_GET["id"];
    $oper = new Operations();
    $oper->openConnection();
    $thread = $oper->getThread($threadId);
    $replies = $oper->getAllReplies($threadId);
    session_start();
    $_SESSION["thread"] = $threadId;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thread</title>
    <link rel="stylesheet" href="styleMain.css">
</head>
<body>
    <header>
        <h1><?echo $thread->getTitle()?></h1>
        <nav>
            <a href="main.php">Back to main page...</a>
        </nav>
    </header>
    <main>
        <a href="replyThread.php">Reply to Thread</a>
        <div class="thread">
            <section class="image">
                <p class="imgName"><?echo $thread->getPicture()?></p>
                <a href="./images/<?echo $thread->getPicture()?>"><img src="./images/<?echo $thread->getPicture()?>" alt="<?echo $thread->getPicture()?>"></a>
            </section>
            <section class="info">
                <p class="user"><span class="id">>><?echo $thread->getId()?></span> - Posted by <?echo $thread->getUser()?></p>
                <p class="subj"><?echo $thread->getSubject()?></p>
            </section>
        </div>
        <?
            foreach ($replies as $reply){
                echo "<div class=\"reply\">";
                if (!empty($reply->getPicture())) echo 
                    "<section class=\"imageR\">
                        <p class=\"imgName\">".$reply->getPicture()."</p>
                        <a href=\"./images/".$reply->getPicture()."\" ><img src=\"./images/".$reply->getPicture()."\" alt=\"".$reply->getPicture()."\"></a>
                    </section>";
                echo "<section class=\"info\">
                        <p class=\"user\"><span class=\"id\">>>".$reply->getId()."</span> - Posted by ".$reply->getUser()."</p>
                        <p class=\"subj\">".$reply->getSubject()."</p>
                    </section>
                </div>";
            }
        ?>
    </main>
</body>
</html>