<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

if(isset($_POST['currentPage']) && !empty($_POST['currentPage'])){

    $idU = getSESSIONID();
    $currentPage = (int) $_POST['currentPage'];
    $elemPerPage = 16;

    if(isset($_POST['idAlbum']) && !empty($_POST['idAlbum'])){
      $nbPhotos = get_count('lier_photos l,photos p', 'WHERE p.id_photo = l.id_photo AND l.id_album = ' . (int) $_POST['idAlbum']);
    }else{
      $nbPhotos = get_count('photos', 'WHERE id_u = ' . $idU);
    }

    if($nbPhotos AND $nbPhotos > 0 AND ($currentPage * $elemPerPage) <= $nbPhotos + $elemPerPage){

      $totalPage = ceil($nbPhotos / $elemPerPage); 
      $idStartElem = ( $currentPage - 1 ) * $elemPerPage;

      if(isset($_POST['idAlbum']) && !empty($_POST['idAlbum'])){
        $datas = get_datas('lier_photos l,photos p', 'WHERE p.id_photo = l.id_photo AND l.id_album = ' . (int) $_POST['idAlbum'] . " ORDER BY p.id_photo DESC LIMIT $idStartElem, $elemPerPage");
      }else{
        $datas = get_datas('photos p', "WHERE id_u = " . $idU . " ORDER BY id_photo DESC LIMIT $idStartElem, $elemPerPage");
      }
?>

<?php
      while($data = $datas->fetch(PDO::FETCH_ASSOC)){     
?>
        <div class="file-box col-md-3 col-sm-4 col-xs-6">
          <div class="file photo" data-idp="<?= $data['id_photo'] ?>" data-title="<?= $data['nom_photo'] ?>">
            <a href="#">
              <span class="corner"></span>
              <div class="image">
                <span class="blur"></span>
                <img alt="image" class="img-responsive" src="<?= $baseUrl ?>images/photos/<?= $idU.'/'.$data['id_photo'].'.jpg' ?>">
              </div>
              <div class="file-name">
                <?= $data['nom_photo'] ?>
                <br>
                <small><?= format_date($data['date_publi'], 2) ?></small>
              </div>
            </a>
          </div>
        </div>
<?php
      } // Fin du while
    }// else{ $erreur = '<br><span style="display:block;text-align:center;font-size:15px;margin:20px;font-weight:bolder;font-family:sans-serif;">Aucune photo disponible :(</span>'; } // Fin : if(!$nphotos ..
}else{ $erreur = 'Erreur une donnée est manquante ! currentPage'; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }