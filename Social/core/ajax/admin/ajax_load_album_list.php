<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

$erreur = '';

  $idU = getSESSIONID(); 
  $datas = get_datas('albums', 'WHERE id_author = ' . $idU . ' ORDER BY date_album DESC');

while($data = $datas->fetch(PDO::FETCH_ASSOC)){

?>

  <option value="<?= $data['id_album'] ?>"><?= $data['nom_album'] ?></option>

<?php 
     }
?>