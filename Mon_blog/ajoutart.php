<?php
    include("config.php"); 
    
    if(isset($_POST['submit']))
    {
        if(!empty($_POST['titre']) and !empty($_POST['present']) and !empty($_POST['contenu']))
        {
            $titre = htmlspecialchars(htmlentities($_POST['titre']));
            $auteur = $_SESSION['pseudo'];
            $present = htmlspecialchars(htmlentities($_POST['present']));
            $contenu = htmlspecialchars(htmlentities($_POST['contenu']));
            $req = "INSERT INTO articles(titre, auteur, presentation, contenu) VALUE(:titre, :auteur, :present, :contenu)";
            $insertart = $bdd->prepare($req);
            $insertart->bindValue(':titre', $titre, PDO::PARAM_STR);
            $insertart->bindValue(':auteur', $auteur, PDO::PARAM_STR);
            $insertart->bindValue(':present', $present, PDO::PARAM_STR);
            $insertart->bindValue(':contenu', $contenu, PDO::PARAM_STR);
            $insertart->execute() or die(print_r($insertart->errorInfo()));
            
            $lastid = $bdd->lastInsertId();
            $url = "azerty/";
            upload_img('img_couv', $url, $lastid.'-couv');
            upload_img('img_un', $url, $lastid."-1");
            $message = "Ajouter ! <a href=\"index.php\">Retour</a>";
        }
        else
            $message = "Veuillez remplir tout les champs";
    }
?>
    <link rel="stylesheet" href="css/ajoutart.css">
    <body>
        <div class="centre">
            <div class="espace"></div>
            <form action="" method="post" enctype="multipart/form-data" class="formajout">
               <div>
                <h1>Ajouter un article</h1>
            </div>
                <div><input type="text" name="titre" placeholder="Le titre de l'article"></div>
                <div><input type="text" name="present" placeholder="Bref presentation"></div>
                <div><textarea name="contenu" placeholder="Contenu"></textarea></div>
                <div>Immage de couverture :</div>
                <div class="fich"><input type="file" name="img_couv" placeholder="Image de couverture"></div>
                <div>Immage dans contenu :</div>
                <div><input type="file" name="img_un" placeholder="Image de couverture"></div>
                <?php
                    if(isset($message))
                        echo "<div class='message'>$message</div>";
                ?>
                <div><a href="index.php">Retour</a></div>

                <div class="envoi"><input type="submit" name="submit" value="Créer"></div>
            </form>
        </div>
    </body>