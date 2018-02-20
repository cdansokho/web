<style>
  .blur-plus:hover i{
    color:#FFF !important;
    transition: 0.4s;
  }

  .blur-plus i{
    color:rgba(255, 255, 255, 0.73) !important;
  }

  .ibox .folder-list .active{
      background-color: rgba(0, 0, 0, 0.05);
  }
</style>   <!-- Begin page content -->
    <div class="container page-content ">
      <div class="row">
        <div class="col-md-3">
          <div class="ibox float-e-margins">
              <div class="ibox-content">
                  <div class="file-manager">
                      <div class="hr-line-dashed"></div>
                      <button class="btn btn-azure btn-block" id="btnOpenUploadModal">Ajouter une image</button>
                      <div class="hr-line-dashed"></div>
                      <h5>Type</h5>
                      <ul class="folder-list" style="padding: 0">
                          <li class="ajaxBtnPhotos active"> <a href=""><i class="fa fa-image"></i>Images</a></li>
                          <li class="ajaxBtnAlbum"> <a href=""><i class="fa fa-folder"></i>Albums</a></li>
                      </ul>
                      <div class="clearfix"></div>
                  </div>
              </div>
          </div>

          <div class="file-box col-md-12" id="newAlbumDiv" style="display: none;">
            <div class="file newAlbum">
              <a href="#">
                <span class="corner"></span>
                <div class="image">
                  <span class="blur blur-plus"><i class="fa fa-plus file-icon"></i></span>
                  <img alt="image" class="img-responsive" src="<?= $baseUrl ?>images/new_album.jpg">
                </div>
                <div class="file-name" style="text-decoration: none;">
                  Ajouter un album<br><small>En cliquant ici</small>
                </div>
              </a>
            </div>
            <div class="col-md-10 text-center btnAlbum ajaxBtnAlbum" style="display: none">
              <button class="btn btn-info">Retour aux albums</button>
            </div><br><br>
            <div class="col-md-10 text-center btnAlbum" id="" style="display: none">
              <button class="btn btn-danger" id="btnDeleteAlbum">Supprimer l'album</button>
            </div>
          </div>
        </div>
        <div class="col-md-9 animated fadeInRight">
          <div class="row">
<!-- AJAX LOAD PHOTOS -->
              <div class="col-md-12" id="ajaxLoadPhotos" data-current_page="1" data-onglet="photos"></div>
<!-- END AJAX LOAD PHOTOS -->
          </div>
        </div>
      </div>
    </div>

<!-- Modal pour avoir un aperçu de la photo  -->
<div class="modal fade" id="modalCliquePhoto" data-idp="">
  <div class="modal-dialog modal-lg" style="margin: 18px auto" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title cliquePhoto" style="display: inline-block;">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background-color:rgba(60, 60, 60, 1);">
        <img src="" alt="" class="modal-img" style="height:450px;margin:0 auto;display:block;border:1px solid #eaeaea;">
      </div>
      <div class="modal-footer">
        <a href="#" target="_blank" class="btn btn-primary">Voir la publication</a>
        <button type="button" class="btn btn-warning" id="updatePhoto">Modifier le titre</button>
        <button type="button" class="btn btn-danger" id="deletePhoto">Supprimer la photo</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal pour Ajouter une photo -->
<div class="modal fade" id="modalCliqueAddPhoto">
  <div class="modal-dialog modal-lg" style="margin: 18px auto" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="display: inline-block;">Ajouter une image</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" style="text-align: center;">
          <span class="file-input btn btn-azure btn-file">
            <b>Sélectionner des images</b> <input type="file" id="uploadFiles" name="uploadFiles[]" multiple="multiple">
            <br><small>Ctrl / Cmd + Clique Gauche pour sélectionner plusieurs images !</small>
          </span>
          <br><br>
          Album : <select name="selectedAlbum" id="selectedAlbum"></select>
        </form>
        <hr>
        <h5 style="text-align: center;">Aperçus de l'images sélectionnée</h5>
        <hr>
        <div id="responseAddPhotos" style="text-align: center;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="uploadFilesBtn">Sauvergarder la photo</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>

