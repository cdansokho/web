<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";
require "../../parse_emoji_message.php";

$erreur = '';

if(isset($_POST['idPost']) && !empty($_POST['idPost'])){
  if(isset($_POST['response']) && !empty($_POST['response'])){

      $idUser = getSESSIONID();
      
      $requete = "INSERT INTO reponses (author, contenu, id_posts) VALUES (:author, :contenu, :id_posts)";
      $requete = $bdd->prepare($requete);

      $requete = $requete->execute(array(
        ':author' => $idUser, 
        ':contenu' => $_POST['response'], 
        ':id_posts' => (int) $_POST['idPost']
      ));

      if($requete){

        $lastId = $bdd->lastInsertId();

        $author = get_data('users', 'WHERE id_u = ' . $idUser);
        $date = format_date( date('d-m-Y H:i:s', time()) );
?>
      <div class="box-comment">
        <img class="img-circle img-sm" src="<?= getProfilImage($author['id_u']) ?>" alt="User Image">
        <div class="comment-text">
          <span class="username">
          <a href="<?= $baseUrl ?>profils/<?= $author['id_u'] ?>"><?= $author['nom'] ?></a>
          <span class="text-muted pull-right deleteRep" data-idRep="<?= $lastId ?>" data-idAuthor="<?= $author['id_u'] ?>"><?= $date ?></span>
          </span>
          <?= emojisParse($_POST['response']) ?>
        </div>
      </div>
<?php
        
      }else{
        $erreur = "Une erreur est survenu ! :(";
      }

  } else{ $erreur = "Erreur, une données est manquante ! response"; }
}else{ $erreur = "Erreur, une données est manquante ! idPost"; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }