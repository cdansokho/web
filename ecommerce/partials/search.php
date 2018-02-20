<?php 
    if(isset($_POST['result']) AND !empty($_POST['result']))
    {
        $result = htmlspecialchars($_POST['result']);
        $reqprod = $bdd->prepare("SELECT * FROM Produits WHERE Libelle LIKE '%$result%' ORDER BY ID DESC");
        $reqprod->execute();
        $nbresult = $reqprod->rowCount();
    }
    else
        header("Location: index.php");
require_once("partials/head.php");
?>
<link rel="stylesheet" href="assets/styles/produits.css">
<!------------------------------------ Debut categorie ----------------------------------------------->
<div class="centre">

    <div class="centrecat">
        <div class="collection1">
            <h1>
                <?= $nbresult ?> résultats trouvés</h1>
        </div>
        <div class="centblock11">
            <?php
        while ($rep = $reqprod->fetch()) { $rep['Prix_vente'] = number_format($rep['Prix_vente'], 2, ',', ' '); ?>
                <a href="index.php?p=detail&produit=<?php echo $rep['ID']?>">
                    <div class="block11">
                        <img src="<?php echo $rep['Path_image']?>" alt="tshirt">
                        <div class="cat1">
                            <a href="index.php?p=detail&produit=<?php echo $rep['ID']?>">
                                <?php echo $rep['Libelle']?>
                            </a>
                        </div>
                        <div class="prix11">
                            <?php echo $rep['Prix_vente'] ?>€</div>
                    </div>
                </a>
                <?php
            }
        ?>
        </div>
    </div>
</div>
<!------------------------------------ Fin categorie ----------------------------------------------->
<?php require_once("partials/foot.php"); ?>