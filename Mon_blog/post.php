<?php  
if(!isset($_GET['id'])) {
	header("Location: index.php");
}else{
    if(is_numeric($_GET['id']))
	   $id_get = intval($_GET['id']);
    else
        header("Location: index.php");

}
require_once("header.php"); require_once("config.php");
$demande = $bdd->query('SELECT * FROM articles WHERE id ="'.$id_get.'"');
$reponse = $demande->fetch();

if(isset($_POST['submit']))
{
    if(!empty($_POST['contenucomt']))
    {
        $contenucomt = htmlspecialchars(htmlentities($_POST['contenucomt']));
        $auteur_c = $_SESSION['pseudo'];
    /*********************************************** insert comment **************************************/
        $req = "INSERT INTO commentaires(auteur_c, commentaire, id_art) VALUE(:auteur_c, :commentaire, :id_art)";
        $ajoutcomment = $bdd->prepare($req);
        $ajoutcomment->bindValue(':auteur_c', $auteur_c, PDO::PARAM_STR);
        $ajoutcomment->bindValue(':commentaire', $contenucomt, PDO::PARAM_STR);
        $ajoutcomment->bindValue(':id_art', $id_get, PDO::PARAM_INT);
        $ajoutcomment->execute() or die(print_r($ajoutcomment->errorInfo()));
        header("Location: index.php");
    }
}
    /*********************************************** nb like **************************************/

    $relike = "SELECT id FROM likes WHERE id_art = :idart";
    $nblike = $bdd->prepare($relike);
    $nblike->bindValue(':idart', $id_get, PDO::PARAM_INT);
    $nblike->execute() or die(print_r($nblike->errorInfo()));
    $nblike = $nblike->rowCount();
    /*********************************************** nb dislike **************************************/

    $redislike = "SELECT id FROM dislikes WHERE id_art = :idart";
    $nbdislike = $bdd->prepare($redislike);
    $nbdislike->bindValue(':idart', $id_get, PDO::PARAM_INT);
    $nbdislike->execute() or die(print_r($nbdislike->errorInfo()));
    $nbdislike = $nbdislike->rowCount();
?>

<link rel="stylesheet" href="css/post.css">
<div class="block">
    <div class="centre">
        <div class="imgpost"><img src="azerty/<?= $reponse['id']; ?>-1.jpg"></div>
        <div class="titpost">
            <h1>
                <?php echo $reponse['titre']; ?>
            </h1>
        </div>
        <div class="infospost">
            <ul>
                <li><img src="image/avatar.png" alt="icon"><span><?php echo $reponse['auteur']; ?></span></li>
                <li><img src="image/time.png" alt="icon"> <span><?php echo $reponse['datep']; ?></span></li>
                <li><img src="image/like.png" alt="icon"><span><?= $nblike; ?></span></li>
                <li><img src="image/dislike.png" alt="icon"><span><?= $nbdislike; ?></span></li>
            </ul>
        </div>
        <div class="contenu">
            <?php echo $reponse['contenu']; ?>
        </div>
        <?php
            if(isset($_SESSION['co'])){
        ?>
        <div class="aime">
        <span class="jaime"><a class="aim" href="likes.php?t=1&id=<?php echo $reponse['id']; ?>">J'aime</a></span>
        <span class="jaimepas"><a class="aimepas" href="likes.php?t=2&id=<?php echo $reponse['id']; ?>">Je n'aime pas</a></span>
        </div>
                            <?php } ?>

        <!-- /*********************************************** Debut comment **************************************/ -->
        
            <div class="blockcomment">
                <div class="titrecomments">Commentaire(s)</div>
                <?php
                $demande2 = $bdd->query('SELECT * FROM commentaires WHERE id_art ="'.$reponse['id'].'" ORDER BY id_c DESC LIMIT 0,10');
                while ($reponse2 = $demande2->fetch()){
                    ?>
                <div class="contecomment">
                    <div class="infoposteur">Poster par <img src="image/avatar.png" alt="icon">
                        <?php echo $reponse2['auteur_c']; ?> <img src="image/time.png" alt="icon">
                        <?php echo $reponse2['date_c']; ?> :</div>
                    <div class="messagecomment">
                        <?php echo $reponse2['commentaire']; ?>
                    </div>
                    <?php 
                        if($_SESSION['pseudo'] == $reponse2['auteur_c'] or $_SESSION['lvl'] == 2){
                    ?>
                    <div>
                        <a href="supcomment.php?delete=<?php echo $reponse2['id_c']; ?>&id=<?php echo $id_get; ?>"><img src="image/garbage.png" alt="delete"></a>
                         <span>
                        <a href="modif.php?comment=<?php echo $reponse2['id_c']; ?>&id=<?php echo $id_get; ?>"><img src="image/pencil.png" alt="delete"></a>
                        </span>
                    </div>
                   
                    <?php } ?>
                </div>
                <?php
                }
            ?>
            </div>
            
                <!--/********************************************** Debut let comment **********************************/-->

                <div class="blockletcomment">
                    <div class="titrecomments">Laisser un commentaire</div>
                    <?php
                        if(isset($_SESSION['co'])){
                    ?>
                    <form action="" method="post" class="formcomment">
                        <div><input type="text" placeholder="Laissez un commentaire" class="comment" name="contenucomt"></div>
                        <div><button type="submit" name="submit">Envoyer</button></div>
                    </form>
                    <?php } ?>
                   <?php
                        if(!isset($_SESSION['co'])){
                    ?>
                    <div class="mescocomment">Il faut se connecter pour laisser un commentaire</div>
                    <?php } ?>
                </div>
    </div>
</div>