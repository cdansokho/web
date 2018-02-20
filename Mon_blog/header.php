<?php require_once("config.php"); ?>
<!DOCTYPE html>

<html>

<head>
    <title>Mon Blog</title>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">

</head>

<body>
    <div class="cadrenav">
        <img src="image/turntable-1109588_1920.jpg" alt="bannav">
        <div class="centremenue">
            <nav class="menu">
                <ul>
                    <li><a href="index.php">Article</a></li>
                    <?php if(isset($_SESSION['co'])) { ?>
                    <li><a href="deconnexion.php">Déconnexion</a></li>
                    <li><a href="ajoutart.php">Ajouter article</a></li>
                    <?php } 
                    else{
                    ?>
                    <li><a href="connexion.php">Connextion</a></li>
                    <?php }
                     if(isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2){ ?>
                    <li><a href="admin.php">Espace Admin</a></li>
                    <?php }?>
                </ul>
            </nav>

            <div class="grostitre">
                <h1>Tout et n'importe quoi !</h1>
            </div>
            <div class="grostitre2">
                <h3>Ce blog est fait pour vous</h3>
            </div>
        </div>
    </div>