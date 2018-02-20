<style>
  .box-comments .box-comment img.conv_emoji {
    height: 21px !important;
    width: 21px !important;
    margin: 0 4px;
    float: none;
    vertical-align: middle;
}
</style>
    <!-- Begin page content -->
    <div class="container page-content ">
      <div class="row">
        <!-- left links -->
        <div class="col-md-3">
          <div class="profile-nav">
            <div class="widget">
              <div class="widget-body">
                <div class="user-heading round">
                  <a href="<?= $baseUrl ?>profils">
                      <img src="<?= getProfilImage($users_id) ?>" alt="">
                  </a>
                  <h1><?= $my_infos['nom'] ?></h1>
                  <p><?= $my_infos['email'] ?></p>
                </div>

                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href=""> <i class="fa fa-user"></i> Fils d'actualité</a></li>
                  <li>
                    <a href="<?= $baseUrl ?>messages"> 
                      <i class="fa fa-envelope"></i> Messages 
                      <span class="label label-info pull-right r-activity">9</span>
                    </a>
                  </li>
                  <li><a href=""> <i class="fa fa-calendar"></i> Evenements</a></li>
                  <li><a href="<?= $baseUrl ?>pictures"> <i class="fa fa-image"></i> Photos</a></li>
                  <li><a href="<?= $baseUrl ?>search"> <i class="fa fa-share"></i> Rechercher</a></li>
                  <li><a href=""> <i class="fa fa-floppy-o"></i> Sauvergarde</a></li>
                </ul>
              </div>
            </div>

            <div class="widget">
              <div class="widget-body">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="" id="btn-fa-globe"> <i class="fa fa-globe"></i> Pages</a></li>
                  <li><a href="" id="btn-fa-gamepad"> <i class="fa fa-gamepad"></i> Jeux</a></li>
                  <li><a href="" id="btn-fa-puzzle-piece"> <i class="fa fa-puzzle-piece"></i> Annonces</a></li>
                  <li><a href="" id="btn-fa-home"> <i class="fa fa-home"></i> Magasins</a></li>
                  <li><a href="" id="btn-fa-users"> <i class="fa fa-users"></i> Groupes</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="box profile-info n-border-top" id="inputNewPostBox">
                    <form>
                        <textarea class="form-control input-lg p-text-area" id="inputPost" rows="2" placeholder="À quoi pensez-vous aujourd'hui ?"></textarea>
                    </form>
                    <div class="box-footer box-form">
                        <button type="button" class="btn btn-azure pull-right" id="inputPostSubmit">Publier</button>
                        <ul class="nav nav-pills">
                            <li><a href=""><i class="fa fa-map-marker"></i></a></li>
                            <li><a href="<?= $baseUrl ?>files"><i class="fa fa-camera"></i></a></li>
                            <li><a href=""><i class=" fa fa-pencil"></i></a></li>
                            <li><a href=""><i class="fa fa-smile-o"></i></a></li>
                        </ul>
                    </div>
                  </div>

<!-- AJAX LOAD POST -->
                <div style="text-decoration:underline;cursor:pointer;display:none" class="text-center alert alert-info" id='alertLoadNewPosts'>
                  Charger les nouveaux posts !
                </div>
                <span id="ajaxLoadPosts"></span>
<!-- END AJAX LOAD POST -->

                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-3">

          <!-- Friends activity -->
          <div class="widget">
            <div class="widget-header">
              <h3 class="widget-caption">Friends activity</h3>
            </div>
            <div class="widget-body bordered-top bordered-sky">
              <div class="card">
                <div class="content">
                   <ul class="list-unstyled team-members">
                    <li>
                      <div class="row">
                        <div class="col-xs-3">
                          <div class="avatar">
                              <img src="<?= $baseUrl ?>images/Friends/woman-2.jpg" alt="img" class="img-circle img-no-padding img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-9">
                          <b><a href="">Hillary Markston</a></b> shared a 
                          <b><a href="">publication</a></b>. 
                          <span class="timeago" >5 min ago</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="row">
                        <div class="col-xs-3">
                          <div class="avatar">
                              <img src="<?= $baseUrl ?>images/Friends/woman-3.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-9">
                          <b><a href="">Leidy marshel</a></b> shared a 
                          <b><a href="">publication</a></b>. 
                          <span class="timeago" >5 min ago</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="row">
                        <div class="col-xs-3">
                          <div class="avatar">
                              <img src="<?= $baseUrl ?>images/Friends/woman-4.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                          </div>
                        </div>
                        <div class="col-xs-9">
                          <b><a href="">Presilla bo</a></b> shared a 
                          <b><a href="">publication</a></b>. 
                          <span class="timeago" >5 min ago</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="row">
                        <div class="col-xs-3">
                            <div class="avatar">
                                <img src="<?= $baseUrl ?>images/Friends/woman-4.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                            </div>
                        </div>
                        <div class="col-xs-9">
                          <b><a href="">Martha markguy</a></b> shared a 
                          <b><a href="">publication</a></b>. 
                          <span class="timeago" >5 min ago</span>
                        </div>
                      </div>
                    </li>
                  </ul>         
                </div>
              </div>
            </div>
          </div><!-- End Friends activity -->

          <!-- People You May Know -->
          <div class="widget">
            <div class="widget-header">
              <h3 class="widget-caption">Personnes que vous pourriez connaître</h3>
            </div>
            <div class="widget-body bordered-top bordered-sky">
              <div class="card">
                  <div class="content">
                      <ul class="list-unstyled team-members">
<?php  
  
  $datas = get_datas('users', 'WHERE id_u NOT IN (SELECT id_a2 FROM friends WHERE id_a1 = 1) AND id_u NOT IN (SELECT id_a1 FROM friends WHERE id_a2 = 1) AND id_u != 1');

  while($data = $datas->fetch(PDO::FETCH_ASSOC)){

?>
                          <li>
                              <div class="row">
                                  <div class="col-xs-3">
                                      <div class="avatar">
                                          <img src="<?= getProfilImage($data['id_u']) ?>" class="img-circle img-no-padding img-responsive">
                                      </div>
                                  </div>
                                  <div class="col-xs-6" style="top:13px">
                                     <?= $data['nom'] ?>
                                  </div>
                                  <a href="<?= $baseUrl ?>profils/<?= $data['id_u'] ?>" class="col-xs-2 text-right" style="top:9px">
                                      <btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user-plus"></i></btn>
                                  </a>
                              </div>
                          </li>
<?php } ?>
                      </ul>
                  </div>
              </div>          
            </div>
          </div>
        </div>
      </div>
    </div>

<script>
  $('#ajaxLoadPosts').on('keypress', '.inputResponse', function(e){
    if(e.key == 'Enter'){
      $t = $(this);
      $idPost = $t.attr('data-idPost');
      $response = $t.val();

      $.post('<?= $baseUrl ?>core/ajax/form/ajax_new_response.php', {idPost: $idPost, response: $response}, function(donnees){
        $t.val('');

        ajaxLoadPosts(true);
      });
    }
  });

  $('#inputPostSubmit').click(function(e){
    e.preventDefault();
    $t = $('#inputPost');
    $postContent = $t.val();

    $.post('<?= $baseUrl ?>core/ajax/form/ajax_new_post.php', {postContent: $postContent}, function(donnees){
      if(donnees == "ok"){
        $t.val('');
        ajaxLoadPosts(true);
      }else{
        console.log(donnees);
      }
    });
  });


  var ajaxLoadPosts = function($force = false){
    $.post('<?= $baseUrl ?>core/ajax/others/ajax_load_post.php', {}, function(donnees){
      if( $('#ajaxLoadPosts').html() == '' || $force == true){
        console.log('ok');
        $('#ajaxLoadPosts').html( donnees );
        $('#alertLoadNewPosts').css({display: 'none'});

      }else if($('#ajaxLoadPosts').html() != donnees){
        $('#alertLoadNewPosts').css({display: 'block'});

      }else if($force == true){ 
        $('#ajaxLoadPosts').html( donnees ); 
        $('#alertLoadNewPosts').css({display: 'none'});
      }
    });
  }

  $('#alertLoadNewPosts').click(function(){
    ajaxLoadPosts(true);
  });

  ajaxLoadPosts();
  ajaxLoadPostsInterval = setInterval(ajaxLoadPosts, 1000);

  // $('#btn-fa-camera').click(function(e){  
  //   e.preventDefault();
  //   $postContent = '';

  //   $.post('<?= $baseUrl ?>core/ajax/form/form/ajax_new_post.php', {postContent: $postContent}, function(donnees){ console.log(donnees); });
  // });


  // $('#btn-fa-map-marker').click(function(e){ 
  //   e.preventDefault();
  //   $lieu = prompt('Localisation : '); 
  //   $postContent = '<i class="fa fa-map-marker"></i> ' + $lieu;

  //   $.post('<?= $baseUrl ?>core/ajax/form/form/ajax_new_post.php', {postContent: $postContent}, function(donnees){ console.log(donnees); });
  // });

  // $('#btn-fa-pencil').click(function(e){  
  //   e.preventDefault();
  //   $phrase = prompt('Que voulez vous dire ? : ');
  //   $color = prompt('Couleur : ');
  //   $postContent = '<div style="color:'+$color+'">'+$phrase+'</div>';

  //   $.post('<?= $baseUrl ?>core/ajax/form/form/ajax_new_post.php', {postContent: $postContent}, function(donnees){ console.log(donnees); });
  // });

  // $('#btn-fa-smile-o').click(function(e){  
  //   e.preventDefault();
  //   $humeur = prompt('Humeur : '); 
  //   $postContent = '';

  //   $.post('<?= $baseUrl ?>core/ajax/form/form/ajax_new_post.php', {postContent: $postContent}, function(donnees){ console.log(donnees); });
  // });

</script>