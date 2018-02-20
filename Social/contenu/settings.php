<?php  

  $data = get_data('users', 'WHERE id_u = ' . $users_id);

  if(isset($_POST['submitPhoto']) && !empty($_POST['submitPhoto'])){
    if(isset($_FILES['profilImage'])){
      echo upload_image('profilImage', 'images/users', $users_id . '.jpg');
    }

    if(isset($_FILES['profilCover'])){
      echo upload_image('profilCover', 'images/cover', $users_id . '.jpg');
    }
  }

  if(isset($_POST['submitForm']) && !empty($_POST['submitForm'])){

  $nom = array(
    'nomChamp' => 'nom',
    'value' => $_POST['nom'],
    'msgErrorEmpty' => 'Veuillez saisir votre <b>Nom Complet</b> !'
  );
  $sexe = array(
    'nomChamp' => 'gender',
    'value' => $_POST['sexe'],
    'msgErrorEmpty' => 'Veuillez saisir votre <b>sexe</b> !'
  );
  $dob = array(
    'nomChamp' => 'dob',
    'value' => $_POST['dob'],
    'msgErrorEmpty' => 'Veuillez saisir une <b>date de naissance</b> !'
  );
  $job = array(
    'nomChamp' => 'job',
    'value' => $_POST['job'],
    'msgErrorEmpty' => 'Veuillez saisir votre <b>travail</b> !'
  );
  $adresse = array(
    'nomChamp' => 'adresse',
    'value' => $_POST['adresse'],
    'msgErrorEmpty' => 'Veuillez saisir votre <b>Adresse Compléte</b> !'
  );
  $email = array(
    'nomChamp' => 'email',
    'value' => $_POST['email'],
    'msgErrorEmpty' => 'Veuillez saisir votre <b>Adresse Email</b> !'
  );
  $phone = array(
    'nomChamp' => 'phone',
    'value' => $_POST['phone'],
    'msgErrorEmpty' => 'Veuillez saisir une <b>numéro de téléphone</b> !'
  );
  $url = array(
    'nomChamp' => 'url',
    'value' => $_POST['url'],
    'msgErrorEmpty' => 'Veuillez saisir une <b>url internet</b> !'
  );



    $donnees = array( $nom, $sexe, $dob, $job, $adresse, $email, $phone, $url);
    $return = traitement('normalForm', $donnees , 'update', 'users', "WHERE id_u = $users_id");
  
    if($return == 1){ $return = '<div class="alert alert-success">Vos données <b>ont été mis à jour</b> !</div>'; }

  }

?>
<div class="container page-content edit-profile">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <!-- NAV TABS -->
          <ul class="nav nav-tabs nav-tabs-custom-colored tabs-iconized">
            <li class="active"><a href="#profile-tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-user"></i> Profile</a></li>
            <li class=""><a href="#settings-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-gear"></i> Settings</a></li>
          </ul>
          <!-- END NAV TABS -->
          <div class="tab-content profile-page">
            <!-- PROFILE TAB CONTENT -->
            <div class="tab-pane profile active" id="profile-tab">
              <div class="row">
                <div class="col-md-3">
                  <div class="user-info-left">
                    <img src="<?= getProfilImage($users_id) ?>" style="height: 150px; width:150px;" alt="Profile Picture">
                    <h2><?= $data['nom'] ?></h2>
                    <form method="post" class="contact" enctype="multipart/form-data">
                      <p>
                        <span class="file-input btn btn-azure btn-file" id="profilImage">
                          <span>Changer l'Avatar</span> <input type="file" name="profilImage" id="profilImageInput">
                        </span>
                      </p>
                      <p>
                        <span class="file-input btn btn-azure btn-file" id="profilCover">
                          <span>Changer le Cover</span> <input type="file" name="profilCover" id="profilCoverInput">
                        </span>
                      </p>
                      <ul class="list-inline social">
                        <li><a href="#" title="Facebook"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="#" title="Twitter"><i class="fa fa-twitter-square"></i></a></li>
                        <li><a href="#" title="Google Plus"><i class="fa fa-google-plus-square"></i></a></li>
                      </ul>
                      <input type="submit" value="Changer" name="submitPhoto">
                    </form>
                  </div>
                </div>

                <div class="col-md-9">
                  <div class="user-info-right">
                    <div class="basic-info">
                      <h3><i class="fa fa-square"></i> Information basiques </h3>
                      <p class="data-row">
                        <span class="data-name">Nom Complet</span>
                        <span class="data-value"><?= $data['nom'] ?></span>
                      </p>
                      <p class="data-row">
                        <span class="data-name">Sexe</span>
                        <span class="data-value"><?= $data['gender'] ?></span>
                      </p>
                      <p class="data-row">
                        <span class="data-name">Naissance</span>
                        <span class="data-value"><?= format_date($data['dob'], 2) ?></span>
                      </p>
                      <p class="data-row">
                        <span class="data-name">Job</span>
                        <span class="data-value"><?= $data['job'] ?></span>
                      </p>
                    </div>
                    <div class="contact_info">
                      <h3><i class="fa fa-square"></i> Contact </h3>
                      <p class="data-row">
                        <span class="data-name">Adresse</span>
                        <span class="data-value"><?= $data['adresse'] ?></span>
                      </p>
                      <p class="data-row">
                        <span class="data-name">Adresse Email</span>
                        <span class="data-value"><?= $data['email'] ?></span>
                      </p>
                      <p class="data-row">
                        <span class="data-name">Télephone</span>
                        <span class="data-value"><?= $data['phone'] ?></span>
                      </p>
                      <p class="data-row">
                        <span class="data-name">Site internet</span>
                        <span class="data-value"><a href="<?= $data['url'] ?>"><?= $data['url'] ?></a></span>
                      </p>
                    </div>
                    <div class="about">
                      <h3><i class="fa fa-square"></i> A propos</h3>
                      <?= $data['description'] ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END PROFILE TAB CONTENT -->
        
            <!-- SETTINGS TAB CONTENT -->
            <div class="tab-pane settings" id="settings-tab">
              <form class="form-horizontal" role="form" method="post">
                <fieldset>
                  <h3><i class="fa fa-square"></i> Change text</h3>
                  <div class="form-group">
                    <label for="old-text" class="col-sm-3 control-label">Nom Complet</label>
                    <div class="col-sm-4">
                      <input type="text" id="nom" name="nom" class="form-control" value="<?= $data['nom'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="old-text" class="col-sm-3 control-label">Sexe</label>
                    <div class="col-sm-4">
                      <input type="text" id="sexe" name="sexe" class="form-control" value="<?= $data['gender'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="old-text" class="col-sm-3 control-label">Naissance</label>
                    <div class="col-sm-4">
                      <input type="text" id="dob" name="dob" class="form-control" value="<?= format_date($data['dob'], 2) ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="old-text" class="col-sm-3 control-label">Job</label>
                    <div class="col-sm-4">
                      <input type="text" id="job" name="job" class="form-control" value="<?= $data['job'] ?>">
                    </div>
                  </div>
                </fieldset>
                <fieldset>
                  <h3><i class="fa fa-square"></i> Change Adresse Info</h3>
                  <div class="form-group">
                    <label for="old-text" class="col-sm-3 control-label">Adresse</label>
                    <div class="col-sm-4">
                      <input type="text" id="adresse" name="adresse" class="form-control" value="<?= $data['adresse'] ?>">
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label for="text" class="col-sm-3 control-label">Adresse Email</label>
                    <div class="col-sm-4">
                      <input type="text" id="email" name="email" class="form-control" value="<?= $data['email'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="text2" class="col-sm-3 control-label">Télephone</label>
                    <div class="col-sm-4">
                      <input type="text" id="phone" name="phone" class="form-control" value="<?= $data['phone'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="old-text" class="col-sm-3 control-label">Site internet</label>
                    <div class="col-sm-4">
                      <input type="text" id="url" name="url" class="form-control" value="<?= $data['url'] ?>">
                    </div>
                  </div>
                </fieldset>
                <p class="text-center"><input type="submit" name="submitForm" value="Enregistrer"></a></p>
              </form>
            </div>
            <!-- END SETTINGS TAB CONTENT -->
          </div>
        </div>    
      </div>
    </div>

<script>
  $('#profilImageInput').change(function(e){
    $val = $(this).val();
    $('#profilImage span').html($val);
  });

  $('#profilCoverInput').change(function(e){
    $val = $(this).val();
    $('#profilCover span').html($val);
  });
</script>