<?php 

function get_data($selecteur, $limit = ''){
  global $bdd;
  $requete = "SELECT * FROM $selecteur " . $limit;
  $data = $bdd->query($requete);
  
  // $requete = "SELECT * FROM ? ?";
  // $data = $bdd->prepare($requete);
  // $data->execute(array($selecteur, $limit));

  $data = $data->fetch(PDO::FETCH_ASSOC);
  return $data;
}

function get_datas($selecteur, $limit = ''){
  global $bdd;
  $requete = "SELECT * FROM $selecteur " . $limit;
  $data = $bdd->query($requete);
  return $data;
}

function get_count($selecteur, $limit = ''){
  global $bdd;
  $requete = "SELECT COUNT(*) as nb FROM $selecteur $limit";
  $data = $bdd->query($requete);
  $data = $data->fetch(PDO::FETCH_ASSOC);
  $data = $data['nb'];
  return $data;
}