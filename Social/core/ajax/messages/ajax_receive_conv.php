<?php

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";

if(isset($_POST['users_id']) && !empty($_POST['users_id'])){

        $idConv = (isset($_POST['idConv']) && !empty($_POST['idConv'])) ? (int) $_POST['idConv'] : 0 ;

        $users_id = (int) $_POST['users_id'];

        $my_infos = get_data('users', 'WHERE id_u = ' . $users_id);
        $datas = get_datas('tchat_conv t', 'WHERE id_users_conv LIKE "%user-' . $users_id . ',%" ORDER BY date_last_msg DESC');

        while($data = $datas->fetch(PDO::FETCH_ASSOC)){

            $last_msg = get_data('tchat_msg', 'WHERE id_conv = ' . $data['id_conv'] . ' ORDER BY date_msg DESC');
            $ConvInfo = get_data('tchat_conv', 'WHERE id_conv = ' . $data['id_conv']);

            $nomConv = $ConvInfo['nom_conv'];

            $nbUsers = substr_count($ConvInfo['id_users_conv'], 'user-');
            $nomConv = str_replace($my_infos['nom'] . ' - ', ' ', $nomConv);
            $nomConv = substr($nomConv, 0, -3);

            if($nbUsers == 2 OR $nbUsers == 1){  
                $userNomConv = str_replace(' - ', '', $nomConv);
                $req = $bdd->query('SELECT id_u FROM users WHERE nom = "' . trim($userNomConv) . '"')->fetch()['id_u'];
                $imageConv = getProfilImage($req);
            }else{
                $imageConv = getConvImage($idConv);
            }

            $lastMsgContent = substr($last_msg['contenu'], 0, 55);
            $lastMsgDate = format_date($data['date_last_msg'], 2);

            $selected = ($idConv == $data['id_conv']) ? 'selected' : '' ;

            $unread = (strpos($data['id_users_view'], 'user-'.$users_id.',') === false) ? 'unread' : '';
            ?>
            <a class="list-group-item media marginTop0 cursorPointer jsEventClickConv <?= $unread ?> <?= $selected ?>" id="<?= $data['id_conv'] ?>">
                <span class="unreaded-alert">!</span>
                <div class="pull-left">
                    <img src="<?= $imageConv ?>" alt="" class="img-avatar">
                </div>
                <div class="media-body">
                    <small class="list-group-item-heading"><b><?= $nomConv ?></b></small><br>
                    <small class="list-group-item-text c-gray"><?= $lastMsgContent ?> ...</small>
                </div>
            </a>
<?php 
        } 
}else{ $erreur = "Erreur, une données est manquante ! users_id"; }

if(isset($erreur) && !empty($erreur)){ echo $erreur; }
?>