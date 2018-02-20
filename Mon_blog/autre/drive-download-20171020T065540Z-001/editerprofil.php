<?php
include("config.php"); include("head.php");


if(!isset($_SESSION['id'])) {
	header("Location: connexion.php");
}else
	$id_get = intval($_SESSION['id']);
?>
    <?php
if(isset($_POST['formaj']))
{
    if(!empty($_POST['npseudo']) and !empty($_POST['nmail']) and !empty($_POST['nmail2']) and !empty($_POST['nmdp']) and !empty($_POST['nmdp2']))
    {
        $npseudo = htmlspecialchars($_POST['npseudo']);
        $nmail = htmlspecialchars($_POST['nmail']);
        $nmail2 = htmlspecialchars($_POST['nmail2']);
        $nmdp = sha1($_POST['nmdp']);
        $nmdp2 = sha1($_POST['nmdp2']);
        $nmdp_d = $_POST['nmdp'];
        $nmdp2_d = $_POST['nmdp2'];

        if($nmail == $nmail2)
        {
            if($nmdp == $nmdp2)
            {
                $id_s = $_SESSION['id'];
                $requsers = $bdd->query("SELECT * FROM users WHERE id = '$id_s'");
                $reponse = $requsers->fetch();
                
                if($_POST['npeudo'] != $reponse['pseudo'] or $_POST['nmail'] != $reponse['mail'] or $_POST['nmdp'] != $reponse['motdepasse'])
                {
                    $insererlesinfoschanger = $bdd->query("UPDATE users SET pseudo = '$npseudo', mail = '$nmail', motdepasse = '$nmdp' WHERE id = '$id_s'");
                    $erreur ="Vos informations ont été mis à jours, <a href='profil.php?id=".$id_s."'>Retours</a>";
                }
            }
            else
                $erreur = "Les mot de passe ne corresponde pas";
        }
        else
            $erreur = "Les mails ne corressponde pas";
    }
    else
        $erreur ="Tout les champs doivent etres remplies";
}
?>
        <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" href="css/modifierprofil.css">
        <div class="cntrer">
            <div class="titremodif">
                <h1>Modification de mon profil</h1></div>
            <div class="formdomif">
                <form action="" method="post">
                    <div class="inputclass">
                        <input type="text" name="npseudo" placeholder="<?php echo $_SESSION['pseudo'] ?>" value="<?php echo $reponse['pseudo']; ?>">
                    </div>
                    <hr>
                    <div class="inputclass">
                        <input type="email" name="nmail" placeholder="<?php echo $_SESSION['mail'] ?>" value="<?php echo $reponse['mail']; ?>">
                    </div>
                    <hr>

                    <div class="inputclass">
                        <input type="email" name="nmail2" placeholder="<?php echo $_SESSION['mail']; ?>" value="<?php echo $reponse['mail']; ?>">
                    </div>
                    <hr>

                    <div class="inputclass">
                        <input type="password" name="nmdp" placeholder="nouveau mot de passe" value="<?php echo $nmdp_d; ?>">
                    </div>
                    <hr>

                    <div class="inputclass">
                        <input type="password" name="nmdp2" placeholder="confirmer mot de passe" value="<?php echo $nmdp2_d; ?>">
                    </div>
                    <hr>

                    <input type="submit" value="Mettre à jours" name="formaj" class="">
                </form>
            </div>

        </div>

        <?php if(isset($erreur))  echo $erreur; ?>
            <?php include("footer.php"); ?>