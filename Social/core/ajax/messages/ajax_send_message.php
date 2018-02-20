<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";
include "../../parse_emoji_message.php";

$erreur = '';

if(isset($_POST['id_conv']) && !empty($_POST['id_conv'])){
  if(isset($_POST['id_author']) && !empty($_POST['id_author'])){
    if(isset($_POST['message']) && !empty($_POST['message'])){
      
      echo $_POST['id_conv'] . " -- " . $_POST['id_author'] . " -- " . $_POST['message'];

      $requete = "INSERT INTO tchat_msg (id_conv, id_author, contenu) VALUES (:id_conv, :id_author, :contenu)";
      $requete = $bdd->prepare($requete);

      $requete = $requete->execute(array(
        ':id_conv' => (int) $_POST['id_conv'], 
        ':id_author' => (int) $_POST['id_author'], 
        ':contenu' => $_POST['message']
      ));

      $query = 'UPDATE tchat_conv SET id_users_view = "", date_last_msg = "' . date("Y-m-d H:i:s", time()) . '" WHERE id_conv = ' . (int) $_POST['id_conv'];
      $query = $bdd->query($query);

      echo 'ok';

      if($requete){
        
      }else{
        $erreur = "Une erreur est survenu ! :(";
      }

    } else{ $erreur = "Erreur, une données est manquante ! msg"; }
  } else{ $erreur = "Erreur, une données est manquante ! id_author"; }
}else{ $erreur = "Erreur, une données est manquante ! id_conv"; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }