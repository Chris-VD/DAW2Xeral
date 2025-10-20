<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="styleGallery.css">
</head>
<body>
    <header>
        <h1>Gallery</h1>
        <nav>
            <a href="main.php">Back to main page...</a>
        </nav>
    </header>    
    <main>
        <section>
            <?
                $files = scandir('images/');
                foreach($files as $file) {
                    if (str_starts_with($file, ".")) continue;
                    echo "<div>
                        <p>".$file."</p>
                        <a href=\"images/".$file."\"><img src=\"images/".$file."\" alt=\"".$file."\"></a>
                    </div>";
                }
            ?>
        </section>
        
    </main>
</body>
</html>