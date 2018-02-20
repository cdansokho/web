<?php
    require_once("config.php");

if(isset($_GET['id']))
{
    $idu = intval($_GET['id']);
    $query = "DELETE FROM users WHERE id=$idu";
    $suppression = $bdd->query($query);
    $suppression->execute();
    header("Location: admin.php");
}