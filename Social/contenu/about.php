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

    </div>
      <div class="col-md-8 col-md-offset-2">
        <div class="row">
<?php if($is_friend){ ?>
          <div class="col-md-12">
            <div class="widget">
            <div class="widget-body">
            <div class="row">
              <div class="col-md-5 col-md-5 col-xs-12">
                <div class="row content-info">
                  <div class="col-xs-12">
                    <div class="col-xs-5">Email:</div>
                    <div class="col-xs-7"><?= $users['email'] ?></div>

                    <div class="col-xs-5">Téléphone:</div>
                    <div class="col-xs-7"><?= $users['phone'] ?></div>

                    <div class="col-xs-5">Adresse:</div>
                    <div class="col-xs-7"><?= $users['adresse'] ?></div>

                    <div class="col-xs-5">Anniversaire:</div>
                    <div class="col-xs-7"><?= format_date($users['dob'], 2) ?></div>

                    <div class="col-xs-5">URL:</div>
                    <div class="col-xs-7"><a href="<?= $users['url'] ?>" target="_blank"><?= $users['url'] ?></a></div>

                    <div class="col-xs-5">Travail:</div>
                    <div class="col-xs-7"><?= $users['job'] ?></div>
                    <div class="col-xs-5"></div>
                    <div class="col-xs-7"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-7 col-md-7 col-xs-12">
                <p class="contact-description"><?= $users['description'] ?></p>
              </div>
            </div>
          </div>
          </div>
          </div>
<?php } ?>
        </div>
        </div>
      </div>
    </div>