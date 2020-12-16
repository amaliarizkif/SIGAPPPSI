<style type="text/css">
  .about {
    min-height: 75vh;
  }
</style>
<main id="main">
 <section id="about" class="about">
  <div class="container">
    <div class="section-title">
      <h3>Update Military Health</h3>
    </div>
    <p class="text-danger">*Notes : Pengisian Military Health harus dibawah pengawasan Komandan Peleton</p>
    <div class="row">
      <div class="col-lg-9 order-1 order-lg-2">
        <form action="<?php echo base_url()?>MilitaryHealth/added_military" method="POST"  enctype="multipart/form-data">
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Running</p>
            </div>
            <div class="col-md-8 col-sm-8">
              <input type="number" class="form-control" name="Lari" required> 
            </div>
            <div class="col-md-1 col-sm-1">
              <p>Km</p>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Sit Up</p>
            </div>
            <div class="col-md-8 col-sm-8">
              <input type="number" class="form-control" name="Sit_up" required>
            </div>
            <div class="col-md-1 col-sm-1">
             
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Push Up</p>
            </div>
            <div class="col-md-8 col-sm-8">
              <input type="number" class="form-control" name="Push_up" required>
            </div>
            <div class="col-md-1 col-sm-1">
             
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Pull Up</p>
            </div>
            <div class="col-md-8 col-sm-8">
              <input type="number" class="form-control" name="Pull_up" required>
            </div>
            <div class="col-md-1 col-sm-1">
              <p>With Reps</p>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Squats</p>
            </div>
            <div class="col-md-8 col-sm-8">
              <input type="number" class="form-control" name="Squats" required>
            </div>
            <div class="col-md-1 col-sm-1">
              <p></p>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Vertical Jump</p>
            </div>
            <div class="col-md-8 col-sm-8">
              <input type="number" class="form-control" name="Ver_jump" required>
            </div>
            <div class="col-md-1 col-sm-1">
              <p>in Cm</p>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Step</p>
            </div>
            <div class="col-md-8 col-sm-8">
              <input type="number" class="form-control" name="Step" required>
            </div>
            <div class="col-md-1 col-sm-1">
              <p>Heart Rate in 3 minuets</p>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Sit and Reach</p>
            </div>
            <div class="col-md-8 col-sm-8">
              <input type="number" class="form-control" name="Sit_Reach" required>
            </div>
            <div class="col-md-1 col-sm-1">
              <p>in Cm</p>
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