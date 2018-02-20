<?php
    require_once("config.php");
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['email']) AND !empty($_POST['mdp']))
        {
            $email = htmlspecialchars(htmlentities($_POST['email']));
            $mdp = htmlspecialchars(htmlentities(sha1($_POST['mdp'])));
            
            $req = "SELECT * FROM users WHERE email = :email AND mdp = :mdp";
            $reqco = $bdd->prepare($req);
            $reqco->bindValue(':email', $email, PDO::PARAM_STR);
            $reqco->bindValue(':mdp', $mdp, PDO::PARAM_STR);
            $reqco->execute() or die(print_r($reqco->errorInfo()));            
            if($verif = $reqco->fetch())
            {
                $_SESSION['co'] = true;
                $_SESSION['id'] = $verif['id'];
                $_SESSION['pseudo'] = $verif['pseudo'];
                $_SESSION['email'] = $verif['email'];
                $_SESSION['lvl'] = $verif['lvl'];
                header("Location: index.php");
            }
            else 
                $message = "Le mail ou le mot de passe ne corresponde pas";
        }
        else
            $message = "Veuillez remplir tout les champs";
    }
?>
<link rel="stylesheet" href="css/cocss.css">
<div class="centre">
    <div class="formco">
        <div class="leform">
            <div class="titreco">
                <h1>Connecte toi</h1>
                <h3>On t'attend !</h3>
            </div>
            <div class="styleinput">
                <form action="" method="post" name="connxionform">
                    <div class="inp1"><input type="text" placeholder="Entrez votre mail" name="email" value="<?php if(isset($email)) {echo $email; } ?>"></div>
                    <div class="inp1"><input type="password" placeholder="Mot de passe" name="mdp"></div>
                    <?php
                        if(isset($message))
                            echo "<div class='message'>$message</div>";
                    ?>
                    <div><button type="submit" name="submit" class="buton">Connexion</button></div>
                    <div class="retour"><a href="index.php">Retour page d'acceuil</a> ou <a href="inscription.php">S'enregistrez</a></div>
                </form>
            </div>
        </div>
        <div class="imgco"></div>

    </div>
</div>