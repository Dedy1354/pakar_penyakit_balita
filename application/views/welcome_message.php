<!DOCTYPE html>
<html>
<head>
  <title>Login </title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Pakar Penyakit Balita</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-5 " >
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                  </div>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
             <div class="col-lg-1 " >
              <div class="info d-flex align-items-center">
                <div class="content-center">
                  <div class="logo">
                    <h1>Selamat </h1>
                  </div>
                  <a href="<?php echo base_url('index.php/Login/'); ?>" class="btn btn-warning">Login Admin</a>
                </div>

                <div class="content-center">
                  <div class="logo">
                    <h1>Datang..!!</h1>
                  </div>
                  <a href="<?php echo base_url('index.php/Login/login_pasien/'); ?>" class="btn btn-danger">Login Pasien</a>
                </div>

              </div>
            </div>


          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design by <a href="" class="external"><p>Romi Hariyadi &copy; 2018</p>
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
      </div>
    </div>




<!-- JavaScript files-->
    <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url()?>assets/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="<?php echo base_url()?>assets/js/front.js"></script>
  </body>
</html>