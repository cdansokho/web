<?php
if (isset($_SESSION['ID']))
    $idUtilisateur = $_SESSION['ID'];
$req = $bdd->prepare("DELETE FROM Produit_Utilisateur WHERE ID_utilisateur = :idUtilisateur");
$req->bindParam(':idUtilisateur', $idUtilisateur);
$req->execute();
header('Location: index.php?p=commande');
?>
