<?php 

$url = '';

if(isset($_GET['url'])){
  //$url = explode('/', $_GET['url']);
  $url = $_GET['url'];
}

// echo "<pre>";
// var_dump($url);
// echo "</pre>";

if($url == '' || preg_match('#timeline#', $url, $params) || preg_match('#accueil#', $url, $params)){

  $page = 'timeline';

}elseif(preg_match('#profils?(/([0-9]+))?#', $url, $params) ){

  $page = 'profils';
  $idU = (isset($params[2]) && !empty($params[2])) ? $params[2] : getSESSIONID() ;
  
}elseif(preg_match('#about(/([0-9]+))?#', $url, $params) ){

  $page = 'about';
  $idU = (isset($params[2]) && !empty($params[2])) ? $params[2] : getSESSIONID() ;
  
}elseif(preg_match('#friends(/([0-9]+))?#', $url, $params) ){

  $page = 'friends';
  $idU = (isset($params[2]) && !empty($params[2])) ? $params[2] : getSESSIONID() ;
  
}elseif(preg_match('#pictures(/([0-9]+))?#', $url, $params) ){

  $page = 'pictures';
  $idU = (isset($params[2]) && !empty($params[2])) ? $params[2] : getSESSIONID() ;
  
}elseif(preg_match('#messages(/([0-9]+))?#', $url, $params) ){

  $page = 'messages';
  $idConv = $params[2];
  
}elseif(preg_match('#posts(/([0-9]+))#', $url, $params) ){

  $page = 'posts';
  $idPost = $params[2];
  $count = get_data('posts', 'WHERE id_p = ' . $idPost);
  if(!$count || $count == 0){ header('Location: ' . $baseUrl . 'accueil'); }
  
}elseif(preg_match('#logout#', $url, $params) ){

  $page = 'logout';
  
}elseif(preg_match('#login#', $url, $params) ){

  $page = 'login';
  
}elseif(preg_match('#search#', $url, $params) ){

  $page = 'search';
  
}elseif(preg_match('#files#', $url, $params) ){

  $page = 'files';
  
}elseif(preg_match('#notifs#', $url, $params) ){

  $page = 'notifs';
  
}elseif(preg_match('#settings#', $url, $params) ){

  $page = 'settings';
  
}else{
  $page = '404';
}