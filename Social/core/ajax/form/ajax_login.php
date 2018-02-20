<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$email = array(
  'nomChamp' => 'email',
  'value' => $_POST['email'],
  'msgErrorEmpty' => 'Veuillez saisir <b>votre adresse email</b>',
  'msgErrorRegex' => 'Veuillez saisir une adrese email <b><u>valide</u> email@domaine.extension</b> !',
  'RegexCompare' => '#^[a-z0-9_\-.]{3,64}@[a-z0-9-_]{3,64}.([a-z]{2,5})$#'
);

$mdp = array(
  'nomChamp' => 'mdp',
  'value' => $_POST['password'],
  'msgErrorEmpty' => 'Veuillez saisir <b>votre mdp</b>',
  'msgErrorRegex' => 'Le mdp <b>doit contenir entre 3 et 15 caractères</b> !',
  'RegexCompare' => '#^[a-zA-Z0-9]{3,15}$#'
);

$remember = array(
  'nomChamp' => 'remember',
  'value' => $_POST['remember'],
  'msgErrorEmpty' => 'Se souvenir de moi -> EMPTY'
);

$donnees = array($email, $mdp, $remember);
$return = traitement('loginForm', $donnees);

echo $return;

?>
