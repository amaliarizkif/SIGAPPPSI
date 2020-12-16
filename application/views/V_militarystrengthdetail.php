<style type="text/css">
  .about {
    min-height: 75vh;
  }

  .card {
    width: 100% !important; 
  }

  #countryimg {
     border: 5px solid #555;
  }
</style>
<main id="main">
 <section id="about" class="about">
  <div class="container">
    <div class="section-title">
      <h3><?php echo $ms[0]['Country']?> Military Strength (2020)</h3>
    </div>
    <div class="row mt-3 mb-3">

     <div class="col-lg-6 order-1 order-lg-2 text-center">

      <br>
      <!-- <img src="https://www.countryflags.io/be/flat/64.png" class="img-fluid" alt=""> -->
      <img src="https://flagcdn.com/w640/<?php echo $ms[0]['CountryCode_lw']?>.png" srcset="https://flagcdn.com/w1280/us.png 2x" width="320" alt="" id="countryimg" class="img-thumbnail">
    </div>
    <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1">
      <p>
        For 2020, <?php echo $ms[0]['Country']?> is ranked <?php echo $ms[0]['ID_Country']?> of 138 out of the countries considered for the annual GFP review. It holds a PwrIndx* rating of <?php echo $ms[0]['pwrindex']?> (0.0000 considered 'perfect').
      </p>
    </div>
  </div>

  <br>
  <br>
  <div class="row">
    <?php foreach($ms as $c){ ?>
     <div id="accordion" style="width: 100%; position: block;">
      <div class="card">
        <div class="card-header" id="headingOne" style="background-color: #848c56; color: #000;">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background-color: #848c56; color: #000;">
              <h3>Manpower</h3>
            </button>
          </h5>
        </div>

        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body w-80">
            <div class="row">
              <div class="col-lg-6 col-md-6 icon-box">
                <h5 class="card-title">Population</h5>
                <p class="card-text"><?php echo $c['Population']?></p>

              </div>
              <div class="col-lg-6 col-md-6 icon-box">
                <h5 class="card-title">Total Military Personnel</h5>
                <p class="card-text"><?php echo $c['Total_Military_Personnel']?></p>
              </div>
              <br>
              <div class="col-lg-6 col-md-6 icon-box">
                <h5 class="card-title">Available Manpower</h5>
                <p class="card-text"><?php echo $c['Available_Manpower']?></p>
              </div>
              <div class="col-lg-6 col-md-6 icon-box">
                <h5 class="card-title">Active Military</h5>
                <p class="card-text"><?php echo $c['Active_Military']?></p>
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingTwo" style="background-color: #848c56; color: #000;">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="background-color: #848c56; color: #000;">
             <h3>AirPower</h3>
           </button>
         </h5>
       </div>
       <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-3 col-md-3">
              <h5 class="card-title">Total Strenght</h5>
              <p class="card-text"><?php echo $c['Total_Strength']?></p>

            </div>
            <div class="col-lg-3 col-md-3">
              <h5 class="card-title">Fighters</h5>
              <p class="card-text"><?php echo $c['Fighters']?></p>
            </div>
            <div class="col-lg-3 col-md-3">
              <h5 class="card-title">Transports</h5>
              <p class="card-text"><?php echo $c['Transports']?></p>
            </div>
            <div class="col-lg-3 col-md-3">
              <h5 class="card-title">Helicopters</h5>
              <p class="card-text"><?php echo $c['Helicopters']?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingThree" style="background-color: #848c56; color: #000;">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="background-color: #848c56; color: #000;">
            <h3>Land Forces</h3>
          </button>
        </h5>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body">
          <div class="row ">
            <div class="col-lg-3 col-md-3">
              <h5 class="card-title">Tanks</h5>
              <p class="card-text"><?php echo $c['Tanks']?></p>

            </div>
            <div class="col-lg-3 col-md-3">
              <h5 class="card-title">Armored Vehicle</h5>
              <p class="card-text"><?php echo $c['Armored_Vehicle']?></p>
            </div>
            <div class="col-lg-3 col-md-3">
              <h5 class="card-title">Self-Propelled Artillery</h5>
              <p class="card-text"><?php echo $c['Sp_Artillery']?></p>
            </div>
            <div class="col-lg-3 col-md-3">
              <h5 class="card-title">Towed Artillery</h5>
              <p class="card-text"><?php echo $c['Towed_Artilerry']?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-header" id="headingfour" style="background-color: #848c56; color: #000;">
        <h5 class="mb-0">
          <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour" style="background-color: #848c56; color: #000;">
           <h3>Naval Forces</h3>
         </button>
       </h5>
     </div>
     <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
      <div class="card-body">
        <div class="row">
          <div class="col-lg-3 col-md-3">
            <h5 class="card-title">Total Assets</h5>
            <p class="card-text"><?php echo $c['Total_Assets']?></p>

          </div>
          <div class="col-lg-3 col-md-3">
            <h5 class="card-title">Submarines</h5>
            <p class="card-text"><?php echo $c['Submarines']?></p>
          </div>
          <div class="col-lg-3 col-md-3">
            <h5 class="card-title">Corvettes</h5>
            <p class="card-text"><?php echo $c['Corvettes']?></p>
          </div>
          <div class="col-lg-3 col-md-3">
            <h5 class="card-title">Patrol</h5>
            <p class="card-text"><?php echo $c['Patrol']?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingfive" style="background-color: #848c56; color: #000;">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive" style="background-color: #848c56; color: #000;">
         <h3>Geography</h3>
       </button>
     </h5>
   </div>
   <div id="collapsefive" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
    <div class="card-body">
      <div class="row">
        <div class="col-lg-3 col-md-3">
          <h5 class="card-title">Square Land Area</h5>
          <p class="card-text"><?php echo $c['Square_Land_Area']?></p>

        </div>
        <div class="col-lg-3 col-md-3">
          <h5 class="card-title">Coastline Coverage</h5>
          <p class="card-text"><?php echo $c['Coastline_Coverage']?></p>
        </div>
        <div class="col-lg-3 col-md-3">
          <h5 class="card-title">Shared Borders</h5>
          <p class="card-text"><?php echo $c['Shared_Borders']?></p>
        </div>
        <div class="col-lg-3 col-md-3">
          <h5 class="card-title">Usable Waterways</h5>
          <p class="card-text"><?php echo $c['Usable_Waterways']?></p>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php } ?>
</div>
</div>

</section><!-- End About Us Section -->
</main>