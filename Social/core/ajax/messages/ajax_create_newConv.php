<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

if(isset($_POST['tabUsersConv']) && !empty($_POST['tabUsersConv'])){
  if(isset($_POST['users_id']) && !empty($_POST['users_id'])){
    
  $tabUsersConv = $_POST['tabUsersConv'];
  $users_id = (int) $_POST['users_id'];

  $idUsersConv = "user-" . $users_id . ',';

  $recup_conv_name_creator = get_data('users', 'WHERE id_u = ' . $users_id)['nom'];
  $recup_conv_name = $recup_conv_name_creator . ' - ';

  foreach ($tabUsersConv as $key => $value) {
    $idUsersConv .= "user-" . $value . ',';

    $recup_conv_name_width = get_data('users', 'WHERE id_u = ' . $value)['nom'];
    $recup_conv_name .= $recup_conv_name_width . " - ";
  }

  $id_conv_creator = $users_id;
  $date_last_msg = date("Y-m-d H:i:s", time());

  $create_new_conv = "INSERT INTO tchat_conv (nom_conv, id_users_creator, id_users_conv, date_last_msg) VALUES (:nom_conv, :id_users_creator, :id_users_conv, :date_last_msg)";
  $create_new_conv = $bdd->prepare($create_new_conv);
  $create_new_conv = $create_new_conv->execute(array(
                    ':nom_conv' => $recup_conv_name,
                    ':id_users_creator' => $id_conv_creator,
                    ':id_users_conv' => $idUsersConv,
                    ':date_last_msg' => $date_last_msg
                  ));

  if($create_new_conv){
    $lastId = $bdd->lastInsertId();
    $message = "<span>" . $recup_conv_name_creator . " à créer la conversation !</span>";
 
    $requete = "INSERT INTO tchat_msg (id_conv, id_author, contenu) VALUES (:id_conv, :id_author, :contenu)";
    $requete = $bdd->prepare($requete);
    $requete = $requete->execute(array(
      ':id_conv' => $lastId, 
      ':id_author' => $users_id, 
      ':contenu' => $message
    ));

    echo $lastId;
  }else{
    echo "Erreur lors de la création de la conversation !";
  }

  }else{ $erreur = "Une donnée est manquante ! users_id"; }        
}else{ $erreur = "Une donnée est manquante ! tabUsersConv"; }


if(isset($erreur) && !empty($erreur)){ echo $erreur; }

?>
