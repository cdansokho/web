<?php
if(isset($_GET['id']))
{
    $idP = $_GET['id'];
    $suppression = $bdd->prepare("DELETE FROM Categorie_Produit WHERE ID_produit = $idP");
    $suppression_bis = $bdd->prepare("DELETE FROM Affiche WHERE ID_produit = $idP");
    $suppression_tri = $bdd->prepare("DELETE FROM Produit_Utilisateur WHERE ID_produit = $idP");
    $suppression_qua = $bdd->prepare("DELETE FROM Produits WHERE ID = $idP");
    $suppression->bindParam('idP', $idP);
    $suppression_bis->bindParam('idP', $idP);
    $suppression_tri->bindParam('idP', $idP);
    $suppression_qua->bindParam('idP', $idP);
    $suppression->execute();
    $suppression_bis->execute();
    $suppression_tri->execute();
    $suppression_qua->execute();
    $suppression->closeCursor();
    $suppression_bis->closeCursor();
    $suppression_tri->closeCursor();
    $suppression_qua->closeCursor();
    header("Location: index.php?p=admin&supprod=success");
}
else
    header("Location: index.php?p=admin&supprod=fail");