<script>
  $.getUrlParam = function(name){ // Recupére un paramétre dans l'URL
    var results = new RegExp('[\?&]'+name+'-([^&#]*)').exec(window.location.href);
    if (results == null){ return null; }else{ return results[1] || 0; }
  }

  $.setUrlParam = function($parameter,$val){ // Modifie un paramétre dans l'URL sans recharger la page
    $url = window.location.href;
    $url = $url.replace(eval('/&'+$parameter+'-[a-zA-Z0-9-_.&#]+$/'), '');
    history.pushState({ path: this.path }, '', $url + "&"+$parameter+"-" + $val);
  }

  var ajaxLoadPhotos = function(){ // Charge les photos à affichés
    var $currentPage = $('#ajaxLoadPhotos').attr('data-current_page');
    var $idAlbum = $.getUrlParam('album');

    $.post('<?= $baseUrl ?>core/ajax/admin/ajax_load_photos.php', {currentPage: $currentPage, idAlbum: $idAlbum}, function(donnees){

        if($('#ajaxLoadPhotos').html() !== $('#ajaxLoadPhotos').html() + donnees){
          $('#ajaxLoadPhotos').html( $('#ajaxLoadPhotos').html() + donnees);
          $('#ajaxLoadPhotos').attr('data-current_page', $currentPage * 1 + 1 );
        }

        if($('#ajaxLoadPhotos').html() + donnees == ''){ $('#ajaxLoadPhotos').html('<br><span style="display:block;text-align:center;font-size:15px;margin:20px;font-weight:bolder;font-family:sans-serif;">Aucune photo disponible :(</span>') }
    });
  }

  var ajaxLoadAlbums = function(){ // Charge les albums disponibles
    $('#newAlbumDiv').css({display: 'block'});
    $.post('<?= $baseUrl ?>core/ajax/admin/ajax_load_album.php', {}, function(donnees){
        $('#ajaxLoadPhotos').html( donnees );
    });
  }

  var iniRecupPhotos = function(){ // Initialisation de l'affichage de toutes les images
    $('#ajaxLoadPhotos').html('');
    $('#ajaxLoadPhotos').attr('data-onglet', 'photos');
    $('#newAlbumDiv').css({display: 'none'});

    $('#ajaxLoadPhotos').attr('data-current_page', 1);
    win = $(window); $is_sup = true;

    ajaxLoadPhotos();
  }

  $(document).scroll(function(e) { // Lorsque l'on scroll et que l'on est sur les Photos
      $onglet = $('#ajaxLoadPhotos').attr('data-onglet');

      if($(document).height() - win.height() > win.scrollTop() && $is_sup == false && $onglet == "photos") {
        $is_sup = true;
      }else if($(document).height() - win.height() <= win.scrollTop() && $is_sup == true && $onglet == "photos") {
        $is_sup = false;
        ajaxLoadPhotos();
      }
  });

  iniRecupPhotos();

  $('#ajaxLoadPhotos').on('click', '.file.photo', function(e){ // Lorsque l'on clique sur une image / photo
    e.preventDefault();
    var $idP = $(this).attr('data-idp');
    var $title = $(this).attr('data-title');

    $('#modalCliquePhoto').attr('data-idp', $idP);
    $('.modal-title.cliquePhoto').html( $title + ' - #' + $idP);

    $base = <?= $baseUrl ?>; $idU = <?= $users_id ?>

    $('.modal-img').attr('src', $base + 'images/photos/' + $idU + '/' + $idP + '.jpg');
    $('#modalCliquePhoto').modal('show');
  });


  $('.ajaxBtnPhotos').click(function(e){ // Lorsque l'on clique sur le bouton menu photos
    e.preventDefault(); $.setUrlParam('album', 0);
    iniRecupPhotos();

    $('.ajaxBtnPhotos').addClass('active'); $('.ajaxBtnAlbum').removeClass('active');
    $('.btnAlbum').css({display: 'none'});
  });

  $('.ajaxBtnAlbum').click(function(e){ // Lorsque l'on clique sur le bouton menu Albums
    e.preventDefault(); 
    $('#ajaxLoadAlbum').html(''); 
    $('#ajaxLoadPhotos').attr('data-onglet', 'albums');

    $('.ajaxBtnPhotos').removeClass('active'); $('.ajaxBtnAlbum').addClass('active');
    $('.btnAlbum').css({display: 'none'});
    ajaxLoadAlbums();
  });

  $('#ajaxLoadPhotos').on('click', '.album', function(e){ // Lorsque l'on clique sur un album //////////
    e.preventDefault(); $.setUrlParam('album', $(this).attr('data-ida') );
    iniRecupPhotos();
    $('#newAlbumDiv').css({display: 'block'});
    $('.btnAlbum').css({display: 'block'});

    $('.photo').remove();
  });

  $('#updatePhoto').click(function(e){ // Lorsque l'on clique sur le bouton modifier une photo
    e.preventDefault();
    $idP = $('#modalCliquePhoto').attr('data-idp');
    $newTitle = prompt('Nouveau titre de l\'image : ');

    $.post('<?= $baseUrl ?>core/ajax/admin/ajax_update_photos.php', {idp: $idP, newTitle: $newTitle}, function(donnees){
      $('.modal-title').html( $newTitle + ' - #' + $idP); 
      iniRecupPhotos();
      alert(donnees);
    });
  });

  $('#deletePhoto').click(function(e){ // Lorsque l'on clique sur le bouton supprimer une photo
    e.preventDefault();
    $idP = $('#modalCliquePhoto').attr('data-idp');

    if(confirm("Voulez-vous vraiment supprimer cette photo ?")){
      $.post('<?= $baseUrl ?>core/ajax/admin/ajax_remove_photos.php', {idp: $idP}, function(donnees){
        $('#modalCliquePhoto').modal('hide');
        iniRecupPhotos();
        console.log(donnees);
      });
    }
  });

  $('.newAlbum').click(function(e){ // Lorsque l'on clique sur le bouton Ajouter un album
    e.preventDefault();
    $nomAlbum = prompt('Nom du nouvel album :');

    if($nomAlbum != '' || $nomAlbum != undefined){
      $.post('<?= $baseUrl ?>core/ajax/admin/ajax_add_album.php', {nomAlbum: $nomAlbum}, function(donnees){
          ajaxLoadAlbums();
      });
    }
  });

  $('#btnOpenUploadModal').click(function(e){ // Lorsque l'on clique sur le bouton ajouter un fichier
    e.preventDefault();

    $.post('<?= $baseUrl ?>core/ajax/admin/ajax_load_album_list.php', {}, function(donnees){
      $('#selectedAlbum').html( '<option value="none">Aucun</option>' + donnees);
    });

    $('#modalCliqueAddPhoto').modal('show');
  });



