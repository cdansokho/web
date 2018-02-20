<?php 

require "../../../includes/config.php";
require "../../../includes/bdd.php";
require "../../sql.php";
require "../../function.php";
require "../../traitement.php";
include "../../parse_emoji_message.php";



if(isset($_POST['message']) && !empty($_POST['message'])){

  $message = $_POST['message'];
  echo emojisParse($message);

}