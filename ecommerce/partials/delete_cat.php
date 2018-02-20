<?php
if(isset($_GET['id']))
{
    $idP = $_GET['id'];
    $suppression = $bdd->prepare("DELETE FROM Categorie_Produit WHERE ID_categorie = :idP");
    $suppression_bis = $bdd->prepare("DELETE FROM Categories WHERE ID = :idP");
    $suppression_tri = $bdd->prepare("DELETE FROM Produits INNER JOIN Categorie_Produit ON Categorie_Produit.ID_produit = Produits.ID AND Categorie_Produit.ID_categorie = :idP");
    $suppression->bindParam('idP', $idP);
    $suppression_bis->bindParam('idP', $idP);
    $suppression_tri->bindParam('idP', $idP);
    $suppression->execute();
    $suppression_bis->execute();
    $suppression_tri->execute();
    $suppression->closeCursor();
    $suppression_bis->closeCursor();
    $suppression_tri->closeCursor();
    header("Location: index.php?p=admin&supprod=success");
}
else
    header("Location: index.php?p=admin&supprod=fail");
