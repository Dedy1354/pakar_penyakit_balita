<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Material Admin by Bootstrapious.com</title>
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
                <li class="nav-item"><a href="<?php echo site_url('/Login/logout')?>" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
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
            <div class="avatar"><img src="<?php echo base_url() ?>img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">Mark Stephen</h1>
              <p>Web Designer</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
                   <li class="active"><a href="<?php echo site_url('main')?>"> <i class="icon-home"></i>Home </a></li>
                    <li><a href="<?php echo site_url('Admin/pasien')?>"> <i class="icon-bill"></i>Data Pasien</a></li>
                    <li><a href="<?php echo site_url('Admin/diagnosa')?>"> <i class="icon-bill"></i>Data Diagnosa</a></li>
                    <li><a href="<?php echo site_url('Admin/penyakit')?>"> <i class="icon-bill"></i>Data Penyakit</a></li>
                    <li><a href="<?php echo site_url('Admin/gejala')?>"> <i class="icon-bill"></i>Data Gejala</a></li>
                    <li><a href="<?php echo site_url('Admin')?>"> <i class="icon-user"></i>Manajemen User</a></li>                      <!-- <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Example dropdown </a>
                      <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                        <li><a href="#">Page</a></li>
                      </ul>
                    </li> -->
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
		<h1><?=$tipe?> admin</h1>

    <?php 
        if($tipe == 'Add'){
     ?>
     <!--FORM TAMBAH -->
     <form method="post" class="form-horizontal">
          
          <div class="form-group">
            <label class="control-label col-sm-2">
              NAMA        
            </label>
            <div class="col-sm-10">
              <input type="nama" class="form-control" name="NAMA_ADMIN">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">
              USERNAME        
            </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="USERNAME">
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
              LEVEL USER        
            </label>
            <div class="col-sm-10">
              <select type="text" class="form-control" name="LEVEL_USER">
                <option value="admin">ADMIN</option>
                <option value="pasien">PASIEN</option>
              </select>
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
              ID_ADMIN      
            </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" readonly name="ID_ADMIN" value="<?=isset($default['ID_ADMIN'])? $default['ID_ADMIN'] : ""?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2">
              USERNAME      
            </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="USERNAME" value="<?=isset($default['USERNAME'])? $default['USERNAME'] : ""?>">
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
              LEVEL USER        
            </label>
            <div class="col-sm-10">
              <select type="text" class="form-control" name="LEVEL_USER">
                <option value="admin">ADMIN</option>
                <option value="pasien">PASIEN</option>
              </select>
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