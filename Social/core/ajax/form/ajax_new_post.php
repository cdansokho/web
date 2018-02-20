<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

if(isset($_POST['postContent']) && !empty($_POST['postContent'])){

      $idUser = getSESSIONID();
      
      $requete = "INSERT INTO posts (author, message) VALUES (:author, :message)";
      $requete = $bdd->prepare($requete);

      $requete = $requete->execute(array(
        ':author' => $idUser, 
        ':message' => $_POST['postContent']
      ));

      if($requete){

        echo 'ok';
        
      }else{
        $erreur = "Une erreur est survenu ! :(";
      }

}else{ $erreur = "Erreur, une données est manquante ! postContent"; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }