<style type="text/css">
  .about {
    min-height: 75vh;
  }

  #mapid { height: 300px; }

  img {
    max-height: 350px;
  }
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
        <h3>Emergency Reports Detail</h3>
      </div>

      <div class="row">
        <div class="col-lg-12 order-1 order-lg-2">
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <h6>Reporter : </h6>
            </div>
            <div class="col-md-9 col-sm-9">
              <p><?php echo $ec->creator?></p>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <h6>Summary : </h6>
            </div>
            <div class="col-md-9 col-sm-9">
              <?php echo $ec->Summary?>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <h6>Evidence : </h6>
            </div>
            <div class="col-md-9 col-sm-9">
              <img src="<?php echo base_url();?>assets/files/emergencycall/<?php echo $ec->Evidence?>" class="img-thumbnail">
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <h6>Location : </h6>
            </div>
            <div class="col-md-9 col-sm-9">
              <div id="mapid"></div>
            </div>
          </div>
          <br>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <h4>Solved</h4>
            </div>
            <div class="col-md-9 col-sm-9">
              <!-- <?php echo $pf[0]['Tanggal_Lahir']?> -->
            </div>
          </div>
          <hr>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <h6>Solver : </h6>
            </div>
            <div class="col-md-9 col-sm-9">
              <p><?php echo $ec->solver?></p>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <h6>Solve Summary : </h6>
            </div>
            <div class="col-md-9 col-sm-9">
              <?php echo $ec->Solved_Summary?>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <h6>Solve Evidence : </h6>
            </div>
            <div class="col-md-9 col-sm-9">
              <img src="<?php echo base_url();?>assets/files/emergencycall/<?php echo $ec->Solved_Evidence?>" class="img-thumbnail">
            </div>
          </div>
          <a href="<?php echo base_url(); ?>Emergency/EmergencyCall"><button class="btn btn-add" style="float: right;">Back</button></a>
        </div>
      </div>



    </div>
  </section><!-- End About Us Section -->
</main>
<script>

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }


  function showPosition(position) {
// x.innerHTML = "Latitude: " + position.coords.latitude + 
// "<br>Longitude: " + position.coords.longitude;


var mymap = L.map('mapid').setView([<?php echo $ec->Latitude ?>, <?php echo $ec->Longitude?>
  ], 13);

var marker = L.marker([position.coords.latitude, position.coords.longitude
  ]).addTo(mymap);

L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiYW1hbGlpYWE4IiwiYSI6ImNrZXlhMmNkYzB3cHQyeXA5bm1raTN4OTYifQ.tHiqLNLx93ZudbBpAtlUgw', {
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  maxZoom: 18,
  id: 'mapbox/streets-v11',
  tileSize: 512,
  zoomOffset: -1,
  accessToken: 'pk.eyJ1IjoiYW1hbGlpYWE4IiwiYSI6ImNrZXlhMmNkYzB3cHQyeXA5bm1raTN4OTYifQ.tHiqLNLx93ZudbBpAtlUgw'
}).addTo(mymap);

}
</script>
