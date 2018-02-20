<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

if(isset($_POST['id_a']) && !empty($_POST['id_a'])){

  $id_a = (int) $_POST['id_a'];
  $album = get_data('albums', 'WHERE id_album = ' . $id_a);
  
?>
      <h3 style="text-align: center;"><?= $album['nom_album'] ?></h3>
      <br>
      <div class="photoBox" id="photoBox" >
        <div class="row photoBox" id="photoBox">
          <div class="col-md-12">
            <div id="grid" class="row">
<?php  

$datas = get_datas('lier_photos', 'WHERE id_album = ' . $id_a . ' ORDER BY id_photo DESC');
while($data = $datas->fetch(PDO::FETCH_ASSOC)){
?>
              <div class="mix col-sm-3 margin30">
                <div class="item-img-wrap ">
                  <img src="<?= $baseUrl ?>images/photos/1/<?= $data['id_photo'] ?>.jpg" class="img-responsive" alt="img">
                    <div class="item-img-overlay">
                      <a class="show-image">
                          <span></span>
                      </a>
                    </div>
                  </div> 
                </div>
<?php } ?>
              </div>
            </div>
          </div>
        </div>


<?php

}else{ $erreur = 'Erreur une donnée est manquante ! id_a'; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }