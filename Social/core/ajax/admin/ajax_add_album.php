<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

if(isset($_POST['nomAlbum']) && !empty($_POST['nomAlbum'])){

    $idU = getSESSIONID();
    $nomAlbum = $_POST['nomAlbum'];
    
    $q = $bdd->prepare('INSERT INTO albums (id_author, nom_album) VALUES (:id_author, :nom_album)');
    $q->execute(array(
      'id_author' => $idU ,
      'nom_album' => $nomAlbum 
    ));

    if($q){

      echo "L'album à bien été ajouté !";

    }else{ $erreur = 'Une erreur est survenu !'; }

}

if(isset($erreur) && !empty($erreur)){ echo $erreur; }