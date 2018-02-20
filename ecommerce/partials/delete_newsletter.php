<?php
if(isset($_GET['id']))
{
    $idN = intval($_GET['id']);
    $query = "DELETE FROM Newsletter WHERE ID = $idN";
    $suppression = $bdd->prepare($query);
    $suppression->execute();
    header("Location: index.php?p=admin&supnews=success");
}
else
    header("Location: index.php?p=admin&supnews=fail");