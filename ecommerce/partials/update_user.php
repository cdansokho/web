<?php
    if(isset($_GET['id']))
        $idU = $_GET['id'];
    else
        header("Location: index.php?admin,");
    $requsers = $bdd->prepare("SELECT * FROM Utilisateurs WHERE ID = $idU");
    $requsers->execute();
    $infousers = $requsers->fetch();
    $requsers->closeCursor();
    if(isset($_POST['submitform']))
    {
        if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['numero']) AND !empty($_POST['dateN']) AND !empty($_POST['ville']) AND !empty($_POST['adresse']) AND !empty($_POST['cp']) AND !empty($_POST['pays']) AND !empty($_POST['sexe']))
        {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $sexe = htmlspecialchars($_POST['sexe']);
            $dateN = htmlspecialchars($_POST['dateN']);
            $email = htmlspecialchars($_POST['email']);
            if(isset($_POST['mdp']) AND !empty($_POST['mdp']))
                $mdp = hash('sha512', $_POST['mdp']);
            $pays = htmlspecialchars($_POST['pays']);
            $adresse = htmlspecialchars($_POST['adresse']);
            $ville = htmlspecialchars($_POST['ville']);
            $cp = htmlspecialchars($_POST['cp']);
            $tel = htmlspecialchars($_POST['numero']);

            if(filter_var($email, FILTER_VALIDATE_EMAIL))
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

                                                    if(isset($_POST['mdp']) AND !empty($_POST['mdp']))
                                                    {
                                                        $inserer = "UPDATE Utilisateurs SET Nom = :Nom, Prenom = :Prenom, Email = :Email, Numero = :Numero, Password = :Password, Date_de_naissance = :Date_de_naissance, Ville = :Ville, Adresse = :Adresse, Code_postale = :Code_postale, Pays = :Pays, Sexe = :Sexe,	Date_modification = NOW() WHERE ID = $idU";
                                                        $reqajout = $bdd->prepare($inserer);
                                                        $reqajout->bindValue(':Nom', $nom, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Prenom', $prenom, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Email', $email, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Numero', $tel, PDO::PARAM_INT);
                                                        $reqajout->bindValue(':Password', $mdp, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Date_de_naissance', $dateN, PDO::PARAM_INT);
                                                        $reqajout->bindValue(':Ville', $ville, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Adresse', $adresse, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Code_postale', $cp, PDO::PARAM_INT);
                                                        $reqajout->bindValue(':Pays', $pays, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Sexe', $sexe, PDO::PARAM_STR);
                                                        $reqajout->execute() or die(print_r($reqajout->errorInfo()));
                                                        header("Location: index.php?p=admin&update=success");
                                                    }
                                                    else
                                                    {
                                                        $inserer = "UPDATE Utilisateurs SET Nom = :Nom, Prenom = :Prenom, Email = :Email, Numero = :Numero, Date_de_naissance = :Date_de_naissance, Ville = :Ville, Adresse = :Adresse, Code_postale = :Code_postale, Pays = :Pays, Sexe = :Sexe,	Date_modification = NOW() WHERE ID = $idU";
                                                        $reqajout = $bdd->prepare($inserer);
                                                        $reqajout->bindValue(':Nom', $nom, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Prenom', $prenom, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Email', $email, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Numero', $tel, PDO::PARAM_INT);
                                                        $reqajout->bindValue(':Date_de_naissance', $dateN, PDO::PARAM_INT);
                                                        $reqajout->bindValue(':Ville', $ville, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Adresse', $adresse, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Code_postale', $cp, PDO::PARAM_INT);
                                                        $reqajout->bindValue(':Pays', $pays, PDO::PARAM_STR);
                                                        $reqajout->bindValue(':Sexe', $sexe, PDO::PARAM_STR);
                                                        $reqajout->execute() or die(print_r($reqajout->errorInfo()));
                                                        header("Location: index.php?p=admin&update=success");
                                                    }
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
            $message = "Format du mail non valide";
    }
    else
        $message = "Tout les champs doivent être remplis";
}
require_once("partials/head.php");

?>
    <link rel="stylesheet" href="assets/styles/profile.css">
    <div class="contre">
        <div class="blockprof">
            <div class="titprof">
                <h2>Profil</h2>
            </div>
            <div class="blockbas">
                <div class="blockgauche">
                    <div class="blockphotos">
                        <img src="<?php echo $infousers['Path_image']; ?>" alt="avatar">
                    </div>
                </div>
                <div class="blockdroite">
                    <?php if(isset($message)) echo "<div class='erreurs'>$message</div>"; ?>
                    <form action="" method="post">
                        <div class="ligne">
                            <label for="">Nom</label>
                            <div class="blockinput"><input type="text" value="<?= $infousers['Nom'];?>" class="inputform" name="nom" required></div>
                        </div>
                        <div class="ligne">
                            <label for="">Prénom</label>
                            <div class="blockinput"><input type="text" value="<?= $infousers['Prenom'];?>" class="inputform" name="prenom" required></div>
                        </div>
                        <div class="ligne">
                            <label for="">Email</label>
                            <div class="blockinput"><input type="emailx" value="<?= $infousers['Email'];?>" class="inputform" name="email" required></div>
                        </div>
                        <div class="ligne">
                            <label for="">Numero</label>
                            <div class="blockinput"><input type="text" value="<?= $infousers['Numero'];?>" class="inputform" name="numero" required></div>
                        </div>
                        <div class="ligne">
                            <label for=""> New Password</label>
                            <div class="blockinput"><input type="password" name="mdp"></div>
                        </div>
                        <div class="ligne">
                            <label for="">Date de naissance</label>
                            <div class="blockinput"><input type="date" value="<?= $infousers['Date_de_naissance'];?>" class="inputform" name="dateN" required></div>
                        </div>
                        <div class="ligne">
                            <label for="">Ville</label>
                            <div class="blockinput"><input type="text" value="<?= $infousers['Ville'];?>" class="inputform" name="ville" required></div>
                        </div>
                        <div class="ligne">
                            <label for="">Adresse</label>
                            <div class="blockinput"><input type="text" value="<?= $infousers['Adresse'];?>" class="inputform" name="adresse" required></div>
                        </div>
                        <div class="ligne">
                            <label for="">Code postale</label>
                            <div class="blockinput"><input type="text" value="<?= $infousers['Code_postale'];?>" class="inputform" name="cp" required></div>
                        </div>
                        <div class="ligne">
                            <label for="">Pays</label>
                            <div class="blockinput"><input type="text" value="<?= $infousers['Pays'];?>" class="inputform" name="pays" required></div>
                        </div>
                        <div class="ligne">
                            <label>Sexe</label>
                            <div class="blockinput">
                                <select name="sexe" id="selectsexe" required>
                                <option value="Homme">Homme</option>
                                <option value="Femme">Femme</option>
                            </select></div>
                        </div>
                        <div class="blockbouton">
                            <div class="but"><button type="submit" class="lebouton" name="submitform">Mettre à jour</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once("partials/foot.php"); ?>