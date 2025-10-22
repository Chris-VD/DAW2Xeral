<?php declare(strict_types= 1);
    require_once "./Operations.php";
    function test_input($data){
        $data = htmlspecialchars(stripslashes(trim($data)));
        return $data;
    }
    $next = true;
    $errorT = $errorP = "" ;
    $title = $pic = $subject = "";
    $user = "Anonymous";
    if(isset($_POST["thread"])){
        try {
            if ($_FILES["fileToUpload"]["name"] && !include "./upload.php") {
                header("Location: failure.html");
                $next = false;
                exit;
            }
            $subject = $_POST["subject"];
            if(empty($subject)) $subject = "";
            else $subject = test_input($_POST["subject"]);

            $user = $_POST["user"];
            if(empty($user)) $user = "Anonymous";
            else $user = test_input($_POST["user"]);

            $title = test_input($_POST["title"]);
            if(empty($title)) {
                $errorT = " * Required";
                $next = false;
            }
            $pic = test_input($_FILES["fileToUpload"]["name"]);
            if(empty($pic)) {
                $errorP = " * Required";
                $next = false;
            }

            if (!$next) throw new Exception();

            $thread = new Thread($title, $pic, $subject, $user);
            $oper = new Operations();
            $oper->openConnection();
            $next = $oper->createThread($thread);
        } catch (\Throwable $th) {
            
        }
        if ($next) header("Location: thread.php?id=".$thread->getId());
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Thread</title>
    <style>
        .error{
            color: red;
        }
        form{
            display: flex;
            flex-direction: column;
            #submit{
                margin-top: 2vh;
            }
            span{
                float: left;
            }
        }
    </style>
</head>
<body>
    <nav>
        <a href="main.php">Back to main page...</a>
    </nav>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label><span class="error"><?php echo $errorT?></span>
        <input type="text" name="title" id="title" value="<?echo $title?>">
        <label for="subject">Subject:</label>
        <!-- <input type="text" name="subject" id="subject" value="<?echo $subject?>"><br> -->
        <textarea name="subject" id="subject" rows="10" cols="50"></textarea>
        <label for="user">User:</label>
        <input type="text" name="user" id="user" value="<?echo $user?>">
        <label for="fileToUpload">Select image to upload (Max size 2MB):</label>
        <span class="error"><?php echo $errorP?></span>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input id="submit" type="submit" name="thread" value="Create Thread">
    </form>
</body>
</html>