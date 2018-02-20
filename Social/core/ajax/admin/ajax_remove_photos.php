<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

if(isset($_POST['idp']) && !empty($_POST['idp'])){

    $idP = (int) $_POST['idp']; 
    $idU = getSESSIONID(); 

    $r1 = $bdd->query('DELETE FROM photos WHERE id_photo = ' . $idP);
    $r2 = $bdd->query('DELETE FROM lier_photos WHERE id_photo = ' . $idP);

    if($r1 && $r2){

      unlink('../../../images/photos/' . $idU . '/' . $idP . '.jpg');

      echo "La photo a été supprimée !";

    }else{ $erreur = 'Une erreur est survenu !'; }
}else{ $erreur = 'Erreur une donnée est manquante ! idp'; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }