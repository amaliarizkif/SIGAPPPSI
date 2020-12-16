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
      <h3 style="color: black;">Emergency Call</h3>
    </div>

    <div class="row">
      <div class="col-md-9 col-sm-9"></div>
      <div class="col-md-3 col-sm-3">
        <div class="input-group">
          <input type="text" id="myInput" class="form-control" placeholder="Search">
          <div class="input-group-append">
            <span class="input-group-text text-white" style="background: #2d6760;" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>
    </div>
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link tablinks active" onclick="openCity(event, 'London')" id="defaultOpen" href="#">Doctors</a>
      </li>
      <li class="nav-item">
        <a class="nav-link tablinks" onclick="openCity(event, 'Paris')" href="#">Hospitals</a>
      </li>
    </ul>
    <br>
    <div class="mt-6">
      <div id="London" class="tabcontent doctor">
        <div class="portfolio-container">
          <?php foreach($d as $d){ ?>
            <div class="card col-lg-3 col-md-3" style="height: 200px;">
              <div class="card-body">
                <h5 class="card-title"><?php echo $d['Nama']?></h5>
                <h6 class="card-subtitle mb-2 text-muted">NPA IDI : <?php echo $d['NPA_IDI']?></h6>
                <p class="card-text"><?php echo $d['Spesialis']?></p>
                <p class="card-text">No Telp : <?php echo $d['No_HP']?></p>
              </div>
            </div>
          <?php } ?>

        </div>
      </div>

      <div id="Paris" class="tabcontent hospital">
        <ul class="list-group list-group-flush">
          <?php foreach($hos as $d){ ?>
            <li class="list-group-item">
              <div class="content">
                <h6 class="mb-1"><?php echo $d['nama_rumah_sakit']?></h6>
                <small><?php echo $d['alamat_rumah_sakit']?></small>
                <div class="d-flex w-100 justify-content-between mt-1">
                 <small><?php echo $d['nomor_telepon']?></small>
                 <small><?php echo $d['email']?></small>
               </div>
             </div>
           </li>
         <?php } ?>
       </ul>
     </div>
   </div>

 </section><!-- End About Us Section -->
</main>
<script type="text/javascript">
  function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();
</script>
<script type="text/javascript">

  $( "#myInput" ).keyup(function() {
   var input, filter, ul, li, a, i, txtValue;
   input = document.getElementById("myInput");
   filter = input.value.toUpperCase();
   ul = document.getElementById("London");
   li = ul.getElementsByClassName("card");
   for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByClassName("card-body")[0];
    txtValue = a.textContent || a.innerText;
    console.log(txtValue);
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
});


  $( document ).ready(function() {
    console.log($( ".active" ).text() );

    $( ".tablinks" ).click(function() {
      var tabs = $( ".active" ).text() ;
      console.log('tab '+ tabs)
      if (tabs == 'Doctors') {
        $( "#myInput" ).keyup(function() {
          var input, filter, ul, li, a, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          ul = document.getElementById("London");
          li = ul.getElementsByClassName("card");
          for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("card-body")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              li[i].style.display = "";
            } else {
              li[i].style.display = "none";
            }
          }
        });
      }else{
        $( "#myInput" ).keyup(function() {
          var input, filter, ul, li, a, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          ul = document.getElementById("Paris");
          li = ul.getElementsByTagName("li");
          for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByClassName("content")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              li[i].style.display = "";
            } else {
              li[i].style.display = "none";
            }
          }
        });
      }
    });
  });



</script>