$("#uploadFiles").change(function(e) {
  $length = $("#uploadFiles").prop('files').length;

  if($length > 0){
    $('.btn-file b').html($length + ' images sélectionnées');
  }else{
    $('.btn-file b').html('Sélectionner des images');
  }

  if($length == 1 || $length == 0){
    $('.modal-body h5').html('Aperçus de l\'images sélectionnée');
    $('#uploadFilesBtn').html('Sauvergarder la photo');
  }else{
    $('.modal-body h5').html('Aperçus des images sélectionnées');
    $('#uploadFilesBtn').html('Sauvergarder les photos');
  }

  for($i = 0 ; $i < $length ; $i++ ) { readURL(this, $i); }
});

function readURL(input, $i) {
  if (input.files && input.files[$i]) {
    var reader = new FileReader();   
    reader.onload = function (e) {
        $('#responseAddPhotos').append('<img src="" id="upload-'+$i+'" style="height:200px; width:auto; margin:20px" alt="">');
        $('#upload-'+$i).attr('src', e.target.result)
    }      
    reader.readAsDataURL(input.files[$i]);
  }
}  

$('#uploadFilesBtn').click(function(e){

  $album = $('#selectedAlbum').val();

  formdata = new FormData();
  var $length = $("#uploadFiles").prop('files').length, reader = '', file = ''; 
  $("#responseAddPhotos").html("Upload en cours . . .");

  for(i = 0 ; i < $length ; i++ ) {
    file = $("#uploadFiles").prop('files')[i];
    if(!!file.type.match(/image.*/)) {
      formdata.append("uploadFiles[]", file);
    } 
  }

  formdata.append("album", $album);

  $.ajax({
    url: "<?= $baseUrl ?>core/ajax/admin/ajax_add_photos.php",
    type: "POST",
    data: formdata,
    processData: false,
    contentType: false,
    success: function (donnees) {
      if(donnees == ''){
        iniRecupPhotos();
        $('#modalCliqueAddPhoto').modal('hide');
      }else{
        $("#responseAddPhotos").html(donnees);
      }
    }
  });
});

$('#btnDeleteAlbum').click(function(e){ // Lorsque l'on clique sur le btn supprimer d'un album
  e.preventDefault();
  $idA = $.getUrlParam('album');
  if(confirm('Voulez vous vraiment supprimer l\'album #' + $idA + ' ?')){
    $.post('<?= $baseUrl ?>core/ajax/admin/ajax_remove_album.php', {idA: $idA}, function(donnees){
      ajaxLoadAlbums();
    });
  }
});

</script>