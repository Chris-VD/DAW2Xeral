<?php declare(strict_types= 1);
    require_once "./Operations.php";
    if(isset($_POST["thread"])){
        include "./upload.php";
        $thread = new Thread($_POST["title"], $_FILES["fileToUpload"]["name"], $_POST["subject"], $_POST["user"]);
        $oper = new Operations();
        $oper->openConnection();
        $next = $oper->createThread($thread);
        if ($next) header("Location: success.html");
        else header("Location: failure.html");
    } else if (isset($_POST["reply"])){
        try {
            if (!include "./upload.php") $pic = "";
            else $pic = $_FILES["fileToUpload"]["name"];
        } catch (Exception $e){}
        $reply = new Reply();
        $reply->construct((int)$_POST["threadId"], $_POST["title"], $pic, $_POST["subject"], $_POST["user"]);
        $oper = new Operations();
        $oper->openConnection();
        $next = $oper->createPost($reply);
        if ($next) header("Location: success.html");
        else header("Location: failure.html");
    } else if (isset($_POST["delete"])){
        $oper = new Operations();
        $oper->openConnection();
        $next = $oper->deleteThread((int)$_POST["threadId"]);
        if ($next) header("Location: success.html");
        else header("Location: failure.html");
    } else if (isset($_POST["deleteP"])){
        $oper = new Operations();
        $oper->openConnection();
        $next = $oper->deletePost((int)$_POST["threadId"]);
        if ($next) header("Location: success.html");
        else header("Location: failure.html");
    } else if (isset($_POST["AllThreads"])){
        $oper = new Operations();
        $oper->openConnection();
        $allThreads = $oper->getAllThreads();
        echo implode("<br>", $allThreads);
    } else if (isset($_POST["AllPosts"])){
        $oper = new Operations();
        $oper->openConnection();
        $allThreads = $oper->getAllReplies((int)$_POST["threadIDAll"]);
        echo implode("<br>", $allThreads);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data"> <?// * encrtype for image upload?>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title"><br>
        <label for="Subject">Subject:</label>
        <input type="text" name="subject" id="subject"><br>
        <label for="user">User:</label>
        <input type="text" name="user" id="user"><br>
        <label for="threadID">Thread ID:</label>
        <input type="text" name="threadId" id="threadId"><br>
        <input type="submit" name="reply" value="Reply">
        <input type="submit" name="thread" value="Thread">
        <input type="submit" name="delete" value="DeleteID">
        <input type="submit" name="deleteP" value="DeleteIDP"><br>
        <label for="threadIDAll">ThreadID:</label>
        <input type="text" name="threadIDAll" id="threadIDAll"><br>
        <input type="submit" name="AllThreads" value="All Threads">
        <input type="submit" name="AllPosts" value="All Posts in Thread"><br>
        <label for="fileToUpload">Select image to upload (Max size 2MB):</label><br>
        <input type="file" name="fileToUpload" id="fileToUpload">
    </form>
</body>
</html>