<?php


?>
<!doctype html>
<html lang="fr" >
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="Contenu/style.css" />
    <script src="../assets/tinymce/tinymce.js" ></script>
    <script src="../assets/tmceScript.js" ></script>
    <title> <?= $title ?> </title>
</head>

<body>
        <div id="global" class="container">

            <div class="jumbotron jumbotron-fluid">
                <header class="text-center">
                    <a href="index.php"> <h1 id="titleBlog"> </h1></a> <a href="index.php?action=logout" class="text-right"> Déconnexion</a>
                    <p> <?php echo $title; ?> </p>
                </header>
            </div>

            <div id="post">
                <?= $contenu ?>
            </div> <!-- #contenu -->

            <footer id="piedBlog">

            </footer>
        </div> <!-- #global -->
    </body>
</html>