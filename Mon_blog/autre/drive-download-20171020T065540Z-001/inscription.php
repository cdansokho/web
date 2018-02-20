<?php 
    include("config.php");  include("head.php"); 


    if(isset($_POST['forminscrip']))
    {
        if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']))
        {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mail = htmlspecialchars($_POST['mail']);
            $mail2 = htmlspecialchars($_POST['mail2']);
            $mdp = sha1($_POST['mdp']);
            $mdp2 = sha1($_POST['mdp2']);
            $mdp_d = $_POST['mdp'];
            $mdp2_d = $_POST['mdp2'];
            
             if($mail == $mail2)
                        {
                            if($mdp == $mdp2)
                            {
                                $reqmail = $bdd -> prepare("SELECT * FROM users WHERE mail = ?"); 
                                $reqmail -> execute(array($mail));
                                $existdeja = $reqmail ->rowCount();

                                if($existdeja == 0)
                                {
                                    $insertdansusers = $bdd -> prepare ("INSERT INTO users(pseudo, mail, motdepasse) VALUES(?, ?, ?)");
                                    $insertdansusers -> execute(array($pseudo, $mail, $mdp));
                                    $erreur = "Votre compte a bien été crée ! <a href='connexion.php'>Se connecter<a/>";

                                }
                                else
                                    $erreur ="Ce mail est déja utilisé";
                            }
                            else
                                $erreur ="Les mots de passe ne correspondent pas";
                        }
                        else
                            $erreur ="Les mails ne correspondent pas";
        }
        else
             $erreur ="Tout les champs doivent êtres remplies";
    }
?>
    <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/cssinscription.css">
    <div class="registration">
        <div class="titinscrip">
            <h2>Création de compte</h2></div>
        <form action="" method="post" enctype="multipart/form-data" class="formulaireinscription">
            <fieldset>
                <div><span class="glyphicon glyphicon-user spaninscrip"> <input type="text" name="pseudo" placeholder="Entrez un pseudo" value="<?php if(isset($pseudo)) {echo " $pseudo ";} ?>"></span></div>

                <div><span class="glyphicon glyphicon-envelope spaninscrip"> <input type="email" name="mail" placeholder="Entrez un mail" value="<?php if(isset($mail)) {echo " $mail ";} ?>"></span></div>

                <div><span class="glyphicon glyphicon-envelope spaninscrip"> <input type="email" name="mail2" placeholder="Confirmez votre mail" value="<?php if(isset($mail2)) {echo " $mail2 ";} ?>"></span></div>

                <div><span class="glyphicon glyphicon-lock spaninscrip"> <input type="password" name="mdp" placeholder="Saisisez un mot de passe" value="<?php if(isset($mdp)) {echo " $mdp_d ";} ?>"></span></div>

                <div><span class="glyphicon glyphicon-lock spaninscrip"> <input type="password" name="mdp2" placeholder="Confirmez votre mot de passe" value="<?php if(isset($mdp2)) {echo " $mdp2_d ";} ?>"></span></div>

                <input type="submit" value="Valider" name="forminscrip">
                <div>Déja Inscrit ?<a href="connexion.php"> Connecte toi</a></div>

            </fieldset>
        </form>
    </div>
    <?php 
    if (isset($erreur)) 
    {
        echo 'class ="message"'$erreur'</class>';
    }
include("footer.php");
?>