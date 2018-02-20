<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

if(isset($_POST['id_friend']) && !empty($_POST['id_friend'])){

      $id_user = getSESSIONID();
      $id_friend = $_POST['id_friend'];
      
      $requete = "INSERT INTO friends (id_a1, id_a2) VALUES (:id_a1, :id_a2)";
      $requete = $bdd->prepare($requete);

      $requete = $requete->execute(array(
        ':id_a1' => $id_user, 
        ':id_a2' => $id_friend
      ));

      if($requete){

        $data = get_data('users', 'WHERE id_u = ' . $id_user);
        $message = "<b>" . $data['nom'] . "</b> vous a ajouté ! Confirmez la demande d'amis ? &nbsp; ";
        $message .= '<button id="acceptFriendRequest" data-msgFrom="'.$id_user.'" class="btn btn-success">Oui</button> &nbsp; ';
        $message .= ' <button id="denyFriendRequest" data-msgFrom="'.$id_user.'" class="btn btn-danger">Non</button>';
        $message = addslashes($message);
        $bdd->query("INSERT INTO notifications (msgFor, msgFrom, message, type_n) VALUES ($id_friend, $id_user, '$message', 'friends')");
        echo 'ok';
        
      }else{
        $erreur = "Une erreur est survenu ! :(";
      }

}else{ $erreur = "Erreur, une données est manquante ! id_friend"; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }