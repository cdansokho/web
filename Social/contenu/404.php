<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Day-Day</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= $baseUrl ?>assets/bootstrap.3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $baseUrl ?>assets/css/animate.min.css" rel="stylesheet">
    <link href="<?= $baseUrl ?>assets/css/errors.css" rel="stylesheet">
    <script src="<?= $baseUrl ?>assets/js/jquery.1.11.1.min.js"></script>
    <script src="<?= $baseUrl ?>assets/bootstrap.3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
<div class="error-header"> </div>
<div class="container ">
    <section class="error-container text-center">
        <h1 class="animated fadeInDown">404</h1>
        <div class="error-divider animated fadeInUp">
            <h2>PAGE NOT FOUND.</h2>
            <p class="description">We Couldn't Find This Page</p>
        </div>
        <a href="<?= $baseUrl ?>index" class="return-btn"><i class="fa fa-home"></i>Home</a>
    </section>
</div>
</body>
</html>
