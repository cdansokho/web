<?php
    session_start();
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=bigbagbis_habi_a;charset=utf8', 'root', 'root');
    }catch(Exception $e){
        echo "Erreur de connexion a la BDD !";
        die();
    }

    if(!isset($_GET['p']) OR $_GET['p'] == "")
        $page = "accueil";
    else{
        if(!file_exists("partials/".$_GET['p'].".php"))
        {
            $page = 404;
        }
        else
            $page = $_GET['p'];
    }

    require "partials/".$page.".php";
?>
