<?php
include("config.php"); 

if(!isset($_SESSION['id'])) {
	header("Location : index.php");
}else
	$id_get = intval($_GET['id']);

    $requsers = $bdd->query("SELECT * FROM users WHERE (id = '$id_get')");
    $reponse = $requsers->fetch();
    include("head.php");
?>
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/gestionprofil.css">
    <div class="centrer">
        <div class="titre">
            <h1>Gestion de Profil</h1></div>
        <div class="eleminter">
            <div class="avatar"><img src="image/avatar/<?= $_SESSION['id']; ?>.jpg"></div>
            <hr>
            <div class="info">Pseudo :
                <?php echo $reponse['pseudo']; ?>
            </div>
            <hr>
            <div class="info">Mail :
                <?php echo $reponse['mail']; ?>
            </div>
            <hr>

            <div class="info">lvl :
                <?php echo $reponse['lvl']; ?>
            </div>
            <hr>
            <form method='post' action='reception.php' enctype='multipart/form-data'>
                <label for='mon_avatar'>Ajouter un avatar(tous formats | max. 5 Mo) :</label>
                <br />
                <input type='file' name='mon_avatar' id='mon_avatar' />
                <br />
                <input type='submit' name='submit' value='Envoyer' />
            </form>
            <hr>
        </div>
        <?php if($reponse['id'] == isset($_SESSION['id']) OR $reponse['lvl'] > 2) { ?>
            <div class="eleminter"><a href="editerprofil.php">Editer mon profil</a></div>
            <?php } ?>
    </div>
    <?php include("footer.php"); ?>