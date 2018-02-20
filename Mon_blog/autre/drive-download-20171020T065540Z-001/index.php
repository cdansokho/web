<?php  include("config.php"); 

$requete = $bdd->query("SELECT count(*) AS nb from articles");
$reponse = $requete->fetch();
$nb_articles = $reponse['nb'];
$parPage = 2;
$pages = ceil($nb_articles/$parPage);

if(isset($_GET['page']) && ($_GET['page'] <= $pages))
{
    $page = ($_GET['page']-1) * $parPage;
}
else
{
    $page = 1 - 1;
}

include("head.php");
?>

<link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.css">
<link rel="stylesheet" href="css/style.css">
<!-- Debut article -->
<div class="container-fluid articlecostum">
    <div class="container">
        <div class="row">

            <?php
                $req = "SELECT * FROM articles ORDER BY id DESC LIMIT " . $page . ",".$parPage;
          
    $demande = $bdd -> query($req);
    
    if(isset($_GET['id']))
    {
        $idP = intval($_GET['id']);
        $query = "DELETE FROM articles WHERE id=$idP";
        $suppression = $bdd->query($query);
    }
                
    while ($reponse = $demande->fetch()){ ?>

                <div id="ramenerici"></div>
                <div class="col-sm-8 articlcostum">
                    <div class="elementhautdesarticle">
                        <h2 class="titredesarticle">
                            <a href="post.php?id=<?php echo $reponse['id'] ?>">
                                <?php echo  $reponse['titre']; ?>
                            </a>
                        </h2>
                        <div class="dateetauteurart">
                            Crée le
                            <?php echo $reponse['datep']; ?> par
                            <?php echo "<i>".$reponse['auteur']."</i>"; ?>
                        </div>
                    </div>
                    <div class="imagederesume"><img src="azerty/<?= $reponse['id']; ?>-couv.jpg"></div>
                    <div class="textart">
                        <?php echo nl2br(htmlspecialchars($reponse['contenu'])); ?>
                    </div>
                    <?php
                    if(isset($_SESSION['lvl']) AND $_SESSION['lvl'] > 2){ 
                        echo "<a href=\"?id=" . $reponse['id'] . "\"><img src=\"image/poubelle.png\"></a>";
                        }                
            ?>
                </div>
                <?php
	}
?>
                <?php include("cote.php"); ?>
        </div>
    </div>
</div>
<div class="container pagination">
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

<!-- fin article -->
<?php include("footer.php"); ?>