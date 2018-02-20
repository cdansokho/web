<?php

	session_start();
	error_reporting(E_ALL & ~E_NOTICE);

	$siteName = "Social";
	$baseUrl = '/'.$siteName.'/';

	$baseFileUrl = $_SERVER['DOCUMENT_ROOT'] . '/' . $siteName . '/';
	


//if(file_exists("config.php")){

	try {

	   $bdd = new PDO("mysql:host=$bdd_Url".$bdd_Port.";dbname=$bdd_Nom;charset=utf8", "$bdd_Login", "$bdd_Mdp");
	} catch (Exception $e) {
		echo "Erreur de connexion à la BDD ! <br><br>";
	  	echo "<a href='/Réseau Social/installation.php'>Configurer les paramètres de connexion à la base de donnée</a>";
		die();		
	}
// }else{

// 	echo "Erreur de connexion à la BDD ! <br><br>";
// 	echo "<a href='/AutoWheel/Admin/installation.php'>Configurer les paramètres de connexion à la base de donnée</a>";
// 	die();
// }

?>