<?php

function vardump($var){ echo "<pre>"; var_dump($var); echo "</pre>"; exit; }
function printr($var){ echo "<pre>"; print_r($var); echo "</pre>"; exit; }
function echovar(){ printr(get_defined_vars()); }
function protect_input($champ){ return addslashes(htmlentities(trim($champ))); }

function token($crypted_mdp, $email, $id){

  $pass_token = sha1(md5(sha1(md5($crypted_mdp))));
  $log_token = md5(sha1(md5(sha1(md5($email)))));
  $separateur = "/@/!\\@\\";
  
  $token = $pass_token . $log_token . $separateur . $email . "-" . $log_token;
  $token = sha1(sha1(sha1($token))) . "---" . $id;
  
  return $token;
}

function getSESSIONID(){
  if(isset($_SESSION['authToken'])){
    $token = $_SESSION['authToken'];
    $authentification = explode("---", $token);
    
    $key = $authentification[0]; $key_id = $authentification[1];
    
    global $bdd;
    $query = "SELECT * FROM users WHERE id_u = " . $key_id;
    $query = $bdd->query($query);
    $verif = $query->rowCount();
    
    if($verif != 0){
      $data = $query->fetch(PDO::FETCH_ASSOC);
      $data_email = $data['email']; $data_password = $data['mdp']; 
      
      $newToken = token($data_password, $data_email, $key_id);

      if($token == $newToken){
        return intval($key_id);
      }else{
        echo "Erreur dans le token ! Reconnectez-vous <a href='logout'>depuis cette page</a>";
        exit;
      }  
    }else{ $erreur = ""; return false; }
  }
}

if(isset($_COOKIE["authToken"]) && !$_SESSION["authToken"] ){
    session_start();

    $token = $_COOKIE['authToken'];
    $authentification = explode("---", $token);
    
    $key = $authentification[0]; $key_id = $authentification[1];
    
    global $bdd;
    $query = "SELECT * FROM users WHERE id_u = " . $key_id;
    $query = $bdd->query($query);
    $verif = $query->rowCount();
    
    if($verif != 0){
        $data = $query->fetch(PDO::FETCH_ASSOC);
        $data_email = $data['email']; $data_password = $data['mdp']; 
      
        $newToken = token($data_password, $data_email, $key_id);

    if($token == $newToken){

      $_SESSION["authToken"] = $token;

      setcookie("authToken", $token, time() + 60 * 60 * 24 * 30, "/");

    }else{

      echo "Erreur SESSION / COOKIE";
      echo "<br><br><br>";
      echo "<a href='logout'>Reinitialiser</a>";
      exit;
    }

  }
}

function r_i_s($val, $texte, $default = ''){ // replace_if_isset
  if(isset($val) && !empty($val)){ echo $texte; }else{ echo $default; }
  return $return;
}


function format_date($date, $format = 1){
  $jour_fr = array("Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi");
  $mois_fr = Array("", "Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", 
          "Septembre", "Octobre", "Novembre", "Décembre");

  $date = date("w/d/n/Y/G/i", strtotime($date));
  list($nom_jour, $jour, $mois, $annee, $hours, $minutes) = explode('/', $date);
  
  if($format == 1){
    return $jour_fr[$nom_jour] . ' ' . $jour . ' ' . $mois_fr[$mois] . ' ' . $annee . ' à ' . $hours . 'h' . $minutes;
  }elseif($format == 2){
    return $jour . ' ' . $mois_fr[$mois] . ' ' . $annee;
  }elseif($format == 3){
    return $jour_fr[$nom_jour] . ' ' . $jour . ' ' . $mois_fr[$mois] . ' ' . $annee;
  }else{
    return $date;
  }
}


function upload_images($name, $link ,$new_nom, $indice = 0){

  global $baseFileUrl; $valid = false;
  
  if(!is_dir($baseFileUrl . $link)){ mkdir($baseFileUrl . $link); }
  
  if ($_FILES[$name]['error'][$indice] > 0) $erreur = "Erreur lors du transfert";
  if ($_FILES[$name]['size'][$indice] > 3000000000) $erreur = "Le fichier est trop gros";
  
  $extensions_valides = array('jpg','jpeg','gif','png');
  $extension_upload = strtolower(  substr(  strrchr($_FILES[$name]['name'][$indice],'.'),1)  );
  
  $url_img = $baseFileUrl . $link . "/" . $new_nom;
  
  if(in_array($extension_upload,$extensions_valides) ){
    $valid = true;
  }else{ $erreur = "Erreur lors de l'upload";}


  if($valid && empty($erreur)){ 

    $resultat = move_uploaded_file($_FILES[$name]['tmp_name'][$indice], $url_img);
    if(!$resultat){ return 'Erreur lors de la sauvegarde de l\'image !'; }

    return '';

  }else{
    return $erreur;
  }
}

function upload_image($name, $link ,$new_nom){

  global $baseFileUrl; $valid = false;
  
  if(!is_dir($baseFileUrl . $link)){ mkdir($baseFileUrl . $link); }
  
  if ($_FILES[$name]['error'] > 0) $erreur = "Erreur lors du transfert";
  if ($_FILES[$name]['size'] > 3000000000) $erreur = "Le fichier est trop gros";
  
  $extensions_valides = array('jpg','jpeg','gif','png');
  $extension_upload = strtolower(  substr(  strrchr($_FILES[$name]['name'],'.'),1)  );
  
  $url_img = $baseFileUrl . $link . "/" . $new_nom;
  
  if(in_array($extension_upload,$extensions_valides) ){
    $valid = true;
  }else{ $erreur = "Erreur lors de l'upload";}


  if($valid && empty($erreur)){ 

    $resultat = move_uploaded_file($_FILES[$name]['tmp_name'], $url_img);
    if(!$resultat){ return 'Erreur lors de la sauvegarde de l\'image !'; }

    return '';

  }else{
    return $erreur;
  }
}

function deltree($dossier){
  if(is_dir($dossier)){
    if(($dir = opendir($dossier)) === false){ return false; }

    while($name=readdir($dir)){
      if($name==='.' or $name==='..'){ continue;  }

      $full_name = $dossier.'/'.$name;

      if(is_dir($full_name)){ 
          deltree($full_name); 
      }else{ 
          unlink($full_name);
      }
    }
    closedir($dir);
    rmdir($dossier);
  }
}

function if_is_menu($nom, $comparaison){
  if(isset($nom) && !empty($nom)){
    if($nom == $comparaison){
      echo 'class="active"';
    }
  }
}

// function getProfilImage($users_id){
//   //global $baseUrl;

//   $imageUrl = "/Social/images/users/";

//   $url = $imageUrl . $users_id . ".jpg";

//   if(file_exists("../../../images/" . $users_id)){  
//     $url_image = "/Social/images/" . $users_id;
//   }

//   return $url_image;
// }

function getImage($users_id, $type){
  global $baseUrl;

  $url = "images/".$type."/default.jpg";
  if(file_exists($url)){ $url_image = $baseUrl . $url; }

  $url = "images/".$type."/" . $users_id . ".jpg";
  if(file_exists($url)){ $url_image = $baseUrl . $url; }

  $url = "../../../images/".$type."/default.jpg";
  if(file_exists($url)){ $url_image = $baseUrl . "images/".$type."/default.jpg";}

  $url = "../../../images/".$type."/" . $users_id . ".jpg";
  if(file_exists($url)){ $url_image = $baseUrl . "images/".$type."/" . $users_id . ".jpg"; }


  return $url_image;
}

function getProfilImage($users_id){ return getImage($users_id, 'users'); }
function getConvImage($conv_id){ return getImage($conv_id, 'conv'); }
function getCoverImage($users_id){ return getImage($users_id, 'cover'); }



function emojisLoad(){

  global $baseUrl;

  $datas = get_datas('emojis');
?>
<div class="emojionepicker" id="emojionepicker" style="bottom:71px;">
  <nav>
    <div class="tab active"><img class="emojione" src="<?= $baseUrl ?>/images/emojis/tabEmojis/people.png"></div>
    <div class="tab"><img class="emojione" src="<?= $baseUrl ?>/images/emojis/tabEmojis/nature.png"></div>
    <div class="tab"><img class="emojione" src="<?= $baseUrl ?>/images/emojis/tabEmojis/food.png"></div>
    <div class="tab"><img class="emojione" src="<?= $baseUrl ?>/images/emojis/tabEmojis/objects.png"></div>
    <div class="tab"><img class="emojione" src="<?= $baseUrl ?>/images/emojis/tabEmojis/activity.png"></div>
    <div class="tab"><img class="emojione" src="<?= $baseUrl ?>/images/emojis/tabEmojis/travel.png"></div>
    <div class="tab"><img class="emojione" src="<?= $baseUrl ?>/images/emojis/tabEmojis/symbols.png"></div>
    <div class="tab"><img class="emojione" src="<?= $baseUrl ?>/images/emojis/tabEmojis/flags.png"></div>
  </nav>
  <section class="people" style="display: block;">
<?php
  while($data = $datas->fetch(PDO::FETCH_ASSOC)){

    $emojiUrl = $baseUrl . 'images/emojis/' . $data['id_emoji'] . '.png';
    $emojiShortcut = $data['raccourci_emoji'];
    $emojiName = $data['nom_emoji'];

    echo '<img class="emojione" alt="' . $emojiName . '" title="' . $emojiName . '" data-value="' . $emojiShortcut . '" src="' . $emojiUrl . '">';
  }
  echo '</section></div>';
}


function countElemInDir($directory){
  //$directory = "../images/projets/" . $id . "/";
  $file_count = 1; $exist = true;

  while($exist == true){

    $d = $directory . $file_count . ".jpg";

    if(file_exists($d)){
        $file_count++;
    }else{
        $file_count--;
        $exist = false;
    }
  }

  return $file_count;
}

function parseForEditing($message){
  global $baseUrl;

  $replace = array('<img class="img-responsive pad" src="' . $baseUrl . 'images/Photos/', '.jpg" alt="Photo">');
  $find = array('<!-- INSERT CONTENT BEFORE --> ::Image:', ':: <!-- INSERT CONTENT AFTER -->');
  $message = str_replace($find, $replace, $message);

  return addslashes($message);

}

