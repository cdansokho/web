<!------------------------------------ Debut footer ----------------------------------------------->
<?php 
    $req = $bdd->prepare("SELECT * FROM Categories LIMIT 3");
    $req->execute();
    
?>
<link rel="stylesheet" href="assets/styles/footer.css">
<div class="clear">
    <footer>
        <div class="barbleu"></div>
        <div class="infofooter">
            <div class="infoscontact">
                <h3 class="titfoot">PRENDRE CONTACT</h3>
                <p>Appellez nous au : 09 00 00 00 00</p>
                <p>e-mail : <a href="mailto:dansok_c@etna-alternance.net">dansok_c@etna-alternance.net</a></p>
            </div>
            <?php while($result = $req->fetch()){
            $idP = $result['ID'];
            $reqprod = $bdd->prepare("SELECT * FROM Produits INNER JOIN Categorie_Produit ON Categorie_Produit.ID_categorie = $idP AND Produits.ID = Categorie_Produit.ID_produit LIMIT 5");
            $reqprod->execute();
            ?>
            <div class="access">
                <h3 class="titfoot"><?= $result['Libelle'] ?></h3>
                <ul>
                   <?php while($resultprod = $reqprod->fetch()){  ?>
                    <li><a href="index.php?p=detail&produit=<?= $resultprod['ID']; ?>"><?= $resultprod['Libelle']; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <?php } ?>
            <div class="RS">
                <h3 class="titfoot">RESEAUX SOCIAUX</h3>
                <ul>
                    <li><a href=""><img src="assets/images/facebook.png" alt="fb" ></a></li>
                    <li><a href=""><img src="assets/images/twitter.png" alt="tw" ></a></li>
                    <li><a href=""><img src="assets/images/google-plus.png" alt="goo" ></a></li>
                    <li><a href=""><img src="assets/images/pinterest.png" alt="pin" ></a></li>
                    <li><a href=""><img src="assets/images/linkedin.png" alt="lin" ></a></li>
                    <li><a href=""><img src="assets/images/instagram.png" alt="ins" ></a></li>
                </ul>
            </div>
            <div class="newlet">
                <h3>NEWSLETTER</h3>
                <h2>INSCRIS TOI MAINTENANT</h2>
                <div class="textnews">
                    Entrez votre adresse email et soyez alerter de nos nouveaux produits. Nous detestons le spam!
                </div>
                <form action="index.php?p=newsletter" method="post">
                    <div class="inutnews">
                        <input class="mailnews" type="email" placeholder="Votre adresse mail" required name="email">
                        <input type="submit" name="submitgo" class="go" value="GO !">
                    </div>
                </form>
                <?php if(isset($_GET['actionnews']) AND $_GET['actionnews'] == "success"){ ?>
                <div class="newsmessage">Vous êtes inscrit a la Newsletter !</div>
                <?php } elseif(isset($_GET['actionnews']) AND $_GET['actionnews'] == "use"){ ?>
                <div class="newsmessage">Vous êtes déja inscrit a la Newsletter !</div>
                <?php } ?>
            </div>
        </div>
        <div class="copy">
            <div class="textcopy">
                <p>© 2017 Copyright by habi_a && dansok_c</p>
            </div>
            <div class="credit">
                <span><img src="assets/images/visa.png" alt="visa"></span>
                <span><img src="assets/images/paypal.png" alt="paypal"></span>
                <span><img src="assets/images/mastercard.png" alt="mc"></span>
            </div>
        </div>
    </footer>
</div>

</body>

</html>