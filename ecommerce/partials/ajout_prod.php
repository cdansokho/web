
<link rel="stylesheet" href="assets/styles/update_prod.css">

<body>
    <div class="blokprod">
        <div class="prod">
            <div class="tit">
                <h2>Ajouter un produit</h2>
            </div>
            <form action="index.php?p=add_prod" method="post" enctype="multipart/form-data" class="formprod">
                <div class="blockleft">
                    <div class="ligne">
                        <label for="nomprod">Nom du produits</label>
                        <div class="blockinput"><input type="text" required name="nomprod" value="">
                        </div>
                    </div>
                    <div class="ligne">
                        <label for="descrip">Description du produits</label>
                        <div class="blockinput"><textarea name="descript" required class="textdescript"></textarea></div>
                    </div>
                    <div class="ligne">
                        <label for="typeT">Taille du produit</label>
                        <div class="blockinput">
                            <select name="typeT" id="typeT" required>
                                    <option value=""hidden>Taille</option>
                                    <option value="1">taille en numerique</option>
                                    <option value="2">taille en lettre</option>
                                </select>
                        </div>
                    </div>
                    <div class="ligne">
                        <label for="">Detail 1</label>
                        <div class="blockinput"><input type="text" required name="detail1" value="">
                        </div>
                    </div>
                    <div class="ligne">
                        <label for="">Detail 2</label>
                        <div class="blockinput"> <input type="text" required name="detail2" value="">
                        </div>
                    </div>
                    <div class="ligne">
                        <label for="">Detail 3</label>
                        <div class="blockinput"> <input type="text" required name="detail3" value="">
                        </div>
                    </div>
                    <div class="ligne">
                        <label for="">Detail 4</label>
                        <div class="blockinput"> <input type="text" required name="detail4" value="">
                        </div>
                    </div>
                    <div class="ligne">
                        <label for="">Prix à l'achat</label>
                        <div class="blockinput"> <input type="text" required name="prixachat" value="">
                        </div>
                    </div>
                    <div class="ligne">
                        <label for="">Prix de ventre</label>
                        <div class="blockinput"> <input type="text" required name="prixvente" value="">
                        </div>
                    </div>
                    <div class="ligne">
                        <label for="">Nombre de produits</label>
                        <div class="blockinput"> <input type="number" min="1" required name="nbprod" value="">
                        </div>
                    </div>
                </div>
                <div class="ligne">
                    <label for="typeT">Categorie du produit</label>
                    <div class="blockinput">
                        <select name="cate" id="typeT" required>
                                   <?php 
                            $reqcat = $bdd->prepare("SELECT * FROM Categories");
                            $reqcat->execute();
                            while($infocat = $reqcat->fetch()){
                            ?>
                                    <option value=""hidden>Categorie</option>
                                    <option value="<?= $infocat['ID']?>"><?= $infocat['Libelle']?></option>
                                <?php } ?>
                                </select>
                    </div>
                </div>
                <div class="bockimg">
                    <div class="ligne">
                        <label for="img1">Image Principal</label>
                        <div class="blockinput"> <input type="file" required name="img1" class="inputfile" required>
                        </div>
                    </div>
                    <div class="ligne">
                        <label for="img2">Image mini 1</label>
                        <div class="blockinput"> <input type="file" required name="img2" class="inputfile" required>
                        </div>
                    </div>
                    <div class="ligne">
                        <label for="img3">Image mini 2</label>
                        <div class="blockinput"> <input type="file" required name="img3" class="inputfile" required>
                        </div>
                    </div>
                    <div class="ligne">
                        <label for="img4">Image mini 3</label>
                        <div class="blockinput"> <input type="file" required name="img4" class="inputfile" required>
                        </div>
                    </div>
                    <div class="ligne">
                        <label for="img5">Image mini 4</label>
                        <div class="blockinput"> <input type="file" required name="img5" class="inputfile" required>
                        </div>
                    </div>
                    <div class="lignes">
                        <button type="submit" name="    submitaddprod">Ajouter</button>
                    </div>
                </div>

            </form>
            <?php if(isset($_GET['img1']) AND $_GET['img1'] == "importfqil") { ?>
             <div class="message">Erreur lors du telechargement de l'image</div>
            <?php } elseif(isset($_GET['img1']) AND $_GET['img1'] == "formatfail") { ?>
             <div class="message">Format de l'image incorrect</div>
            <?php } elseif(isset($_GET['img1']) AND $_GET['img1'] == "sizefail") { ?>
             <div class="message">sfglgasfiyglaslfglgasigashhsahgshafghifghifagjagfhjk</div>
            <?php } elseif(isset($_GET['img1']) AND $_GET['img1'] == "pasacces") { ?>
             <div class="message">sfglgasfiyglaslfglgasigashhsahgshafghifghifagjagfhjk</div>
            <?php } ?>            
            <?php if(isset($_GET['action']) AND $_GET['action'] == "success") {?>
            <div class="message"><a href="index.php">Produit ajouté ! Retour accueil</a></div>
            <?php } else { ?>
            <div class="message"><a href="index.php">Retour</a></div>
            <?php } ?>
        </div>
    </div>
</body>