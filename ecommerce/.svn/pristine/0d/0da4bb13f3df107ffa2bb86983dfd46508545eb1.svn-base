<?php 
if(!isset($_SESSION['co']))
    header("Location: index.php");
if(isset($_SESSION['Role']) AND $_SESSION['Role'] > 1)
    header("Location: index.php");

$demande = $bdd->prepare("SELECT * FROM Utilisateurs ORDER BY Nom ASC");
$demande->execute();
$reqprod = $bdd->prepare("SELECT * FROM Produits ORDER BY Libelle ASC");
$reqprod->execute();
$reqnews = $bdd->prepare("SELECT * FROM Newsletter");
$reqnews->execute() or die(print_r($reqnews->errorInfo()));
$demanderole = $bdd->prepare("SELECT * FROM Rôle INNER JOIN Utilisateurs ON Utilisateurs.iD = AND Rôle.ID = Utilisateurs.Rôle");
$demanderole->execute();
$reqcategorie = $bdd->prepare("SELECT * FROM Categories ORDER BY Libelle ASC"); 
$reqcategorie->execute();

$inforole = $demanderole->fetch();
if(isset($_GET['sup']) AND $_GET['sup'] == "success")
        header("Refresh:5; url=index.php?p=admin");
if(isset($_GET['update']) AND $_GET['update'] == "success")
        header("Refresh:5; url=index.php?p=admin");
require_once("partials/head.php");
?>
<title>Espace Admin</title>
<link rel="stylesheet" href="assets/styles/admin.css">

<body>
    <?php if(isset($_GET['sup']) AND $_GET['sup'] == "success"){ ?>
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> L'utilisateur à bien été supprime
    </div>
    <?php } ?>
    <?php if(isset($_GET['update']) AND $_GET['update'] == "success"){ ?>
    <div class="alert1">
        <span class="closebtn1" onclick="this.parentElement.style.display='none';">&times;</span> Les informations de l'utilisateurs ont été mise à jour
    </div>
    <?php } ?>
    <?php if(isset($_GET['supprod']) AND $_GET['supprod'] == "success"){ ?>
    <div class="alert1">
        <span class="closebtn1" onclick="this.parentElement.style.display='none';">&times;</span> Le produit a bien étésupprod supprimé
    </div>
    <?php } ?>
    <div class="tit">
        <h2>Liste des Utilisateurs</h2>
    </div>
    <div class="users">
        <?php
            while($userinfo = $demande->fetch()){
                $idU = $userinfo['ID'];
                $demanderole = $bdd->prepare("SELECT * FROM Rôle INNER JOIN Utilisateurs ON Utilisateurs.iD = $idU AND Rôle.ID = Utilisateurs.Rôle");
                $demanderole->execute();
                $inforole = $demanderole->fetch();
        ?>
            <div class="card">
                <img src="<?php echo $userinfo['Path_image'] ?>" alt="avatar" class="avat">
                <h1>
                    <?= $userinfo['Nom'] ?>
                        <?= $userinfo['Prenom'] ?>
                </h1>
                <p class="title">
                    <?= $inforole['Description'] ?>
                </p>
                <p class="dat">Date création :
                    <?= $inforole['Date_creation'] ?>
                </p>
                <a href="index.php?p=delete_users&id=<?= $userinfo['ID'] ?>"><img src="assets/images/delete.png" alt="supp"></a>
                <a href="index.php?p=update_user&id=<?= $userinfo['ID'] ?>"><img src="assets/images/contract.png" alt="modif"></a>
            </div>
            <?php } ?>
    </div>
    <div class="tit">
        <h2>Liste de tout les produits</h2>
    </div>
    <div class="users">
        <?php
            while($prodinfos = $reqprod->fetch()){
        ?>
            <div class="card">
                <img src="<?php echo $prodinfos['Path_image'] ?>" alt="avatar" class="avat">
                <h1>
                    <?= $prodinfos['Libelle'] ?>
                </h1>
                <p class="title">
                    <?= $prodinfos['Description'] ?>
                </p>
                <p class="dat">Date création :
                    <?= $prodinfos['Date_creation'] ?>
                </p>
                <a href="index.php?p=delete_prod&id=<?= $prodinfos['ID'] ?>"><img src="assets/images/delete.png" alt="supp"></a>
                <a href="index.php?p=update_prod&id=<?= $prodinfos['ID'] ?>"><img src="assets/images/contract.png" alt="modif"></a>
                <a href="index.php?p=detail&produit=<?= $prodinfos['ID'] ?>"><img src="assets/images/opened-eye.png" alt="eye"></a>
            </div>
            <?php } ?>
    </div>
    <div class="tit">
        <h2>Liste de toute les categories</h2>
    </div>
    <div class="users">
        <?php
            while($infocat = $reqcategorie->fetch()){
        ?>
            <div class="card">
                <img src="<?php echo $infocat['Path_image'] ?>" alt="avatar" class="avat">
                <h1>
                    <?= $infocat['Libelle'] ?>
                </h1>
                <p class="title">
                    <?= $infocat['Description'] ?>
                </p>
                <p class="dat">Date création :
                    <?= $infocat['Date_creation'] ?>
                </p>
                <a href="index.php?p=delete_cat&id=<?= $infocat['ID']; ?>"><img src="assets/images/delete.png" alt="supp"></a>
                <a href="index.php?p=update_cat&id=<?= $infocat['ID']; ?>"><img src="assets/images/contract.png" alt="modif"></a>
                <a href="index.php?p=detail&produit=<?= $infocat['ID']; ?>"><img src="assets/images/opened-eye.png" alt="eye"></a>
            </div>
            <?php } ?>
    </div>
    <div class="tit">
        <h2>Liste des Newsletter
        </h2>
    </div>
    <div class="users">
        <table id="myTable">
            <tr>
                <th class="thmail">Mail des abonnées</th>
                <th class="thdate">Date d'envoie</th>
                <th class="thaction">Action</th>
            </tr>
            <?php while($infonews = $reqnews->fetch()){ ?>
            <tr>
                <td class="tdmail">
                    <?= $infonews['Email']; ?>
                </td>
                <td class="tddate">
                    <?= $infonews['Date_envoi']; ?>
                </td>
                <td><a href="index.php?p=delete_newsletter&id=<?=$infonews['ID']; ?>"><img src="assets/images/icon.png" alt="croixsup"></a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
<?php require_once("foot.php"); ?>