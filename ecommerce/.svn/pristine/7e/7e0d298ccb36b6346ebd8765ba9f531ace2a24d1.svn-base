<?php
if(isset($_GET['id']))
{
    $idP = (int) $_GET['id'];
    if(isset($_POST['submitformprod']))
    {
        $nomprod = htmlspecialchars($_POST['nomprod']);
        $descriptprod = htmlspecialchars($_POST['descript']);
        $typeT = htmlspecialchars($_POST['typeT']);
        $det1 = htmlspecialchars($_POST['detail1']);
        $det2 = htmlspecialchars($_POST['detail2']);
        $det3 = htmlspecialchars($_POST['detail3']);
        $det4 = htmlspecialchars($_POST['detail4']);
        $prixA = htmlspecialchars($_POST['prixachat']);
        $prixV = htmlspecialchars($_POST['prixvente']);
        $nbP = htmlspecialchars($_POST['nbprod']);
        
        if(is_numeric($nbP) AND is_numeric($typeT))
        {
            $requpdate = $bdd->prepare("UPDATE Produits SET 
            Libelle = :nomprod,
            Description = :descript,
            Type = :type,
            Detail1 = :det1,
            Detail2 = :det2,
            Detail3 = :det3,
            Detail4 = :det4,
            Prix_achat = :prixA,
            Prix_vente = :prixV,
            Nombres_produit = :nbP,
            Date_modification = NOW()
            WHERE ID = :idp");
            $requpdate->bindValue(':nomprod', $nomprod, PDO::PARAM_STR);
            $requpdate->bindValue(':descript', $descriptprod, PDO::PARAM_STR);
            $requpdate->bindValue(':type', $typeT, PDO::PARAM_INT);
            $requpdate->bindValue(':det1', $det1, PDO::PARAM_STR);
            $requpdate->bindValue(':det2', $det2, PDO::PARAM_STR);
            $requpdate->bindValue(':det3', $det3, PDO::PARAM_STR);
            $requpdate->bindValue(':det4', $det4, PDO::PARAM_STR);
            $requpdate->bindValue(':prixA', $prixA, PDO::PARAM_STR);
            $requpdate->bindValue(':prixV', $prixV, PDO::PARAM_STR);
            $requpdate->bindValue(':nbP', $nbP, PDO::PARAM_INT);
            $requpdate->bindValue(':idp', $idP, PDO::PARAM_INT);
            $requpdate->execute();
            
             /* SI img 1 modifier */
            if(isset($_FILES['img1']) AND !empty($_FILES['img1']['name'])) {
               $tailleMax = 2097152;
               $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
               if($_FILES['img1']['size'] <= $tailleMax) {
                  $extensionUpload = strtolower(substr(strrchr($_FILES['img1']['name'], '.'), 1));
                  if(in_array($extensionUpload, $extensionsValides)) {
                     $chemin = "assets/images/produits/img1_".$idP.".".$extensionUpload;
                     $resultat = move_uploaded_file($_FILES['img1']['tmp_name'], $chemin);
                     if($resultat) {
                        $updateavatar = $bdd->prepare('UPDATE Produits SET Path_image = :img1 WHERE ID = :idp');
                        $updateavatar->bindValue(':img1', $chemin, PDO::PARAM_STR);
                        $updateavatar->bindValue(':idp', $idP, PDO::PARAM_INT);
                        $updateavatar->execute();
                        $updateavatar->closeCursor();
                     } 
                      else 
                        header("Location: index.php?p=update_prod&img1=importfqil");
                  } 
                   else 
                        header("Location: index.php?p=update_prod&img1=formatfail");
               }
                else 
                   header("Location: index.php?p=update_prod&img1=sizefail");
            }
            else
                header("Location: index.php?p=update_prod&img1=pasacces");
             /* FIN SI img 1 modifier */
            /* SI img 2 modifier */
            if(isset($_FILES['img2']) AND !empty($_FILES['img2']['name'])) {
               $tailleMax = 2097152;
               $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
               if($_FILES['img2']['size'] <= $tailleMax) {
                  $extensionUpload = strtolower(substr(strrchr($_FILES['img2']['name'], '.'), 1));
                  if(in_array($extensionUpload, $extensionsValides)) {
                     $chemin = "assets/images/produits/img2_".$idP.".".$extensionUpload;
                     $resultat = move_uploaded_file($_FILES['img2']['tmp_name'], $chemin);
                     if($resultat) {
                        $updateavatar = $bdd->prepare('UPDATE Produits SET Path_mini_image1 = :img2 WHERE ID = :idp');
                        $updateavatar->bindValue(':img2', $chemin, PDO::PARAM_STR);
                        $updateavatar->bindValue(':idp', $idP, PDO::PARAM_INT);
                        $updateavatar->execute();
                        $updateavatar->closeCursor();
                     } 
                      else 
                        header("Location: index.php?p=update_prod&img1=importfqil");
                  } 
                   else 
                        header("Location: index.php?p=update_prod&img1=formatfail");
               }
                else 
                   header("Location: index.php?p=update_prod&img1=sizefail");
            }
            else
                header("Location: index.php?p=update_prod&img1=pasacces");
             /* FIN SI img 2 modifier */
            /* SI img 3 modifier */
            if(isset($_FILES['img3']) AND !empty($_FILES['img3']['name'])) {
               $tailleMax = 2097152;
               $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
               if($_FILES['img3']['size'] <= $tailleMax) {
                  $extensionUpload = strtolower(substr(strrchr($_FILES['img3']['name'], '.'), 1));
                  if(in_array($extensionUpload, $extensionsValides)) {
                     $chemin = "assets/images/produits/img3_".$idP.".".$extensionUpload;
                     $resultat = move_uploaded_file($_FILES['img3']['tmp_name'], $chemin);
                     if($resultat) {
                        $updateavatar = $bdd->prepare('UPDATE Produits SET Path_mini_image2 = :img3 WHERE ID = :idp');
                        $updateavatar->bindValue(':img3', $chemin, PDO::PARAM_STR);
                        $updateavatar->bindValue(':idp', $idP, PDO::PARAM_INT);
                        $updateavatar->execute();
                        $updateavatar->closeCursor();
                     } 
                      else 
                        header("Location: index.php?p=update_prod&img1=importfqil");
                  } 
                   else 
                        header("Location: index.php?p=update_prod&img1=formatfail");
               }
                else 
                   header("Location: index.php?p=update_prod&img1=sizefail");
            }
            else
                header("Location: index.php?p=update_prod&img1=pasacces");
             /* FIN SI img 3 modifier */
            /* SI img 4 modifier */
            if(isset($_FILES['img4']) AND !empty($_FILES['img4']['name'])) {
               $tailleMax = 2097152;
               $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
               if($_FILES['img4']['size'] <= $tailleMax) {
                  $extensionUpload = strtolower(substr(strrchr($_FILES['img4']['name'], '.'), 1));
                  if(in_array($extensionUpload, $extensionsValides)) {
                     $chemin = "assets/images/produits/img4_".$idP.".".$extensionUpload;
                     $resultat = move_uploaded_file($_FILES['img4']['tmp_name'], $chemin);
                     if($resultat) {
                        $updateavatar = $bdd->prepare('UPDATE Produits SET Path_mini_image3 = :img4 WHERE ID = :idp');
                        $updateavatar->bindValue(':img4', $chemin, PDO::PARAM_STR);
                        $updateavatar->bindValue(':idp', $idP, PDO::PARAM_INT);
                        $updateavatar->execute();
                        $updateavatar->closeCursor();
                     } 
                      else 
                        header("Location: index.php?p=update_prod&img1=importfqil");
                  } 
                   else 
                        header("Location: index.php?p=update_prod&img1=formatfail");
               }
                else 
                   header("Location: index.php?p=update_prod&img1=sizefail");
            }
            else
                header("Location: index.php?p=update_prod&img1=pasacces");
             /* FIN SI img 4 modifier */
            /* SI img 5 modifier */
            if(isset($_FILES['img5']) AND !empty($_FILES['img5']['name'])) {
               $tailleMax = 2097152;
               $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
               if($_FILES['img5']['size'] <= $tailleMax) {
                  $extensionUpload = strtolower(substr(strrchr($_FILES['img5']['name'], '.'), 1));
                  if(in_array($extensionUpload, $extensionsValides)) {
                     $chemin = "assets/images/produits/img5_".$idP.".".$extensionUpload;
                     $resultat = move_uploaded_file($_FILES['img5']['tmp_name'], $chemin);
                     if($resultat) {
                        $updateavatar = $bdd->prepare('UPDATE Produits SET Path_mini_image4 = :img5 WHERE ID = :idp');
                        $updateavatar->bindValue(':img5', $chemin, PDO::PARAM_STR);
                        $updateavatar->bindValue(':idp', $idP, PDO::PARAM_INT);
                        $updateavatar->execute();
                        $updateavatar->closeCursor();
                     } 
                      else 
                        header("Location: index.php?p=update_prod&img1=importfqil");
                  } 
                   else 
                        header("Location: index.php?p=update_prod&img1=formatfail");
               }
                else 
                   header("Location: index.php?p=update_prod&img1=sizefail");
            }
            else
                header("Location: index.php?p=update_prod&img1=pasacces");
             /* FIN SI img 5 modifier */
            $idP = (int) $_GET['id'];
            header("Location: index.php?p=update_prod&id=$idP&action=success");
        }
        else
            header("Location: index.php?p=update_prod&action=notnb");
    }
}
    else
        header("Location: index.php?p=update_prod&action=fail");