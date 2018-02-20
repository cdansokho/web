<?php
if(isset($_GET['id']))
        $idP = $_GET['id'];
    else
        header("Location: index.php?p=admin");
$infoscat = $bdd->prepare("SELECT * FROM Categories WHERE ID = :idp");
$infoscat->bindValue(':idp', $idP, PDO::PARAM_INT);
$infoscat->execute();
$infoscat = $infoscat->fetch();
?>
<link rel="stylesheet" href="assets/styles/update_prod.css">
<body>
    <div class="blokprod">
        <div class="prod">
            <div class="tit">
                <h2>Ajouter une Categorie</h2>
            </div>
            <form action="index.php?p=script_update_cat&id=<?= $idP; ?>" method="post" enctype="multipart/form-data" class="formprod">
                <div class="blockleft">
                    <div class="ligne">
                        <label for="nomprod">Nom de la categorie</label>
                        <div class="blockinput"><input type="text" required name="nomprod" value="<?= $infoscat['Libelle']; ?>">
                        </div>
                    </div>
                    <div class="ligne">
                        <label for="descrip">Description de la categorie</label>
                        <div class="blockinput"><textarea name="descript" required class="textdescript"><?= $infoscat['Description']; ?></textarea></div>
                    </div>
                </div>
                <div class="bockimg">
                    <div class="imgblock">
                            <label for="">Image de la categorie</label>
                            <div class="container">
                                <img src="<?= $infoscat['Path_image']?>" alt="img" class="image">
                                <div class="overlay">
                                    <div class="text"><input type="file" name="img1"></div>
                                </div>
                            </div>
                        </div>
                     <div class="blockbouton">
                            <div class="but"><button type="submit" class="lebouton" name="submitformprod">Mettre à jour</button></div>
                        </div>
                </div>

            </form>
            <?php if(isset($_GET['action']) AND $_GET['action'] == "success") {?>
            <div class="message"><a href="index.php?p=categories">Categorie Modifie ! Voir les categories</a></div>
            <?php } else { ?>
            <div class="message"><a href="index.php">Retour</a></div>
            <?php } ?>
        </div>
    </div>
</body>