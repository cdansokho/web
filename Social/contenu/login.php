<html lang="fr"><head>
    <meta charset="utf-8">
    <title>DayDay</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= $baseUrl ?>assets/bootstrap.3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $baseUrl ?>assets/font-awesome.4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= $baseUrl ?>assets/css/animate.min.css" rel="stylesheet">
    <link href="<?= $baseUrl ?>assets/css/timeline.css" rel="stylesheet">
    <link href="<?= $baseUrl ?>assets/css/index.css" rel="stylesheet">
    <link href="<?= $baseUrl ?>assets/css/forms.css" rel="stylesheet">
    <link href="<?= $baseUrl ?>assets/css/buttons.css" rel="stylesheet">
    <script src="<?= $baseUrl ?>assets/js/jquery.1.11.1.min.js"></script>
    <script src="<?= $baseUrl ?>assets/bootstrap.3.3.6/js/bootstrap.min.js"></script>
    <script src="<?= $baseUrl ?>assets/js/custom.js"></script>
  </head>

  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-fixed-top navbar-transparent" role="navigation">
        <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button id="menu-toggle" type="button" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar bar1"></span>
            <span class="icon-bar bar2"></span>
            <span class="icon-bar bar3"></span>
          </button>
          <a class="navbar-brand" href="<?= $baseUrl ?>accueil">Day-Day</a>
        </div>
      </div>
    </nav>
    <div class="wrapper">
          
      <div class="parallax filter-black">
          <div class="parallax-image"></div>             
          <div class="small-info">
            
            <div class="col-sm-10 col-sm-push-1 col-md-6 col-md-push-3 col-lg-6 col-lg-push-3">
              <div class="card-group animated flipInX">
                <div class="card">
                  <div class="card-block">
                    <div class="center">
                      <h4 class="m-b-0"><span class="icon-text">Login</span></h4>
                      <p class="text-muted">Access your account</p>
                    </div>
                    <span id="msg-error-login" style="display:none;"></span>
                    <form action="" method="post" class="log">
                      <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <input type="checkbox" class="" style="opacity: 1; left: auto; margin-top: 3px; margin-left: -22px;" name="remember" id="checkbox-remember"> Se souvenir de moi ?
                      </div>
                      <a href="#" class="pull-xs-right">
                          <small>Forgot?</small>
                        </a>
                      <div class="center">
                        <button type="submit" id="log-btn" class="btn btn-azure">Login</button>
                      </div>
                    </form>
                  </div>
                </div>
                
                <div class="card">
                  
                  <div class="card-block center">
                    <h4 class="m-b-0">
                      <span class="icon-text">Sign Up</span>
                    </h4>
                    <p class="text-muted">Create a new account</p>
                    <span id="msg-error-reg" style="display:none;"></span>
                    <form action="" method="post" class="reg">
                      <div class="form-group">
                        <input type="text" class="form-control" name="nom" id="nom" placeholder="Full Name">
                      </div>
                      <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="re_mdp" id="re_mdp" placeholder="Confirm Password">
                      </div>
                      <button type="submit" id="reg-btn" class="btn btn-azure">Register</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

      <footer class="footer">
        <div class="container">
          <p class="text-muted"> Copyright © Company - All rights reserved </p>
        </div>
      </footer>

    </div>
<script>
$('#log-btn').click(function(e){

  e.preventDefault();
  
  var $val_email = $('.log #email').val();
  var $val_pass = $('.log #mdp').val();
  var $val_rem = $('#checkbox-remember').prop('checked');

  $.post('<?= $baseUrl ?>core/ajax/form/ajax_login.php', {
    email: $val_email, 
    password: $val_pass, 
    remember: $val_rem}, function(donnees){
    if(donnees === "redirect"){
      document.location.href = '<?= $baseUrl ?>timeline';
    }else{
      error('#msg-error-login', donnees);
      console.log(donnees);
    }
  });
  $('#msg-error-login').css({display: 'none'}).html('');
});

$('#reg-btn').click(function(e){
  e.preventDefault();
  
  var $nom = $('.reg #nom').val();
  var $email = $('.reg #email').val();
  var $mdp = $('.reg #mdp').val();
  var $re_mdp = $('.reg #re_mdp').val();

  //console.log($nom);
  //console.log($email);
  //console.log($mdp);
  //console.log($re_mdp);

  $.post('<?= $baseUrl ?>core/ajax/form/ajax_register.php', {
    nom: $nom, 
    email: $email,
    mdp: $mdp,
    re_mdp: $re_mdp,
  }, function(donnees){
    if(donnees === "redirect"){
      document.location.href = "<?= $baseUrl ?>timeline";
    }else{
      error('#msg-error-reg', donnees);
      console.log(donnees);
    }
  });
});

var error = function($id, $msg){
  $($id).html($msg).css({display: 'block'});
}
</script>

</body>
</html>