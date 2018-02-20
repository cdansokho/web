<?php
  if(!isset($_GET['id'])) {
	header("Location: index.php");
}else{
    if(is_numeric($_GET['id']))
    {
        $ida = intval($_GET['id']);
    }
    else
        header("Location: index.php");
}
require_once("config.php");
$demande = $bdd->query('SELECT * FROM articles WHERE id ="'.$ida.'"');
$reponse = $demande->fetch();
if(isset($_POST['submit']))
    {
        if(!empty($_POST['titre']) and !empty($_POST['present']) and !empty($_POST['contenu']))
        {
            $titre = htmlspecialchars(htmlentities($_POST['titre']));
            $present = htmlspecialchars(htmlentities($_POST['present']));
            $contenu = htmlspecialchars(htmlentities($_POST['contenu']));
            
            $req = "UPDATE articles SET titre = :titre, presentation = :present, contenu = :contenu WHERE id=$ida";
            $insertart = $bdd->prepare($req);
            $insertart->bindValue(':titre', $titre, PDO::PARAM_STR);
            $insertart->bindValue(':present', $present, PDO::PARAM_STR);
            $insertart->bindValue(':contenu', $contenu, PDO::PARAM_STR);
            $insertart->execute() or die(print_r($insertart->errorInfo()));
            
            $url = "azerty/";
            upload_img('img_couv', $url, $ida.'-couv');
            upload_img('img_un', $url, $ida."-1");
            $message = "Mise à jour effectué ! <a href=\"index.php\">Retour</a>";
        }
        else
            $message = "Veuillez remplir tout les champs";
    }
?>
    <link rel="stylesheet" href="css/modifart.css">
    <body>
        <div class="centre">
            <div class="espace"></div>
            <form action="" method="post" enctype="multipart/form-data" class="formajout">
               <div>
                <h1>Ajouter un article </h1>
            </div>
                <div><input type="text" name="titre" value="<?php echo $reponse['titre'];?>"></div>
                <div><input type="text" name="present" value="<?php echo $reponse['presentation'];?>"></div>
                <div><textarea name="contenu" ><?php echo $reponse['contenu'];?></textarea></div>
                <div class="fich"><input type="file" name="img_couv" placeholder="Image de couverture"></div>
                <div><input type="file" name="img_un" placeholder="Image de couverture"></div>
                <?php
                    if(isset($message))
                        echo "<div class='message'>$message</div>";
                ?>
                <div class="envoi"><input type="submit" name="submit" value="Mettre à jour"></div>
            </form>
        </div>
    </body>