<?php require_once("partials/head.php"); ?>
<link rel="stylesheet" href="assets/styles/style.css">

<!-- Debut affiche -->
<?php
    $req = $bdd->prepare("SELECT Affiche.* FROM Affiche INNER JOIN Produits ON Affiche.ID = 1 AND ID_produit = Produits.ID");
    $req->execute();
    $donnee = $req->fetch();
    $req->closeCursor();
     ?>
    <div class="lecentre">
        <div class="banner">
            <div class="contenu">
                <div class="imgpaire"><img src="<?php echo $donnee['Path_image']?>" alt="image affiche"></div>
                <div class="text">
                    <div>
                        <h1>
                            <?php echo strtoupper($donnee['Libelle']) ?>
                        </h1>
                    </div>
                    <div>
                        <h2>EXCLUSIVEMENT CHEZ BIGBAG</h2>
                    </div>
                    <div>
                        <h3>COLLECTION /
                            <?php echo strtoupper($donnee['Collection']) ?>
                        </h3>
                    </div>
                    <div><span><a href="index.php?p=detail&produit=<?php echo $donnee['ID_produit'] ?>" class="bouton">ACHETER</a></span></div>
                </div>
            </div>
        </div>
        <div class="milieu">

            <!-- Debut collection -->
            <div class="centre">
                <div class="collection">
                    <h1>NOUVEAUTÉS</h1>
                </div>
                <div class="centblock">
                    <?php
            $req = $bdd->query("SELECT * FROM Produits ORDER BY ID DESC LIMIT 5");
            $i = 1;
            while ($donnee = $req->fetch())
            {
                $donnee['Prix_vente'] = number_format($donnee['Prix_vente'], 2, ',', ' ');
                ?>
                        <a href="index.php?p=detail&produit=<?php echo $donnee['ID'] ?>">
                            <div class="block">
                                <img src="<?php echo $donnee['Path_image']?>" alt="photo produit">
                                <div class="cat">
                                    <a href="index.php?p=detail&produit=<?php echo $donnee['ID'] ?>">
                                        <?php echo $donnee['Libelle']?>
                                    </a>
                                </div>
                                <div class="prix1">
                                    <?php echo $donnee['Prix_vente']?>€</div>
                            </div>
                        </a>
                        <?php
                $i++;
            }
            $req->closeCursor();
            ?>
                </div>
                <div><a href="index.php?p=categories" class="voirplus">Voir tous les produits</a></div>
                <div class="collection">
                    <h1>LES PLUS VENDUS</h1>
                </div>
                <div class="centblock1">
                    <?php
            $req = $bdd->query("SELECT * FROM Produits ORDER BY Nombres_vendu DESC LIMIT 5");
            $i = 1;
            while ($donnee = $req->fetch())
            {
                $donnee['Prix_vente'] = number_format($donnee['Prix_vente'], 2, ',', ' ');
                ?>
                        <a href="index.php?p=detail&produit=<?php echo $donnee['ID'] ?>">
                            <div class="block1">
                                <img src="<?php echo $donnee['Path_image']?>" alt="photo produit">
                                <div class="cat">
                                    <a href="index.php?p=detail&produit=<?php echo $donnee['ID'] ?>">
                                        <?php echo $donnee['Libelle']?>
                                    </a>
                                </div>
                                <div class="prix1">
                                    <?php echo $donnee['Prix_vente']?>€</div>
                            </div>
                        </a>
                        <?php
                $i++;
            }
            $req->closeCursor();
            ?>
                </div>
                <div><a href="index.php?p=categories" class="voirplus">Voir tous les produits</a></div>
            </div>
        </div>
    </div>
    <?php require_once("partials/foot.php"); ?>