<style type="text/css">
	.about {
		min-height: 75vh;
	}

	@media (max-width: 768px) {
		#rowarticle {
			margin-left: 20px;
			margin-right: 20px;
		}
	}

</style>
<main id="main">
	<section id="about" class="about">
		<div class="container">
			<div class="section-title">
				<h3 style="color: black;">Survival Guide Military</h3>
			</div>
			<div class="row" id="rowarticle">
				<div class="col-md-9 col-sm-9">
				</div>
				<div class="col-md-3 col-sm-3">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search">
						<div class="input-group-append">
							<button class="btn text-white" style="background: #2d6760;" type="button" id="button-addon2"><i class="fa fa-search" aria-hidden="true"></i></button>
						</div>
					</div>
				</div>
				
			</div>
			<?php foreach($fa as $f){ ?>
				<div class="row mt-4" id="rowarticle">
					<div class="card" style="width: 100%">
						<h5 class="card-header"><?php echo $f['Title']?></h5>
						<div class="card-body">
							<!-- <h5 class="card-title"><?php echo $f['Title']?></h5> -->
							<p class="card-text"><?php echo $f['Description']?></p>
							<a href="<?php echo base_url(); ?>Guide/SurvivalDetail/<?php echo $f['ID_SGM']?>" class="btn text-white" style="float: right; background: #2d6760;" class="btn btn-primary">Show</a>
						</div>	
					</div>
				</div>
			<?php } ?>
		</div>
	</section><!-- End About Us Section -->
</main>

