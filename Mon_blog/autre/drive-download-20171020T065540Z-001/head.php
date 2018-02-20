<?php include("config.php"); ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon Blog</title>
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="script.js"></script>
</head>

<body>
    <!-- Debut head -->
    <div class="container-fluid header">
        <div class="container">
            <a href="index.php" class="logo">Mon Blog</a>
            <nav class="navig">
                <a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a>
                <a href="#ramenerici"><span class="glyphicon glyphicon-list-alt"></span> Les News</a>
                <?php if(isset($_SESSION['lvl']) AND $_SESSION['lvl'] > 2) { ?>
                <a href="admin.php"><span class="glyphicon glyphicon-pencil"></span> Ajouter News</a>
                 <?php } else {?>
                  <a href="index.php"><span class="glyphicon glyphicon-pencil"></span>Actualités</a>
                  <?php }?>
                <a href="#"><span class="glyphicon glyphicon-envelope"></span> Me Contacter</a>
                <?php if(!isset($_SESSION['id'])) { ?>
                <a href="inscription.php"><span class="glyphicon glyphicon-user"></span> S'inscrire</a>
                <?php } 
                 else {?>
                 <?php $userinfo = $_SESSION['id']; ?>
                  <a href='profil.php?id=<?php echo $userinfo ?>'><span class="glyphicon glyphicon-user"></span> Voir mon profil</a>
                  <?php }?>
                <?php if(!isset($_SESSION['id'])) { ?>
                <a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a>
                <?php } 
                 else {?>
                 <a href="deconnexion.php"><span class="glyphicon glyphicon-log-in"></span> Déconnexion</a>
                 <?php }?>
            </nav>
        </div>
    </div>
    <!-- fin head -->

    <!-- Debut banniere -->
    <section class="container-fluid banner">
        <div class="ban">
            <img src="image/bannniere.jpg">
        </div>
        <div class="hero-unit">
            <h1>Bienvenue sur mon Blog</h1>
            <h3>Découvre le monde d'Aion </h3>
        </div>
    </section>
    <!-- fin banniere -->

    <!-- 2eme navigation -->
    <div class="container-fluid">
        <div class="container Dnav">
            <nav class="naviga">
                <ul>
                    <li><span></span><a href="index.php">Accueil</a></li>
                    <li><span></span><a href="#ramenezici">Les News</a></li>
                    <li><span></span><a href="index.php">Actualités</a></li>
                    <li><span></span><a href="#">Me Contacter</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- fin 2eme navigation -->