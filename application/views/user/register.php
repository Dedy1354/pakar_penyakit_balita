<!DOCTYPE html>
<html>
<head>
  <title>Login </title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Pakar Penyakit Pada Balita</title>
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
    <link rel="shortcut icon" href="<?php echo base_url() ?>img/favicon.ico">
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
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>!!Halaman Registrasi !!</h1>
                  </div>
                  <p>Tolong Masukkan Data Anda dengan benar.</p>
                  <p>Terimakasih...</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                          
                          <form action="<?= base_url('index.php/Welcome/add_pasien/') ?>" method="POST" class="form-horizontal">
                                  <div class="form-group">
                                    <label class="control-label col-sm-2">
                                      NAMA        
                                    </label>
                                    <div class="col-sm-10">
                                      <input type="nama" class="form-control" name="NAMA_PASIEN" placeholder="Masukkan Nama">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-2">
                                      USERNAME        
                                    </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="USERNAME" placeholder="Masukkan Username">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-2">
                                      PASSWORD        
                                    </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="PASSWORD" placeholder="Masukan Password">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-2">
                                      TTL        
                                    </label>
                                    <div class="col-sm-10">
                                      <input type="date" class="form-control" name="UMUR_PASIEN" placeholder="Masukkan Tanggal lahir">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-2">
                                      ALAMAT        
                                    </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="ALAMAT_PASIEN" placeholder="Masukkan Alamat">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="control-label col-sm-2">
                                      GENDER       
                                    </label>
                                    <div class="col-sm-10">
                                      <!-- <input type="text" class="form-control" name="GENDER_PASIEN"> -->

                                      <div class="radio">
                                        <label>
                                          <input type="radio" name="GENDER_PASIEN" id="optionsRadios1" value="L">
                                          Laki - Laki
                                        </label>
                                      </div>
                                      <div class="radio">
                                        <label>
                                          <input type="radio" name="GENDER_PASIEN" id="optionsRadios2" value="P">
                                          Perempuan
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group" hidden="">
                                    <label class="control-label col-sm-2">
                                      LEVEL USER        
                                    </label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="LEVEL_USER" value="pasien">
                                    </div>
                                  </div>
                                  <center>
                                    <input type="submit" value="Daftar" class="btn btn-success">
                                    <input type="reset" value="Reset" class="btn btn-danger">
                                    <a href="<?php echo site_url('/welcome'); ?>" class="btn btn-warning">Batal</a>
                                  </center>
                                </form>
              
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p><a href="" class="external"><p>Romi Hariyadi &copy; 2018</p>
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