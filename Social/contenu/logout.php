<?php

// Fin de la SESSION
session_destroy();

// Destruction du cookie de connexion
setcookie("authToken", "", time() - 3600, "/");
setcookie("PHPSESSID",'', time() - 3600,'/'); 

// Redirection sur la page index.php
header('Location: '.$baseUrl.'login');
?>