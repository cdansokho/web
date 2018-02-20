<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

if(isset($_POST['searchQuery'])){

    $searchQuery = strtolower($_POST['searchQuery']); 

    $users_id = getSESSIONID();

    if($searchQuery == '*' || $searchQuery == "all" || $searchQuery == "tout" || $searchQuery == "tous"){ $searchQuery = ''; }

    $requete = "SELECT * FROM users WHERE nom LIKE '%$searchQuery%' AND id_u != $users_id ORDER BY nom"; // Rch dans prenom

    $requete = $bdd->query($requete);
    $result = $requete->rowCount();
    if($requete && $result > 0){


      while($data = $requete->fetch()){

        $idU = $data['id_u'];

        $result = get_data('friends', 'WHERE (id_a1 = '.$users_id.' AND id_a2 = '.$idU.') OR (id_a1 = '.$idU.' AND id_a2 = '.$users_id.')');

        if($result){
          if($result['confirmed'] == 0){
            $class1 = "btn-yellow";
            $class2 = "fa-clock-o";
            $idBtn = "removeAsFriends";
            
          }elseif($result['confirmed'] == 1){
            $class1 = "btn-success";
            $class2 = "fa-check";
            $idBtn = "removeAsFriends";
            
          }elseif($result['confirmed'] == -1){
            $class1 = "btn-danger";
            $class2 = "fa-times";
            $idBtn = "removeAsFriends";
          }
        }else{
          $class1 = "btn-blue";
          $class2 = "fa-user-plus";
          $idBtn = "addAsFriends";
        }

?>
<div class="col-md-4 col-sm-6 col-xs-12 user">
  <div class="panel">
    <div class="panel-body">
      <div class="media">
        <button class="btn <?= $class1 ?> btn-xs <?= $idBtn ?>" data-id_friend="<?= $idU ?>"><i class="fa <?= $class2 ?>"></i></button>
        <a href="<?= $baseUrl ?>profils/<?= $idU ?>" class="pull-left" style="cursor: pointer;">
          <img  style="width:65px; height:65px" class="thumb media-object" src="<?= getProfilImage($idU) ?>" alt="">
        </a>
        <a href="<?= $baseUrl ?>profils/<?= $idU ?>" class="media-body" style="cursor: pointer;">
          <h4 style="font-size: 19px;"><?= $data['nom'] ?><br><span class="text-muted small"> - <?= $data['job'] ?></span></h4>
        </a>
      </div>
    </div>
  </div>
</div>
<?php
      }
    }else{
      $erreur = 'Aucun utilisateur ne correspond à votre recherche !';
    }
}else{ $erreur = "Veuillez remplir le champs ci-dessus !"; }

if(isset($erreur) && !empty($erreur)){ echo "<span style='display: block;text-align: center;font-weight: bolder;margin-top: 36px;'>" . $erreur . "</span>"; }

?>
