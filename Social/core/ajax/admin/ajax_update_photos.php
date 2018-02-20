<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

if(isset($_POST['idp']) && !empty($_POST['idp'])){
  if(isset($_POST['newTitle']) && !empty($_POST['newTitle'])){

    $idp = (int) $_POST['idp'];
    $newTitle = $_POST['newTitle'];
    
    $r1 = $bdd->query('UPDATE photos SET nom_photo = "'.$newTitle.'" WHERE id_photo = ' . $idp);

    if($r1){

      echo "Le nom de la photo à été modifié !";

    }else{ $erreur = 'Une erreur est survenu !'; }

  }else{ $erreur = 'Erreur une donnée est manquante ! newTitle'; }
}else{ $erreur = 'Erreur une donnée est manquante ! idp'; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }