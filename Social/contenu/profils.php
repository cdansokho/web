<style>
  .box-comments .box-comment img.conv_emoji {
    height: 21px !important;
    width: 21px !important;
    margin: 0 4px;
    float: none;
    vertical-align: middle;
  }
</style>
<?php  
  require 'includes/profilHeader.php';

  if($has_send_request){
    $classAlert = 'alert-warning';
    $text = "<b><u>".$users['nom']."</u></b> doit confirmer l'invitation que vous lui avez envoyée !";
  }elseif($is_bloqued){
    $classAlert = 'alert-danger';
    if($result['has_blocked'] == $users_id){ $text = "Vous avez bloquer <b><u>".$users['nom']."</u></b> !"; }
    else{ $text = "<b><u>".$users['nom']."</u></b> vous à bloqué !"; }
  }elseif(!$is_friend){
    $classAlert = 'alert-info';
    $text = "Veuillez ajouter <b><u>".$users['nom']."</u></b> comme amis pour voir ces infos !";
  }
?>
<div class='alert <?= $classAlert ?>'>
  <center><?= $text ?></center>
</div>

      <div class="row">

<?php if($is_friend){ ?>
        <div class="col-md-5">
          <div class="widget">
            <div class="widget-header">
              <h3 class="widget-caption">À Propos</h3>
            </div>
            <div class="widget-body bordered-top bordered-sky">
              <ul class="list-unstyled profile-about margin-none">
                <li class="padding-v-5">
                  <div class="row">
                    <div class="col-sm-4"><span class="text-muted">Anniversaire</span></div>
                    <div class="col-sm-8"><?= format_date($users['dob'], 2) ?></div>
                  </div>
                </li>
                <li class="padding-v-5">
                  <div class="row">
                    <div class="col-sm-4"><span class="text-muted">Emploi</span></div>
                    <div class="col-sm-8"><?= $users['job'] ?></div>
                  </div>
                </li>
                <li class="padding-v-5">
                  <div class="row">
                    <div class="col-sm-4"><span class="text-muted">Sexe</span></div>
                    <div class="col-sm-8"><?= $users['gender'] ?></div>
                  </div>
                </li>
                <li class="padding-v-5">
                  <div class="row">
                    <div class="col-sm-4"><span class="text-muted">Adresse</span></div>
                    <div class="col-sm-8"><?= $users['adresse'] ?></div>
                  </div>
                </li>
                <li class="padding-v-5">
                  <div class="row">
                    <div class="col-sm-4"><span class="text-muted">Email</span></div>
                    <div class="col-sm-8"><?= $users['email'] ?></div>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div class="widget widget-friends">
            <div class="widget-header">
              <h3 class="widget-caption">Amis &nbsp; <small class="right">
                <a href="<?= $baseUrl ?>friends<?= r_i_s($_GET['id'], '/'.$_GET['id'], '') ?>">Voir tout les amis</a></small>
              </h3>
            </div>
            <div class="widget-body bordered-top  bordered-sky">
              <div class="row">
                <div class="col-md-12">
                  <ul class="img-grid" style="margin: 0 auto;">
  <?php  
    while($data = $listFriends->fetch(PDO::FETCH_ASSOC)){
  ?>
                    <li>
                      <a href="<?= $baseUrl ?>profils/<?= $data['id_u'] ?>">
                        <img src="<?= getProfilImage($data['id_u']) ?>" alt="image">
                      </a>
                    </li>
  <?php } ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="widget">
            <div class="widget-header">
              <h3 class="widget-caption">Groupes</h3>
            </div>
            <div class="widget-body bordered-top bordered-sky">
              <div class="card">
                <div class="content">
                  <ul class="list-unstyled team-members">
                    <li>
                      <div class="row">
                          <div class="col-xs-3">
                              <div class="avatar">
                                  <img src="<?= $baseUrl ?>images/Likes/likes-1.png" class="img-circle img-no-padding img-responsive">
                              </div>
                          </div>
                          <div class="col-xs-6">Github</div>
                          <div class="col-xs-3 text-right">
                              <btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user"></i></btn>
                          </div>
                      </div>
                    </li>
                    <li>
                      <div class="row">
                          <div class="col-xs-3">
                              <div class="avatar">
                                  <img src="<?= $baseUrl ?>images/Likes/likes-3.png" class="img-circle img-no-padding img-responsive">
                              </div>
                          </div>
                          <div class="col-xs-6">Css snippets</div>
                          <div class="col-xs-3 text-right">
                              <btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user"></i></btn>
                          </div>
                      </div>
                    </li>
                    <li>
                      <div class="row">
                          <div class="col-xs-3">
                              <div class="avatar">
                                  <img src="<?= $baseUrl ?>images/Likes/likes-2.png " class="img-circle img-no-padding img-responsive">
                              </div>
                          </div>
                          <div class="col-xs-6">Html Action</div>
                          <div class="col-xs-3 text-right">
                              <btn class="btn btn-sm btn-azure btn-icon"><i class="fa fa-user"></i></btn>
                          </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>  
            </div>
          </div>
        </div>


        <!--============= timeline posts-->
        <div class="col-md-7">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="box profile-info n-border-top">
                    <form>
                        <textarea class="form-control input-lg p-text-area" rows="2" placeholder="À quoi pensez-vous aujourd'hui ?"></textarea>
                    </form>
                    <div class="box-footer box-form">
                        <button type="button" class="btn btn-azure pull-right" id="inputPostSubmit">Post</button>
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-map-marker"></i></a></li>
                            <li><a href="#"><i class="fa fa-camera"></i></a></li>
                            <li><a href="#"><i class=" fa fa-film"></i></a></li>
                            <li><a href="#"><i class="fa fa-microphone"></i></a></li>
                        </ul>
                    </div>
                  </div>

<!--   posts -->
<?php 

  $datas = get_datas('posts', 'WHERE author = ' . $idU . ' ORDER BY date_p DESC');
 
  while($data = $datas->fetch(PDO::FETCH_ASSOC)){

    $comments = get_datas('reponses', 'WHERE id_posts = ' . $data['id_p'] . ' ORDER BY date_reponse DESC LIMIT 0,3');
    $nbComments = get_count('reponses', 'WHERE id_posts = ' . $data['id_p']);

    $author = get_data('users', 'WHERE id_u = ' . $data['author']);
    $date = format_date($data['date_p']);

?>
                  <div class="box box-widget" id="post-<?= $data['id_p'] ?>">
                    <div class="box-header with-border">
                      <div class="user-block">
                        <img class="img-circle" src="<?= getProfilImage($author['id_u']) ?>" alt="User Image">
                        <span class="username"><a href="#"><?= $author['nom'] ?></a></span>
                        <span class="description"><a href="<?= $baseUrl ?>posts/<?= $data['id_p'] ?>">Lien de la publication</a> - <?= $date ?></span>
                      </div>
                    </div>

                    <div class="box-body" style="display: block;">
                      <div id="postContent">
                        <?= emojisParse($data['message']) ?>
                      </div>
                      <hr>
                      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Partager</button>
                      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> J'aime</button>
                      <span class="pull-right text-muted">127 likes - <?= $nbComments ?> commentaires</span>
                    </div>
                    <div class="box-footer box-comments" style="display: block;">
      <?php

        while($comment = $comments->fetch(PDO::FETCH_ASSOC)){

          $author = get_data('users', 'WHERE id_u = ' . $comment['author']);
          $date = format_date($comment['date_reponse']);
      ?>
                      <div class="box-comment">
                        <img class="img-circle img-sm" src="<?= getProfilImage($author['id_u']) ?>" alt="User Image">
                        <div class="comment-text">
                          <span class="username">
                          <a href="<?= $baseUrl ?>profils/<?= $author['id_u'] ?>"><?= $author['nom'] ?></a>
                          <span class="text-muted pull-right"><?= $date ?></span>
                          </span>
                          <?= emojisParse($comment['contenu']) ?>
                        </div>
                      </div>
      <?php } ?>
                    </div>
                    <div class="box-footer" style="display: block;">
                        <img class="img-responsive img-circle img-sm" src="<?= getProfilImage($users_id) ?>">
                        <div class="img-push">
                          <input type="text" class="form-control input-sm inputResponse" data-idPost="<?= $data['id_p'] ?>" placeholder="Appuyer sur entrer pour répondre">
                        </div>
                    </div>
                  </div>
<!--  end posts -->
<?php
   }
?>

<script>
  $('.inputResponse').keypress(function(e){
    if(e.key == 'Enter'){
      $t = $(this);
      $idPost = $t.attr('data-idPost');
      $response = $t.val();

      $.post('<?= $baseUrl ?>core/ajax/form/ajax_new_response.php', {idPost: $idPost, response: $response}, function(donnees){
        console.log(donnees);
        $t.val('');

        $selecteur = '#post-' + $idPost + ' .box-comments';
        console.log($selecteur);

        $($selecteur).html( $($selecteur).html() + donnees );
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
        document.location.href = document.location.href;
      }else{
        console.log(donnees);
      }
    });
  });
</script>              
                </div>
              </div>
            </div>
          </div>
        </div>
<?php } ?>
      </div>
    </div>
    </div>