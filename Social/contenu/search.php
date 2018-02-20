<style>
  .user .panel{ text-align: center; transition: 0.3s;}
  .user .panel:hover{ box-shadow: 0 0 1px black; }
  .btn{ position: absolute; top: 5px; right: 20px }
</style>
    <!-- Begin page content -->
    <div class="container page-content ">
      <div class="row">
          <div class="form-group col-md-4">
            <span class="input-icon">
                <input type="text" class="form-control" id="ajaxSearchUsersInput" placeholder="Rechercher un utilisateur...">
                <i class="glyphicon glyphicon-search blue"></i>
            </span>
          </div>
          <ul class="directory-list col-md-8">
                <li><a href="#">a</a></li><li><a href="#">b</a></li>
                <li><a href="#">c</a></li><li><a href="#">d</a></li>
                <li><a href="#">e</a></li><li><a href="#">f</a></li>
                <li><a href="#">g</a></li><li><a href="#">h</a></li>
                <li><a href="#">i</a></li><li><a href="#">j</a></li>
                <li><a href="#">k</a></li><li><a href="#">l</a></li>
                <li><a href="#">m</a></li><li><a href="#">n</a></li>
                <li><a href="#">o</a></li><li><a href="#">p</a></li>
                <li><a href="#">q</a></li><li><a href="#">r</a></li>
                <li><a href="#">s</a></li><li><a href="#">t</a></li>
                <li><a href="#">u</a></li><li><a href="#">v</a></li>
                <li><a href="#">w</a></li><li><a href="#">x</a></li>
                <li><a href="#">y</a></li><li><a href="#">z</a></li>
          </ul>
      </div>

      <div class="directory-info-row">
<!-- AJAX LOAD LIST USERS -->
        <div class="row" id="ajaxLoadUsers" data-currentPage="1"></div>
<!-- END AJAX LOAD LIST USERS -->
      </div>
    </div>

<script>

  $('#ajaxSearchUsersInput').focus();

  var ajaxSearchUsers = function($value){
    $currentPage = $('#ajaxLoadUsers').attr('data-currentPage');
    $.post('core/ajax/others/ajax_search.php', {searchQuery: $value}, function(donnees){
      $('#ajaxLoadUsers').html(donnees);
    });
  }

  $('#ajaxSearchUsersInput').keyup(function(e){ ajaxSearchUsers( $(this).val() ); });

  ajaxSearchUsers("");

  // $('.ajaxLoadUsers').on('click', '.removeAsFriends', function(e){
  //   e.preventDefault();
  //   $id_friend = $(this).attr('data-id_friend');

  //   $.post('<?= $baseUrl ?>core/ajax/form/ajax_remove_friends.php', {id_friend: $id_friend}, function(donnees){
  //     console.log(donnees);
  //     location.reload();
  //   });
  // });

  // $('.ajaxLoadUsers').on('click', '.addAsFriends', function(e){
  //   alert('ok');
  //   e.preventDefault();
  //   $id_friend = $(this).attr('data-id_friend');

  //   $.post('<?= $baseUrl ?>core/ajax/form/ajax_add_friends.php', {id_friend: $id_friend}, function(donnees){
  //     console.log(donnees);
  //     location.reload();
  //   });
  // });
  
</script>