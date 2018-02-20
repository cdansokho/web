<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";
include "../../parse_emoji_message.php";

$erreur = '';

$my_infos = get_data('users', 'WHERE id_u = ' . getSESSIONID());

if(isset($_POST['id_conv']) && !empty($_POST['id_conv'])){

      $idConv = (int) $_POST['id_conv'];
      $users_id = (int) $_POST['users_id'];

      $ConvInfo = "SELECT * FROM tchat_conv WHERE id_conv = " . $idConv;
      $ConvInfo = $bdd->query($ConvInfo)->fetch(PDO::FETCH_ASSOC);
      
      $ListUserViewConv = $ConvInfo['id_users_view'];
      $nomConv = $ConvInfo['nom_conv'];

      if(strpos($ListUserViewConv, 'user-'.$users_id.',') === false){
        $NewListUserViewConv = $ListUserViewConv . 'user-'.$users_id.',';
        $NewListUserViewConv = 'UPDATE tchat_conv SET id_users_view = "'.$NewListUserViewConv.'" WHERE id_conv = ' . $idConv;
        $NewListUserViewConv = $bdd->query($NewListUserViewConv);
      }

      $nbUsers = substr_count($ConvInfo['id_users_conv'], 'user-');
      $nomConv = str_replace($my_infos['nom'] . ' - ', ' ', $nomConv);
      $nomConv = substr($nomConv, 0, -3);

      if($nbUsers == 2 OR $nbUsers == 1){  
        $userNomConv = str_replace(' - ', '', $nomConv);
        $req = $bdd->query('SELECT id_u FROM users WHERE nom = "' . trim($userNomConv) . '"')->fetch()['id_u'];
        $imageConv = getProfilImage($req);
      }else{
        $imageConv = getConvImage($idConv);
      }

      $requete = "SELECT * FROM tchat_msg WHERE id_conv = $idConv ORDER BY date_msg";
      $datas = $bdd->query($requete);
      $dateArray = array();
?>
<div class="action-header clearfix">
    <div class="visible-xs" id="ms-menu-trigger">
        <i class="fa fa-bars"></i>
    </div>
    <div class="pull-left hidden-xs">
        <img src="<?= $imageConv ?>" alt="" class="img-avatar m-r-10">
        <span><?= $nomConv ?></span>
    </div>   
    <ul class="ah-actions actions">
        <li><a href="" id="supprimerConv"><i class="fa fa-trash"></i></a></li>
        <li><a href="" id="silenceConv"><i class="fa fa-bell"></i></a></li>
        <li><a href="" id="nonLueConv"><i class="fa fa-eye"></i></a></li>
        <!-- fa-eye-slash fa-bell-slash -->
        <li class="dropdown">
            <a href="" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-bars"></i></a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li><a id="refreshConv" href=""><i class="fa fa-refresh"></i> Rafraichir</a></li>
                <li><a href=""><i class="fa fa-cogs"></i> Réglages de la conversation</a></li>
            </ul>
        </li>
    </ul>
</div>

<div class="list-message" style="height:472px;overflow:scroll;position:relative;">
  <div class="pull-bottom" style="position:absolute;bottom:65px;left:0;right:0;">

<?php
      if($datas){
        while($data = $datas->fetch(PDO::FETCH_ASSOC)){

          $id_a = $data['id_author'];

          $date_hour = format_date($data['date_msg'], 2);
          if(!in_array($date_hour, $dateArray)){
              $dateArray[] = $date_hour;
              echo '<div class="date_sep">' . $date_hour . '</div>';
          }

          $date_min = date('H:i', strtotime($data['date_msg']));

          $author = get_data('users', 'WHERE id_u = ' . $id_a);
          
          $class1 = ($id_a == $users_id) ? "pull-right" : "pull-left";
          $class2 = ($id_a == $users_id) ? "right" : "media";

          $contenu = emojisParse($data['contenu']); // Fct Custom to parse emojis
          $lien = getProfilImage($id_a); // Fct Custom to GET User Profil Image
?>  
        <div class="message-feed <?= $class2 ?>">
            <a class="<?= $class1 ?>" href="<?= $baseUrl ?>profils/<?= $id_a ?>" target="_blank">
                <img src="<?= $lien ?>" alt="" class="img-avatar">
            </a>
            <div class="media-body">
                <div class="mf-content"><?= $contenu ?></div>
                <small class="mf-date"><span onclick="deleteMsg(<?= $data['id_msg'] ?>,<?= $id_a ?>)"><i class="fa fa-clock-o"></i> <?= $date_min ?></span></small>
            </div>
        </div>
<?php 
        }
      }
?>
</div>
  <div class="msb-reply">
      <input type="hidden" id="convIdInput" value="<?= $idConv ?>">
      <?= emojisLoad() ?>
      <div class="emojisButton"><i class="fa fa-smile-o" aria-hidden="true"></i></div>
      <div class="fake-input">
          <input placeholder="Votre message..." id="postMessagesInput" type="text">
          <div id="displaypostMessagesInput"></div>
      </div>
      <button id="envoyerMsg"><i class="fa fa-paper-plane-o"></i></button>
  </div>
</div>
<?php

}else{ $erreur = "Erreur, une données est manquante ! id_conv"; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }