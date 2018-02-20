<?php
if(isset($_GET['id']))
        $idP = $_GET['id'];
    else
        header("Location: index.php?p=admin");
$infoprod = $bdd->prepare("SELECT * FROM Produits WHERE ID = :idp");
$infoprod->bindValue(':idp', $idP, PDO::PARAM_INT);
$infoprod->execute();
$infoprod = $infoprod->fetch();
?>
    <link rel="stylesheet" href="assets/styles/update_prod.css">

    <body>
        <div class="blokprod">
            <div class="prod">
                <div class="tit">
                    <h2>Modification produit</h2>
                </div>
                <form action="index.php?p=script_update_prod&id=<?= $idP; ?>" method="post" enctype="multipart/form-data" class="formprod">
                    <div class="blockleft">
                        <div class="ligne">
                            <label for="nomprod">Nom du produits</label>
                            <div class="blockinput"><input type="text" required name="nomprod" value="<?= $infoprod ['Libelle']?>">
                            </div>
                        </div>
                        <div class="ligne">
                            <label for="descrip">Description du produits</label>
                            <div class="blockinput"><textarea name="descript" required class="textdescript"><?= $infoprod ['Description']?></textarea></div>
                        </div>
                        <div class="ligne">
                            <label for="typeT">Taille du produit</label>
                            <div class="blockinput">
                                <select name="typeT" id="typeT" required>
                                    <option value="<?= $infoprod ['Type']?>">Taille</option>
                                    <option value="1">taille en numerique</option>
                                    <option value="2">taille en chiffre</option>
                                </select>
                            </div>
                        </div>
                        <div class="ligne">
                            <label for="">Detail 1</label>
                            <div class="blockinput"><input type="text" required name="detail1" value="<?= $infoprod ['Detail1']?>">
                            </div>
                        </div>
                        <div class="ligne">
                            <label for="">Detail 2</label>
                            <div class="blockinput"> <input type="text" required name="detail2" value="<?= $infoprod ['Detail2']?>">
                            </div>
                        </div>
                        <div class="ligne">
                            <label for="">Detail 3</label>
                            <div class="blockinput"> <input type="text" required name="detail3" value="<?= $infoprod ['Detail1']?>">
                            </div>
                        </div>
                        <div class="ligne">
                            <label for="">Detail 4</label>
                            <div class="blockinput"> <input type="text" required name="detail4" value="<?= $infoprod ['Detail4']?>">
                            </div>
                        </div>
                        <div class="ligne">
                            <label for="">Prix à l'achat</label>
                            <div class="blockinput"> <input type="text" required name="prixachat" value="<?= $infoprod ['Prix_achat']?>">
                            </div>
                        </div>
                        <div class="ligne">
                            <label for="">Prix de ventre</label>
                            <div class="blockinput"> <input type="text" required name="prixvente" value="<?= $infoprod ['Prix_vente']?>">
                            </div>
                        </div>
                        <div class="ligne">
                            <label for="">Nombre de produits</label>
                            <div class="blockinput"> <input type="number" required name="nbprod" value="<?= $infoprod ['Nombres_produit']?>">
                            </div>
                        </div>
                    </div>
                    <div class="bockimg">
                        <div class="imgblock">
                            <label for="">Image principal</label>
                            <div class="container">
                                <img src="<?= $infoprod['Path_image']?>" alt="img" class="image">
                                <div class="overlay">
                                    <div class="text"><input type="file" name="img1"></div>
                                </div>
                            </div>
                        </div>
                        <div class="imgblock">
                            <label for="">Mini image 1</label>
                            <div class="container">
                                <img src="<?= $infoprod['Path_mini_image1']?>" alt="img" class="image">
                                <div class="overlay">
                                    <div class="text"><input type="file" name="img2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="imgblock">
                            <label for="">Mini image 2</label>

                            <div class="container">
                                <img src="<?= $infoprod['Path_mini_image2']?>" alt="img" class="image">
                                <div class="overlay">
                                    <div class="text"><input type="file" name="img3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="imgblock">
                            <label for="">Mini image 3</label>

                            <div class="container">
                                <img src="<?= $infoprod['Path_mini_image3']?>" alt="img" class="image">
                                <div class="overlay">
                                    <div class="text"><input type="file" name="img4"></div>
                                </div>
                            </div>
                        </div>
                        <div class="imgblock">
                            <div><label for="">Mini image 4</label>`</div>
                            <div class="container">
                                <img src="<?= $infoprod['Path_mini_image4']?>" alt="img" class="image">
                                <div class="overlay">
                                    <div class="text"><input type="file" name="img5"></div>
                                </div>
                            </div>
                        </div>

                        <div class="blockbouton">
                            <div class="but"><button type="submit" class="lebouton" name="submitformprod">Mettre à jour</button></div>
                        </div>
                    </div>

                </form>
                <div class="message"><a href="index.php?p=admin">Retours</a></div>
            </div>
        </div>
    </body>
