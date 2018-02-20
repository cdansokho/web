<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";


  $nom = array(
    'nomChamp' => 'nom',
    'value' => $_POST['nom'],
    'msgErrorEmpty' => 'Veuillez indiquer <b>votre nom</b> !',
    'msgErrorRegex' => 'Le nom <b>doit contenir entre 3 et 15 caractères</b> !',
    'RegexCompare' => '#[a-zA-Z0-9 -]{2,25}#'
  );
  $email = array(
    'nomChamp' => 'email',
    'value' => $_POST['email'],
    'msgErrorEmpty' => 'Veuillez indiquer <b>une adresse email</b> !',
    'msgErrorRegex' => 'L\'adresse email <b>doit être valide (<u>prenom@domaine.extension</u>)</b> !',
    'RegexCompare' => '#^[a-z0-9_\-.]{3,64}@[a-z0-9-_]{3,64}.([a-z]{2,5})$#'
  );

  // Password

  $mdpCr = array( // Crypted msg to instert
    'nomChamp' => 'mdp',
    'value' => sha1($_POST['mdp']),
    'msgErrorEmpty' => 'Veuillez indiquer <b>un mot de passe</b> !'
  );

  $mdp = array(
    'nomChamp' => 'mdp',
    'value' => $_POST['mdp'],
    'msgErrorEmpty' => 'Veuillez indiquer <b>un mot de passe</b> !',
    'msgErrorRegex' => 'Le mdp <b>doit contenir entre 3 et 15 caractères</b> !',
    'RegexCompare' => '#^[a-zA-Z0-9]{3,15}$#'
  );

  $re_mdp = array(
    'nomChamp' => 're_mdp',
    'value' => $_POST['re_mdp'],
    'msgErrorEmpty' => 'Veuillez re-indiquer <b>un mot de passe</b> !',
    'msgErrorRegex' => 'Le mdp <b>doit contenir entre 3 et 15 caractères</b> !',
    'RegexCompare' => '#^[a-zA-Z0-9]{3,15}$#'
  );

  $donnees = array($mdp, $re_mdp);
  $return = traitement('testPassword', $donnees); // Test si les champs sont définis et mdp == re_mdp -> ftc renvoie true

  if($return){

    $donnees = array($email, $nom, $mdpCr);
    $return = traitement('registerForm', $donnees , 'insert', 'users');

  }else{ $return = '<div class="alert alert-danger">Les deux mots de passe <b>ne correspondent pas !</b></div>'; }

echo $return; 



?>
