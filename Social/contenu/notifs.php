<?php  

  $datas = get_datas('notifications', 'WHERE msgFor = ' . $users_id . ' ORDER BY date_notif DESC')

?>
<div class="container page-content">
  <div class="row">
    <div class="col">
      <div class="widget">
        <div class="table-responsive">
        <table class="table user-list">
          <thead>
            <tr>
              <th style="width: 55%;"><span>Notifications</span></th>
              <th style="width: 20%;"><span>Date</span></th>
              <th style="width: 10%;" class="text-center"><span>Status</span></th>
              <th style="width: 15%;" class="text-right"><span>Action</span></th>
            </tr>
          </thead>
          <tbody>
<?php

while($data = $datas->fetch(PDO::FETCH_ASSOC)){ 

  $status = ($data['viewed'] == 0) ? '<span class="label label-warning">Non vu</span>' : '<span class="label label-success">Vu</span>' ;

  $res = get_count('friends', "WHERE confirmed = 1 AND (id_a1 =".$data['msgFrom']." AND id_a2 = ".$data['msgFor'].") OR (id_a2 =".$data['msgFrom']." AND id_a1 = ".$data['msgFor'].")");

  if($data['type_n'] == 'friends'){
    $before = ($res && $res > 0) ? '<i class="fa fa-check" style="color: green"> Amis</i> ' : '<i class="fa fa-times" style="color: red"> Pas Amis</i> ';
  }else{
    $before = '';
  }

?>
            <tr>
              <td>
                <?= $before . $data['message'] ?>
              </td>
              <td>
                <?= format_date($data['date_notif'], 1); ?>
              </td>
              <td class="text-center"><?= $status ?></td>
              <td class="text-right">
                <a href="#" class="table-link success setViewed1" data-id_n="<?= $data['id_n'] ?>">
                  <span class="fa-stack">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
                <a href="#" class="table-link danger setViewed0" data-id_n="<?= $data['id_n'] ?>">
                  <span class="fa-stack">
                    <i class="fa fa-square fa-stack-2x"></i>
                    <i class="fa fa-eye-slash fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </td>
            </tr>
<?php } ?>
          </tbody>
        </table>
        </div>
        </div>
    </div>
  </div>
</div>

<script>
  $('.setViewed1').click(function(e){
    $id_n = $(this).attr('data-id_n');
    $.post('<?= $baseUrl ?>core/ajax/admin/ajax_set_viewed_notif.php', {id_n: $id_n, val: '1'}, function(donnees){
      console.log(donnees); location.reload();
    });
  });
  $('.setViewed0').click(function(e){
    $id_n = $(this).attr('data-id_n');
    $.post('<?= $baseUrl ?>core/ajax/admin/ajax_set_viewed_notif.php', {id_n: $id_n, val: '2'}, function(donnees){ 
      console.log(donnees); location.reload();
    });
  });

  $('#acceptFriendRequest').click(function(e){
    $msgFrom = $(this).attr('data-msgFrom');
    $.post('<?= $baseUrl ?>core/ajax/admin/ajax_set_friends_request.php', {msgFrom: $msgFrom, val: '1'}, function(donnees){ console.log(donnees); location.reload(); 
    });
  });
  $('#denyFriendRequest').click(function(e){
    $msgFrom = $(this).attr('data-msgFrom');
    $.post('<?= $baseUrl ?>core/ajax/admin/ajax_set_friends_request.php', {msgFrom: $msgFrom, val: '2'}, function(donnees){ console.log(donnees); location.reload(); 
    });
  });


</script>