<?php
    require_once("config.php");

if(isset($_GET['id']))
{
    $ida = intval($_GET['id']);
    $query = "DELETE FROM articles WHERE id=$ida";
    $suppression = $bdd->query($query);
    $suppression->execute();
    header("Location: admin.php");
}