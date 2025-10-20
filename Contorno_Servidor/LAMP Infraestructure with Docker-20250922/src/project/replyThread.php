<?php declare(strict_types= 1);
    require_once "./Operations.php";
    session_start();
    function test_input($data){
        $data = htmlspecialchars(stripslashes(trim($data)));
        return $data;
    }
    $next = true;
    $errorS = "" ;
    $pic = $subject = "";
    $user = "Anonymous";
    if(isset($_POST["reply"])){
        try {
            include "./upload.php";
            $subject = $_POST["subject"];
            if(empty($subject)) {
                $errorS = " * Required";
                $next = false;
            } else $subject = test_input($_POST["subject"]);

            $user = $_POST["user"];
            if(empty($user)) $user = "Anonymous";
            else $user = test_input($_POST["user"]);

            $pic = $_FILES["fileToUpload"]["name"];
            if(empty($pic)) $pic = "";
            else $pic = test_input($_FILES["fileToUpload"]["name"]);

            if (!$next) throw new Exception();

            $reply = new Reply();
            $reply->construct($_SESSION["thread"], $subject, $pic, $user);
            $oper = new Operations();
            $oper->openConnection();
            $next = $oper->createPost($reply);
        } catch (\Throwable $th) {
            
        }
        if ($next) header("Location: thread.php?id=".$_SESSION["thread"]."");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply to Thread</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <nav>
        <a href="thread.php?id=<?echo $_SESSION["thread"]?>">Back to thread...</a>
    </nav>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="Subject">Subject:</label>
        <input type="text" name="subject" id="subject" value="<?echo $subject?>">
        <span class="error"><?php echo $errorS?></span><br>
        <label for="user">User:</label>
        <input type="text" name="user" id="user" value="<?echo $user?>"><br>
        <label for="fileToUpload">Select image to upload (Max size 2MB):</label>
        <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
        <input type="submit" name="reply" value="Reply">
    </form>
</body>
</html>