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

	<!-- Vendor CSS Files -->
	<link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/vendor/animate.css/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/vendor/venobox/venobox.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<style type="text/css">	</style>

</head>
<!-- ======= Hero Section ======= -->
<section id="hero" style="height: 100vh;">
	<div class="hero-container" style="padding-top: 0px;">
		<!-- <h1>Login to SIGAP</h1> -->
		<img src="<?php echo base_url();?>assets/img/sigapfont_black.png" style="width: 400px;" alt="" class="img-fluid">
		<h2 style="font-weight: 550; text-align: center;">Sistem Pelaporan Kesehatan pada Operasi Matra Gabungan Mabes TNI</h2>

		<div class="card" style="background-color: #49684d;">
			<div class="card-body">
				<h5 class="" style="text-align: center; color: red;"><?php echo $this->session->flashdata('pesan')?></h5>
				<form action="<?php echo base_url()?>Login/dologin" method="POST"  enctype="multipart/form-data">
					<div class="form-group">
						<label for="exampleInputEmail1">Email address</label>
						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Email" placeholder="Enter email">
						
					</div>
					<div class="form-group ">
						<label for="exampleInputPassword1">Password</label>
						<div class="input-group">
							<input type="password" name="Password" class="form-control" id="password" placeholder="Password">
							<div class="input-group-append">
								<span class="input-group-text" id="basic-addon2" onclick="pass()"><i id="iconeye" class="fa fa-eye" aria-hidden="true"></i></span>
							</div>
						</div>
					</div>
					<div>
						
					</div>

					<button style="float: right;" type="submit" class="btn-get-started" >Login</button>
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
<script>
	function pass() {
		var x = document.getElementById("password");
		var y = document.getElementById("iconeye");

		if (x.type === "password") {
			x.type = "text";

		} else {
			x.type = "password";

		}
	}
</script>