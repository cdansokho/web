<?php
    if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
       $idU = $_GET['id'];
       $tailleMax = 2097152;
       $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
       if($_FILES['avatar']['size'] <= $tailleMax) {
          $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
          if(in_array($extensionUpload, $extensionsValides)) {
             $chemin = "assets/images/avatar/".$idU.".".$extensionUpload;
             $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
             if($resultat) {
                $updateavatar = $bdd->prepare('UPDATE Utilisateurs SET Path_image = :avatar WHERE ID = :id');
                $updateavatar->bindValue(':avatar', $chemin, PDO::PARAM_STR);
                $updateavatar->bindValue(':id', $idU, PDO::PARAM_INT);
                $updateavatar->execute();
                header("Location: index.php?p=profile&avatar=success");
             } 
              else 
                header("Location: index.php?p=profile&avatar=importfqil");
          } 
           else 
                header("Location: index.php?p=profile&avatar=formatfail");
       }
        else 
           header("Location: index.php?p=profile&avatar=sizefail");
    }
else
    header("Location: index.php?p=profile&avatar=pasacces");
?>