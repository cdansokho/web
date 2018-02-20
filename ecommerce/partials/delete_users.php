<?php
if(isset($_GET['id']))
{
    $idu = intval($_GET['id']);
    $query = "DELETE FROM Utilisateurs WHERE ID = $idu";
    $suppression = $bdd->prepare($query);
    $suppression->execute();
    header("Location: index.php?p=admin&sup=success");
}
else
    header("Location: index.php?p=admin&sup=fail");