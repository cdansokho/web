<?php
    if(isset($_POST['submitgo']))
    {
        $email = htmlspecialchars($_POST['email']);
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $reqemail = $bdd->prepare("SELECT * FROM Newsletter WHERE Email = ?");
                $reqemail->execute(array($email));
                $mailexit = $reqemail->rowCount();
                if($mailexit == 0)
                {
                $req = $bdd->prepare("INSERT INTO Newsletter(Email,Date_envoi) VALUES(:email, NOW())");
                $req->bindParam(':email', $email);
                $req->execute();
                header("Location: index.php?actionnews=success");       
                }
            else
              header("Location: index.php?actionnews=use");       
        }
    }
else
    header("Location: index.php");