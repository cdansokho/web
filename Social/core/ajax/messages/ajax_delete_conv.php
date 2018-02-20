<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

if(isset($_POST['id_conv']) && !empty($_POST['id_conv'])){

  $users_id = getSESSIONID();
  $infos = $bdd->query('SELECT * FROM users WHERE id_u = ' . $users_id)->fetch(PDO::FETCH_ASSOC);
  
  $message = "<b style='color:blue;'>" . $infos['nom'] . "</b> à quitter cette conversation !<br><i>Il ne recevra plus aucun messages envoyés dans cette conversation :( </i><br><u>Créez s'en une nouvelle !</u>";

  $id_conv = (int) $_POST['id_conv'];

  $id_users_conv = $bdd->query('SELECT * FROM tchat_conv WHERE id_conv = ' . $id_conv)->fetch(PDO::FETCH_ASSOC)['id_users_conv'];

  $id_users_conv = str_replace('user-'.$users_id.',', '', $id_users_conv);  

  $requete = "INSERT INTO tchat_msg (id_conv, id_author, contenu) VALUES (:id_conv, :id_author, :contenu)";
  $requete = $bdd->prepare($requete);
  $requete = $requete->execute(array(
    ':id_conv' => $id_conv, 
    ':id_author' => $users_id, 
    ':contenu' => $message
  ));

  $query = "UPDATE tchat_conv SET id_users_conv = '$id_users_conv' WHERE id_conv = " . $id_conv;
  $query = $bdd->query($query);
  if($query){

    echo "La conversation a été supprimé !";

  }else{ $erreur = "Erreur, impossible de supprimer les messages de la conversation !"; }   
        
}else{ $erreur = "Erreur, une données est manquante ! id_conv"; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }