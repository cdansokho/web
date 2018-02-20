<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

if(isset($_POST['idA']) && !empty($_POST['idA'])){

    $idA = (int) $_POST['idA']; 
    $idU = getSESSIONID(); 

    $r1 = $bdd->query('DELETE FROM albums WHERE id_album = ' . $idA);
    $r2 = $bdd->query('DELETE FROM lier_photos WHERE id_album = ' . $idA);

    if($r1 && $r2){
    	
      echo "L'album a été supprimée !";

    }else{ $erreur = 'Une erreur est survenu !'; }
}else{ $erreur = 'Erreur une donnée est manquante ! idA'; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }