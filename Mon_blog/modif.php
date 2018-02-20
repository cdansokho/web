<?php
if(!isset($_GET['comment']) or !isset($_GET['id'])) {
	header("Location: index.php");
}else{
    if(is_numeric($_GET['comment']) AND is_numeric($_GET['id']))
    {
        $idc = intval($_GET['comment']);
        $idp = intval($_GET['id']);
    }
    else
        header("Location: index.php");
}
require_once("config.php");
$demande = $bdd->query('SELECT * FROM commentaires WHERE id_c ="'.$idc.'"');
$reponse = $demande->fetch();
if(isset($_POST['submit']))
{
    if(!empty($_POST['textmaj']))
    {
        $textmaj = htmlspecialchars(htmlentities($_POST['textmaj']));
        
        $req = "UPDATE commentaires SET commentaire = :textmaj";
        $maj = $bdd->prepare($req);
        $maj->bindValue(':textmaj', $textmaj, PDO::PARAM_STR);
        $maj->execute() or die(print_r($maj->errorInfo()));            
        header("Location: post.php?id=$idp");
    }
    else
        $message = "Veuillez remplir tout les champs";
}
?>
    <link rel="stylesheet" href="css/modif.css">

    <body>
        <div class="centre">
               <div class="espace"></div>
            <form action="" method="post" class="form">
                <div class="tit">Mofication</div>
                <div class="text"><textarea name="textmaj"><?php echo $reponse['commentaire']?></textarea></div>
                <?php
                    if(isset($message))
                        echo "<div class='message'>$message</div>";
                ?>
                <div class="buton"><input type="submit" name="submit" value="Mettre à jour"></div>
            </form>
        </div>
    </body>