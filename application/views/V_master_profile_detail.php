<style type="text/css">
  .about {
    min-height: 75vh;
  }
</style>
<main id="main">
 <section id="about" class="about">
  <div class="container">
    <div class="section-title">
      <h3>Detail Profile</h3>
    </div>
    <div class="row">
      <div class="col-lg-9 order-1 order-lg-2">
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <p>Nama</p>
          </div>
          <div class="col-md-9 col-sm-9">
            <p><?php echo $pf[0]['Nama']?></p>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <p>Tempat Lahir</p>
          </div>
          <div class="col-md-9 col-sm-9">
            <?php echo $pf[0]['Tempat_Lahir']?>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <p>Tanggal Lahir</p>
          </div>
          <div class="col-md-9 col-sm-9">
            <?php echo $pf[0]['Tanggal_Lahir']?>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <p>Pangkat/Korps</p>
          </div>
          <div class="col-md-9 col-sm-9">
            <?php echo $pf[0]['Pangkat/Korps']?>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <p>NRP/NBI</p>
          </div>
          <div class="col-md-9 col-sm-9">
            <?php echo $pf[0]['NRP/NBI']?>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <p>Jabatan</p>
          </div>
          <div class="col-md-9 col-sm-9">
            <?php echo $pf[0]['Jabatan']?>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <p>Golongan Darah</p>
          </div>
          <div class="col-md-9 col-sm-9">
           <?php echo $pf[0]['Gol_Darah']?>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <p>Email</p>
          </div>
          <div class="col-md-9 col-sm-9">
            <?php echo $pf[0]['Email']?>
          </div>
        </div>
        <a href="<?php echo base_url(); ?>Master/Profile"><button class="btn btn-add" style="float: right;">Back</button></a>
      </div>
    </div>

    

  </div>
</section><!-- End About Us Section -->
</main>