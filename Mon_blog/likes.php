<?php
    require_once("config.php");

if(isset($_GET['id'], $_GET['t']) and !empty($_GET['id']) and !empty($_GET['t']))
{
    $ida = (int) $_GET['id'];
    $idt = (int) $_GET['t'];
    $idu = $_SESSION['id'];
    
    if($idt == 1)
    {
        $verif_like = $bdd->prepare("SELECT id FROM likes WHERE id_art = :idart AND id_users = :idu");
        $verif_like->bindValue(':idart', $ida, PDO::PARAM_INT);
        $verif_like->bindValue(':idu', $idu, PDO::PARAM_INT);
        $verif_like->execute() or die(print_r($verif_like->errorInfo()));
        
        if($verif_like->rowCount() == 1)
        {
            $suplike = $bdd->prepare("DELETE FROM likes WHERE id_art = :idart AND id_users = :idu");
            $suplike->bindValue(':idart', $ida, PDO::PARAM_INT);
            $suplike->bindValue(':idu', $idu, PDO::PARAM_INT);
            $suplike->execute() or die(print_r($suplike->errorInfo()));
            header("Location: post.php?id=$ida");
        }
        else
        {
            $req = "INSERT INTO likes(id_art, id_users) VALUE(:art, :id_u)";
            $like = $bdd->prepare($req);
            $like->bindValue(':art', $ida, PDO::PARAM_INT);
            $like->bindValue(':id_u', $idu, PDO::PARAM_INT);
            $like->execute() or die(print_r($like->errorInfo()));
            header("Location: post.php?id=$ida");
        }

    }
    elseif($idt == 2)
    {
        $verif_dislike = $bdd->prepare("SELECT id FROM dislikes WHERE id_art = :idart AND id_users = :idu");
        $verif_dislike->bindValue(':idart', $ida, PDO::PARAM_INT);
        $verif_dislike->bindValue(':idu', $idu, PDO::PARAM_INT);
        $verif_dislike->execute() or die(print_r($verif_dislike->errorInfo()));
        
        if($verif_dislike->rowCount() == 1)
        {
            $supdislike = $bdd->prepare("DELETE FROM dislikes WHERE id_art = :idart AND id_users = :idu");
            $supdislike->bindValue(':idart', $ida, PDO::PARAM_INT);
            $supdislike->bindValue(':idu', $idu, PDO::PARAM_INT);
            $supdislike->execute() or die(print_r($supdislike->errorInfo()));
            header("Location: post.php?id=$ida");
        }
        else
        {
            $req = "INSERT INTO dislikes(id_art, id_users) VALUE(:art, :id_u)";
            $dislike = $bdd->prepare($req);
            $dislike->bindValue(':art', $ida, PDO::PARAM_INT);
            $dislike->bindValue(':id_u', $idu, PDO::PARAM_INT);
            $dislike->execute() or die(print_r($dislike->errorInfo()));
            header("Location: post.php?id=$ida");
        }
    }
    else
        header("Location: admin.php");
}
else
    header("Location: admin.php");