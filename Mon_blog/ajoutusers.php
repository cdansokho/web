<?php
     require_once("config.php");

    if (isset($_POST['submit']))
    {
        if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['mdp']) AND !empty($_POST['role']))
        {
            $pseudo = htmlspecialchars(htmlentities($_POST['pseudo']));
            $email = htmlspecialchars(htmlentities($_POST['email']));
            $mdp = htmlspecialchars(htmlentities(sha1($_POST['mdp'])));
            $role = htmlspecialchars(htmlentities($_POST['role']));
            
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $reqemail = $bdd->prepare("SELECT * FROM users WHERE email = ?");
                $reqemail->execute(array($email));
                $mailexit = $reqemail->rowCount();
                if($mailexit == 0)
                {
                    $inserer = "INSERT INTO users(pseudo, email, mdp, lvl) VALUE(:pseudo, :email, :mdp, :role)";
                    $reqajout = $bdd->prepare($inserer);
                    $reqajout->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
                    $reqajout->bindValue(':email', $email, PDO::PARAM_STR);
                    $reqajout->bindValue(':mdp', $mdp, PDO::PARAM_STR);
                    $reqajout->bindValue(':role', $role, PDO::PARAM_INT);
                    $reqajout->execute() or die(print_r($reqajout->errorInfo()));
                    header("Location: admin.php");
                }
                else
                    $message = "Cette email est deja utilisé";
            }
            else
                $message = "Email non valide !";
        }
        else
            $message = "Veuillez remplir tout les champs";
    }
?>