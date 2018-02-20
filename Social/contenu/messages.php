<?php
  if(isset($_GET['conversation']) && !empty($_GET['conversation'])){
    $idUsersConv = get_data('tchat_conv', 'WHERE id_conv = ' . $_GET['conversation'])['id_users_conv'];
    if(!strpos($idUsersConv, 'user-' . $users_id . ',')){
      header('Location: '.$baseUrl.'messages');
    }
  }

  $nb_conv_unseen = get_count('tchat_conv', 'WHERE id_users_conv LIKE "%user-' . $users_id . ',%" AND id_users_view NOT LIKE "%user-' . $users_id . ',%"');

?>
  <div class="container page-content page-messages">
    <div class="row">
      <div class="tile tile-alt" id="messages-main" style="height: 540px; overflow: hidden;">
      <div class="ms-menu">
          <div class="ms-user clearfix">
              <img src="<?= $baseUrl ?>images/users/<?= $my_infos['id_u'] ?>.jpg" alt="" class="img-avatar pull-left">
              <div>Signed in as <br> <?= $my_infos['email'] ?></div>
          </div>
          
          <div class="p-15">
              <div class="dropdown">
                  <a class="btn btn-azure btn-block" href="" data-toggle="dropdown">Messages <i class="caret m-l-5"></i></a>
                  <ul class="dropdown-menu dm-icon w-100">
                    <li><a href="" data-toggle="modal" data-target="#newConv"><i class="fa fa-plus"></i> Nouvelle conversation</a></li>
                    <li><a href=""><i class="fa fa-envelope"></i> Mes Messages</a></li>
                  </ul>
              </div>
          </div> 
          <div class="list-group lg-alt" id="list-conv" style="height: 394px; overflow: scroll;">
            <!-- AJAX LOAD -->
          </div>          
      </div>

<!-- AJAX LOAD MSG -->
      <div class="ms-body" data-idConv="">
        <?php require 'includes/tutorielMessagerie.php'; ?>
      </div>
<!-- FIN AJAX LOAD MSG -->

      </div>
    </div>
  </div>
<!-- Modal -->
<div id="newConv" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nouvelle Conversation</h4>
      </div>
      <div class="modal-body">
          <div class="alert alert-info" id="listUserSelected" style="display:none">Utilisateur(s) sélectionné : <b></b></div>
          <input type="text" class="form-control" id="searchUsers" data-id_u="<?= $users_id ?>" placeholder="Rechercher un utilisateur......">
          <div class="modal-result">
              <span class="emptyInputModal">Veuillez remplir le champs ci-dessus !</span>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success btn-alt" id="createConv" style="display:none">Créer la conversation</button>
        <button type="button" class="btn btn-default btn-alt" data-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>

