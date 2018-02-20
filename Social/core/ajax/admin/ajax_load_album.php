<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

  $idU = getSESSIONID(); 
  $datas = get_datas('albums', 'WHERE id_author = ' . $idU . ' ORDER BY date_album DESC');

while($data = $datas->fetch(PDO::FETCH_ASSOC)){
  $img = get_data('lier_photos', 'WHERE id_album = ' . $data['id_album']);

  $imageUrl = '../../../images/photos/' . $idU . '/' . $img['id_photo'] . '.jpg';
  if(file_exists($imageUrl)){
    $imageUrl = $baseUrl . 'images/photos/' . $idU . '/' . $img['id_photo'] . '.jpg';
  }else{
    $imageUrl = $baseUrl . 'images/unavailable.jpg';
  }
?>
        <div class="file-box col-md-3 col-sm-4 col-xs-6">
          <div class="file album" data-ida="<?= $data['id_album'] ?>">
            <a href="#">
              <span class="corner"></span>
              <div class="image">
                <span class="blur"><i class="fa fa-folder file-icon"></i></span>
                <img alt="image" class="img-responsive" src="<?= $imageUrl ?>">
              </div>
              <div class="file-name">
                <?= $data['nom_album'] ?>
                <br>
                <small><?= format_date($data['date_album'], 2) ?></small>
              </div>
            </a>
          </div>
        </div>
<?php 

     }
?>