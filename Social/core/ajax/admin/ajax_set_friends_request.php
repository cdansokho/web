<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

if(isset($_POST['msgFrom']) && !empty($_POST['msgFrom'])){
  if(isset($_POST['val']) && !empty($_POST['val'])){

      $msgFrom = $_POST['msgFrom'];
      $users_id = getSESSIONID();  
      $val = (int) $_POST['val'];

      $val = ($val == 2 ) ? '0' : $val ;

      $requete = "UPDATE friends SET confirmed = $val WHERE (id_a1 = $msgFrom AND id_a2 = $users_id) OR (id_a2 = $msgFrom AND id_a1 = $users_id) ";
      $requete = $bdd->query($requete);

      if($requete && $val == 1){

        echo 'La demande d\'ajout à bien été confirmé !';

        $data = get_data('users', 'WHERE id_u = ' . $users_id);
        $message = '<i class="fa fa-check" style="color: green"> Amis</i> ';
        $message .= "<a href='".$baseUrl."profil/".$users_id."'><b>" . $data['nom'] . "</b></a> a confirmé votre demande d'amis !";
        $message = addslashes($message);
        $bdd->query("INSERT INTO notifications (msgFor, msgFrom, message, type_n) VALUES ($msgFrom, $users_id, '$message', 'confirmFriends')");
        
      }elseif($requete && $val == 0){
        echo 'La demande d\'ajout à bien été annulé !';
      }elseif($requete && $val == -1){

        $requete = "UPDATE friends SET has_blocked = $users_id WHERE (id_a1 = $msgFrom AND id_a2 = $users_id) OR (id_a2 = $msgFrom AND id_a1 = $users_id) ";
        $requete = $bdd->query($requete);
        echo 'L\'utilisateur à bien été bloqué !';
      }else{
        $erreur = "Une erreur est survenu ! :(";
      }

  }else{ $erreur = "Erreur, une données est manquante ! val"; }
}else{ $erreur = "Erreur, une données est manquante ! msgFrom"; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }