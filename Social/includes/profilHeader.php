<?php 
  
  if($idU != $users_id){

    $result = get_data('friends', 'WHERE (id_a1 = '.$users_id.' AND id_a2 = '.$idU.') OR (id_a1 = '.$idU.' AND id_a2 = '.$users_id.')');

    if($result){
      if($result['confirmed'] == 0){
        $class1 = "btn-yellow"; $class2 = "fa-clock-o";
        $idBtn = "removeAsFriends";
        $has_send_request = true;
        
      }elseif($result['confirmed'] == 1){
        $class1 = "btn-success"; $class2 = "fa-check";
        $idBtn = "removeAsFriends";
        $is_friend = true;
        
      }elseif($result['confirmed'] == -1){
        $class1 = "btn-danger"; $class2 = "fa-times";
        $idBtn = "removeAsFriends";
        $is_bloqued = true;
      }
    }else{
      $class1 = "btn-blue"; $class2 = "fa-user-plus";
      $idBtn = "addAsFriends";
    }

  }else{
    $class1 = "btn-success"; $class2 = "fa-check";
    $is_friend = true;
  }

  	$users = get_data('users', 'WHERE id_u = ' . $idU);

  	$bestFriends = get_datas('users', 'WHERE id_u IN (SELECT id_a2 FROM friends WHERE id_a1 = '.$idU.' AND confirmed = 1) OR id_u IN (SELECT id_a1 FROM friends WHERE id_a2 = '.$idU.' AND confirmed = 1) AND id_u != '.$idU . ' LIMIT 0,6');

  	$listFriends = get_datas('users', 'WHERE id_u IN (SELECT id_a2 FROM friends WHERE id_a1 = '.$idU.' AND confirmed = 1) OR id_u IN (SELECT id_a1 FROM friends WHERE id_a2 = '.$idU.' AND confirmed = 1) AND id_u != '.$idU . ' LIMIT 0,12');

?>
<style>
.cover.profile .wrapper .friends li a img{ width: 82.313px; height: 82.313px; }
.cover.profile .cover-info .cover-nav > li > a:hover button i, 
.cover.profile .cover-info .cover-nav > li > a button i{ color: #FFF !important; margin-right: 0; }
</style>    <!-- Begin page content -->
    <div class="row page-content">
      <div class="col-md-8 col-md-offset-2">
        <div class="row">
        <div class="col-md-12">
          <div class="cover profile">
            <div class="wrapper">
              <div class="image">
                <img src="<?= getCoverImage($users['id_u']) ?>" class="show-in-modal" alt="people">
              </div>
              <ul class="friends">
  <?php 
if($is_friend){ 
    while($data = $bestFriends->fetch(PDO::FETCH_ASSOC)){
  ?>
                <li>
                  <a href="<?= $baseUrl ?>profil/<?= $data['id_u'] ?>">
                    <img src="<?= getProfilImage($data['id_u']) ?>" alt="people" class="img-responsive">
                  </a>
                </li>
  <?php  
    }
}
  ?>
              </ul>
            </div>
            <div class="cover-info">
              <div class="avatar">
                <img src="<?= getProfilImage($users['id_u']) ?>" alt="people">
              </div>
              <div class="name"><a href="#"><?= $users['nom'] ?></a></div>
              <ul class="cover-nav" style="position: relative; width: 83.5%">

                <li <?= if_is_menu($page, 'profils') ?>>
                  <a href="<?= $baseUrl ?>profils<?= r_i_s($idU, '/'.$idU, '') ?>">
                  <i class="fa fa-fw fa-bars"></i> Timeline</a>
                </li>
                <li <?= if_is_menu($page, 'about') ?>>
                  <a href="<?= $baseUrl ?>about<?= r_i_s($idU, '/'.$idU, '') ?>">
                  <i class="fa fa-fw fa-user"></i> À Propos</a>
                </li>
                <li <?= if_is_menu($page, 'friends') ?>>
                  <a href="<?= $baseUrl ?>friends<?= r_i_s($idU, '/'.$idU, '') ?>">
                  <i class="fa fa-fw fa-users"></i> Amis</a>
                </li>
                <li <?= if_is_menu($page, 'pictures'); ?>>
                  <a href="<?= $baseUrl ?>pictures<?= r_i_s($idU, '/'.$idU, '') ?>">
                  <i class="fa fa-fw fa-image"></i> Photos</a>
                </li>
<?php if(!$is_bloqued && $is_friend){ ?>
                <li style="height:57px; position:absolute; right:150px; border-left:1px solid #e2e9e6;">
                  <a href="<?= $baseUrl ?>messages/newConv/<?= $idU ?>" class="linkContact">
                    <button class="btn btn-success" style="position:relative; top:-7px">
                    <i class="fa fa-commenting"></i>
                    </button>
                  </a>
                </li>
<?php } ?>
<?php if(!$is_bloqued && !$has_send_request){ ?>
                <li style="height:57px; right:76px; position:absolute; border-left:1px solid #e2e9e6;">
                  <a href="" class="linkContact">
                    <button class="btn btn-danger" style="position:relative; top:-7px" id="blockUser">
                      <i class="fa fa-ban"></i>
                    </button>
                  </a>
                </li>
<?php } ?>
                <li style="height:57px; position:absolute; right:0;">
                  <a href="" class="linkContact">
                    <button class="btn <?= $class1 ?>" style="position:relative; top:-7px" id="<?= $idBtn ?>">
                      <i class="fa <?= $class2 ?>"></i>
                    </button>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
<script>
  $('#removeAsFriends').click(function(e){
    e.preventDefault();
    $id_friend = <?= $idU ?>;

    $.post('<?= $baseUrl ?>core/ajax/form/ajax_remove_friends.php', {id_friend: $id_friend}, function(donnees){
      //console.log(donnees);
      location.reload();
    });
  });

  $('#addAsFriends').click(function(e){
    e.preventDefault();
    $id_friend = <?= $idU ?>;

    $.post('<?= $baseUrl ?>core/ajax/form/ajax_add_friends.php', {id_friend: $id_friend}, function(donnees){
      //console.log(donnees);
      location.reload();
    });
  });

  $('#blockUser').click(function(e){
    e.preventDefault();
    $id_friend = <?= $idU ?>;

    $.post('<?= $baseUrl ?>core/ajax/form/ajax_add_friends.php', {id_friend: $id_friend}, function(donnees){});
    $.post('<?= $baseUrl ?>core/ajax/admin/ajax_set_friends_request.php', {msgFrom: $id_friend, val: '-1'}, function(donnees){ console.log(donnees); location.reload(); 
    });
  });


</script>

