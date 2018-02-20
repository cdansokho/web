<?php 

require "../../../Admin/includes/config.php";
require "../../function.php";
require "../../traitement.php";


  $nom = array(
    'nomChamp' => 'nom',
    'value' => $_POST['nom'],
    'msgErrorEmpty' => 'Veuillez indiquer <b>votre nom</b> !',
    'msgErrorRegex' => 'Le nom <b>doit contenir entre 3 et 15 caractères</b> !',
    'RegexCompare' => '#[a-zA-Z0-9 -]{2,25}#'
  );
  $prenom = array(
    'nomChamp' => 'prenom',
    'value' => $_POST['prenom'],
    'msgErrorEmpty' => 'Veuillez indiquer <b>votre prenom</b> !',
    'msgErrorRegex' => 'Le prenom <b>doit contenir entre 3 et 15 caractères</b> !',
    'RegexCompare' => '#[a-zA-Z0-9]#'
  );
  $email = array(
    'nomChamp' => 'email',
    'value' => $_POST['email'],
    'msgErrorEmpty' => 'Veuillez indiquer <b>une adresse email</b> !',
    'msgErrorRegex' => 'L\'adresse email <b>doit être valide (<u>prenom@domaine.extension</u>)</b> !',
    'RegexCompare' => '#^[a-z0-9_\-.]{3,64}@[a-z0-9-_]{3,64}.([a-z]{2,5})$#'
  );
  $fixe = array(
    'nomChamp' => 'fixe',
    'value' => $_POST['fixe'],
    'msgErrorEmpty' => 'Veuillez indiquer <b>un numéro de téléphone fixe</b> !',
    'msgErrorRegex' => 'Le numéro de fixe <b>doit être valide (10 chiffres)</b> !',
    'RegexCompare' => '#^(0|\+33)[0-9]([ .-]?[0-9]{2}){4}$#'
  );
  $portable = array(
    'nomChamp' => 'portable',
    'value' => $_POST['portable'],
    'msgErrorEmpty' => 'Veuillez indiquer <b>un numéro de téléphone portable</b> !',
    'msgErrorRegex' => 'Le numéro de portable <b>doit être valide (10 chiffres)</b> !',
    'RegexCompare' => '#^(0|\+33)[0-9]([ .-]?[0-9]{2}){4}$#'
  );
  $adresse_prin_1 = array(
    'nomChamp' => 'adresse_principal_1',
    'value' => $_POST['addr1_1'],
    'msgErrorEmpty' => 'Veuillez indiquer <b>une adresse_principal_1</b>'
  );
  $adresse_prin_2 = array(
    'nomChamp' => 'adresse_principal_2',
    'value' => $_POST['addr1_2'],
    'msgErrorEmpty' => 'Veuillez indiquer <b>une adresse_principal_2</b>'
  );
  // Optionnal field
  $adresse_sec_1 = array(
    'nomChamp' => 'adresse_secondaire_1',
    'value' => $_POST['addr2_1'],
    'msgErrorEmpty' => 'Veuillez indiquer <b>une adresse_secondaire_1</b> !',
    'optionnal' => true
  );
  $adresse_sec_2 = array(
    'nomChamp' => 'adresse_secondaire_2',
    'value' => $_POST['addr2_2'],
    'msgErrorEmpty' => 'Veuillez indiquer <b>une adresse_secondaire_2</b> !',
    'optionnal' => true
  );

  // Password

  if(isset($_POST['mdp']) && !empty($_POST['mdp'])){

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
    $donnees = array($email, $nom, $prenom, $mdpCr, $fixe, $portable, $adresse_prin_1, $adresse_prin_2, $adresse_sec_1, $adresse_sec_2);

  }else{
    $return = true;
    $donnees = array($email, $nom, $prenom, $fixe, $portable, $adresse_prin_1, $adresse_prin_2, $adresse_sec_1, $adresse_sec_2);
  }


  if($return){

    $return = traitement('updateForm', $donnees , 'update', 'users', 'WHERE id_u = ' . $_POST['id_u']);

  }else{ $return = '<div class="alert alert-danger">Les deux mots de passe <b>ne correspondent pas !</b></div>'; }


echo $return; 

?>
