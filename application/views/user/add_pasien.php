<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Pakar Balita</title>
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
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.html" class="navbar-brand">
                  <div class="brand-text brand-big"><span>Bootstrap </span><strong>Dashboard</strong></div>
                  <div class="brand-text brand-small"><strong>BD</strong></div></a>
                <!-- Toggle Button--><a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Logout    -->
                <li class="nav-item"><a href="<?php echo site_url('Login/logout')?>" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="<?php echo base_url() ?>assets/img/ac.jpg" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">Pasien</h1>
              <p></p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
                    <li class="active"><a href="<?php echo site_url('User')?>"> <i class="icon-home"></i>Home </a></li>
                    <li><a href="<?php echo site_url('Admin/pasien')?>"> <i class="icon-bill"></i>Data Pasien</a></li>
          </ul>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">
                	<div class="container">
		
		
    <?php 
      if ($tipe == 'Add') {
    ?>
    <!-- FORM TAMBAH -->
        <form method="post" class="form-horizontal">
          <div class="form-group">
            <label class="control-label col-sm-2">
              NAMA        
            </label>
            <div class="col-sm-10">
              <input type="nama" class="form-control" name="NAMA_PASIEN">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">
              USERNAME        
            </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="USERNAME" readonly="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">
              PASSWORD        
            </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="PASSWORD">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">
              TANGGAL LAHIR        
            </label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="UMUR_PASIEN">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">
              ALAMAT        
            </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="ALAMAT_PASIEN">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">
              JENIS KELAMIN       
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
            <button name="tombol_submit" class="btn btn-primary">
              Simpan
            </button>
          </center>


        </form>
    <?php
      }else{
    ?>
      <!-- FORM EDIT -->
        <form method="post" class="form-horizontal">
          <div class="form-group" hidden="">
            <label class="control-label col-sm-2">
              ID_PASIEN      
            </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" readonly="" name="ID_PASIEN" value="<?=isset($default['ID_PASIEN'])? $default['ID_PASIEN'] : ""?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">
              NAMA        
            </label>
            <div class="col-sm-10">
              <input type="nama" class="form-control" name="NAMA_PASIEN" value="<?=isset($default['NAMA_PASIEN'])? $default['NAMA_PASIEN'] : ""?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">
              USERNAME      
            </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" readonly="" name="USERNAME" value="<?=isset($default['USERNAME'])? $default['USERNAME'] : ""?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">
              PASSWORD       
            </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="PASSWORD" value="<?=isset($default['PASSWORD'])? $default['PASSWORD'] : ""?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">
              TANGGAL LAHIR        
            </label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="UMUR_PASIEN" value="<?=isset($default['UMUR_PASIEN'])? $default['UMUR_PASIEN'] : ""?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">
              ALAMAT        
            </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="ALAMAT_PASIEN" value="<?= isset($default['ALAMAT_PASIEN'])? $default['ALAMAT_PASIEN']: ""?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">
              JENIS KELAMIN       
            </label>
            <div class="col-sm-10">
              <!-- <input type="text" class="form-control" name="GENDER_PASIEN" value="<?=isset($default['GENDER_PASIEN'])? $default['GENDER_PASIEN']: "" ?>"> -->
              <div class="radio">
                <label>
                  <input type="radio" name="GENDER_PASIEN" value="L" <?php if ($default['GENDER_PASIEN'] == 'L') {echo "checked";} ?>>
                  Laki - Laki
                </label>
              </div>
              <div class="radio">
                <label>
                  <input type="radio" name="GENDER_PASIEN" value="P" <?php if ($default['GENDER_PASIEN'] == 'P'){ echo "checked"; }?>>
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
            <button name="tombol_submit" class="btn btn-primary">
              Simpan
            </button>
          </center>


        </form>

    <?php
      }
    ?>
		
	</div>
              </div>
            </div>
          </section>
          <!-- Page Footer-->
          <footer class="main-footer">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-6">
                  <p>Romi Hariyadi &copy; 2018</p>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="<?php echo base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <!-- <script src="<?php echo base_url()?>assets/vendor/chart.js/Chart.min.js"></script> -->
    <script src="<?php echo base_url()?>assets/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- <script src="<?php echo base_url()?>assets/js/charts-home.js"></script> -->
    <!-- Main File-->
    <script src="<?php echo base_url()?>assets/js/front.js"></script>
  </body>
</html>