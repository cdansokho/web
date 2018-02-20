<?php
if(isset($_SESSION['ID']))
    $idUtilisateur = $_SESSION['ID'];
require_once("partials/head.php");
?>
    <!-- fin header -->
    <link rel="stylesheet" href="assets/styles/commande.css">

    <section class="main">
        <div class="bloc">
            <div class="ligne">
                <div class="colonne">
                    <div class="carte-liste">
                        <form action="index.php?p=use_coupon" method="post">
                            <div class="grande-table">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nom Produit</th>
                                            <th>Prix</th>
                                            <th>Taille</th>
                                            <th>Quantité</th>
                                            <th>Sous Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $req = $bdd->prepare("SELECT * FROM Produits INNER JOIN Produit_Utilisateur ON Produit_Utilisateur.ID_produit = Produits.ID AND Produit_Utilisateur.ID_utilisateur = :idUtilisateur");
                                        $req->bindParam(':idUtilisateur', $idUtilisateur);
                                        $req->execute();
                                        while ($donnee = $req->fetch())
                                        {
                                            $sous_total = $donnee['Prix_vente'] * $donnee['Quantite'];
                                            $sous_total = number_format($sous_total, 2, ',', ' ');
                                            $donnee['Prix_vente'] = number_format($donnee['Prix_vente'], 2, ',', ' ');
                                            ?>
                                            <tr>
                                                <td class="petite-colonne">
                                                    <a href="index.php?p=delete_produit_panier&produit=<?php echo $donnee['ID']?>&taille=<?php echo $donnee['Taille']?>"><button type="button" class="close"><span>×</span></button></a>
                                                    <span><img class="img" src="<?php echo $donnee['Path_image']?>" alt="photo produit"></span>
                                                </td>
                                                <td class="moyenne-colonne">
                                                    <?php echo $donnee['Libelle'] ?>
                                                </td>
                                                <td class="petite-colonne">
                                                    <?php echo $donnee['Prix_vente'] ?>€</td>
                                                <td class="petite-colonne">
                                                    <div class="qnt">
                                                        <?php echo $donnee['Taille'] ?>
                                                    </div>
                                                </td>
                                                <td class="petite-colonne">
                                                    <div class="qnt">
                                                        <?php echo $donnee['Quantite'] ?>
                                                    </div>
                                                </td>
                                                <td class="petite-colonne">
                                                    <?php echo $sous_total ?>€</td>
                                            </tr>
                                            <?php
                                        }
                                        $req->closeCursor();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="zone-coupon">
                                    <div class="groupe-input">
                                        <input class="element-form" placeholder="J'ai un code promo" aria-describedby="basic-addon2" type="text" name="coupon">
                                        <input type="submit" class="boutton groupe-input-bis" name="submit" value="utiliser coupon">
                                        <?php if(isset($_GET['coupon']) AND $_GET['coupon'] == "USE") {?>
                                        <div class="msgcoupon1">Vous avez déja utilisé un coupon, vous ne pouvez plus en utilisé</div>
                                        <?php } ?>
                                        <?php if(isset($_GET['coupon']) AND $_GET['coupon'] == "FAIL") {?>
                                        <div class="msgcoupon2">Aucun coupon trouvé</div>
                                        <?php } ?>
                                        <?php if(isset($_GET['coupon']) AND $_GET['coupon'] == "SUCCESS") {?>
                                        <div class="msgcoupon3">Votre coupon a bien été ajouté</div>
                                        <?php } ?>
                                    </div>
                                <a href="index.php?p=delete_all_panier" class="boutton">vider panier</a>
                            </div>
                            <div class="ligne zone-resultat">
                                <div class="grande-colonne">
                                    <ul class="ul">
                                        <?php
                                            $req = $bdd->prepare("SELECT SUM(Prix_vente * Quantite) AS Somme_prix FROM Produits INNER JOIN Produit_Utilisateur ON Produit_Utilisateur.ID_produit = Produits.ID AND Produit_Utilisateur.ID_utilisateur = :idUtilisateur");
                                            $req->bindParam(':idUtilisateur', $idUtilisateur);
                                            $req->execute();
                                            $donnee = $req->fetch();
                                            $req->closeCursor();
                                            $req = $bdd->prepare("SELECT * FROM Coupons INNER JOIN Utilisateur_Coupon ON Utilisateur_Coupon.ID_coupon = Coupons.ID AND Utilisateur_Coupon.ID_utilisateur = :idUtilisateur");
                                            $req->bindParam(':idUtilisateur', $idUtilisateur);
                                            $req->execute();
                                            $donnee_bis = $req->fetch();
                                            $sous_total = $donnee['Somme_prix'];
                                            $tva = $sous_total * 20 / 100;
                                            $coupon = $sous_total * $donnee_bis['Effet'] / 100;
                                            $total = $sous_total + $tva - $coupon;
                                            $sous_total = number_format($sous_total,  2, ',', ' ');
                                            $tva = number_format($tva, 2, ',', ' ');
                                            $total = number_format($total, 2, ',', ' ');
                                            ?>
                                            <li class="li">Sous Total (HT)<span><?php echo $sous_total ?>€</span></li>
                                            <li class="li">TVA (20%)<span>+ <?php echo $tva ?>€</span></li>
                                            <?php
                                            if ($donnee_bis != "")
                                            {
                                                ?>
                                                <li class="li">Coupon<span>- <?php echo $donnee_bis['Effet']; ?>%</span></li>
                                                <?php
                                            }
                                            ?>
                                            <li class="li total-ttc">Total (TTC)<span class="total-ttc"><?php echo $total ?>€</span></li>
                                    </ul>
                                </div>
                            </div>
                            <?php if(isset($sous_total) and $sous_total == 0){ ?>
                            <div class="zone-submit">
                                <a href="index.php?p=categories" class="boutton submit">Faire des achats</a>
                            </div>
                            <?php } else { ?>
                            <div class="zone-submit">
                                <a href="#" class="boutton submit">COMMANDER</a>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php require_once("partials/foot.php"); ?>
