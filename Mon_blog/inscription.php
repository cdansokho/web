<?php
     require_once("config.php");

    if (isset($_POST['submit']))
    {
        if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['mdp']))
        {
            $pseudo = htmlspecialchars(htmlentities($_POST['pseudo']));
            $email = htmlspecialchars(htmlentities($_POST['email']));
            $mdp = htmlspecialchars(htmlentities(sha1($_POST['mdp'])));
            
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $reqemail = $bdd->prepare("SELECT * FROM users WHERE email = ?");
                $reqemail->execute(array($email));
                $mailexit = $reqemail->rowCount();
                if($mailexit == 0)
                {
                    $inserer = "INSERT INTO users(pseudo, email, mdp) VALUE(:pseudo, :email, :mdp)";
                    $reqajout = $bdd->prepare($inserer);
                    $reqajout->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
                    $reqajout->bindValue(':email', $email, PDO::PARAM_STR);
                    $reqajout->bindValue(':mdp', $mdp, PDO::PARAM_STR);
                    $reqajout->execute() or die(print_r($reqajout->errorInfo()));
                    header("Location: connexion.php");
                }
                else
                    $message = "Cette email est deja utilisé";
            }
            else
                $message = "Email non valide !";
        }
        else
            $message = "Veuillez remplir tout les champs";
    }
?>
    <link rel="stylesheet" href="css/inscss.css">
    <div class="centre">
        <div class="formco">
            <div class="leform">
                <div class="titreco">
                    <h1>Inscrit toi</h1>
                    <h3>On t'attend !</h3>
                </div>
                <div class="styleinput">
                    <form action="" method="post" name="connxionform">
                        <div class="inp1"><input type="text" placeholder="Entrez un Pseudo" name="pseudo" value="<?php if(isset($pseudo)) {echo $pseudo; } ?>"></div>
                        <div class="inp1"><input type="email" placeholder="Entrez votre mail" name="email" value="<?php if(isset($email)) {echo $email; } ?>"></div>
                        <div class="inp1"><input type="password" placeholder="Mot de passe" name="mdp"></div>
                        <?php
                            if(isset($message))
                                echo "<div class='message'>$message</div>";
                        ?>
                            <div><button type="submit" name="submit" class="buton">S'enrigistrez</button></div>
                            <div class="retour"><a href="index.php">Retour page d'acceuil</a> ou deja inscrit ? <a href="connexion.php"> Se connecter</a></div>
                    </form>
                </div>
            </div>
            <div class="imgco"></div>
        </div>
    </div>