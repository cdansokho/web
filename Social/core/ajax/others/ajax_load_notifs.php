<?php  

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$users_id = getSESSIONID();

$nbNotifs = get_count('notifications', 'WHERE viewed = 0 AND msgFor = ' . $users_id);

if( $nbNotifs > 0 ){
  echo '<a href="' . $baseUrl . 'notifs" class="label label-danger lbl" title=""><span class="badge">' . $nbNotifs . '</span> Notifications</a>';
}