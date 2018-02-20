<?php
	ob_start();

	require 'includes/config.php';
	require 'includes/bdd.php';

	require 'core/sql.php' ;
	require 'core/function.php' ;
	require 'core/traitement.php' ;

	require 'core/router.php';

	require 'core/parse_emoji_message.php';

	if($page == 'login' || $page == 'logout'){ require "contenu/" . $page . ".php"; exit; }
	
	$users_id = getSESSIONID();
	if(!$users_id){ header("Location: ".$baseUrl."login"); exit; }
	$my_infos = get_data('users', 'WHERE id_u = ' . $users_id);

	require 'includes/header.php';
	require "contenu/" . $page . ".php";
	require 'includes/footer.php';

	ob_get_contents();

?>