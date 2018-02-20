<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

if(isset($_POST['id_friend']) && !empty($_POST['id_friend'])){

      $id_users = getSESSIONID();
      $id_friend = $_POST['id_friend'];

      $result = get_data('friends', 'WHERE (id_a1 = '.$id_users.' AND id_a2 = '.$id_friend.') OR (id_a1 = '.$id_friend.' AND id_a2 = '.$id_users.')');

      if($result['has_blocked'] == $id_users){
        $requete1 = "DELETE FROM friends WHERE id_a1 = " . $id_friend . " AND id_a2 = " . $id_users;
        $requete2 = "DELETE FROM friends WHERE id_a2 = " . $id_friend . " AND id_a1 = " . $id_users;
      }else{
        $requete1 = "DELETE FROM friends WHERE id_a1 = " . $id_friend . " AND id_a2 = " . $id_users . " AND confirmed != -1";
        $requete2 = "DELETE FROM friends WHERE id_a2 = " . $id_friend . " AND id_a1 = " . $id_users . " AND confirmed != -1";
      }

      $requete1 = $bdd->query($requete1);
      $requete2 = $bdd->query($requete2);

      if($requete1 || $requete2){

        echo 'ok';
        
      }else{
        $erreur = "Une erreur est survenu ! :(";
      }

}else{ $erreur = "Erreur, une données est manquante ! id_friend"; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }