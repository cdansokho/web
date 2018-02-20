<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.png">
    <title>Day-Day</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= $baseUrl ?>assets/bootstrap.3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $baseUrl ?>assets/font-awesome.4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= $baseUrl ?>assets/css/animate.min.css" rel="stylesheet">
    
    <link href="<?= $baseUrl ?>assets/css/<?= $page ?>.css" rel="stylesheet">
    <link href="<?= $baseUrl ?>assets/css/cover.css" rel="stylesheet">
    <link href="<?= $baseUrl ?>assets/css/timeline.css" rel="stylesheet">

    <link href="<?= $baseUrl ?>assets/css/forms.css" rel="stylesheet">
    <link href="<?= $baseUrl ?>assets/css/buttons.css" rel="stylesheet">
    <script src="<?= $baseUrl ?>assets/js/jquery.1.11.1.min.js"></script>
    <script src="<?= $baseUrl ?>assets/bootstrap.3.3.6/js/bootstrap.min.js"></script>

    <link href="<?= $baseUrl ?>assets/css/emojione.picker.css" rel="stylesheet" type="text/css">
  </head>

  <body class="animated fadeIn">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-white navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= $baseUrl ?>accueil"><b>DayDay</b></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
<script>
  var recupNotifs = function(){
    $.post('<?= $baseUrl ?>core/ajax/others/ajax_load_notifs.php', {}, function(donnees){ 
      if($('#nofifBar').html() !== donnees){
        $('#nofifBar').html(donnees);
      } 
    })
  }

  setInterval(recupNotifs, 1000);
</script>
<li id="nofifBar"></li>
            <li><a href="<?= $baseUrl ?>timeline">Accueil</a></li>
            <li><a href="<?= $baseUrl ?>search">Recherche</a></li>
            <li><a href="<?= $baseUrl ?>messages">Messagerie</a></li>
            <li><a href="<?= $baseUrl ?>files">Fichiers</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="<?= $baseUrl ?>index">Connexion</a></li>
                <li><a href="<?= $baseUrl ?>index">Inscription</a></li>
                <li><a href="<?= $baseUrl ?>profils">Profil</a></li>
                <li><a href="<?= $baseUrl ?>settings">Modifier le profil</a></li>
                <li><a href="<?= $baseUrl ?>timeline">Timeline</a></li>
                <li><a href="<?= $baseUrl ?>messages">Messagerie</a></li>
                <li><a href="<?= $baseUrl ?>posts">Voir un post</a></li>
                <li><a href="<?= $baseUrl ?>search">Rechercher</a></li>
                <li><a href="<?= $baseUrl ?>pictures">Mes photos</a></li>
                <li><a href="<?= $baseUrl ?>friends">Mes amis</a></li>
                <li><a href="<?= $baseUrl ?>files">Mes fichiers</a></li>
                <li><a href="<?= $baseUrl ?>notifs">Notifications</a></li>
                <li><a href="<?= $baseUrl ?>about">A propos</a></li>
                <li><a href="<?= $baseUrl ?>404">Erreur 404</a></li>
                <li><a href="<?= $baseUrl ?>500">Erreur 500</a></li>
                <li><a href="<?= $baseUrl ?>logout">Déconnexion</a></li>
              </ul>
            </li>
            <li><a href="<?= $baseUrl ?>profils" class="nav-controller"><i class="fa fa-user"></i></a></li>
          </ul>
        </div>
      </div>
    </nav>