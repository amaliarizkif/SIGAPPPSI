<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIGAP</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url();?>assets/img/kecil_orange.png" rel="icon">
  <link href="<?php echo base_url();?>assets/img/kecil_orange.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Suez+One:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css"/>

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

  <style type="text/css">
    .dataTables_wrapper .dataTables_filter input {
      margin-left: 0em;
    }

    .dataTables_wrapper .dataTables_filter label {
      color: transparent;
    }

    #header {
      padding: 10px 0px;
    }

    #header.header-scrolled{
      height: 80px;
    }

    .nav-menu {
      padding-top: 10px;
    }

    #header .logo img {
      max-height: 60px;
    }

    .profile {
      max-height: 40px; max-width: 40px;
    }
  </style>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- =======================================================
  * Template Name: Amoeba - v2.0.0
  * Template URL: https://bootstrapmade.com/free-one-page-bootstrap-template-amoeba/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">

        <!-- <h1 class="text-light"><a href="index.html"><span>SIGAP</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/kecil_orange.png" alt="" class="img-fluid"></a>
        <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>assets/img/sigapfont.png" alt="" class="img-fluid"></a>
      </div>
    </div>

    <nav class="nav-menu float-right d-none d-lg-block">
      <ul>

        <li class=""><a href="<?php echo base_url();?>">Home</a></li>
        <?php if($this->session->userdata['Role'] == 'Dokter'){?>
          <li class="drop-down"><a href="">Emergency</a>
            <ul>
             <li><a href="<?php echo base_url();?>Emergency/EmergencyCall">Emergency Reports</a></li>
             <li><a href="<?php echo base_url();?>Emergency/EmergencyContacts">Emergency Call</a></li>
           </ul>
         </li>
         <li><a href="<?php echo base_url();?>Emergency/DoctorConsultation">Doctor Consultation</a></li>
       <?php }else{ ?>

        <li class="drop-down"><a href="">Guide</a>
          <ul>
            <li><a href="<?php echo base_url();?>Guide/FirstAid">First Aid Guide </a></li>
            <li><a href="<?php echo base_url();?>Guide/Survival">Survival Guide Military</a></li>
          </ul>
        </li>
        <?php if($this->session->userdata['Role'] == 'Admin'){?>
          <li class="drop-down"><a href="">Military Health</a>
            <ul>
             <li><a href="<?php echo base_url();?>MilitaryHealth/MilitaryEvaluation">Evaluasi</a></li>
             <li><a href="<?php echo base_url();?>MilitaryHealth/MilitaryHealth">History</a></li>
           </ul>
        <?php }else if ($this->session->userdata['Role'] == 'User'){?>
          <li>
            <a href="<?php echo base_url();?>MilitaryHealth/MilitaryHealth">Military Health</a>
          </li>
        <?php }?>
        <li class="drop-down"><a href="">Emergency</a>
          <ul>
           <li><a href="<?php echo base_url();?>Emergency/EmergencyCall">Emergency Reports</a></li>
           <li><a href="<?php echo base_url();?>Emergency/EmergencyContacts">Emergency Call</a></li>
         </ul>
       </li>

       <li>
        <a href="<?php echo base_url();?>Military/MilitaryStrength">Military Strength</a>
      </li>
      <li>
        <a href="<?php echo base_url();?>Emergency/DoctorConsultation">Doctor Consultation</a>
      </li>
      <?php if($this->session->userdata['Role'] == 'Admin'){?>
       <li class="drop-down"><a href="">Master</a>
        <ul>
          <li><a href="<?php echo base_url();?>Master/FirstAid">First Aid</a></li>
          <li><a href="<?php echo base_url();?>Master/SurvivalGuide">Survival Guide</a></li>
          <li><a href="<?php echo base_url();?>Master/Profile">Profile</a></li>
        </ul>
      </li>
    <?php }?>
  <?php } ?>
  <li class=" dropdown">
    <a class="nav-link" id="notificationDropdown" href="#" data-toggle="dropdown" style="padding-top: 0px;">
      <img src="<?php echo base_url();?>assets/img/military.png" class="profile img-fluid">
    </a>
    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
      <div style="padding: 20px;">
        <h6><?php echo $this->session->userdata('Nama');?> - <?php echo $this->session->userdata('Role');?></h6>
        <small><?php echo $this->session->userdata('Email');?></small>
        <br>
        <a class="dropdown-item preview-item" style="color: black;" href="<?php echo base_url(); ?>Login/logout">
          <div class="preview-item-content">
            <h6>Logout</h6>
          </div>
        </a>


      </div>
    </div>
  </li>

  <!-- <li><a href="#contact">Contact Us</a></li> -->
</ul>
</nav><!-- .nav-menu -->

</div>
</header><!-- End #header -->
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>