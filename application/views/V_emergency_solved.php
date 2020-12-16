<style type="text/css">
  .about {
    min-height: 75vh;
  }

  #mapid { height: 180px; }
</style>
<!-- <link rel="stylesheet" href="https://js.arcgis.com/4.15/esri/themes/light/main.css">
<script src="https://js.arcgis.com/4.15/"></script>
-->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
crossorigin=""></script>
<main id="main">
 <section id="about" class="about">
  <div class="container">
    <div class="section-title">
      <h3>Emergency Report Resolve</h3>
    </div>
    <?php if($this->session->flashdata('pesan')!=NULL){?>
      <div class="login__label alert alert-success" id="success-alert" style="color: black; display: none;"><b><?php echo $this->session->flashdata('pesan');?></b></div>
      <script type="text/javascript">
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
          $("#success-alert").slideUp(500);
        });
      </script>
    <?php } else if($this->session->flashdata('hapus')!=NULL){ ?>
      <div class="login__label alert alert-danger" id="success-alert" style="color: black; display: none;"><b><?php echo $this->session->flashdata('hapus');?></b></div>
      <script type="text/javascript">
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
          $("#success-alert").slideUp(500);
        });
      </script>
    <?php }  ?>
    <div class="row">
      <div class="col-lg-9 order-1 order-lg-2">
        <form action="<?php echo base_url()?>Emergency/added_emergencycallsolved/<?php echo $this->uri->segment(3)?>" method="POST"  enctype="multipart/form-data">
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Resolver</p>
            </div>
            <div class="col-md-9 col-sm-9">
              <?php echo $this->session->userdata['Nama'] ?>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Summary</p>
            </div>
            <div class="col-md-9 col-sm-9">
              <textarea class="form-control" name="Summary" required></textarea>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Evidence</p>
            </div>
            <div class="col-md-9 col-sm-9">
              <input type="file"  accept=".png,.jpg,.jpeg" class="form-control" maxlength="50" name="File" required>
              <small>Format:.png, .jpg, .jpeg | Max size: 5000kb</small>
            </div>
          </div>
         <button type="submit" class="btn btn-add" style="float: right;"> <i class="mdi mdi-plus"></i>Submit
         </button>
       </form>
     </div>
   </div>



 </div>
</section><!-- End About Us Section -->
</main>

