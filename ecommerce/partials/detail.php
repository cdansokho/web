<?php
        require_once("partials/head.php");
    if(isset($_GET['produit']))
        $idProduit = $_GET['produit'];
    $req = $bdd->prepare("SELECT * FROM Produits WHERE ID = :idProduit");
    $req->bindParam(':idProduit', $idProduit);
    $req->execute();
    $donnee = $req->fetch();
    $donnee['Prix_vente'] = number_format($donnee['Prix_vente'], 2, ',', ' ');
    if(isset($_POST['submit']))
    {
        echo "ok";
    }
?>
<link rel="stylesheet" href="assets/styles/detail.css">
<section class="main">
    <div class="bloc">
        <div class="ligne">
            <div class="colonne">
                <div class="contenu">
                    <div class="contenu-gauche">
                        <div class="image">
                            <div class="image-interieur">
                                <div class="item">
                                    <a href="<?php echo $donnee['Path_image']?>"><img src="<?php echo $donnee['Path_image']; ?>"></a>
                                </div>
                            </div>
                        </div>
                        <div class="contenu-bas-gauche">
                            <div class="petites-image">
                                <div class="image-interieur">
                                    <div class="item-bis"><a href="<?php echo $donnee['Path_mini_image1']?>"><img src="<?php echo $donnee['Path_mini_image1']?>"></a></div>
                                    <div class="item-bis"><a href="<?php echo $donnee['Path_mini_image2']?>"><img src="<?php echo $donnee['Path_mini_image2']?>"></a></div>
                                    <div class="item-bis"><a href="<?php echo $donnee['Path_mini_image3']?>"><img src="<?php echo $donnee['Path_mini_image3']?>"></a></div>
                                    <div class="item-bis"><a href="<?php echo $donnee['Path_mini_image4']?>"><img src="<?php echo $donnee['Path_mini_image4']?>"></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contenu-body">
                        <ul class="list-action">
                            <li><a href="index.php?p=categories">Continuer Shopping</a></li>
                            <li><a href="#">Partager le prduit</a></li>
                        </ul>
                        <h2 class="h2">
                            <?php echo $donnee['Libelle'] ?>
                        </h2>
                        <h3 class="h3">
                            <?php echo $donnee['Prix_vente'] ?>€</h3>
                        <p class="p">
                            <?php echo $donnee['Description'] ?>
                        </p>
                        <form action="index.php?p=ajout_panier&produit=<?= $donnee['ID']?>" method="post">
                            <span class="choix">
                                   <?php if($donnee['Type'] == 1){ ?>
                                    <div class="bloc-choix">
                                            <select name="tailleTypeUn" class="contenu-choix" required>
                                            <?php
                                            if($donnee['Type'])
                                            {
                                                $i = 35;
                                                while($i <= 50){
                                                ?>
                                                <option value=""hidden>Taille</option>
                                                <option value="<?= $i; ?>"><?= $i; ?></option>
                                                <?php
                                                $i++;
                                                }
                                            }?>
                                            </select>
                                    </div>
                                    <?php } else { ?>
                                    <div class="bloc-choix">
                                        <select name="tailleTypeDeux" class="contenu-choix" required>
                                           <option value=""hidden>Taille</option>
                                            <option value="XS">XS</option>
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="2L">2XL</option>
                                        </select>
                                    </div>
                                    <?php }?>
                                </span>
                            <span class="choix">
                                    <div class="bloc-choix">
                                        <select name="Quantite" class="contenu-choix" required>
                                           <?php
                                            $ii = 1;
                                            $maxQnt = $donnee['Nombres_produit'];
                                            if($maxQnt != 0)
                                            {
                                            while($ii <= $maxQnt ){ ?>
                                            <option value=""hidden>Quantité</option>
                                            <option value="<?= $ii; ?>"><?= $ii; ?></option>
                                            <?php $ii++; }
                                            }else{ ?>
                                            <option value=""hidden>Rupture de stock</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </span>
                            <?php if(isset($_SESSION['co'])) {?>
                            <div class="zone-submit">
                                <input type="submit" name="submit" value="Ajoutez au panier" class="boutton boutton-submit" id="ajoutpanier">
                            </div>
                        </form>
                        <?php } else{?>
                        <div class="zone-submit">
                            <a href="index.php?p=connexion" class="boutton boutton-submit">Conectez-vous !</a>
                        </div>
                        <?php } ?>
                        <?php if(isset($_GET['ajout']) AND !empty($_GET['ajout'])) {?>
                        <div class="message">Article ajouté ! <a href="index.php?p=commande">Voir votre panier</a></div>
                        <?php } ?>
                        <div class="zone-detail">
                            <ul class="nav nav-tabs">
                                <li class="tab active"><a>details</a></li>
                                <li class="tab"><a>about art</a></li>
                                <li class="tab"><a>taille</a></li>
                                <li class="tab"><a>shipping</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="details" class="tab-pane fade in active">
                                    <ul class="list-unstyled">
                                        <li class="li-unstyled">
                                            <?php echo $donnee['Detail1']?>
                                        </li>
                                        <li class="li-unstyled">
                                            <?php echo $donnee['Detail2']?>
                                        </li>
                                        <li class="li-unstyled">
                                            <?php echo $donnee['Detail3']?>
                                        </li>
                                        <li class="li-unstyled">
                                            <?php echo $donnee['Detail4']?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="centre"></div>
<?php require_once("partials/foot.php"); ?>
