<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

if(isset($_POST['idRep']) && !empty($_POST['idRep'])){

    $idRep = (int) $_POST['idRep']; 
    $r1 = $bdd->query('DELETE FROM reponses WHERE id = ' . $idRep);

    if($r1){
    	
      echo "La réponse a été supprimée !";

    }else{ $erreur = 'Une erreur est survenu !'; }
}else{ $erreur = 'Erreur une donnée est manquante ! idRep'; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }