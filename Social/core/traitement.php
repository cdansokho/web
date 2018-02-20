<?php

function strbool($value) {
    return $value ? 'true' : 'false';
}

function test_input($value, $msgErrorEmpty, $msgErrorRegex, $RegexCompare, $optionnal){
  if($optionnal == false){
    if(isset($value) && !empty($value) ){ 
      if(!empty($RegexCompare)){
        if(preg_match( $RegexCompare, $value) == false){
          return $msgErrorRegex;
        }
      }
    }else{ return $msgErrorEmpty; }
  }
}

function inputVerification($array_name){
  $value = $array_name['value'];
  $msgErrorEmpty = $array_name['msgErrorEmpty'];

  $msgErrorRegex = $array_name['msgErrorRegex'];
  $RegexCompare = $array_name['RegexCompare'];
  $isOptionnal = $array_name['optionnal'];

  $value = htmlspecialchars($value, ENT_QUOTES,"UTF-8");
  return test_input($value, $msgErrorEmpty, $msgErrorRegex, $RegexCompare, $isOptionnal);
}

function queryPrepare($action, $table, $array, $conditionReq){
  if($action == 'update'){

    $nb_elem_val = sizeof($array);
    $nb_elem_counter = 1;

    $reqConstruct = '';

    foreach ($array as $key => $value) {
      $sep = ($nb_elem_counter < $nb_elem_val) ? ", " : '' ;
      $reqConstruct .= "$key = :$key" . $sep;
      $nb_elem_counter++;
    }

    $requete = "UPDATE $table SET " . $reqConstruct . " " . $conditionReq;
    return $requete;

  }elseif($action == 'insert'){

    $nb_elem_val = sizeof($array);
    $nb_elem_counter = 1;

    $reqConstruct_col = '';
    $reqConstruct_val = '';

    foreach ($array as $key => $value) {
      $sep = ($nb_elem_counter < $nb_elem_val) ? ", " : '' ;

      $reqConstruct_col .= "$key" . $sep;
      $reqConstruct_val .= ":$key" . $sep;
      $nb_elem_counter++;
    }

    $requete = "INSERT INTO $table (" . $reqConstruct_col . ") VALUES (" . $reqConstruct_val . ') ' . $conditionReq;
    return $requete;
  }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function testPassword($donnees){
  global $has_error, $bdd, $users_id;

  if($donnees['mdp']['value'] != $donnees['re_mdp']['value']){ 
    $has_error = true; $erreur[] = 'Les deux mots de passe ne correspondent pas !';  }

  if($has_error){
    return false;
  }else{
    return true;
  }

}

function changePassword($donnees){
  global $bdd, $users_id;

  if($donnees['old_mdp']['value'] == $donnees['new_mdp']['value']){ 
    $has_error = true; $erreur[] = 'Le nouveau mot de passe <b>doit-être différent</b> de l\'ancien !'; }

  if($donnees['new_mdp']['value'] != $donnees['repeat_mdp']['value']){ 
    $has_error = true; $erreur[] = 'Les deux mots de passe <b>ne correspondent pas</b> !';  }

  $req = $bdd->query('SELECT * FROM users WHERE id_u = ' . $users_id)->fetch(PDO::FETCH_ASSOC);

  if($req['mdp'] != sha1($donnees['old_mdp']['value'])){ 
    $has_error = true; $erreur[] = 'L\'ancien mot de passe <b>ne correspond pas</b> !';  }

  if(!$has_error){

    $mdp = array(
      'nomChamp' => 'mdp',
      'value' => sha1($donnees['new_mdp']['value']),
      'msgErrorEmpty' => 'Veuillez <b>re-saisir</b> votre nouveau mot de passe !'
    );

    $has_success = traitement('normalForm', array($mdp) , 'update', 'users', "WHERE id_u = $users_id");

    if($has_success){ return '<div class="alert alert-success">Votre mot de passe <b>a été modifié</b> !</div>'; }
    if(!$has_success){ return '<div class="alert alert-danger">Une erreur est survenu lors de la mise à jour de la BDD !</div>'; }
  
  }else{ 
    return '<div class="alert alert-danger">' . $erreur[0] . '</div>'; 
  }
}

function registerForm($donnees, $originalData){
  global $bdd, $users_id;

  $req = $bdd->query('SELECT * FROM users WHERE email = "' . $donnees['email']['value'].'"')->fetch(PDO::FETCH_ASSOC);

  if($req){ 
    $has_error = true; $erreur[] = 'Un compte avec cette adresse email <b>existe déja</b> !';  }

  if(!$has_error){

    $has_success = traitement('normalForm', $originalData , 'insert', 'users');

    if($has_success){ return 'redirect'; }
    if(!$has_success){ return '<div class="alert alert-danger">Echec de l\'inscription ! Veullez réessayer !</div>'; }
  
  }else{ 
    return '<div class="alert alert-danger">' . $erreur[0] . '</div>'; 
  }
}

function loginForm($donnees){
  global $bdd, $users_id;

  $req = 'SELECT * FROM users WHERE email = "'.$donnees['email']['value'].'" AND mdp = "'.sha1($donnees['mdp']['value']).'"';
  $req = $bdd->query($req);

  if($req->rowCount() == 0){ 
    $has_error = true; $erreur[] = 'Erreur ! mot de passe ou adresse email <b>incorrect</b> !';  }

  if(!$has_error){

    $data = $req->fetch(PDO::FETCH_ASSOC);

    $data_email = $data['email']; $data_password = $data['mdp']; $key_id = $data['id_u'];
    $newToken = token($data_password, $data_email, $key_id);

    $_SESSION['authToken'] = $newToken;

    if($donnees['remember']['value'] == 'true'){
      setcookie("authToken", $newToken, time() + 60 * 60 * 24 * 60, "/"); // Expire dans 60 jours
    }

    return 'redirect'; 
  
  }else{ 
    return '<div class="alert alert-danger a">' . $erreur[0] . '</div>'; 
  }
}

function updateForm($donnees, $originalData, $conditionReq){
  global $bdd, $users_id;

  $has_success = traitement('normalForm', $originalData , 'update', 'users', $conditionReq);

  //if($has_success){ return 'redirect'; }
  if($has_success){ return '<div class="alert alert-success"><b>Données sauvegardées</b> !</div>'; }
  if(!$has_success){ return '<div class="alert alert-danger">Echec de l\'inscription ! Veullez réessayer !</div>'; }

}

function normalForm($donnees, $BddAction, $BddTable, $conditionReq){
  global $bdd;

  echo $queryPrepare = queryPrepare($BddAction, $BddTable, $donnees, $conditionReq);
  $preparedQuery = $bdd->prepare($queryPrepare);

  foreach ($donnees as $key => $value) {
    $preparedQuery->bindValue(':'.$key, $donnees[ $key ]['value']);
  }

  $executedQuery = $preparedQuery->execute();

  if($executedQuery){
    $has_success = true;
  }else{
    $has_success = false;
  }

  return $has_success;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function traitement($nomForm, $originalData, $BddAction = '', $BddTable = '', $conditionReq = ''){

  global $bdd, $erreur, $has_error, $has_success;

  foreach ($originalData as $key => $value) {
    $nomChamp_tab = $originalData[$key]['nomChamp'];
    $formatData[ $nomChamp_tab ]['value'] = $originalData[$key]['value'];
    $formatData[ $nomChamp_tab ]['msgErrorEmpty'] = $originalData[$key]['msgErrorEmpty'];

    $formatData[ $nomChamp_tab ]['msgErrorRegex'] = $originalData[$key]['msgErrorRegex'];
    $formatData[ $nomChamp_tab ]['RegexCompare'] = $originalData[$key]['RegexCompare'];
    
    $formatData[ $nomChamp_tab ]['optionnal'] = $originalData[$key]['optionnal'];

    $erreurReturn = inputVerification( $formatData[ $nomChamp_tab ] );
    if(!empty($erreurReturn)){ $has_error = true; $erreur[] = $erreurReturn; }
  }

  if(!$has_error){


    if($nomForm == 'testInput'){
      return true;

    }elseif($nomForm == 'loginForm'){
      return loginForm($formatData);

    }elseif($nomForm == 'updateForm'){
      return updateForm($formatData, $originalData, $conditionReq);

    }elseif($nomForm == 'registerForm'){
      return registerForm($formatData, $originalData);

    }elseif($nomForm == 'testPassword'){
      return testPassword($formatData);

    }elseif($nomForm == 'changePassword'){
      return changePassword($formatData);
    }



    if($nomForm == 'normalForm'){
      return normalForm($formatData, $BddAction, $BddTable, $conditionReq);
    }

  }else{
    return '<div class="alert alert-danger">' . $erreur[0] . '</div>';
  }

}

?>