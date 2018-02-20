<?php
if(!isset($_GET['id'])) {
	header("Location: index.php");
}else{
    if(is_numeric($_GET['id']))
	   $id_get = intval($_GET['id']);
    else
        echo "param no valid";
}
include("head.php"); include("config.php");
$demande = $bdd->query('SELECT * FROM articles WHERE id ="'.$id_get.'"');
$reponse = $demande->fetch();
if (isset($reponse['id'])){
?>
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/postcss.css">
    <div class="container">
        <?php 
            $demande = $bdd->query('SELECT * FROM articles WHERE id ="'.$id_get.'"');
            $reponse = $demande->fetch();
            if (isset($reponse['id'])){
            ?>
            <div class="row centre">
                <div class="elementtitrepost">
                    <h1 class="titre"><?php echo $reponse['presentation']; ?></h1>
                    <div class="dateetauteur">
                        <?php echo $reponse['role']; ?>
                    </div>
                </div>
                <div class="textcontenu">
                    <?php echo $reponse['c1']; ?>
                </div>
                <div class="imageune"><img src="azerty/<?= $reponse['id']; ?>-1.jpg"></div>
                <div class="textcontenu">
                    <?php echo $reponse['c2']; ?>
                </div>
                <div class="imagedeux"><img src="azerty/<?= $reponse['id']; ?>-2.jpg"></div>
                <div class="textcontenu">
                    <?php echo $reponse['c3']; ?>
                </div>
            </div>
    </div>


    <hr class="separateur">


    <div class="container elementcommentaire">
        <div class="centrerlescommentaire">
            <h3 class="costumtitrecomment" id="Commentaires">COMMENTAIRES</h3>
            <?php
                $demande2 = $bdd->query('SELECT * FROM commentaires WHERE id_articles ="'.$reponse['id'].'" ORDER BY id_c DESC LIMIT 0,10');
                while ($reponse2 = $demande2->fetch()){
            ?>
                <div class="lescommentaires">
                    <h4 class="titttttttt">Commenter par : <?php echo $reponse2['auteur_c']; ?> le : <?php echo $reponse2['date_c']; ?></h4>
                    <div class="messagedelapersonne"> <i>Message</i> :
                        <?php echo $reponse2['contenu_c']; ?>
                    </div>
                </div>
        </div>

        <?php
    }
    ?>



            <hr class="separateur">


            <?php
    }
        if(isset($_POST['formcommentaire']) and !empty($_POST['formcommentaire']))
        {
            if(isset($_POST['commentaire']) and !empty($_POST['commentaire']))
            {
                $id_u = $_SESSION['id'];
                $requsers = $bdd->query("SELECT * FROM users WHERE (id = '$id_u')");
                $data_u = $requsers->fetch();
                
                $commentaire = addslashes(htmlspecialchars(trim($_POST['commentaire'])));
                
                $auteur = $data_u['pseudo'];
                $users = $reponse2['id'];
                
                $query = "INSERT INTO commentaires VALUES (NULL, '$auteur', '$commentaire', '$id_get', DEFAULT)";
               
                $inserercommentaire = $bdd->query($query);
                
                $id_r = $reponse['id'];
                $refresh = "<meta http-equiv='refresh' content='0;URL=post.php?id=".$id_r."#Commentaires'>";
                

                echo $refresh;

                
            }
            else
                $erreur = "Vous devez entrez un commentaire !";
        }
?>
               <?php if(isset($_SESSION['id'])) { ?>
                <div class="container pourconmenter">
                    <form action="" method="post" name="comentaireform">
                        <textarea name="commentaire" placeholder="Saisir votre commentaire"></textarea>
                        <input type="submit" name="formcommentaire" value="Envoyer" class="custopnbouton">
                    </form>
                </div>
                <?php } else{
                echo "<div class='comt'>Pour commenter il faut<a href='connexion.php'> se connecter !</a></div>";}
                ?>
                <?php
    if (isset($erreur)) 
	{
		echo $erreur ;
	}
}
else{
	echo "ya r";
}
?>
<div>
<?php include("footer.php"); ?>
</div>