<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/pie.js"></script>
<script type="text/javascript" src="https://www.amcharts.com/lib/3/serial.js"></script>

<main id="mainhome">

  <!-- ======= About Us Section ======= -->
  <section id="about" class="about section-bg">
    <div class="container">
     <div class="row">
      <div class="card" style="width: 100%;">
        <div class="card-body">
          <h5 class="card-title">Hi, Welcome <?php echo $this->session->userdata('Nama');?></h5>
          <h6 class="card-title"><?php echo date('l, d-M-Y');?></h6>
        </div>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-3" >
        <div class="card text-white bg-success" style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title">Military Health</h5>
            <h6 class="card-text" style="font-size: 50px; text-align: right;"><?php echo $mha->jml_approved;?></h6>
          </div>
          <div class="card-footer ">
            <h6 class="card-text" style="text-align: right;">Approved</h6>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-white bg-warning"  style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title">Emergency Report</h5>
            <h6 class="card-text" style="font-size: 50px; text-align: right;"><?php echo $erc->jml_complete;?></h6>
          </div>
          <div class="card-footer ">
            <h6 class="card-text" style="text-align: right;">Complete</h6>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-white bg-primary" style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title">Doctor Consultation</h5>
            <h6 class="card-text" style="font-size: 50px; text-align: right;"><?php echo $dcn->jml_new;?></h6>
          </div>
          <div class="card-footer ">
            <h6 class="card-text" style="text-align: right;">Schedule</h6>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-white bg-danger" style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title">Need Approval</h5>
            <h6 class="card-text" style="font-size: 50px; text-align: right;"><?php echo $mhwa->jml_wa;?></h6>
          </div>
          <div class="card-footer ">
            <h6 class="card-text" style="text-align: right;">Waiting for Approval</h6>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-6 col-sm-6">
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title">Military Health Report</h5>
            <div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card"  style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title">Emergency Report</h5>
            <div id="chartdivline" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
          </div>
        </div>
      </div>
    </div>


    <div class="row mt-3">
      <div class="col-md-12 col-sm-12">
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <h5 class="card-title">Monitoring Report</h5>
            <div id="chartdivbar" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-md-12 col-sm-12">
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <h4 class="card-title">Top 10 Military Strength</h4>
            <ul class="list-group list-group-flush">
              <?php foreach ($mh as $f){ ?>
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-4">
                      <img class="img-thumbnail" src="https://www.countryflags.io/<?php echo $f['CountryCode_lw']?>/flat/64.png">
                    </div>
                    <div class="col-md-4"><h6><?php echo $f['Country']?></h6></div>
                    <div class="col-md-4"><h6><?php echo $f['pwrindex']?></h6></div>
                  </div>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>
</section><!-- End About Us Section -->

<!-- ======= Services Section ======= -->
<!--   <section id="team" class="team">
    <div class="container">

      <div class="section-title">
        <h2 style="color: #fff;">Modules</h2>
      </div>

      <div class="row">

      </div>

    </div>
  </section> -->
  <!-- End Services Section -->


</main><!-- End #main -->
<script type="text/javascript">
  $('.carousel').carousel({
   interval: 1000
 })
</script>
<script type="text/javascript">
  AmCharts.makeChart("chartdiv",
  {
    "type": "pie",
    "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
    "titleField": "category",
    "valueField": "column-1",
    "allLabels": [],
    "balloon": {},
    "legend": {
      "enabled": true,
      "align": "center",
      "markerType": "circle"
    },
    "titles": [],
    "dataProvider": [
    <?php foreach ($rptmh as $r ) { ?>
      {
        "category": "<?php echo $r['Status']?>",
        "column-1": '<?php echo $r['jml_status']?>'
      },
    <?php } ?>
    ]
  }
  );
</script>

<script type="text/javascript">
  AmCharts.makeChart("chartdivline",
  {
    "type": "serial",
    "categoryField": "category",
    "startDuration": 1,
    "categoryAxis": {
      "gridPosition": "start"
    },
    "trendLines": [],
    "graphs": [
    {
      "balloonText": "[[category]]:[[value]]",
      "bullet": "round",
      "id": "AmGraph-1",
      "title": "graph 1",
      "valueField": "column-1"
    },
    // {
    //   "balloonText": "[[title]] of [[category]]:[[value]]",
    //   "bullet": "square",
    //   "id": "AmGraph-2",
    //   "title": "graph 2",
    //   "valueField": "column-2"
    // }
    ],
    "guides": [],
    "valueAxes": [
    {
      "id": "ValueAxis-1",
      "title": "Jumlah Data"
    }
    ],
    "allLabels": [],
    "balloon": {},
    "legend": {
      "enabled": true,
      "useGraphSettings": true
    },
    // "titles": [
    // {
    //   "id": "Title-1",
    //   "size": 15,
    //   "text": "Chart Title"
    // }
    // ],
    "dataProvider": [
     <?php foreach ($rpter as $r ) { ?>
    {
      "category": "<?php echo $r['Status']?>",
      "column-1": '<?php echo $r['jml_status']?>'
    },
    <?php } ?>
    
    ]
  }
  );
</script>

<script type="text/javascript">
  AmCharts.makeChart("chartdivbar",
  {
    "type": "serial",
    "categoryField": "category",
    "startDuration": 1,
    "categoryAxis": {
      "gridPosition": "start"
    },
    "trendLines": [],
    "graphs": [
    {
      "balloonText": "[[category]]:[[value]]",
      "fillAlphas": 1,
      "id": "AmGraph-1",
      "title": "graph 1",
      "type": "column",
      "valueField": "column-1"
    },
    // {
    //   "balloonText": "[[title]] of [[category]]:[[value]]",
    //   "fillAlphas": 1,
    //   "id": "AmGraph-2",
    //   "title": "graph 2",
    //   "type": "column",
    //   "valueField": "column-2"
    // }
    ],
    "guides": [],
    "valueAxes": [
    {
      "id": "ValueAxis-1",
      "title": "Jumlah Data"
    }
    ],
    "allLabels": [],
    "balloon": {},
    "legend": {
      "enabled": true,
      "useGraphSettings": true
    },
    // "titles": [
    // {
    //   "id": "Title-1",
    //   "size": 15,
    //   "text": "Chart Title"
    // }
    // ],
    "dataProvider": [
     <?php foreach ($all as $r ) { ?>
    {
      "category": "<?php echo $r['modul']?>",
      "column-1": '<?php echo $r['jml_data']?>'
    },
    <?php } ?>
    ]
  }
  );
</script>