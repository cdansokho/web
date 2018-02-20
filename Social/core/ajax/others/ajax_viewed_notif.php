<?php

require "../../../Admin/includes/config.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";


if(isset($_POST['id_n']) && !empty($_POST['id_n'])){

	$id_n = (int) $_POST['id_n'];

	$req = $bdd->query("UPDATE msg_important SET viewed = 1 WHERE id_msg_important = " . $id_n);
	if($req){

	}else{ $erreur = 'Erreur lors de la mise a jour de la base de donnée !'; }
}else{ $erreur = 'Erreur ! une donnée est manquante ! id_n'; }

if(isset($erreur) & !empty($erreur)){ echo $erreur; }