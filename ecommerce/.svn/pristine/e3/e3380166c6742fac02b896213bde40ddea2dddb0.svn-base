<?php 
    if(isset($_POST['submitaddprod']))
    {
        $nomprod = htmlspecialchars($_POST['nomprod']);
        $descriptprod = htmlspecialchars($_POST['descript']);

        $requpdate = $bdd->prepare("INSERT INTO Categories(Libelle, Description,Date_creation,Date_modification) 
        VALUES(:nomprod, :descript, NOW(),NOW())");
        $requpdate->bindValue(':nomprod', $nomprod, PDO::PARAM_STR);
        $requpdate->bindValue(':descript', $descriptprod, PDO::PARAM_STR);
        $requpdate->execute();
        $requpdate->closeCursor();
        $lastid = $bdd->prepare("SELECT ID FROM Categories ORDER BY ID DESC LIMIT 1");
        $lastid->execute();
        $lastid = $lastid->fetch();
        $lastid = $lastid['ID'];
         /* SI img 1 modifier */
        if(isset($_FILES['img1']) AND !empty($_FILES['img1']['name'])) {
           $tailleMax = 2097152;
           $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
           if($_FILES['img1']['size'] <= $tailleMax) {
              $extensionUpload = strtolower(substr(strrchr($_FILES['img1']['name'], '.'), 1));
              if(in_array($extensionUpload, $extensionsValides)) {
                 $chemin = "assets/images/categories/imgcat_".$lastid.".".$extensionUpload;
                 $resultat = move_uploaded_file($_FILES['img1']['tmp_name'], $chemin);
                 if($resultat) {
                    $updateavatar = $bdd->prepare('UPDATE Categories SET Path_image = :img1 WHERE ID = :idp');
                    $updateavatar->bindValue(':img1', $chemin, PDO::PARAM_STR);
                    $updateavatar->bindValue(':idp', $lastid, PDO::PARAM_INT);
                    $updateavatar->execute();
                    $updateavatar->closeCursor();
                 } 
                  else 
                    header("Location: index.php?p=add_categorie&img1=importfqil");
              } 
               else 
                    header("Location: index.php?p=add_categorie&img1=formatfail");
           }
            else 
               header("Location: index.php?p=add_categorie&img1=sizefail");
        }
        else
            header("Location: index.php?p=add_categorie&img1=pasacces");
         /* FIN SI img 1 modifier */

        header("Location: index.php?p=add_categorie&action=success");
    }