<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$idU = getSESSIONID();
$makePost = false;

foreach ($_FILES["uploadFiles"]["error"] as $key => $error) {


  $positionPointExtension = strpos($_FILES['uploadFiles']['name'][$key], '.');
  $nom = substr($_FILES['uploadFiles']['name'][$key], 0, $positionPointExtension);

  $r = $bdd->prepare('INSERT INTO photos (nom_photo, id_u) VALUES (:nom_photo, :id_u)');
  $r->execute(array('nom_photo' => $nom, 'id_u' => $idU));

  $lastId = $bdd->lastInsertId();

  $file = 'images/photos/' . $idU;
  $erreur =  upload_images('uploadFiles', $file , $lastId . '.jpg', $key);

  if(!empty($erreur)){
    echo $erreur;
    $bdd->query('DELETE FROM photos WHERE id_photo = ' . $lastId);
  }else{
    if($_POST['album'] != 'none' && $_POST['album'] > 0 ){
      $bdd->query("INSERT INTO lier_photos (id_photo, id_album) VALUES (" . $lastId . ", " . $_POST['album'] .")");
    }

    $makePost = true;
    $makeTemplate .= '<img class="img-responsive pad" src="'.$baseUrl.'images/Photos/'.$idU.'/'.$lastId.'.jpg" alt="Photo">';
  }

}

if($makePost){
  $requete = "INSERT INTO posts (author, message) VALUES ($idU, '$makeTemplate')";
  $bdd->query($requete);
}