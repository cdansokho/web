<?php

  $data = get_data('posts', 'WHERE id_p = ' . $idPost);
  $author = get_data('users', 'WHERE id_u = ' . $data['author']);

  $comments = get_datas('reponses', 'WHERE id_posts = ' . $idPost);
  $nbComments = get_count('reponses', 'WHERE id_posts = ' . $data['id_p']);

  $date = format_date($data['date_p']);
?>
<style>
  .box-comments .box-comment img.conv_emoji {
    height: 21px !important;
    width: 21px !important;
    margin: 0 4px;
    float: none;
    vertical-align: middle;
}

.deleteRep{ cursor: pointer; }
.deleteRep:hover{ text-decoration: underline; }
</style>
    <!-- Begin page content -->
    <div class="container page-content">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="row">
            <div class="profile-nav col-md-4">
              <div class="panel">
                  <div class="user-heading round">
                      <a href="<?= $baseUrl ?>profils/<?= $author['id_u'] ?>">
                          <img src="<?= getProfilImage($author['id_u']) ?>" alt="">
                      </a>
                      <h1><?= $author['nom'] ?></h1>
                      <p><?= $author['email'] ?></p>
                  </div>

                  <ul class="nav nav-pills nav-stacked">
                      <li class="active"><a href=""> <i class="fa fa-user"></i> Publication</a></li>
                      <li><a href="<?= $baseUrl ?>profils/<?= $users_id ?>"> <i class="fa fa-user"></i> Profile</a></li>
                      <li><a href="<?= $baseUrl ?>pictures/<?= $users_id ?>"> <i class="fa fa-image"></i> Photos</a></li>
                  </ul>
              </div>
<?php if($author['id_u'] == $users_id){ ?>
              <div class="panel" style='border: 0'>
                  <ul class="nav nav-pills nav-stacked">
                      <li><a data-idP="<?= $data['id_p'] ?>" id="updatePost" style="cursor: pointer;"> <i class="fa fa-pencil"></i> Modifier la publication</a></li>
                      <li><a data-idP="<?= $data['id_p'] ?>" id="deletePost" style="cursor: pointer;"> <i class="fa fa-trash"></i> Supprimer la publication</a></li>
                      <li><a data-idP="<?= $data['id_p'] ?>" id="privatePost" style="cursor: pointer;"> <i class="fa fa-user-secret"></i> Rendre la publication privée</a></li>
                  </ul>
              </div>
<?php } ?>
            </div>
            <div class="profile-info col-md-8">

<!--   posts -->
                  <div class="box box-widget" id="post-<?= $data['id_p'] ?>">
                    <div class="box-header with-border">
                      <div class="user-block">
                        <img class="img-circle" src="<?= getProfilImage($author['id_u']) ?>" alt="User Image">
                        <span class="username"><a href="#"><?= $author['nom'] ?></a></span>
                        <span class="description"><a href="<?= $bseUrl ?>posts/<?= $data['id_p'] ?>">Lien de la publication</a> - <?= $date ?></span>
                      </div>
                    </div>

                    <div class="box-body" style="display: block;">
                      <div id="postContent">
                        <?= emojisParse($data['message']) ?>
                      </div>
                      <hr>
                      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Partager</button>
                      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> J'aime</button>
                      <span class="pull-right text-muted">127 likes - <a href="<?= $bseUrl ?>posts/<?= $data['id_p'] ?>"><?= $nbComments ?> commentaires</a></span>
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
                          <a href="<?= $bseUrl ?>profils/<?= $author['id_u'] ?>"><?= $author['nom'] ?></a>
                          <span class="text-muted pull-right deleteRep" data-idRep="<?= $comment['id'] ?>" data-idAuthor="<?= $author['id_u'] ?>"><?= $date ?></span>
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

            </div>
          </div>
        </div>
      </div>
    </div>

<!-- Modal pour Ajouter une photo -->
<div class="modal fade" id="updatePostModal">
  <div class="modal-dialog modal-lg" style="margin: 18px auto" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="display: inline-block;">Modification d'un post</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
<?php  

function parseForEditing2($message){
  global $baseUrl;

  $find = array('<img class="img-responsive pad" src="' . $baseUrl . 'images/Photos/', '.jpg" alt="Photo">');
  $replace = array('<!-- INSERT CONTENT BEFORE --> ::Image:', ':: <!-- INSERT CONTENT AFTER -->');
  $message = str_replace($find, $replace, $message);

  return $message;

}

?>
        <form method="post" enctype="multipart/form-data" style="text-align: center;">
          <textarea name="postContentInput" id="postContentInput" style="height: 450px;width: 100%;"><?= parseForEditing2($data['message']) ?></textarea>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="updatePostBtn">Sauvergarder les modifications</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>

<script>
  $('.inputResponse').keypress(function(e){
    if(e.key == 'Enter'){
      $t = $(this);
      $idPost = $t.attr('data-idPost');
      $response = $t.val();

      $.post('<?= $baseUrl ?>core/ajax/form/ajax_new_response.php', {idPost: $idPost, response: $response}, function(donnees){
        $t.val('');
        $selecteur = '#post-' + $idPost + ' .box-comments';

        $($selecteur).html( $($selecteur).html() + donnees );
      });
    }
  });

  $('#updatePost').click(function(e){
    $('#updatePostModal').modal('show');
  });

  $('#updatePostBtn').click(function(e){
    $idp = <?= $idPost ?>;
    $newContent = $('#postContentInput').val();
    console.log($newContent);
    $.post('<?= $baseUrl ?>core/ajax/admin/ajax_update_post.php', {idp : $idp, newContent: $newContent}, function(donnees){
      location.reload();
    });
  });

  $('#deletePost').click(function(e){
    $idp = <?= $idPost ?>;
    $confirm = confirm("Voulez vous vraiment supprimer le post ? (irréversible) #" + $idp);
    if($confirm){
      $.post('<?= $baseUrl ?>core/ajax/admin/ajax_delete_post.php', {idp : $idp}, function(donnees){
        alert(donnees);
      });
    }
  });

  $('.box-comments').on('click', '.deleteRep', function(e){
    $idRep = $(this).attr('data-idRep');
    $idAuthor = $(this).attr('data-idAuthor');
    $idSession = <?= $users_id ?>;

    if($idSession == $idAuthor){
      $confirm = confirm("Voulez vous vraiment supprimer la réponse ? (irréversible)");
      if($confirm){
        $.post('<?= $baseUrl ?>core/ajax/admin/ajax_delete_reponse.php', {idRep : $idRep}, function(donnees){
          alert(donnees);
          location.reload();
        });
      }
    }
  });


  $('#privatePost').click(function(e){});
</script>