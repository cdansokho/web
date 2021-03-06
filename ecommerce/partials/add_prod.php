<?php 
    if(isset($_POST['submitaddprod']))
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
        $cate = htmlspecialchars($_POST['cate']);
        
         if(is_numeric($nbP) AND is_numeric($typeT) AND is_numeric($cate))
        {
            $requpdate = $bdd->prepare("INSERT INTO Produits(Libelle,Description ,Type, Detail1, Detail2, Detail3,Detail4,Prix_achat,Prix_vente,Nombres_produit,Nombres_vendu,Date_creation,Date_modification) 
            VALUES(
            :nomprod,
            :descript,
            :type,
            :det1,
            :det2,
            :det3,
            :det4,
            :prixA,
            :prixV,
            :nbP,0,NOW(), NOW())");
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
            $requpdate->execute();
            $requpdate->closeCursor();
            $lastid = $bdd->prepare("SELECT ID FROM Produits ORDER BY ID DESC LIMIT 1");
            $lastid->execute();
            $lastid = $lastid->fetch();
            $lastid = $lastid['ID'];
            $insercat = $bdd->prepare("INSERT INTO Categorie_Produit(ID_categorie,ID_produit) VALUES(:idC, :idP)");
            $insercat->bindValue(':idC', $cate, PDO::PARAM_INT);
            $insercat->bindValue(':idP', $lastid, PDO::PARAM_INT);
            $insercat->execute();
             /* SI img 1 modifier */
            if(isset($_FILES['img1']) AND !empty($_FILES['img1']['name'])) {
               $tailleMax = 2097152;
               $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
               if($_FILES['img1']['size'] <= $tailleMax) {
                  $extensionUpload = strtolower(substr(strrchr($_FILES['img1']['name'], '.'), 1));
                  if(in_array($extensionUpload, $extensionsValides)) {
                     $chemin = "assets/images/produits/img1add_".$lastid.".".$extensionUpload;
                     $resultat = move_uploaded_file($_FILES['img1']['tmp_name'], $chemin);
                     if($resultat) {
                        $updateavatar = $bdd->prepare('UPDATE Produits SET Path_image = :img1 WHERE ID = :idp');
                        $updateavatar->bindValue(':img1', $chemin, PDO::PARAM_STR);
                        $updateavatar->bindValue(':idp', $lastid, PDO::PARAM_INT);
                        $updateavatar->execute();
                        $updateavatar->closeCursor();
                     } 
                      else 
                        header("Location: index.php?p=ajout_prod&img1=importfqil");
                  } 
                   else 
                        header("Location: index.php?p=ajout_prod&img1=formatfail");
               }
                else 
                   header("Location: index.php?p=ajout_prod&img1=sizefail");
            }
            else
                header("Location: index.php?p=ajout_prod&img1=pasacces");
             /* FIN SI img 1 modifier */
            /* SI img 2 modifier */
            if(isset($_FILES['img2']) AND !empty($_FILES['img2']['name'])) {
               $tailleMax = 2097152;
               $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
               if($_FILES['img2']['size'] <= $tailleMax) {
                  $extensionUpload = strtolower(substr(strrchr($_FILES['img2']['name'], '.'), 1));
                  if(in_array($extensionUpload, $extensionsValides)) {
                     $chemin = "assets/images/produits/img2add_".$lastid.".".$extensionUpload;
                     $resultat = move_uploaded_file($_FILES['img2']['tmp_name'], $chemin);
                     if($resultat) {
                        $updateavatar = $bdd->prepare('UPDATE Produits SET Path_mini_image1 = :img2 WHERE ID = :idp');
                        $updateavatar->bindValue(':img2', $chemin, PDO::PARAM_STR);
                        $updateavatar->bindValue(':idp', $lastid, PDO::PARAM_INT);
                        $updateavatar->execute();
                        $updateavatar->closeCursor();
                     } 
                      else 
                        header("Location: index.php?p=ajout_prod&img1=importfqil");
                  } 
                   else 
                        header("Location: index.php?p=ajout_prod&img1=formatfail");
               }
                else 
                   header("Location: index.php?p=ajout_prod&img1=sizefail");
            }
            else
                header("Location: index.php?p=ajout_prod&img1=pasacces");
             /* FIN SI img 2 modifier */
            /* SI img 3 modifier */
            if(isset($_FILES['img3']) AND !empty($_FILES['img3']['name'])) {
               $tailleMax = 2097152;
               $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
               if($_FILES['img3']['size'] <= $tailleMax) {
                  $extensionUpload = strtolower(substr(strrchr($_FILES['img3']['name'], '.'), 1));
                  if(in_array($extensionUpload, $extensionsValides)) {
                     $chemin = "assets/images/produits/img3add_".$lastid.".".$extensionUpload;
                     $resultat = move_uploaded_file($_FILES['img3']['tmp_name'], $chemin);
                     if($resultat) {
                        $updateavatar = $bdd->prepare('UPDATE Produits SET Path_mini_image2 = :img3 WHERE ID = :idp');
                        $updateavatar->bindValue(':img3', $chemin, PDO::PARAM_STR);
                        $updateavatar->bindValue(':idp', $lastid, PDO::PARAM_INT);
                        $updateavatar->execute();
                        $updateavatar->closeCursor();
                     } 
                      else 
                        header("Location: index.php?p=ajout_prod&img1=importfqil");
                  } 
                   else 
                        header("Location: index.php?p=ajout_prod&img1=formatfail");
               }
                else 
                   header("Location: index.php?p=ajout_prod&img1=sizefail");
            }
            else
                header("Location: index.php?p=ajout_prod&img1=pasacces");
             /* FIN SI img 3 modifier */
            /* SI img 4 modifier */
            if(isset($_FILES['img4']) AND !empty($_FILES['img4']['name'])) {
               $tailleMax = 2097152;
               $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
               if($_FILES['img4']['size'] <= $tailleMax) {
                  $extensionUpload = strtolower(substr(strrchr($_FILES['img4']['name'], '.'), 1));
                  if(in_array($extensionUpload, $extensionsValides)) {
                     $chemin = "assets/images/produits/img4add_".$lastid.".".$extensionUpload;
                     $resultat = move_uploaded_file($_FILES['img4']['tmp_name'], $chemin);
                     if($resultat) {
                        $updateavatar = $bdd->prepare('UPDATE Produits SET Path_mini_image3 = :img4 WHERE ID = :idp');
                        $updateavatar->bindValue(':img4', $chemin, PDO::PARAM_STR);
                        $updateavatar->bindValue(':idp', $lastid, PDO::PARAM_INT);
                        $updateavatar->execute();
                        $updateavatar->closeCursor();
                     } 
                      else 
                        header("Location: index.php?p=ajout_prod&img1=importfqil");
                  } 
                   else 
                        header("Location: index.php?p=ajout_prod&img1=formatfail");
               }
                else 
                   header("Location: index.php?p=ajout_prod&img1=sizefail");
            }
            else
                header("Location: index.php?p=ajout_prod&img1=pasacces");
             /* FIN SI img 4 modifier */
            /* SI img 5 modifier */
            if(isset($_FILES['img5']) AND !empty($_FILES['img5']['name'])) {
               $tailleMax = 2097152;
               $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
               if($_FILES['img5']['size'] <= $tailleMax) {
                  $extensionUpload = strtolower(substr(strrchr($_FILES['img5']['name'], '.'), 1));
                  if(in_array($extensionUpload, $extensionsValides)) {
                     $chemin = "assets/images/produits/img5add_".$lastid.".".$extensionUpload;
                     $resultat = move_uploaded_file($_FILES['img5']['tmp_name'], $chemin);
                     if($resultat) {
                        $updateavatar = $bdd->prepare('UPDATE Produits SET Path_mini_image4 = :img5 WHERE ID = :idp');
                        $updateavatar->bindValue(':img5', $chemin, PDO::PARAM_STR);
                        $updateavatar->bindValue(':idp', $lastid, PDO::PARAM_INT);
                        $updateavatar->execute();
                        $updateavatar->closeCursor();
                     } 
                      else 
                        header("Location: index.php?p=ajout_prod&img1=importfqil");
                  } 
                   else 
                        header("Location: index.php?p=ajout_prod&img1=formatfail");
               }
                else 
                   header("Location: index.php?p=ajout_prod&img1=sizefail");
            }
            else
                header("Location: index.php?p=ajout_prod&img1=pasacces");
             /* FIN SI img 5 modifier */
            header("Location: index.php?p=ajout_prod&action=success");
         }
    }