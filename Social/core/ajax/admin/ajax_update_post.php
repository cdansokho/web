<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

if(isset($_POST['idp']) && !empty($_POST['idp'])){
  if(isset($_POST['newContent']) && !empty($_POST['newContent'])){

    $idp = (int) $_POST['idp'];
    $newContent = parseForEditing($_POST['newContent']);
    
    $r1 = $bdd->query('UPDATE posts SET message = "'.$newContent.'" WHERE id_p = ' . $idp);

    if($r1){

      echo "Le post à été modifié !";

    }else{ $erreur = 'Une erreur est survenu !'; }

  }else{ $erreur = 'Erreur une donnée est manquante ! newContent'; }
}else{ $erreur = 'Erreur une donnée est manquante ! idp'; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }