<style type="text/css">
  .about {
    min-height: 75vh;
  }
</style>
<main id="main">
 <section id="about" class="about">
  <div class="container">
    <div class="section-title">
      <h3>Military Health</h3>
    </div>

    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2">
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <h6>Nama : </h6>
          </div>
          <div class="col-md-9 col-sm-9">
            <p><?php echo  $this->session->userdata['Nama']?></p>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <h6>Start Date : </h6>
          </div>
          <div class="col-md-9 col-sm-9">
            <!-- <?php echo $pf[0]['Tempat_Lahir']?> -->
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <h6>End Date : </h6>
          </div>
          <div class="col-md-9 col-sm-9">
            <!-- <?php echo $pf[0]['Tanggal_Lahir']?> -->
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-lg-12 order-1 order-lg-2">
            <a href="<?php echo base_url(); ?>MilitaryHealth/UpdateMonitoring">
              <button type="button" class="btn btn-add" style="float: right;"> <i class="mdi mdi-plus"></i>Update Monitoring
              </button>
            </a>
          </div>
        </div>
        <br>
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <h5>Progress</h5>
          </div>
          <div class="col-md-9 col-sm-9">
            <!-- <?php echo $pf[0]['Tanggal_Lahir']?> -->
          </div>
        </div>
        <hr>
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <h6>Running</h6>
          </div>
          <div class="col-md-9 col-sm-9">
            <div class="progress">
              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <h6>Sit Up</h6>
          </div>
          <div class="col-md-9 col-sm-9">
            <div class="progress">
              <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
            </div>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <h6>Push Up</h6>
          </div>
          <div class="col-md-9 col-sm-9">
            <div class="progress">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
            </div>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <h6>Pull Up</h6>
          </div>
          <div class="col-md-9 col-sm-9">
           <div class="progress">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
          </div>
        </div>
      </div>
      <!-- <a href="<?php echo base_url(); ?>Master/Profile"><button class="btn btn-add" style="float: right;">Back</button></a> -->
    </div>
  </div>



</div>
</section><!-- End About Us Section -->
</main>