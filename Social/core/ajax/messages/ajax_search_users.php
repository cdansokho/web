<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

if(isset($_POST['search_query']) && !empty($_POST['search_query'])){
  if(isset($_POST['users_id']) && !empty($_POST['users_id'])){

    $search_query = strtolower($_POST['search_query']); 
    $users_id = (int) $_POST['users_id'];

    if($search_query == '*' || $search_query == "all" || $search_query == "tout" || $search_query == "tous"){ $search_query = ''; }

    $requete = "SELECT * FROM users WHERE nom LIKE '%$search_query%' AND id_u != $users_id AND id_u IN (SELECT id_a2 FROM friends WHERE id_a1 = '$users_id' AND confirmed = 1) OR id_u IN (SELECT id_a1 FROM friends WHERE id_a2 = '$users_id' AND confirmed = 1) ORDER BY nom"; // Rch dans prenom

    $requete = $bdd->query($requete);
    $result = $requete->rowCount();
    if($requete && $result > 0){

      $template = "<table class='table table-striped'>";
      $template .=  "<thead>";
      $template .=    "<tr>";
      $template .=        "<th>Photo</th>";
      $template .=        "<th>Nom Complet</th>";
      $template .=        "<th>Action</th>";
      $template .=    "</tr>";
      $template .=  "</thead>";
      $template .=  "<tbody>";

      while($data = $requete->fetch()){

        $template .=  "<tr>";
        $template .=    "<td style='height:35px;width:20%;line-height:35px;'>";
        $template .=      "<img src='".getProfilImage($data['id_u'])."' style='width:35px;height:35px;border-radius:5px;'>";
        $template .=    "</td>";
        $template .=    "<td style='height:35px;width:40%;line-height:35px;'>" . $data['nom'] . "</td>";
        $template .=    "<td style='height:35px;width:40%;line-height:35px;'>";
        $template .=     "<button class='btn btn-success select-u' data-id_u='".$data['id_u']."' data-nom='".$data['nom']."'>Sélectionner</button> &nbsp; ";
        $template .=      "<a href='".$baseUrl."profils/".$data['id_u']."' target='_blank' class='btn btn-danger select-u' data-id_u='".$data['id_u']."'>Voir le profil</a>";
        $template .=    "</td>";
        $template .=  "</tr>";
      }

      $template .=  "</tbody>";
      $template .=  "</table>";

      echo $template;
    }else{
      $erreur = 'Aucun utilisateur ne correspond à votre recherche !';
    }
  }else{ $erreur = "Erreur ! une donnée est manquante ! users_id"; }
}else{ $erreur = "Veuillez remplir le champs ci-dessus !"; }

if(isset($erreur) && !empty($erreur)){ echo "<span style='display: block;text-align: center;font-weight: bolder;margin-top: 36px;'>" . $erreur . "</span>"; }

?>
