<?php 
if(!isset($_SESSION['lvl']) and $_SESSION['lvl'] == 2)
    header("Location: index.php");
require_once("config.php");
$req = "SELECT * FROM users";
$demande = $bdd->prepare($req);
$demande->execute();
$req2 = "SELECT * FROM articles";
$demande2 = $bdd->prepare($req2);
$demande2->execute();
?>

<link rel="stylesheet" href="css/admin.css">
<body>
    <div class="banadmin">
        <h1>Espace KingAdmin</h1>
        <div class="acceuil"><a href="index.php">Acceuil</a></div>
    </div>
    <div class="grosblock">
        <div class="block">
            <div class="titre">Liste des Users</div>
            <?php 
                while($userinfo = $demande->fetch()){
            ?>
            <div class="user">
                <div><?= $userinfo['pseudo']; ?></div>
                <div>Mail : <?= $userinfo['email']; ?></div>
                <div>Niveau autorisation : <?= $userinfo['lvl']; ?></div>
                <div><a href="supusers.php?id=<?php echo $userinfo['id'] ?>"><img src="image/garbage2.png" alt="corbeil"></a></div>
            </div>
            <?php } ?>
        </div>
        <div class="block">
            <div class="titre">Titres des articles</div>
            <?php
                    while($userinfo2 = $demande2->fetch()){
                ?>
              <div class="comment">
                <div><h1><?php echo $userinfo2['titre']; ?></h1></div>
                <div><h2><?php echo $userinfo2['presentation']; ?></h2></div>
                <div><a href="supadmart.php?id=<?php echo $userinfo2['id'] ?>"><img src="image/garbage2.png" alt="corbeil"></a></div>
              </div>
            <?php } ?>
        </div>
        <div class="block">
            <div class=titre>Ajouter un utilisateur</div>
            <form action="ajoutusers.php" method="post" class="formajout">
                <div><input type="text" placeholder="Pseudo de l'utisateur" name="pseudo"></div>
                <div><input type="text" placeholder="Mail de l'utisateur" name="email"></div>
                <div><input type="text" placeholder="Mot de passe"  name="mdp"></div>
                <div><input type="number" placeholder="Son role" name="role"></div>
                <?php
                    if(isset($message))
                        echo "<div class='message'>$message</div>";
                ?>
                <div class="buton"><input type="submit" name="submit" value="Ajouter"></div>
            </form>
        </div>
    </div>
</body>