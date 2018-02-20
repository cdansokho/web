          <div class="action-header clearfix">
            <div class="visible-xs" id="ms-menu-trigger">
                <i class="fa fa-bars"></i>
            </div>
            <div class="pull-left hidden-xs">
                <img src="<?= getProfilImage("a") ?>" alt="" class="img-avatar m-r-10">
                <span>Sélectionner une conversation dans le menu de gauche ou creez s'en une !</span>
            </div>   
          </div>
          <div class="list-message" style="height: 472px; overflow: scroll; position: relative;">
            <div class="pull-bottom" style="position: absolute; bottom: 65px; left: 0; right: 0;">

<!-- Début Liste des messages -->
              <div class="message-feed media" style="padding: 0 20px; padding-top: 20px">
                  <div class="pull-left" style="padding-top: 4px;">
                      <img src="<?= getProfilImage($users_id) ?>" alt="" class="img-avatar">
                  </div>
                  <div class="media-body">
                      <div class="mf-content">
                          Bienvenue sur votre chat en ligne ! 
                      </div>
                  </div>
              </div>
              <div class="message-feed media" style="padding: 0 20px;">
                  <div class="pull-left" style="padding-top: 4px;">
                      <img src="<?= getProfilImage($users_id) ?>" alt="" class="img-avatar">
                  </div>
                  <div class="media-body">
                      <div class="mf-content">
                          Retrouvez vos conversations avec vos amis ci-contre.<br>
                      </div>
                  </div>
              </div>
              <div class="message-feed media" style="padding: 0 20px;">
                  <div class="pull-left" style="padding-top: 4px;">
                      <img src="<?= getProfilImage($users_id) ?>" alt="" class="img-avatar">
                  </div>
                  <div class="media-body">
                      <div class="mf-content">
                          Creer des conversations de groupe pour plus de Fun.<br>
                      </div>
                  </div>
              </div>
              <div class="message-feed media" style="padding: 0 20px;">
                  <div class="pull-left" style="padding-top: 4px;">
                      <img src="<?= getProfilImage($users_id) ?>" alt="" class="img-avatar">
                  </div>
                  <div class="media-body">
                      <div class="mf-content">
                          Ajouter des smiley, envoyer des gifs, faites vous plaisir <?= emojisParse(':)'); ?>
                      </div>
                      <small class="mf-date"><i class="fa fa-clock-o"></i> <?= format_date(date("d/n/Y G:i", time())) ?></small>
                  </div>
              </div>
<!-- Fin Liste des messages -->

            </div>       
            <div class="msb-reply">
                <input type="hidden" id="convIdInput" value="<?= $idConv ?>">
                
                <div class="emojisButton"><i class="fa fa-smile-o" aria-hidden="true"></i></div>
                <input disabled placeholder="Votre message..." id="postMessagesInput" type="text">
                <button id="envoyerMsg"><i class="fa fa-paper-plane-o"></i></button>
            </div>
          </div>