<script>

  $.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){ return null; }else{ return results[1] || 0; }
  }

  var recupConvs = function(){

    if($.urlParam('conversation') != null){ $idConv = $.urlParam('conversation') }else{ $idConv = 0; }

    $users_id = <?= $users_id ?>;
    $.post('<?= $baseUrl ?>core/ajax/messages/ajax_receive_conv.php', {users_id: $users_id, idConv: $idConv}, function(donnees){ 
      if($('#list-conv').html() !== donnees){
        $('#list-conv').html(donnees);
      }
    });
  }
  recupConvs();

  $("#list-conv").on('click', ".jsEventClickConv" ,function(e){ // Quand on clique sur une conv
    e.preventDefault();
    $idConv = $(this).attr('id');

    $('.ms-body').attr('id', $idConv);
    $(".jsEventClickConv").removeClass('selected');
    $(this).addClass('selected');

    $url = window.location.href;
    $url = $url.replace(eval('/&conversation=[a-zA-Z0-9-_.&]+$/'), '');
    history.pushState({ path: this.path }, '', $url + "&conversation=" + $idConv);

    recupMessages();
  });

  var recupMessages = function(){ // Recupére les messages d'une conv
    var $id_conv = $.urlParam('conversation');
    $users_id = <?= $users_id ?>;
    if($id_conv > 0){
      $.post('<?= $baseUrl ?>core/ajax/messages/ajax_receive_message.php', {id_conv: $id_conv, users_id: $users_id}, function(donnees){          
        if ($('.ms-body').html() != donnees) { 
          $('.ms-body').html(donnees);  
          $('.pull-bottom').scrollTop($('.pull-bottom').prop("scrollHeight")); 
        }
      });
    }
  }

  var posterMessages = function(){ // Insere un msg dans une BDD 
    var $message = $('#postMessagesInput').val(); 
    var $id_conv = $.urlParam('conversation'); 
    var $id_author = <?= $users_id ?>; 

    console.log($message, $id_conv, $id_author);

    if($message === ''){ return false; }

    $.post('<?= $baseUrl ?>core/ajax/messages/ajax_send_message.php', {
        id_conv: $id_conv, 
        id_author: $id_author, 
        message: $message 
    }, function(donnees){
        $('#postMessagesInput').val(''); 
        messageInterval = setInterval(recupMessages, 1000);
    });
  }

    var deleteMsg = function ($id_msg, $id_author) { // Supprimer un message d'une BDD
      var $id_conv = $.urlParam('conversation'); 
      var $users_id = <?= $users_id ?>; 

      if($users_id == $id_author){ 
          if ( confirm("Voulez-vous vraiment supprimer ce message ?") ) { 
              $.post('<?= $baseUrl ?>core/ajax/messages/ajax_delete_message.php', {id_conv: $id_conv, users_id: $users_id, id_msg: $id_msg}, function(donnees){
                  alert(donnees);
                  messageInterval = setInterval(recupMessages, 1000);
              });
          }
      }
  }

  $('.ms-body').on('click', '#supprimerConv', function(e){ // Supprimer une conv 
    e.preventDefault();
    var $id_conv = $.urlParam('conversation');
    if(confirm("Voulez-vous vraiment supprimer la conversations sélectionner ? (Définitif)")){
      $.post('<?= $baseUrl ?>core/ajax/messages/ajax_delete_conv.php', {id_conv: $id_conv}, function(donnees){ 
        document.location.href = '<?= $baseUrl ?>messages';
      })
    }
  });

  $('.ms-body').on('click', '.dropdown', function(e){ // Lorsque l'on clique sur un menu
    e.preventDefault();
    clearInterval(messageInterval);
  });

  $('.ms-body').on('click', '#refreshConv', function(e){ // Quand on clique sur le btn "rafraichir" d'une conv
    messageInterval = setInterval(recupMessages, 1000);
    e.preventDefault();
    $('.list-message .pull-bottom').html('<b style="display:block; text-align:center;">Chargement...</b>');
    setTimeout(recupMessages, 500);
  });

  $('.ms-body').on('click', '#envoyerMsg', posterMessages); // On execute la fonction posterMessage si on appuie sur le bouton 'envoyer'
  $('.ms-body').on('keyup', '#postMessagesInput', function(e){ // Envoie le message quand on appuie sur "Entrée"
    if(e.key == "Enter"){ posterMessages(); }
  });

  $('.ms-body').on('click', '.emojisButton', function(){ // Lorsque l'on clique sur le bouton pour ouvrir le panel emojis
    if($('#emojionepicker').css('display') == 'block'){
      messageInterval = setInterval(recupMessages, 1000);
      $('#emojionepicker').css({display: 'none'});
    }else{
      clearInterval(messageInterval);
      $('#emojionepicker').css({display: 'block'});
    }
  });

  $('.ms-body').on('click', '.emojione', function(){ // Lorsque l'on clique sur un emojis
    $emojisVal = $(this).attr('data-value');
    $inputVal = $('#postMessagesInput').val();
    $newVal = $inputVal + ' ' + $emojisVal + ' ';

    $( "#postMessagesInput" ).focus();
    $inputVal = $('#postMessagesInput').val($newVal);
  });

  messageInterval = setInterval(recupMessages, 1000); // On regarde si de nouveau message sont postées toutes les 1 secondes
  conversationInterval = setInterval(recupConvs, 1000); // On regarde si de nouvelle conversation sont créer toutes les 1 secondes

  $('#searchUsers').keyup(function(e){ // Lorsque l'on rechercher un utilisateur
      var $users_id = <?= $users_id ?>;
      var $search_query = $('#searchUsers').val(); 
      $.post('<?= $baseUrl ?>core/ajax/messages/ajax_search_users.php', {search_query: $search_query, users_id: $users_id}, function(donnees){ 
          $('.modal-result').html(donnees);
      })
  });

  $('.modal-result').on('click', '.btn-success.select-u',function(e){  // Lorsque l'on selectionne un utilisateur
    $(this).removeClass('btn-success').addClass('btn-info');
    $(this).html('Sélectionné');

    $id = $(this).data('id_u'); $nom = $(this).data('nom');
    $message = $('#listUserSelected b').html() + '<span id="id-' + $id + '">' + $nom + ' | </span> ';

    $('#listUserSelected b').html($message);
    $('#listUserSelected').css({display: 'block'});
    $('#createConv').css({display: 'inline-block'});
  });


  $('.modal-result').on('click', '.btn-info.select-u',function(e){ // Lorsque l'on deselectionne un utilisateur
    $(this).removeClass('btn-info').addClass('btn-success');
    $(this).html('Sélectionner');

    $id = $(this).data('id_u'); $nom = $(this).data('nom');
    $message = $('#listUserSelected b #id-' + $id).remove();

    if( $('#listUserSelected b span').length == 0 ){
      $('#listUserSelected').css({display: 'none'});
      $('#createConv').css({display: 'none'});
    }
  });

  $('#createConv').click(function(index){ // Lorsque l'on clique sur le bouton pour creer un conv 
    var $tabUsersConv = [];
    var $users_id = <?= $users_id ?>;

    $('#listUserSelected span').each(function(){
      $val = parseInt( $(this).attr('id').replace('id-', '') );
      $tabUsersConv.push( $val );
    });

    $.post('<?= $baseUrl ?>core/ajax/messages/ajax_create_newConv.php', {tabUsersConv: $tabUsersConv, users_id: $users_id}, function(donnees){
      console.log(donnees);
      $('#newConv').modal('hide');
    });
  });


</script>