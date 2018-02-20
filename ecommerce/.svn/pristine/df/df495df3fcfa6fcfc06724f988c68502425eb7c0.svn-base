<?php
if (isset($_GET['produit']))
    $idProduit = $_GET['produit'];
if (isset($_GET['taille']))
    $taille = $_GET['taille'];
if (isset($_SESSION['ID']))
    $idUtilisateur = $_SESSION['ID'];
$req = $bdd->prepare("DELETE FROM Produit_Utilisateur WHERE ID_utilisateur = :idUtilisateur AND ID_produit = :idProduit AND Taille = :taille");
$req->bindParam(':idUtilisateur', $idUtilisateur);
$req->bindParam(':idProduit', $idProduit);
$req->bindParam(':taille', $taille);
$req->execute();
header('Location: index.php?p=commande');
?>
