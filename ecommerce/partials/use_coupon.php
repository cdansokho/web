<?php
    if(isset($_POST['submit']))
    {
        $req = $bdd->prepare("SELECT * FROM Coupons");
        $req->execute();
        $verifcoup = $req->fetch();
        $req->closeCursor();
        if(isset($_POST['coupon']))
        {
            $coupon =  $_POST['coupon'];
            $coupon = ltrim($coupon);
            $coupon = rtrim($coupon);
            $idU = $_SESSION['ID'];
            $idC = $verifcoup['ID'];
            $contenuC = $verifcoup['Libelle'];
            $req = $bdd->prepare("SELECT * FROM Utilisateur_Coupon WHERE ID_utilisateur = $idU");
            $req->execute();
            $usecheck = $req->rowCount();
            $req->closeCursor();
            if($usecheck == 0)
            {
                if($coupon == $contenuC)
                {
                    $req = $bdd->prepare("INSERT INTO Utilisateur_Coupon(ID_utilisateur, ID_coupon) VALUE(:idU,:idC)");
                    $req->bindValue(':idU', $idU, PDO::PARAM_INT);
                    $req->bindValue(':idC', $idC, PDO::PARAM_INT);
                    $req->execute();
                    header("Location: index.php?p=commande&coupon=SUCCESS");
                }
                else
                    header("Location: index.php?p=commande&coupon=FAIL");
            }
            else
                header("Location: index.php?p=commande&coupon=USE");

        }
        else
            header("Location: index.php?p=commande&coupon=FAIL");
    }
?>
