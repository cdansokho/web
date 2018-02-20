<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";
require "../../parse_emoji_message.php";

  $users_id = getSESSIONID();

  $datas = get_datas('posts', 'WHERE author IN (SELECT id_a2 FROM friends WHERE id_a1 = '.$users_id.' AND confirmed = 1) OR author IN (SELECT id_a1 FROM friends WHERE id_a2 = '.$users_id.' AND confirmed = 1) OR author = '.$users_id.' ORDER BY date_p DESC');

  while($data = $datas->fetch(PDO::FETCH_ASSOC)){

    $comments = get_datas('reponses', 'WHERE id_posts = ' . $data['id_p'] . ' ORDER BY date_reponse DESC LIMIT 0,3');
    $nbComments = get_count('reponses', 'WHERE id_posts = ' . $data['id_p']);

    $author = get_data('users', 'WHERE id_u = ' . $data['author']);
    $date = format_date($data['date_p']);

?>
<!--   posts -->
                  <div class="box box-widget" id="post-<?= $data['id_p'] ?>">
                    <div class="box-header with-border">
                      <div class="user-block">
                        <img class="img-circle" src="<?= getProfilImage($author['id_u']) ?>" alt="User Image">
                        <span class="username"><a href="<?= $baseUrl ?>profils/<?= $author['id_u'] ?>"><?= $author['nom'] ?></a></span>
                        <span class="description"><a href="<?= $baseUrl ?>posts/<?= $data['id_p'] ?>">Voir la publication</a> - <?= $date ?></span>
                      </div>
                    </div>

                    <div class="box-body" style="display: block;">
                      <div id="postContent">
                        <?= emojisParse($data['message']) ?>
                      </div>
                      <hr>
                      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Partager</button>
                      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> J'aime</button>
                      <span class="pull-right text-muted">127 likes - <a href="<?= $baseUrl ?>posts/<?= $data['id_p'] ?>"><?= $nbComments ?> commentaires</a></span>
                    </div>
                    <div class="box-footer box-comments hidden-xs" style="display: block;">
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
                          <input type="text" class="form-control input-sm inputResponse" data-idpost="<?= $data['id_p'] ?>" placeholder="Appuyer sur entrer pour répondre">
                        </div>
                    </div>
                  </div>
<!--  end posts -->
<?php
   }
?>