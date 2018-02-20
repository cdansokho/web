<?php require_once("header.php"); require_once("config.php");

$requete = $bdd->query("SELECT count(*) AS nb from articles");
$reponse = $requete->fetch();
$nb_articles = $reponse['nb'];
$parPage = 1;
$pages = ceil($nb_articles/$parPage);
if(isset($_GET['page']) && ($_GET['page'] <= $pages))
{
    $page = ($_GET['page']-1) * $parPage;
}
else
{
    $page = 1 - 1;
}

$req = "SELECT * FROM articles ORDER BY id DESC LIMIT " . $page . ",".$parPage;
$demande = $bdd -> query($req);
?>

<div class="centreart">
       <?php while ($reponse = $demande->fetch()){ ?>
    <div class="articlePricip">
        <h1 class="h1post"><?php echo $reponse['titre'] ?></h1>
        <div class="imgdernierpost"><img src="azerty/<?= $reponse['id']; ?>-couv.jpg"></div>
        <div class="infopost">Poster par <span class="auteur"><?php echo $reponse['auteur'] ?></span> en <span class="auteur"><?php echo $reponse['datep'] ?></span></div>
        <div class="descripost"><?php echo $reponse['presentation'] ?></div>
        <div class="savoirplus">
        <a href="post.php?id=<?php echo $reponse['id'] ?>">Lire la suite</a>
        </div>
        <div>
        <?php if(isset($_SESSION['pseudo']) and $_SESSION['pseudo'] == $reponse['auteur'] or $_SESSION['lvl'] == 2){ ?>
        <a href="modifart.php?id=<?php echo $reponse['id'] ?>"><img src="image/pencil.png" alt="modifart"></a>
        <span><a href="supart.php?id=<?php echo $reponse['id'] ?>"><img src="image/garbage.png" alt=""></a></span>
        <?php } ?>
        </div>
        <?php } ?>
    </div>
    <?php require_once("droite.php"); ?>

</div>
<div class="page">
    <?php
        for($i = 1; $i <= $pages; $i++)
        {
            if($i == $_GET['page']){
                echo "<span class='page_active' '>".$i."</span>";
                 echo "&nbsp; &nbsp; &nbsp; &nbsp; ";
            }else{
                echo "<a class=' page' href='index.php?page=".$i."'>".$i."</a>";
                echo "&nbsp; &nbsp; &nbsp; &nbsp; ";
            }
        }
    ?>
</div>
</body>
<?php require_once("footer.php"); ?>
