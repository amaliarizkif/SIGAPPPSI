<style type="text/css">
  .about {
    min-height: 75vh;
  }

  #mapid { height: 180px; }

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
      <h3 style="color: black;">First Aid Guide</h3>
    </div>
    <div class="row" id="rowarticle">
      <h4 style="color: black;"><?php echo $fa[0]['Title']?></h4>
    </div>
    <br>
    <div class="row" id="rowarticle">

      <p><?php echo $fa[0]['Description']?></p>
    </div>
    <br>
    <div class="row mt-4">
      <div class="col-lg-2 order-1 order-lg-2"></div>
      <div class="col-lg-8 order-1 order-lg-2">

        <object style="position: relative; width: 100%; height:500px;" type="application/pdf" data="<?php echo base_url();?>assets/files/firstaid/<?php echo $fa[0]['File_Name']?>?#zoom=50&scrollbar=0&toolbar=0&navpanes=0">
          <p>Insert your error message here, if the PDF cannot be displayed.</p>
        </object>
      </div>
      <div class="col-lg-2 order-1 order-lg-2"></div>
    </div>
    <br>   
    <a href="<?php echo base_url(); ?>Guide/FirstAid"><button class="btn btn-add" style="float: right;">Back</button></a>



  </div>
</section><!-- End About Us Section -->
</main>

