<?php 
    include("config.php");   
    if(isset($_POST['formco']))
    {
        if(!empty($_POST['mail']) and !empty($_POST['mdp']))
        {
            $mail = htmlspecialchars($_POST['mail']);
            $mdp = sha1($_POST['mdp']);
            
            $requsers = $bdd->query("SELECT * FROM users WHERE(mail = '$mail' AND motdepasse = '$mdp')");
            $verifuser = $requsers->rowCount();
            
            if($verifuser != 0)
            {
                $userinfo = $requsers->fetch(PDO::FETCH_ASSOC);
				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['pseudo'] = $userinfo['pseudo'];
				$_SESSION['mail'] = $userinfo['mail'];
                $_SESSION['lvl'] = $userinfo['lvl'];
	            header('Location: index.php');
            }
            else
                $erreur="Le mail ou le mot de passe ne correspond pas";
        }
        else
            $erreur="Tout les champs doivent etres remplies";
    }
include("head.php");
?>
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/concss.css">

    <div class="formco">
        <div class="titinscrip">
            <h2>Connexion</h2>
        </div>
        <form action="" method="post" class="formdeconnexion">
            <div><span class="glyphicon glyphicon-envelope spaninscrip"> <input type="email" name="mail" placeholder="Entrez votre mail" id="costumail"></span></div>
            <div><span class="glyphicon glyphicon-lock spaninscrip"> <input type="password" name="mdp" placeholder="Saissisez votre mot de passe" id="costummdp"></span></div>
            <input type="submit" name="formco" value="Connexion" id="boutoncoxion">
            <div>Pas encore inscrit ?<a href="inscription.php"> S'inscrire</a></div>
            <?php if (isset($erreur)) echo "<div>".$erreur."</div>"; ?>
        </form>
    </div>

    <?php include("footer.php"); ?>