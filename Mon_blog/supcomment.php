<?php
    require_once("config.php");

if(isset($_GET['delete']) && isset($_GET['id']))
{
    $idc = intval($_GET['delete']);
    $idp = intval($_GET['id']);
    $query = "DELETE FROM commentaires WHERE id_c=$idc";
    $suppression = $bdd->query($query);
    $suppression->execute();
    header("Location: post.php?id=$idp");
}
else
    echo "pas cmarch2";
