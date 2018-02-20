<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

if(isset($_POST['idp']) && !empty($_POST['idp'])){

    $idp = (int) $_POST['idp']; 
    $r1 = $bdd->query('DELETE FROM posts WHERE id_p = ' . $idp);

    if($r1){
    	
      echo "Le post a été supprimée !";

    }else{ $erreur = 'Une erreur est survenu !'; }
}else{ $erreur = 'Erreur une donnée est manquante ! idp'; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }