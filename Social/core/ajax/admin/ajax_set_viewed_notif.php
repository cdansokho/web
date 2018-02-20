<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

if(isset($_POST['id_n']) && !empty($_POST['id_n'])){
  if(isset($_POST['val']) && !empty($_POST['val'])){

      $id_n = $_POST['id_n'];
      $val = (int) $_POST['val'];

      $val = ($val == 2 ) ? '0' : $val ;

      echo $requete = "UPDATE notifications SET viewed = $val WHERE id_n = $id_n";
      $requete = $bdd->query($requete);

      if($requete){

        echo 'ok';
        
      }else{
        $erreur = "Une erreur est survenu ! :(";
      }

  }else{ $erreur = "Erreur, une données est manquante ! val"; }
}else{ $erreur = "Erreur, une données est manquante ! id_n"; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }