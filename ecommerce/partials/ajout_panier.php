<?php
if(isset($_POST['submit']))
{
         if(isset($_POST['tailleTypeUn']) AND !empty($_POST['tailleTypeUn']))
            $taille = $_POST['tailleTypeUn'];
        if(isset($_POST['tailleTypeDeux']) AND !empty($_POST['tailleTypeDeux']))
            $taille = $_POST['tailleTypeDeux'];
        if(isset($_POST['Quantite']) AND !empty($_POST['Quantite']))
            $qnt = $_POST['Quantite'];
        $idU = (int) $_SESSION['ID'];
        $idP = (int) $_GET['produit'];
        $verifexist = $bdd->prepare("SELECT * FROM Produit_Utilisateur WHERE ID_produit = $idP AND ID_utilisateur = $idU AND Taille = '$taille'");
        $verifexist->execute();
        $verif = $verifexist->rowCount();
        if($verif == 0)
        {
            $reqajout = $bdd->prepare("INSERT INTO Produit_Utilisateur (ID_produit,ID_utilisateur,Quantite,Taille) VALUES (:idP, :idU, :qnt, :taille)");
            $reqajout->bindValue(':idP', $idP, PDO::PARAM_INT);
            $reqajout->bindValue(':idU', $idU, PDO::PARAM_INT);
            $reqajout->bindValue(':qnt', $qnt, PDO::PARAM_INT);
            $reqajout->bindValue(':taille', $taille, PDO::PARAM_INT);
            $reqajout->execute() or die(print_r($reqajout->errorInfo()));
            header("Location: index.php?p=detail&produit=$idP&ajout=success");
        }
        else
        {
            $reqajoutq = $bdd->prepare("UPDATE Produit_Utilisateur SET Quantite = Quantite + $qnt WHERE ID_produit = :idP");
            $reqajoutq->bindValue(':idP', $idP, PDO::PARAM_INT);
            $reqajoutq->execute();
            header("Location: index.php?p=detail&produit=$idP&ajout=success");
        }
}
else
    header("Location: index.php");
?>
