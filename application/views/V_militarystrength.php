<style type="text/css">
  .about {
    min-height: 75vh;
  }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js">
<main id="main">
 <section id="about" class="about">
  <div class="container">
    <div class="section-title">
      <h3>2020 Military Strength Ranking</h3>
    </div>
    <div class="row" id="rowarticle">
     <div class="col-md-4 col-sm-4" style="padding: 0px;">
       <!-- <a href="<?php echo base_url(); ?>Master/add_firstaid"> -->
        <button type="button" class="btn btn-add" data-toggle="modal" data-target="#exampleModalCenter"> <i class="mdi mdi-plus"></i>Compare Country
        </button>
        <a href="<?php echo base_url(); ?>Military/ExportTop2020" target="_blank">
          <button type="button" class="btn btn-add"> <i class="mdi mdi-plus"></i>Export
          </button>
        </a>
        <!-- </a> -->
      </div>
      <div class="col-md-5 col-sm-5">
      </div>
      <div class="col-md-3 col-sm-3">
        <div class="input-group">
          <input type="text" id="myInput" class="form-control" onkeyup="myFunction()" placeholder="Search">
          <div class="input-group-append">
            <span class="input-group-text text-white" style="background: #2d6760;" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
          </div>
        </div>
      </div>

    </div>
    <br>
    <div id="countrylist">
      <?php foreach($ms as $c){ ?>
        <div class="row" >
          <a class="w-100" style="color: #000;" href="<?php echo base_url(); ?>Military/MilitaryStrengthCountry/<?php echo $c['ID_Country']?>">
            <div class="card w-100">
              <div class="card-header" style="background-color: #848c56">
                <div class="row" id="contentcountry">
                  <div class="col-md-1 text-center">
                    <h5><?php echo $c['ID_Country']?></h5>
                  </div>
                  <div class="col-md-11">
                    <h5><?php echo $c['Country']?></h5>
                  </div>
                </div>
              </div>
              <div class="card-body" style="background-color: #4e5427;">
                <div class="row">
                  <div class="col-md-1 text-center">
                    <img class="img-thumbnail" src="https://www.countryflags.io/<?php echo $c['CountryCode_lw']?>/flat/64.png">
                  </div>
                  <div class="col-md-11 text-right">
                    <h5><?php echo $c['pwrindex']?></h5>
                  </div>
                </div>
              </div>
            </div>
          </a>
        </div>
      <?php } ?>
    </div>
  </div>

</section><!-- End About Us Section -->
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Compare Country</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>Military/CompareCountry" method="POST"  enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">Country 1</label>
            <select class="form-control" id="select-country1" name="country1" required>
              <option value="" disabled selected>-Select Country 1-</option>
              <?php foreach($ms as $d){?>
                <option value="<?php echo $d['ID_Country']?>"><?php echo $d['Country']?></option>
              <?php }?>
            </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Country 2</label>
            <select class="form-control" id="select-country2" name="country2" required>
              <option value="" disabled selected>-Select Country 2-</option>
              <?php foreach($ms as $d){?>
                <option value="<?php echo $d['ID_Country']?>"><?php echo $d['Country']?></option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Compare</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  // $(function() {
  // $('#select-country1').selectize();
  // $('#select-country2').selectize();
  // });

  function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("countrylist");
    li = ul.getElementsByTagName("a");
    for (i = 0; i < li.length; i++) {
      a = li[i].getElementsByTagName("div")[0];
      txtValue = a.textContent || a.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }
</script>