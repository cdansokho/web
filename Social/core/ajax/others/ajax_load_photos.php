<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

if(isset($_POST['users_id']) && !empty($_POST['users_id'])){
  if(isset($_POST['currentPage']) && !empty($_POST['currentPage'])){

    $idU = (int) $_POST['users_id'];
    $currentPage = (int) $_POST['currentPage'];
    $elemPerPage = 12;

    $nbPhotos = get_count('photos', 'WHERE id_u = ' . $idU);

    if($nbPhotos AND $nbPhotos > 0 AND ($currentPage * $elemPerPage) <= $nbPhotos + $elemPerPage){

      $totalPage = ceil($nbPhotos / $elemPerPage); 
      $idStartElem = ( $currentPage - 1 ) * $elemPerPage;

?>
      <h3 style="text-align: center;">Toutes les Photos</h3>
      <br>
      <div class="row" id="pageLimitLoadPhoto" data-pagelimit="<?= $totalPage ?>">
        <div class="col-md-12">
          <div id="grid" class="row">
<?php
      $datas = get_datas('photos', "WHERE id_u = " . $idU . " ORDER BY id_photo DESC LIMIT $idStartElem, $elemPerPage");
      while($data = $datas->fetch(PDO::FETCH_ASSOC)){     
?>
        <div class="mix col-sm-3 margin30">
            <div class="item-img-wrap ">
                <img src="<?= $baseUrl ?>images/photos/<?= $idU.'/'.$data['id_photo'].'.jpg' ?>" class="img-responsive" alt="img">
                <div class="item-img-overlay">
                    <a href="" class="show-image">
                        <span></span>
                    </a>
                </div>
            </div> 
        </div>
<?php
      } // Fin du while
?>
         </div>
        </div>
      </div>
      <div class="row gallery-bottom">
        <div class="col-sm-6">
          <ul class="pagination">
              <li id="previous"><a href=""><span>«</span></a></li>
<?php 
  for ($i = 1; $i <= $totalPage; $i++) { 
    if($i == $currentPage){ $cls = 'active'; }else{ $cls = 'aa'; } 
?>
              <li id="<?= $i ?>" class="<?= $cls ?>"><a href=""><?= $i ?></a></li>
<?php } ?>
              <li id="next"><a href=""><span>»</span></a></li>
          </ul>
        </div>
        <div class="col-sm-6 text-right">
<?php 
  $minIdPhoto = $currentPage * $elemPerPage - $elemPerPage + 1;
  $maxIdPhoto = $currentPage * $elemPerPage;
  $maxIdPhoto = ($maxIdPhoto > $nbPhotos) ? $nbPhotos : $maxIdPhoto ;

  echo "<em>Photos ".$minIdPhoto." à ".$maxIdPhoto." (sur ".$nbPhotos.")</em>";
?>
        </div>     
      </div>
<?php

    }else{ $erreur = '<br><span style="display:block;text-align:center;font-size:15px;margin:20px;font-weight:bolder;font-family:sans-serif;">Aucune photo disponible :(</span>'; } // Fin : if(!$nphotos ..
  }else{ $erreur = 'Erreur une donnée est manquante ! currentPage'; }
}else{ $erreur = 'Erreur une donnée est manquante ! users_id'; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }