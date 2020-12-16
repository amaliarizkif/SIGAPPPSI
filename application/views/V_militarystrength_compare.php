    <style type="text/css">
      .about {
        min-height: 75vh;
      }

      #countryimg {
       border: 5px solid #555;
     }
   </style>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.js"></script>
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js">
   <main id="main">
     <section id="about" class="about">
      <div class="container">
        <div class="section-title">
          <h3>Comparison Results (<?php echo $c1->Country;?> vs <?php echo $c2->Country;?>)</h3>
        </div>
        <div class="row" id="rowarticle">
         <div class="col-md-2 col-sm-2 ">
           <a href="<?php echo base_url(); ?>Military/MilitaryStrength">
            <button type="button" class="btn btn-add"> <i class="mdi mdi-plus"></i>Back
            </button>
          </a>
          <a href="<?php echo base_url(); ?>Military/ExportCompare/<?php echo $c1->ID_Country;?>/<?php echo $c2->ID_Country;?>" target="_blank">
          <button type="button" class="btn btn-add"> <i class="mdi mdi-plus"></i>Export
          </button>
        </a>
        </div>
        <div class="col-md-5 col-sm-5">
        </div>
        <div class="col-md-3 col-sm-3">
        </div>

      </div>
      <br>
      <div id="countrylist">
        <div class="card" style="width: 100%;">
          <div class="card-header text-center">
            <h5>Country</h5>
          </div>
          <br>
          <div class="card-body">
            <div class="row">
              <div style="width: 50%" class="text-center">
               <img id="countryimg" src="https://flagcdn.com/w320/<?php echo $c1->CountryCode_lw; ?>.png" srcset="https://flagcdn.com/w1280/us.png 2x" width="320" alt="Card image cap" >
               <br>
               <br>
               <h5  class="card-title"><?php echo $c1->Country;?></h5>
               <h6><?php echo $c1->pwrindex;?></h6>
               <h6>Ranked <?php echo $c1->ID_Country;?> of 138</h6>
             </div>
             <div style="width: 50%" class="text-center">
               <img id="countryimg" src="https://flagcdn.com/w320/<?php echo $c2->CountryCode_lw; ?>.png" srcset="https://flagcdn.com/w1280/us.png 2x" width="320" alt="Card image cap">
               <br>
               <br>
               <h5  class="card-title"><?php echo $c2->Country;?></h5>
               <h6><?php echo $c2->pwrindex;?></h6>
               <h6>Ranked <?php echo $c2->ID_Country;?> of 138</h6>
             </div>
           </div>
         </div>
         <br>
         <div class="card-header text-center">
          <h5>Manpower</h5>
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="row">
                <div style="width: 50%" class="text-center">
                  <h5 class="card-title">Population</h5>
                  <p class="card-text"><?php echo $c1->Population;?></p>
                </div>
                <div style="width: 50%" class="text-center">
                  <h5 class="card-title">Population</h5>
                  <p class="card-text"><?php echo $c2->Population;?></p>
                </div>
              </div>

              <br>

              <?php 
              $totalpop =   (intval(str_replace(',','',$c1->Population)) + intval(str_replace(',','',$c2->Population))) ; 
              $pop1 = round((intval(str_replace(',','',$c1->Population))/$totalpop) * 100,2);
              $pop2 = round((intval(str_replace(',','',$c2->Population))/$totalpop) * 100,2);
              $tpop1 = $c1->Country ." - ". $c1->Population . " (" . $pop1 ."%)";
              $tpop2 = $c2->Country ." - ". $c2->Population . " (" . $pop2 ."%)";
              ?>

              <div class="progress" style="height: 25px;">
                <div class="progress-bar" role="progressbar" style="width: <?php echo $pop1;?>%" aria-valuenow="<?php echo $pop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $tpop1;?>"></div>
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $pop2;?>%" aria-valuenow="<?php echo $pop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $tpop2;?>"></div>
              </div>

            </li>
            <li class="list-group-item">
              <div class="row">
                <div style="width: 50%" class="text-center">
                  <h5 class="card-title">Total Military Personnel</h5>
                  <p class="card-text"><?php echo $c1->Total_Military_Personnel;?></p>
                </div>
                <div style="width: 50%" class="text-center">
                  <h5 class="card-title">Total Military Personnel</h5>
                  <p class="card-text"><?php echo $c2->Total_Military_Personnel;?></p>
                </div>
              </div>

              <br>
              
              <?php 
              $totaltmp =   (intval(str_replace(',','',$c1->Total_Military_Personnel)) + intval(str_replace(',','',$c2->Total_Military_Personnel))) ; 
              $tmp1 = round((intval(str_replace(',','',$c1->Total_Military_Personnel))/$totaltmp) * 100,2);
              $tmp2 = round((intval(str_replace(',','',$c2->Total_Military_Personnel))/$totaltmp) * 100,2);
              $ttmp1 = $c1->Country ." - ". $c1->Total_Military_Personnel . " (" . $tmp1 ."%)";
              $ttmp2 = $c2->Country ." - ". $c2->Total_Military_Personnel . " (" . $tmp2 ."%)";
              ?>

              <div class="progress" style="height: 25px;">
                <div class="progress-bar" role="progressbar" style="width: <?php echo $tmp1;?>%" aria-valuenow="<?php echo $pop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $ttmp1;?>"></div>
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $tmp2;?>%" aria-valuenow="<?php echo $pop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $ttmp2;?>"></div>
              </div>
            </li>
            <li class="list-group-item">
             <div class="row">
              <div style="width: 50%" class="text-center">
                <h5 class="card-title">Available Manpower</h5>
                <p class="card-text"><?php echo $c1->Available_Manpower;?></p>
              </div>
              <div style="width: 50%" class="text-center">
                <h5 class="card-title">Available Manpower</h5>
                <p class="card-text"><?php echo $c2->Available_Manpower;?></p>
              </div>
            </div>

            <br>

            <?php 
            $amtotalpop =   (intval(str_replace(',','',$c1->Available_Manpower)) + intval(str_replace(',','',$c2->Available_Manpower))) ; 
            $ampop1 = round((intval(str_replace(',','',$c1->Available_Manpower))/$amtotalpop) * 100,2);
            $ampop2 = round((intval(str_replace(',','',$c2->Available_Manpower))/$amtotalpop) * 100,2);
            $amtpop1 = $c1->Country ." - ". $c1->Available_Manpower . " (" . $ampop1 ."%)";
            $amtpop2 = $c2->Country ." - ". $c2->Available_Manpower . " (" . $ampop2 ."%)";
            ?>

            <div class="progress" style="height: 25px;">
              <div class="progress-bar" role="progressbar" style="width: <?php echo $ampop1;?>%" aria-valuenow="<?php echo $pop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $amtpop1;?>"></div>
              <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $ampop2;?>%" aria-valuenow="<?php echo $pop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $amtpop2;?>"></div>
            </div>
          </li>
          <li class="list-group-item">
           <div class="row">
            <div style="width: 50%" class="text-center">
              <h5 class="card-title">Active Military</h5>
              <p class="card-text"><?php echo $c1->Active_Military;?></p>
            </div>
            <div style="width: 50%" class="text-center">
              <h5 class="card-title">Active Military</h5>
              <p class="card-text"><?php echo $c2->Active_Military;?></p>
            </div>
          </div>

          <br>

          <?php 
          $acttotalpop =   (intval(str_replace(',','',$c1->Active_Military)) + intval(str_replace(',','',$c2->Active_Military))) ; 
          $actpop1 = round((intval(str_replace(',','',$c1->Active_Military))/$acttotalpop) * 100,2);
          $actpop2 = round((intval(str_replace(',','',$c2->Active_Military))/$acttotalpop) * 100,2);
          $acttpop1 = $c1->Country ." - ". $c1->Active_Military . " (" . $actpop1 ."%)";
          $acttpop2 = $c2->Country ." - ". $c2->Active_Military . " (" . $actpop2 ."%)";
          ?>

          <div class="progress" style="height: 25px;">
            <div class="progress-bar" role="progressbar" style="width: <?php echo $actpop1;?>%" aria-valuenow="<?php echo $actpop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $acttpop1;?>"></div>
            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $actpop2;?>%" aria-valuenow="<?php echo $actpop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $acttpop2;?>"></div>
          </div>
        </li>
      </ul>
    </div>
    <br>
    <div class="card-header text-center">
      <h5>Airpower</h5>
    </div>
    <div class="card-body">
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <div class="row">
            <div style="width: 50%" class="text-center">
              <h5 class="card-title">Total Strenght</h5>
              <p class="card-text"><?php echo $c1->Total_Strength;?></p>
            </div>
            <div style="width: 50%" class="text-center">
              <h5 class="card-title">Total Strenght</h5>
              <p class="card-text"><?php echo $c2->Total_Strength;?></p>
            </div>
          </div>

          <br>

          <?php 
          $tstotalpop =   (intval(str_replace(',','',$c1->Total_Strength)) + intval(str_replace(',','',$c2->Total_Strength))) ; 
          $tspop1 = round((intval(str_replace(',','',$c1->Total_Strength))/$tstotalpop) * 100,2);
          $tspop2 = round((intval(str_replace(',','',$c2->Total_Strength))/$tstotalpop) * 100,2);
          $tstpop1 = $c1->Country ." - ". $c1->Total_Strength . " (" . $tspop1 ."%)";
          $tstpop2 = $c2->Country ." - ". $c2->Total_Strength . " (" . $tspop2 ."%)";
          ?>

          <div class="progress" style="height: 25px;">
            <div class="progress-bar" role="progressbar" style="width: <?php echo $tspop1;?>%" aria-valuenow="<?php echo $tspop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $tstpop1;?>"></div>
            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $tspop2;?>%" aria-valuenow="<?php echo $tspop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $tstpop2;?>"></div>
          </div>

        </li>
        <li class="list-group-item">
          <div class="row">
            <div style="width: 50%" class="text-center">
              <h5 class="card-title">Fighters</h5>
              <p class="card-text"><?php echo $c1->Fighters;?></p>
            </div>
            <div style="width: 50%" class="text-center">
              <h5 class="card-title">Fighters</h5>
              <p class="card-text"><?php echo $c2->Fighters;?></p>
            </div>
          </div>

          <br>

          <?php 
          $ftotalpop =   (intval(str_replace(',','',$c1->Fighters)) + intval(str_replace(',','',$c2->Fighters))) ; 
          $fpop1 = round((intval(str_replace(',','',$c1->Fighters))/$ftotalpop) * 100,2);
          $fpop2 = round((intval(str_replace(',','',$c2->Fighters))/$ftotalpop) * 100,2);
          $ftpop1 = $c1->Country ." - ". $c1->Fighters . " (" . $fpop1 ."%)";
          $ftpop2 = $c2->Country ." - ". $c2->Fighters . " (" . $fpop2 ."%)";
          ?>

          <div class="progress" style="height: 25px;">
            <div class="progress-bar" role="progressbar" style="width: <?php echo $fpop1;?>%" aria-valuenow="<?php echo $fpop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $ftpop1;?>"></div>
            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $fpop2;?>%" aria-valuenow="<?php echo $fpop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $ftpop2;?>"></div>
          </div>
        </li>
        <li class="list-group-item">
         <div class="row">
          <div style="width: 50%" class="text-center">
            <h5 class="card-title">Transports</h5>
            <p class="card-text"><?php echo $c1->Transports;?></p>
          </div>
          <div style="width: 50%" class="text-center">
            <h5 class="card-title">Transports</h5>
            <p class="card-text"><?php echo $c2->Transports;?></p>
          </div>
        </div>

        <br>

        <?php 
        $ttotalpop =   (intval(str_replace(',','',$c1->Transports)) + intval(str_replace(',','',$c2->Transports))) ; 
        $tpop1 = round((intval(str_replace(',','',$c1->Transports))/$ttotalpop) * 100,2);
        $tpop2 = round((intval(str_replace(',','',$c2->Transports))/$ttotalpop) * 100,2);
        $ttpop1 = $c1->Country ." - ". $c1->Transports . " (" . $tpop1 ."%)";
        $ttpop2 = $c2->Country ." - ". $c2->Transports . " (" . $tpop2 ."%)";
        ?>

        <div class="progress" style="height: 25px;">
          <div class="progress-bar" role="progressbar" style="width: <?php echo $tpop1;?>%" aria-valuenow="<?php echo $tpop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $ttpop1;?>"></div>
          <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $tpop2;?>%" aria-valuenow="<?php echo $tpop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $ttpop2;?>"></div>
        </div>
      </li>
      <li class="list-group-item">
       <div class="row">
        <div style="width: 50%" class="text-center">
          <h5 class="card-title">Helicopters</h5>
          <p class="card-text"><?php echo $c1->Helicopters;?></p>
        </div>
        <div style="width: 50%" class="text-center">
          <h5 class="card-title">Helicopters</h5>
          <p class="card-text"><?php echo $c2->Helicopters;?></p>
        </div>
      </div>

      <br>

      <?php 
      $htotalpop =   (intval(str_replace(',','',$c1->Helicopters)) + intval(str_replace(',','',$c2->Helicopters))) ; 
      $hpop1 = round((intval(str_replace(',','',$c1->Helicopters))/$htotalpop) * 100,2);
      $hpop2 = round((intval(str_replace(',','',$c2->Helicopters))/$htotalpop) * 100,2);
      $htpop1 = $c1->Country ." - ". $c1->Helicopters . " (" . $hpop1 ."%)";
      $htpop2 = $c2->Country ." - ". $c2->Helicopters . " (" . $hpop2 ."%)";
      ?>

      <div class="progress" style="height: 25px;">
        <div class="progress-bar" role="progressbar" style="width: <?php echo $hpop1;?>%" aria-valuenow="<?php echo $hpop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $htpop1;?>"></div>
        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $hpop2;?>%" aria-valuenow="<?php echo $hpop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $htpop2;?>"></div>
      </div>
    </li>
  </ul>
  </div>
  <br>
  <div class="card-header text-center">
    <h5>Land Forces</h5>
  </div>
  <div class="card-body">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <div class="row">
          <div style="width: 50%" class="text-center">
            <h5 class="card-title">Tanks</h5>
            <p class="card-text"><?php echo $c1->Tanks;?></p>
          </div>
          <div style="width: 50%" class="text-center">
            <h5 class="card-title">Tanks</h5>
            <p class="card-text"><?php echo $c2->Tanks;?></p>
          </div>
        </div>

        <br>

        <?php 
        $tktotalpop =   (intval(str_replace(',','',$c1->Tanks)) + intval(str_replace(',','',$c2->Tanks))) ; 
        $tkpop1 = round((intval(str_replace(',','',$c1->Tanks))/$tktotalpop) * 100,2);
        $tkpop2 = round((intval(str_replace(',','',$c2->Tanks))/$tktotalpop) * 100,2);
        $tktpop1 = $c1->Country ." - ". $c1->Tanks . " (" . $tkpop1 ."%)";
        $tktpop2 = $c2->Country ." - ". $c2->Tanks . " (" . $tkpop2 ."%)";
        ?>

        <div class="progress" style="height: 25px;">
          <div class="progress-bar" role="progressbar" style="width: <?php echo $tkpop1;?>%" aria-valuenow="<?php echo $tkpop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $tktpop1;?>"></div>
          <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $tkpop2;?>%" aria-valuenow="<?php echo $tkpop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $tktpop2;?>"></div>
        </div>

      </li>
      <li class="list-group-item">
        <div class="row">
          <div style="width: 50%" class="text-center">
            <h5 class="card-title">Armored Vehicle</h5>
            <p class="card-text"><?php echo $c1->Armored_Vehicle;?></p>
          </div>
          <div style="width: 50%" class="text-center">
            <h5 class="card-title">Armored Vehicle</h5>
            <p class="card-text"><?php echo $c2->Armored_Vehicle;?></p>
          </div>
        </div>

        <br>

        <?php 
        $avtotalpop =   (intval(str_replace(',','',$c1->Armored_Vehicle)) + intval(str_replace(',','',$c2->Armored_Vehicle))) ; 
        $avpop1 = round((intval(str_replace(',','',$c1->Armored_Vehicle))/$avtotalpop) * 100,2);
        $avpop2 = round((intval(str_replace(',','',$c2->Armored_Vehicle))/$avtotalpop) * 100,2);
        $avtpop1 = $c1->Country ." - ". $c1->Armored_Vehicle . " (" . $avpop1 ."%)";
        $avtpop2 = $c2->Country ." - ". $c2->Armored_Vehicle . " (" . $avpop2 ."%)";
        ?>

        <div class="progress" style="height: 25px;">
          <div class="progress-bar" role="progressbar" style="width: <?php echo $avpop1;?>%" aria-valuenow="<?php echo $avpop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $avtpop1;?>"></div>
          <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $avpop2;?>%" aria-valuenow="<?php echo $avpop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $avtpop2;?>"></div>
        </div>
      </li>
      <li class="list-group-item">
       <div class="row">
        <div style="width: 50%" class="text-center">
          <h5 class="card-title">Self-Propelled Artillery</h5>
          <p class="card-text"><?php echo $c1->Sp_Artillery;?></p>
        </div>
        <div style="width: 50%" class="text-center">
          <h5 class="card-title">Self-Propelled Artillery</h5>
          <p class="card-text"><?php echo $c2->Sp_Artillery;?></p>
        </div>
      </div>

      <br>

      <?php 
      $sptotalpop =   (intval(str_replace(',','',$c1->Sp_Artillery)) + intval(str_replace(',','',$c2->Sp_Artillery))) ; 
      $sppop1 = round((intval(str_replace(',','',$c1->Sp_Artillery))/$sptotalpop) * 100,2);
      $sppop2 = round((intval(str_replace(',','',$c2->Sp_Artillery))/$sptotalpop) * 100,2);
      $sptpop1 = $c1->Country ." - ". $c1->Sp_Artillery . " (" . $sppop1 ."%)";
      $sptpop2 = $c2->Country ." - ". $c2->Sp_Artillery . " (" . $sppop2 ."%)";
      ?>

      <div class="progress" style="height: 25px;">
        <div class="progress-bar" role="progressbar" style="width: <?php echo $sppop1;?>%" aria-valuenow="<?php echo $sppop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $sptpop1;?>"></div>
        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $sppop2;?>%" aria-valuenow="<?php echo $sppop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $sptpop2;?>"></div>
      </div>
    </li>
    <li class="list-group-item">
     <div class="row">
      <div style="width: 50%" class="text-center">
        <h5 class="card-title">Towed Artillery</h5>
        <p class="card-text"><?php echo $c1->Towed_Artilerry;?></p>
      </div>
      <div style="width: 50%" class="text-center">
        <h5 class="card-title">Towed Artillery</h5>
        <p class="card-text"><?php echo $c2->Towed_Artilerry;?></p>
      </div>
    </div>

    <br>

    <?php 
    $tatotalpop =   (intval(str_replace(',','',$c1->Towed_Artilerry)) + intval(str_replace(',','',$c2->Towed_Artilerry))) ; 
    $tapop1 = round((intval(str_replace(',','',$c1->Towed_Artilerry))/$tatotalpop) * 100,2);
    $tapop2 = round((intval(str_replace(',','',$c2->Towed_Artilerry))/$tatotalpop) * 100,2);
    $tatpop1 = $c1->Country ." - ". $c1->Towed_Artilerry . " (" . $tapop1 ."%)";
    $tatpop2 = $c2->Country ." - ". $c2->Towed_Artilerry . " (" . $tapop2 ."%)";
    ?>

    <div class="progress" style="height: 25px;">
      <div class="progress-bar" role="progressbar" style="width: <?php echo $tapop1;?>%" aria-valuenow="<?php echo $tapop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $tatpop1;?>"></div>
      <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $tapop2;?>%" aria-valuenow="<?php echo $tapop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $tatpop2;?>"></div>
    </div>
  </li>
  </ul>
  </div>
  <br>
  <div class="card-header text-center">
    <h5>Naval Forces</h5>
  </div>
  <div class="card-body">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <div class="row">
          <div style="width: 50%" class="text-center">
            <h5 class="card-title">Total Assets</h5>
            <p class="card-text"><?php echo $c1->Total_Assets;?></p>
          </div>
          <div style="width: 50%" class="text-center">
            <h5 class="card-title">Total Assets</h5>
            <p class="card-text"><?php echo $c2->Total_Assets;?></p>
          </div>
        </div>

        <br>

        <?php 
        $tastotalpop =   (intval(str_replace(',','',$c1->Total_Assets)) + intval(str_replace(',','',$c2->Total_Assets))) ; 
        $taspop1 = round((intval(str_replace(',','',$c1->Total_Assets))/$tastotalpop) * 100,2);
        $taspop2 = round((intval(str_replace(',','',$c2->Total_Assets))/$tastotalpop) * 100,2);
        $tastpop1 = $c1->Country ." - ". $c1->Total_Assets . " (" . $taspop1 ."%)";
        $tastpop2 = $c2->Country ." - ". $c2->Total_Assets . " (" . $taspop2 ."%)";
        ?>

        <div class="progress" style="height: 25px;">
          <div class="progress-bar" role="progressbar" style="width: <?php echo $taspop1;?>%" aria-valuenow="<?php echo $taspop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $tastpop1;?>"></div>
          <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $taspop2;?>%" aria-valuenow="<?php echo $taspop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $tastpop2;?>"></div>
        </div>

      </li>
      <li class="list-group-item">
        <div class="row">
          <div style="width: 50%" class="text-center">
            <h5 class="card-title">Submarines</h5>
            <p class="card-text"><?php echo $c1->Submarines;?></p>
          </div>
          <div style="width: 50%" class="text-center">
            <h5 class="card-title">Submarines</h5>
            <p class="card-text"><?php echo $c2->Submarines;?></p>
          </div>
        </div>

        <br>

        <?php 
        $subtotalpop =   (intval(str_replace(',','',$c1->Submarines)) + intval(str_replace(',','',$c2->Submarines))) ; 
        $subpop1 = round((intval(str_replace(',','',$c1->Submarines))/$subtotalpop) * 100,2);
        $subpop2 = round((intval(str_replace(',','',$c2->Submarines))/$subtotalpop) * 100,2);
        $subtpop1 = $c1->Country ." - ". $c1->Submarines . " (" . $subpop1 ."%)";
        $subtpop2 = $c2->Country ." - ". $c2->Submarines . " (" . $subpop2 ."%)";
        ?>

        <div class="progress" style="height: 25px;">
          <div class="progress-bar" role="progressbar" style="width: <?php echo $subpop1;?>%" aria-valuenow="<?php echo $subpop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $subtpop1;?>"></div>
          <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $subpop2;?>%" aria-valuenow="<?php echo $subpop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $subtpop2;?>"></div>
        </div>
      </li>
      <li class="list-group-item">
       <div class="row">
        <div style="width: 50%" class="text-center">
          <h5 class="card-title">Corvettes</h5>
          <p class="card-text"><?php echo $c1->Corvettes;?></p>
        </div>
        <div style="width: 50%" class="text-center">
          <h5 class="card-title">Corvettes</h5>
          <p class="card-text"><?php echo $c2->Corvettes;?></p>
        </div>
      </div>

      <br>

      <?php 
      $cortotalpop =   (intval(str_replace(',','',$c1->Corvettes)) + intval(str_replace(',','',$c2->Corvettes))) ; 
      $corpop1 = round((intval(str_replace(',','',$c1->Corvettes))/$cortotalpop) * 100,2);
      $corpop2 = round((intval(str_replace(',','',$c2->Corvettes))/$cortotalpop) * 100,2);
      $cortpop1 = $c1->Country ." - ". $c1->Corvettes . " (" . $corpop1 ."%)";
      $cortpop2 = $c2->Country ." - ". $c2->Corvettes . " (" . $corpop2 ."%)";
      ?>

      <div class="progress" style="height: 25px;">
        <div class="progress-bar" role="progressbar" style="width: <?php echo $corpop1;?>%" aria-valuenow="<?php echo $corpop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $cortpop1;?>"></div>
        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $corpop2;?>%" aria-valuenow="<?php echo $corpop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $cortpop2;?>"></div>
      </div>
    </li>
    <li class="list-group-item">
     <div class="row">
      <div style="width: 50%" class="text-center">
        <h5 class="card-title">Patrol</h5>
        <p class="card-text"><?php echo $c1->Patrol;?></p>
      </div>
      <div style="width: 50%" class="text-center">
        <h5 class="card-title">Patrol</h5>
        <p class="card-text"><?php echo $c2->Patrol;?></p>
      </div>
    </div>

    <br>

    <?php 
    $patotalpop =   (intval(str_replace(',','',$c1->Patrol)) + intval(str_replace(',','',$c2->Patrol))) ; 
    $papop1 = round((intval(str_replace(',','',$c1->Patrol))/$patotalpop) * 100,2);
    $papop2 = round((intval(str_replace(',','',$c2->Patrol))/$patotalpop) * 100,2);
    $patpop1 = $c1->Country ." - ". $c1->Patrol . " (" . $papop1 ."%)";
    $patpop2 = $c2->Country ." - ". $c2->Patrol . " (" . $papop2 ."%)";
    ?>

    <div class="progress" style="height: 25px;">
      <div class="progress-bar" role="progressbar" style="width: <?php echo $papop1;?>%" aria-valuenow="<?php echo $papop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $patpop1;?>"></div>
      <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $papop2;?>%" aria-valuenow="<?php echo $papop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $patpop2;?>"></div>
    </div>
  </li>
  </ul>
  </div>
  <br>
  <div class="card-header text-center">
    <h5>Geography</h5>
  </div>
  <div class="card-body">
    <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <div class="row">
          <div style="width: 50%" class="text-center">
            <h5 class="card-title">Square Land Area</h5>
            <p class="card-text"><?php echo $c1->Square_Land_Area;?></p>
          </div>
          <div style="width: 50%" class="text-center">
            <h5 class="card-title">Square Land Area</h5>
            <p class="card-text"><?php echo $c2->Square_Land_Area;?></p>
          </div>
        </div>

        <br>

        <?php 
        $sqltotalpop =   (intval(str_replace(',','',$c1->Square_Land_Area)) + intval(str_replace(',','',$c2->Square_Land_Area))) ; 
        $sqlpop1 = round((intval(str_replace(',','',$c1->Square_Land_Area))/$sqltotalpop) * 100,2);
        $sqlpop2 = round((intval(str_replace(',','',$c2->Square_Land_Area))/$sqltotalpop) * 100,2);
        $sqltpop1 = $c1->Country ." - ". $c1->Square_Land_Area . " (" . $sqlpop1 ."%)";
        $sqltpop2 = $c2->Country ." - ". $c2->Square_Land_Area . " (" . $sqlpop2 ."%)";
        ?>

        <div class="progress" style="height: 25px;">
          <div class="progress-bar" role="progressbar" style="width: <?php echo $sqlpop1;?>%" aria-valuenow="<?php echo $sqlpop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $sqltpop1;?>"></div>
          <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $sqlpop2;?>%" aria-valuenow="<?php echo $sqlpop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $sqltpop2;?>"></div>
        </div>

      </li>
      <li class="list-group-item">
        <div class="row">
          <div style="width: 50%" class="text-center">
            <h5 class="card-title">Coastline Coverage</h5>
            <p class="card-text"><?php echo $c1->Coastline_Coverage;?></p>
          </div>
          <div style="width: 50%" class="text-center">
            <h5 class="card-title">Coastline Coverage</h5>
            <p class="card-text"><?php echo $c2->Coastline_Coverage;?></p>
          </div>
        </div>

        <br>

        <?php 
        $coastotalpop =   (intval(str_replace(',','',$c1->Coastline_Coverage)) + intval(str_replace(',','',$c2->Coastline_Coverage))) ; 
        $coaspop1 = round((intval(str_replace(',','',$c1->Coastline_Coverage))/$coastotalpop) * 100,2);
        $coaspop2 = round((intval(str_replace(',','',$c2->Coastline_Coverage))/$coastotalpop) * 100,2);
        $coastpop1 = $c1->Country ." - ". $c1->Coastline_Coverage . " (" . $coaspop1 ."%)";
        $coastpop2 = $c2->Country ." - ". $c2->Coastline_Coverage . " (" . $coaspop2 ."%)";
        ?>

        <div class="progress" style="height: 25px;">
          <div class="progress-bar" role="progressbar" style="width: <?php echo $coaspop1;?>%" aria-valuenow="<?php echo $coaspop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $coastpop1;?>"></div>
          <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $coaspop2;?>%" aria-valuenow="<?php echo $coaspop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $coastpop2;?>"></div>
        </div>
      </li>
      <li class="list-group-item">
       <div class="row">
        <div style="width: 50%" class="text-center">
          <h5 class="card-title">Shared Borders</h5>
          <p class="card-text"><?php echo $c1->Shared_Borders;?></p>
        </div>
        <div style="width: 50%" class="text-center">
          <h5 class="card-title">Shared Borders</h5>
          <p class="card-text"><?php echo $c2->Shared_Borders;?></p>
        </div>
      </div>

      <br>

      <?php 
      $sbtotalpop =   (intval(str_replace(',','',$c1->Shared_Borders)) + intval(str_replace(',','',$c2->Shared_Borders))) ; 
      $sbpop1 = round((intval(str_replace(',','',$c1->Shared_Borders))/$sbtotalpop) * 100,2);
      $sbpop2 = round((intval(str_replace(',','',$c2->Shared_Borders))/$sbtotalpop) * 100,2);
      $sbtpop1 = $c1->Country ." - ". $c1->Shared_Borders . " (" . $sbpop1 ."%)";
      $sbtpop2 = $c2->Country ." - ". $c2->Shared_Borders . " (" . $sbpop2 ."%)";
      ?>

      <div class="progress" style="height: 25px;">
        <div class="progress-bar" role="progressbar" style="width: <?php echo $sbpop1;?>%" aria-valuenow="<?php echo $sbpop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $sbtpop1;?>"></div>
        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $sbpop2;?>%" aria-valuenow="<?php echo $sbpop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $sbtpop2;?>"></div>
      </div>
    </li>
    <li class="list-group-item">
     <div class="row">
      <div style="width: 50%" class="text-center">
        <h5 class="card-title">Usable Waterways</h5>
        <p class="card-text"><?php echo $c1->Usable_Waterways;?></p>
      </div>
      <div style="width: 50%" class="text-center">
        <h5 class="card-title">Usable Waterways</h5>
        <p class="card-text"><?php echo $c2->Usable_Waterways;?></p>
      </div>
    </div>

    <br>

    <?php 
    $uwtotalpop =   (intval(str_replace(',','',$c1->Usable_Waterways)) + intval(str_replace(',','',$c2->Usable_Waterways))) ; 
    $uwpop1 = round((intval(str_replace(',','',$c1->Usable_Waterways))/$uwtotalpop) * 100,2);
    $uwpop2 = round((intval(str_replace(',','',$c2->Usable_Waterways))/$uwtotalpop) * 100,2);
    $uwtpop1 = $c1->Country ." - ". $c1->Usable_Waterways . " (" . $uwpop1 ."%)";
    $uwtpop2 = $c2->Country ." - ". $c2->Usable_Waterways . " (" . $uwpop2 ."%)";
    ?>

    <div class="progress" style="height: 25px;">
      <div class="progress-bar" role="progressbar" style="width: <?php echo $uwpop1;?>%" aria-valuenow="<?php echo $uwpop1;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $uwtpop1;?>"></div>
      <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $uwpop2;?>%" aria-valuenow="<?php echo $uwpop2;?>" aria-valuemin="0" aria-valuemax="100" data-toggle="tooltip" data-placement="top" title="<?php echo $uwtpop2;?>"></div>
    </div>
  </li>
  </ul>
  </div>



  </div>
  </div>
  </div>

  </section><!-- End About Us Section -->
  </main>

  <script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
