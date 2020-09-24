<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>SIGAP</title>
	<meta content="" name="descriptison">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="<?php echo base_url();?>assets/img/favicon.png" rel="icon">
	<link href="<?php echo base_url();?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Lato:400,300,700,900" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/vendor/venobox/venobox.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

	<style type="text/css">	</style>

</head>
<!-- ======= Hero Section ======= -->
<section id="hero" style="height: 100vh;">
	<div class="hero-container" style="padding-top: 0px;">
		<h1>Login to SIGAP</h1>
		<h2 style="font-weight: 550; text-align: center;">Sistem Pelaporan Kesehatan pada Operasi Matra Gabungan Mabes TNI</h2>

		<div class="card">
			<div class="card-body">
				<h5 class="" style="text-align: center; color: red;"><?php echo $this->session->flashdata('pesan')?></h5>
				<form action="<?php echo base_url()?>Login/dologin" method="POST"  enctype="multipart/form-data">
					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Email" placeholder="Enter email">
						
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" name="Password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					</div>

					<button style="float: right;" type="submit" class="btn-get-started" >Submit</button>
				</form>

			</div>
			<!-- <a href="#about" class="btn-get-started scrollto">Get Started</a> -->
		</div>

		
	</div>
</section><!-- #hero -->


<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/php-email-form/validate.js"></script>
<script src="<?php echo base_url();?>assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/venobox/venobox.min.js"></script>

<!-- Template Main JS File -->
<!-- <script src="<?php echo base_url();?>assets/js/main.js"></script> -->

</body>

</html>