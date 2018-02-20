<?php include("config.php"); include("head.php"); ?>
<?php

function upload_img($name, $url, $nom){
    
    if(!is_dir($url)){ mkdir($url); }
    
    // On regarde si il y'a des erreurs de transfert 
    if ($_FILES[$name]['error'] > 0) $erreur = "Erreur lors du transfert";

    // On regarde si la taille du ficher est supérieur à 3mo
    if ($_FILES[$name]['size'] > 3000000) $erreur = "Le fichier est trop gros";

    // On définit les extensions valides
    $extensions_valides = array('jpg','jpeg','gif','png');

    // On récupére l'extension du fichier
    $extension_upload = strtolower(  substr(  strrchr($_FILES[$name]['name'],'.'),1)  );

    // On regarde si l'extension récupérer est valide
    if (in_array($extension_upload,$extensions_valides) ){

        $chemin = $url . $nom . ".jpg";
        // On modifie le nom du fichier et on le déplace dans le dossier assoucié
        $resultat = move_uploaded_file($_FILES[$name]['tmp_name'], $chemin);
    }
    
}


if (isset($_POST['formnews'])) 
{
	$titreS = htmlspecialchars($_POST['titre']);
	$auteurS = htmlspecialchars($_POST['auteur']);
	$resume = htmlspecialchars($_POST['contenu']);
    $presentation = htmlspecialchars($_POST['prensentation']);
    $para1 = htmlspecialchars($_POST['c1']);
    $para2 = htmlspecialchars($_POST['c2']);
    $para3 = htmlspecialchars($_POST['c3']);
    $role = htmlspecialchars($_POST['role']);
    $dateS = htmlspecialchars($_POST['date']);
    
        if(!empty($_POST['date']))
        {
            if(strlen($para1) >= 100 AND strlen($para2) >= 100 AND strlen($para3) >= 100 AND strlen($resume) >= 100)
            {
                $query = "INSERT INTO articles VALUES('', '$titreS', '$auteurS', '$resume', '$para1', '$para2', '$para3', '$presentation', '$role', '$dateS')";

                $inserernews = $bdd -> query($query);
                $lastid = $bdd->lastInsertId();

                $url = "azerty/";
                upload_img('img_couv', $url, $lastid.'-couv');
                upload_img('img_un', $url, $lastid."-1");
                upload_img('img_deux', $url, $lastid."-2");

                echo "<div class='annonceajout'> News ajouter !</div>";
                }else
            $erreur = "Vous devez ecrire au moins 100 mots, je sais c'est chiant mais c'est pour la beauté de mon site";
                
        }
        else
                $erreur = "Vous devez choisir une date pour vous faire chier xD";
  
    
}
?>
        <link rel="stylesheet" href="css/bootstrap-3.3.7-dist/css/bootstrap.css">
        <link rel="stylesheet" href="css/ajoutnews.css">
        <div class="centrerlestruc">
            <div class="titreajout">
                <h1>Ajouter News</h1>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <input type="text" name="titre" placeholder="Titre">
                </div>
                <hr>
                <div>
                    <input type="text" name="auteur" placeholder="Auteur">
                </div>
                                <hr>

                <div>
                    <textarea name="contenu" placeholder="Resumé Rapide, 100 mots pour faire plus jolie"></textarea>
                </div>
                                <hr>

                <div>
                    <textarea name="presentation" placeholder="Presentation"></textarea>
                </div>
                                <hr>

                <div>
                    <textarea name="c1" placeholder="Paragraphe 1, 100 mots pour faire plus jolie"></textarea>
                </div>
                                <hr>

                <div>
                    <textarea name="c2" placeholder="Paragraphe 2, 100 mots pour faire plus jolie"></textarea>
                </div>
                                <hr>

                <div>
                    <textarea name="c3" placeholder="Paragraphe 3, 100 mots pour faire plus jolie"></textarea>
                </div>
                                <hr>

                <div>
                    <textarea name="role" placeholder="Role du personnage"></textarea>
                </div>
                                <hr>

                <div>
                    <input type="date" name="date" placeholder=" Date de difusion">
                </div>
                                <hr>

                <div>Image de couverture : 
                    <input type="file" name="img_couv">
                </div>
                                <hr>

                <div>Image 1 dans le post :
                    <input type="file" name="img_un">
                </div>
                                <hr>

                <div>Image 2 dans le post :
                    <input type="file" name="img_deux">
                </div>
                                      <hr>

                       <div>
                    <input type="submit" value="Ajouter" name="formnews">
                </div>
            </form>
            <?php if(isset($erreur)) echo $erreur; ?>
        </div>
        <?php 
	include("footer.php"); ?>
                <div>