<?php
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=Blog;charset=utf8', 'root', 'root'); 
    }catch(Exception $e){
        echo "Erreur de connexion a la BDD ! <br> <br>";
        die();
    }

    session_start();

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
?>