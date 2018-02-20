<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

if(isset($_POST['id_conv']) && !empty($_POST['id_conv'])){
  if(isset($_POST['users_id']) && !empty($_POST['users_id'])){
    if(isset($_POST['id_msg']) && !empty($_POST['id_msg'])){
      
      $id_conv = (int) $_POST['id_conv'];
      $users_id = (int) $_POST['users_id'];
      $id_msg = (int) $_POST['id_msg'];


    $requete = "DELETE FROM tchat_msg WHERE id_msg = :id_msg AND id_conv = :id_conv AND id_author = :users_id";
    $requete = $bdd->prepare($requete);
    $requete = $requete->execute(array(
                ':id_msg' => $id_msg,
                ':users_id' => $users_id,
                ':id_conv' => $id_conv,
              ));
    
    if($requete){
      echo 'Message Supprimé !';

      $last_msg = $bdd->query("SELECT * FROM tchat_msg WHERE id_conv = " . $id_conv . " ORDER BY date_msg DESC LIMIT 0,1");
      $last_msg = $last_msg->fetch(PDO::FETCH_ASSOC);
      $last_msg = $last_msg['date_msg'];

      $query = 'UPDATE tchat_conv SET date_last_msg = "' . date("Y-m-d H:i:s", strtotime($last_msg)) . '" WHERE id_conv = ' . (int) $_POST['id_conv'];
      $query = $bdd->query($query);

    }else{
      echo 'Erreur';
    }
        
    }else{ $erreur = "Erreur, une données est manquante ! id_msg"; }
  }else{ $erreur = "Erreur, une données est manquante ! users_id"; }
}else{ $erreur = "Erreur, une données est manquante ! id_conv"; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }