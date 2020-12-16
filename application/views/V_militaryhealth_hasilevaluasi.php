<style type="text/css">
  .about {
    min-height: 75vh;
  }
</style>
<main id="main">
 <section id="about" class="about">
  <div class="container">
    <div class="section-title">
      <h3>Hasil Evaluasi</h3>
      <h3>Periode <?php echo $mh[0]['bulan']?></h3>
    </div>
    <a href="<?php echo base_url(); ?>MilitaryHealth/MilitaryEvaluation"><button class="btn btn-add">Back</button></a>
    <div class="row mt-4">
      <div class="col-lg-6 order-1 order-lg-2">
        <h5>Minggu I</h5>
        <hr>
        <h6>Samapta A</h6>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Lari</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[0]['Lari']?></div>
          <div class="col-lg-2"><?php echo $mh[0]['persen_lari']?>%</div>
        </div>
        <br>
        <h6>Samapta B</h6>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Sit Up</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[0]['Sit_up']?></div>
          <div class="col-lg-2"><?php echo $mh[0]['persen_situp']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Push Up</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[0]['Push_up']?></div>
          <div class="col-lg-2"><?php echo $mh[0]['persen_pushup']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Pull Up</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[0]['Pull_up']?></div>
          <div class="col-lg-2"><?php echo $mh[0]['persen_pullup']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Squat</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[0]['Squat']?></div>
          <div class="col-lg-2"><?php echo $mh[0]['persen_squat']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Vertical Jump</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[0]['Vertical_jump']?></div>
          <div class="col-lg-2"><?php echo $mh[0]['persen_verjump']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Step</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[0]['Step']?></div>
          <div class="col-lg-2"><?php echo $mh[0]['persen_step']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Sit & Reach</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[0]['Sit_Reach']?></div>
          <div class="col-lg-2"><?php echo $mh[0]['persen_sitreach']?>%</div>
        </div>
        <hr>
        <h5>Total : <?php echo $mh[0]['totalpersen_week']?>%</h5>

        <br>
        <br>

        <h5>Minggu III</h5>
        <hr>
        <h6>Samapta A</h6>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Lari</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[2]['Lari']?></div>
          <div class="col-lg-2"><?php echo $mh[2]['persen_lari']?>%</div>
        </div>
        <br>
        <h6>Samapta B</h6>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Sit Up</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[2]['Sit_up']?></div>
          <div class="col-lg-2"><?php echo $mh[2]['persen_situp']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Push Up</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[2]['Push_up']?></div>
          <div class="col-lg-2"><?php echo $mh[2]['persen_pushup']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Pull Up</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[2]['Pull_up']?></div>
          <div class="col-lg-2"><?php echo $mh[2]['persen_pullup']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Squat</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[2]['Squat']?></div>
          <div class="col-lg-2"><?php echo $mh[2]['persen_squat']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Vertical Jump</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[2]['Vertical_jump']?></div>
          <div class="col-lg-2"><?php echo $mh[2]['persen_verjump']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Step</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[2]['Step']?></div>
          <div class="col-lg-2"><?php echo $mh[2]['persen_step']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Sit & Reach</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[2]['Sit_Reach']?></div>
          <div class="col-lg-2"><?php echo $mh[2]['persen_sitreach']?>%</div>
        </div>
        <hr>
        <h5>Total : <?php echo $mh[2]['totalpersen_week']?>%</h5>
      </div>

      <div class="col-lg-6 order-1 order-lg-2">
        <h5>Minggu II</h5>
        <hr>
        <h6>Samapta A</h6>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Lari</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[1]['Lari']?></div>
          <div class="col-lg-2"><?php echo $mh[1]['persen_lari']?>%</div>
        </div>
        <br>
        <h6>Samapta B</h6>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Sit Up</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[1]['Sit_up']?></div>
          <div class="col-lg-2"><?php echo $mh[1]['persen_situp']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Push Up</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[1]['Push_up']?></div>
          <div class="col-lg-2"><?php echo $mh[1]['persen_pushup']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Pull Up</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[1]['Pull_up']?></div>
          <div class="col-lg-2"><?php echo $mh[1]['persen_pullup']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Squat</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[1]['Squat']?></div>
          <div class="col-lg-2"><?php echo $mh[1]['persen_squat']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Vertical Jump</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[1]['Vertical_jump']?></div>
          <div class="col-lg-2"><?php echo $mh[1]['persen_verjump']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Step</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[1]['Step']?></div>
          <div class="col-lg-2"><?php echo $mh[1]['persen_step']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Sit & Reach</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[1]['Sit_Reach']?></div>
          <div class="col-lg-2"><?php echo $mh[1]['persen_sitreach']?>%</div>
        </div>
        <hr>
        <h5>Total : <?php echo $mh[1]['totalpersen_week']?>%</h5>

        <br>
        <br>

        <h5>Minggu IV</h5>
        <hr>
        <h6>Samapta A</h6>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Lari</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[3]['Lari']?></div>
          <div class="col-lg-2"><?php echo $mh[3]['persen_lari']?>%</div>
        </div>
        <br>
        <h6>Samapta B</h6>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Sit Up</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[3]['Sit_up']?></div>
          <div class="col-lg-2"><?php echo $mh[3]['persen_situp']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Push Up</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[3]['Push_up']?></div>
          <div class="col-lg-2"><?php echo $mh[3]['persen_pushup']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Pull Up</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[3]['Pull_up']?></div>
          <div class="col-lg-2"><?php echo $mh[3]['persen_pullup']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Squat</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[3]['Squat']?></div>
          <div class="col-lg-2"><?php echo $mh[3]['persen_squat']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Vertical Jump</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[3]['Vertical_jump']?></div>
          <div class="col-lg-2"><?php echo $mh[3]['persen_verjump']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Step</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[3]['Step']?></div>
          <div class="col-lg-2"><?php echo $mh[3]['persen_step']?>%</div>
        </div>
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-3">Sit & Reach</div>
          <div class="col-lg-1">:</div>
          <div class="col-lg-2"><?php echo $mh[3]['Sit_Reach']?></div>
          <div class="col-lg-2"><?php echo $mh[3]['persen_sitreach']?>%</div>
        </div>
        <hr>
        <h5>Total : <?php echo $mh[3]['totalpersen_week']?>%</h5>
      </div>
    </div>
    <br>
    <hr>
    <div class="row" style="background-color: #FF8228; border-radius: 5px; height: 60px;">
      <div class="col-lg-3"></div>
      <div class="col-lg-6" style="align-items: center;">
        <?php 
        $hasil = round( ($mh[0]['totalpersen_week'] + $mh[3]['totalpersen_week'] + $mh[2]['totalpersen_week'] + $mh[1]['totalpersen_week']) / 4 ,2);
        if ($hasil > 100) {
          $hasil = 100;
        }else{
          $hasil;
        }

        if ($hasil >= 90) {
          $remark = 'Excellent';
        }else if($hasil >80){ 
          $remark = 'Good';
        }else{
          $remark = 'Average';
        }
        ?>
        
        <h4 style="padding: 15px;">HASIL EVALUASI : <?php echo $hasil ;?>% (<?php echo $remark ;?>)</h4>
      </div>
      <div class="col-lg-3"></div>
      
    </div>
    
    

  </div>
</section><!-- End About Us Section -->
</main>