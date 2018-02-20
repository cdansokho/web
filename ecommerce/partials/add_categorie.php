<link rel="stylesheet" href="assets/styles/update_prod.css">

<body>
    <div class="blokprod">
        <div class="prod">
            <div class="tit">
                <h2>Ajouter une Categorie</h2>
            </div>
            <form action="index.php?p=add_cat" method="post" enctype="multipart/form-data" class="formprod">
                <div class="blockleft">
                    <div class="ligne">
                        <label for="nomprod">Nom de la categorie</label>
                        <div class="blockinput"><input type="text" required name="nomprod" value="">
                        </div>
                    </div>
                    <div class="ligne">
                        <label for="descrip">Description de la categorie</label>
                        <div class="blockinput"><textarea name="descript" required class="textdescript"></textarea></div>
                    </div>
                </div>
                <div class="bockimg">
                    <div class="ligne">
                        <label for="img1">Image de la categorie</label>
                        <div class="blockinput"> <input type="file" required name="img1" class="inputfile" required>
                        </div>
                    </div>
                    <div class="lignes">
                        <button type="submit" name="submitaddprod">Ajouter</button>
                    </div>
                </div>
            </form>
            <?php if(isset($_GET['action']) AND $_GET['action'] == "success") {?>
            <div class="message"><a href="index.php?p=categories">Categorie ajouté ! Voir les categories</a></div>
            <?php } else { ?>
                <div class="message"><a href="index.php?p=admin">Retours</a></div>
            <?php } ?>
        </div>
    </div>
</body>