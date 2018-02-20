<?php

function emojisParse($message){

    global $bdd, $baseUrl;


    $erreur = '';
    $val_nom = array();
    $val_raccourci = array();
    $val_image = array();


    $requete = "SELECT * FROM emojis ORDER BY LENGTH(raccourci_emoji) DESC";
    $requete = $bdd->query($requete);

    while($data = $requete->fetch(PDO::FETCH_ASSOC)){

        $val_nom[] = $data['nom_emoji'];
        $val_raccourci[] = $data['raccourci_emoji'];
        
        $url = $baseUrl . 'images/emojis/' . $data['id_emoji'] . '.png';
        $val_image[] = ' <img class="conv_emoji" src="'.$url.'" alt=""> ';

    }

    $new_message = str_replace($val_raccourci, $val_image, $message);

    return $new_message;

}