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
        <div class="col-md-12">
          <div id="grid" class="row">
            <div class="mix col-sm-3 margin30 album ajaxSelectAll">
              <div class="item-img-wrap" style="position: relative;">
                  <a href="">
                    <i class="fa fa-picture-o" aria-hidden="true" style=""></i>
                  </a>
                  <img src="<?= $baseUrl ?>images/photos/<?= $idU ?>/1.jpg" class="img-responsive" alt="workimg">
                  <h4 style="">Toutes les images</h4>
                  <div class="item-img-overlay">
                      <a href="" class="show-image">
                          <span style="opacity: 1;background: rgba(0, 27, 49, 0.68);"></span>
                      </a>
                  </div>
              </div> 
            </div>
<?php 

  $datas = get_datas('albums', 'WHERE id_author = ' . $users['id_u']);

  while($data = $datas->fetch(PDO::FETCH_ASSOC)){

    $image = get_data('lier_photos', 'WHERE id_album = ' . $data['id_album'] . ' ORDER BY id_photo DESC LIMIT 0,1');
    $image = $baseUrl . 'images/photos/' . $users['id_u'] . '/' . $image['id_photo'] . '.jpg';
?>
            <div class="mix col-sm-3 margin30 album ajaxSelectAlbum" id="<?= $data['id_album'] ?>">
              <div class="item-img-wrap" style="position: relative;">
                  <a href="">
                    <i class="fa fa-folder" aria-hidden="true" style=""></i>
                  </a>
                  <img src="<?= $image ?>" class="img-responsive" alt="workimg">
                  <h4 style=""><?= $data['nom_album'] ?></h4>
                  <div class="item-img-overlay">
                      <a href="" class="show-image">
                          <span style="opacity: 1;background: rgba(0, 27, 49, 0.68);"></span>
                      </a>
                  </div>
              </div> 
            </div>
<?php } ?>
          </div>
        </div>
      </div>
<!-- AJAX LOAD IMAGES -->
    <div id="ajaxLoadAlbumBox" class="ajaxLoadAlbumBox" data-current_page="1"></div>
<!-- END AJAX LOAD IMAGES --> 

<?php } // Fin if is_friend ?>

    </div>
  </div>

<script>
  $('.ajaxLoadAlbumBox').on('click', '.pagination li', function(e){ // Lorsque l'on clique sur un numéro de page
    e.preventDefault(); 
    initLoadPhotos( $(this) );
  });

  $('body').keydown(function(e){
    if(e.key == 'ArrowLeft'){ // Lorsque l'on appuie sur une fléche directionnel
      initLoadPhotos( $(this), 'previous' );
    }else if(e.key == 'ArrowRight'){
      initLoadPhotos( $(this), 'next' );
    }
  });

  var initLoadPhotos = function($this, $action = ''){ // Gére la class 'active' des boutons numéro de page
    $('.pagination li').removeClass('active');
    $page_num = $this.attr('id');

    $page = $('.ajaxLoadAlbumBox').attr('data-current_page');
    $maxPage = $('#pageLimitLoadPhoto').attr('data-pagelimit');

    if($page_num == "previous" || $action == 'previous'){
      $page--;
      if($page > 0){
        $('.ajaxLoadAlbumBox').attr('data-current_page', $page);
        $('#' + $page).addClass('active');
      }
    }else if($page_num == "next" || $action == 'next'){
      $page++;
      if($page <= $maxPage){
        $('.ajaxLoadAlbumBox').attr('data-current_page', $page);
        $('#' + $page).addClass('active');
      }
    }else{
      $page = $page_num;
      $this.addClass('active');
      $('.ajaxLoadAlbumBox').attr('data-current_page', $page);
    }

    ajaxLoadPhotos();
  }

  var ajaxLoadPhotos = function(){ // Charge les photos à affichés
    $users_id = <?= $idU ?>;
    $currentPage = $('.ajaxLoadAlbumBox').attr('data-current_page');

    $.post('<?= $baseUrl ?>core/ajax/others/ajax_load_photos.php', {users_id: $users_id, currentPage: $currentPage}, function(donnees){
      if($('.ajaxLoadAlbumBox').html() != donnees){
        $('.ajaxLoadAlbumBox').html(donnees);
      }
    });
  }

  ajaxLoadPhotos();

  var ajaxRecupAlbum = function($id_album){ // Récupére toutes les images d'un album
    $.post('<?= $baseUrl ?>core/ajax/others/ajax_load_album.php', {id_a: $id_album}, function(donnees){ $('#ajaxLoadAlbumBox').html(donnees); });
  }

  $('.ajaxSelectAlbum').click(function(e){ // Lorsque l'on clique sur un album
    e.preventDefault(); $id_a = $(this).attr('id'); ajaxRecupAlbum($id_a);
  });

  $('.ajaxSelectAll').click(function(e){ // Lorsque l'on clique sur l'album : TOUTES les images
    e.preventDefault(); ajaxLoadPhotos();
  });
</script>