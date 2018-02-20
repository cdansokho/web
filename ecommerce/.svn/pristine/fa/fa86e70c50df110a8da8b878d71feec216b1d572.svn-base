<?php
    if (isset($_POST['submitform']))
    {
        if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['sexe']) AND !empty($_POST['datenaissance']) AND !empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['pays']) AND !empty($_POST['adresse']) AND !empty($_POST['ville']) AND !empty($_POST['cp']) AND !empty($_POST['tel']))
        {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $sexe = htmlspecialchars($_POST['sexe']);
            $datenaissance = htmlspecialchars($_POST['datenaissance']);
            $email = htmlspecialchars($_POST['email']);
            $mdp = hash('sha512', $_POST['mdp']);
            $pays = htmlspecialchars($_POST['pays']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $ville = htmlspecialchars($_POST['ville']);
            $cp = htmlspecialchars($_POST['cp']);
            $tel = htmlspecialchars($_POST['tel']);

            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $reqemail = $bdd->prepare("SELECT * FROM Utilisateurs WHERE Email = ?");
                $reqemail->execute(array($email));
                $mailexit = $reqemail->rowCount();
                if($mailexit == 0)
                {
                    if(preg_match("/^[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ\s-]*$/",$nom))
                    {
                        if(preg_match("/^[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ\s-]*$/",$prenom))
                        {
                                if(preg_match("/^[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ\s-]*$/", $pays))
                                {
                                        if(preg_match("/^[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇnÉÈÊËÎÏÔŒÙÛÜŸ\s-]*$/", $ville))
                                        {
                                            if(preg_match("/^[0-9]{5}$/", $cp))
                                            {
                                                if(preg_match("/^0[0-9]([-. ]?\d{2}){4}[-. ]?$/", $tel))
                                                {
                                                    $tel = str_replace(".","", $tel);
                                                    $tel = str_replace("-","", $tel);
                                                    $tel = str_replace(" ","", $tel);

                                                    $reqtel = $bdd->prepare("SELECT * FROM Utilisateurs WHERE Numero = ?");
                                                    $reqtel->execute(array($tel));
                                                    $telexit = $reqtel->rowCount();
                                                    if($telexit == 0)
                                                    {
                                                        $inserer = "INSERT INTO Utilisateurs(Nom, Prenom, Email, Numero, Password, Date_de_naissance, Ville, Adresse, Code_postale, Pays, Sexe, Date_creation, Date_modification) VALUES (:Nom, :Prenom, :Email, :Numero, :Password, :Date_de_naissance, :Ville, :Adresse, :Code_postale, :Pays, :Sexe, NOW(), NOW())";
                                                        $reqajout = $bdd->prepare($inserer);
                                                        $reqajout->bindValue(':Nom', $nom, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Prenom', $prenom, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Email', $email, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Numero', $tel, PDO::PARAM_INT);
                                                        $reqajout->bindValue(':Password', $mdp, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Date_de_naissance', $datenaissance, PDO::PARAM_INT);
                                                        $reqajout->bindValue(':Ville', $ville, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Adresse', $adresse, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Code_postale', $cp, PDO::PARAM_INT);
                                                        $reqajout->bindValue(':Pays', $pays, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Sexe', $sexe, PDO::PARAM_STR);
                                                        $reqajout->execute() or die(print_r($reqajout->errorInfo()));
                                                        $message = "Inscription réussie !";
                                                        header("Location: index.php", 5);
                                                    }
                                                    else
                                                    $message = "Le numéro de téléphone est déja utilisé";
                                                }
                                                else
                                                    $message = "Le format du numéro de téléphone n'est pas valide";
                                            }
                                            else
                                                $message = "Le format du code postale n'est pas valide";
                                        }
                                        else
                                            $message = "Le format du nom de la ville n'est pas valide";

                                }
                                else
                                    $message = "Le format du nom du pays n'est pas valide";
                    }
                    else
                        $message = "Le format du prénom n'est pas valide";
                }
                else
                    $message = "Le format du nom n'est pas valide";
            }
            else
                $message = "Le mail est déja utilisé";
        }
        else
            $message = "Veuillez remplir tout les champs";
    }
    else
        $message = "Tout les champs doivent etre remplis";
}
 require_once("partials/head.php");
?>
    <link rel="stylesheet" href="assets/styles/inscription.css">
    <!-- fin header -->
    <section class="main">
        <div class="bloc">
            <div class="ligne">
                <div class="colonne">
                    <div class="pannel">
                        <div class="pannel-head">
                            <h3 class="h3">Inscris-toi</h3>
                        </div>
                        <?php if(isset($message)) echo "<div class='erreurs'>$message</div>"; ?>
                        <div class="pannel-body">
                            <form class="form" role="form" action="" method="post">
                                <div class="element-form">
                                    <label>Nom</label><br>
                                    <input type="text" class="form-input" name="nom" value="<?php if(isset($nom)) {echo $nom; } ?>" required><br><br>
                                </div>
                                <div class="element-form">
                                    <label>Prenom</label><br>
                                    <input type="text" class="form-input" name="prenom" value="<?php if(isset($prenom)) {echo $prenom; } ?>" required><br><br>
                                </div>
                                <div class="element-form">
                                    <label>Sexe</label><br>
                                    <select name="sexe" id="selectsexe" required>
                                            <option value="Homme">Homme</option>
                                            <option value="Femme">Femme</option>
                                        </select><br><br>
                                </div>
                                <div class="element-form">
                                    <label>Date de naissance</label><br>
                                    <input type="date" class="form-input" name="datenaissance" value="<?php if(isset($datenaissance)) {echo $datenaissance; } ?>" required><br><br>
                                </div>
                                <div class="element-form">
                                    <label>Email</label><br>
                                    <input type="email" class="form-input" name="email" value="<?php if(isset($email)) {echo $email; } ?>" required><br><br>
                                </div>
                                <div class="element-form">
                                    <label>Mot de passe</label><br>
                                    <input type="password" class="form-input" name="mdp" required><br><br>
                                </div>
                                <div class="element-form">
                                    <label>Pays</label><br>
                                    <input type="text" class="form-input" name="pays" value="<?php if(isset($pays)) {echo $pays; } ?>" required><br><br>
                                </div>
                                <div class="element-form">
                                    <label>Adresse</label><br>
                                    <input type="text" class="form-input" name="adresse" value="<?php if(isset($adresse)) {echo $adresse; } ?>" required><br><br>
                                </div>
                                <div class="element-form">
                                    <label>Ville</label><br>
                                    <input type="text" class="form-input" name="ville" value="<?php if(isset($ville)) {echo $ville; } ?>" required><br><br>
                                </div>
                                <div class="element-form">
                                    <label>Code Postal</label><br>
                                    <input type="text" class="form-input" name="cp" value="<?php if(isset($cp)) {echo $cp; } ?>" required><br><br>
                                </div>
                                <div class="element-form">
                                    <label>Telephone</label><br>
                                    <input type="tel" class="form-input" name="tel" value="<?php if(isset($tel)) {echo $tel; } ?>" required><br><br>
                                </div>
                                <button type="submit" class="boutton-submit" name="submitform">Envoyer</button>
                                <button type="button" class="boutton-lien"><span class="span">Vous avez deja un compte?</span> <a href="index.php?p=connexion" class="butco">Connectez-vous</a></button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>
    <?php require_once("partials/foot.php"); ?>
