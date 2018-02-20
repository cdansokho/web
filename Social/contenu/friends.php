<?php  

  require 'includes/profilHeader.php';

?>

<?php  
  if($has_send_request){
    $classAlert = 'alert-warning';
    $text = "<b><u>".$users['nom']."</u></b> doit confirmer l'invitation que vous lui avez envoyée !";
  }elseif($is_bloqued){
    $classAlert = 'alert-danger';
    if($result['has_blocked'] == $users_id){ $text = "Vous avez bloquer <b><u>".$users['nom']."</u></b> !"; }
    else{ $text = "<b><u>".$users['nom']."</u></b> vous à bloqué !"; }
  }elseif(!$is_friend){
    $classAlert = 'alert-primary';
    $text = "Veuillez ajouter <b><u>".$users['nom']."</u></b> comme amis pour voir ces infos !";
  }
?>
<div class='alert <?= $classAlert ?>'>
  <center><?= $text ?></center>
</div>

        <div class="row">
<?php if($is_friend){ ?>
        <ul class="directory-list">
                <li><a href="#">a</a></li>
                <li><a href="#">b</a></li>
                <li><a href="#">c</a></li>
                <li><a href="#">d</a></li>
                <li><a href="#">e</a></li>
                <li><a href="#">f</a></li>
                <li><a href="#">g</a></li>
                <li><a href="#">h</a></li>
                <li><a href="#">i</a></li>
                <li><a href="#">j</a></li>
                <li><a href="#">k</a></li>
                <li><a href="#">l</a></li>
                <li><a href="#">m</a></li>
                <li><a href="#">n</a></li>
                <li><a href="#">o</a></li>
                <li><a href="#">p</a></li>
                <li><a href="#">q</a></li>
                <li><a href="#">r</a></li>
                <li><a href="#">s</a></li>
                <li><a href="#">t</a></li>
                <li><a href="#">u</a></li>
                <li><a href="#">v</a></li>
                <li><a href="#">w</a></li>
                <li><a href="#">x</a></li>
                <li><a href="#">y</a></li>
                <li><a href="#">z</a></li>
          </ul>
          <br>
          <input type="text" name="" id="searchFriends" placeholder="Rechercher un utilisateurs...">
          <br>
  <?php  
    while($data = $listFriends->fetch(PDO::FETCH_ASSOC)){
  ?>
          <div class="col-md-3">
              <div class="contact-box center-version">
                <a href="<?= $baseUrl ?>profils/<?= $data['id_u'] ?>">
                  <img alt="image" class="img-circle" src="<?= getProfilImage($data['id_u']) ?>">
                  <h3 class="m-b-xs" style="font-size:20px;"><strong><?= $data['nom'] ?></strong></h3>
    
                  <div class="font-bold"><?= $data['email'] ?></div>
                </a>
                <div class="contact-box-footer">
                    <a href="<?= $baseUrl ?>messages/new/<?= $data['id_u'] ?>" class="btn btn-xs btn-white"><i class="fa fa-envelope"></i>Envoyé un Messages</a><hr>
                    <a class="btn btn-xs btn-white"><i class="fa fa-check"></i> Amis</a>
                    <!-- <a class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Ajouter</a> -->
                </div>
              </div>
          </div>
  <?php 
    }
  } 
?>
        </div>
      </div>
    </div>
