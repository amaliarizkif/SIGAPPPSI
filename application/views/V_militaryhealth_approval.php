<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
<style type="text/css">
  #chartdiv {
    width: 100%;
    height: 300px;
  }

  #chart-selector li {
    display: inline-block;
    border: 1px solid #ececec;
    border-radius: 5px;
    padding: .5em;
    background: #ececec;
    cursor: pointer;
  }

  #chart-selector li:hover {
    background: #FFFF60;
    border: 1px solid #FFFF60;
  }
</style>
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/dataviz.js"></script>
<!-- <div id="chartdiv"></div>  -->

<main id="main">
 <section id="about" class="about">
  <div class="container">

    <div class="section-title">
      <h3>Approval Military Health</h3>
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

    <div class="row mb-4">
      <div class="col-lg-12" style="padding: 0px;">
        <?php if ($this->session->userdata['Role'] == 'Admin') { ?>
          <a href="<?php echo base_url(); ?>Master/add_firstaid">
            <button type="button" class="btn btn-add"><i class="mdi mdi-plus"></i>Export
            </button>
          </a>
        <?php } ?>
      </div>
    </div>
    <div class="row ">
      <div class="table-responsive m-t-40">
        <table id="myTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th></th>
              <th style="text-align: center;">Start Date</th>
              <th style="text-align: center;">End Date</th>
              <th style="text-align: center;">Nama</th>
              <th style="text-align: center;">NRP/NBI</th>
              <th style="text-align: center;">Jabatan</th>
              <th style="text-align: center;">Status</th>
              <th style="text-align: center;" class="notexport">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($mh as $f){ ?>
              <tr>
                <td></td>
                <td><?php echo date("d-m-Y", strtotime($f['Start_Date']))?></td>
                <td><?php if ($f['End_Date'] == null) {
                  echo "-";
                }else{
                  echo date("d-m-Y", strtotime($f['End_Date']));
                } ?></td>
                <td><?php echo $f['Nama'];?></td>
                <td><?php echo $f['NRP/NBI'];?></td>
                <td><?php echo $f['Jabatan'];?></td>
                <td><?php echo $f['Status'];?></td>
                <td style="text-align: center;" >
                  <?php if ($f['End_Date'] != null && $f['Status'] == 'New') { ?>
                    <a href="<?php echo base_url(); ?>MilitaryHealth/UpdateMonitoring/<?php echo $f['ID_MH']?>"><button class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                    <a href="<?php echo base_url(); ?>MilitaryHealth/SubmitMH/<?php echo $f['ID_MH']?>"><button class="btn btn-info">Submit</button></a>
                  <?php }  ?>
                  <?php if ($f['Status'] == 'Waiting Approval' || $f['Status'] == 'Approved') { ?>
                    <button class="btn btn-success" data-id="<?php echo $f['ID_MH']?>"  data-toggle="modal" data-target="#ModalInfo">Detail</button>
                  <?php }  ?>
                  <?php if ($f['Status'] == 'Approved') { ?>
                    <a href="<?php echo base_url(); ?>MilitaryHealth/DownloadMonitoring/<?php echo $f['ID_MH']?>"><button class="btn btn-primary">Download</button></a>
                  <?php }  ?>
                  <?php if (($this->session->userdata['ID_Atasan'] == null || $this->session->userdata['Role'] == 'Admin') && $f['Status'] == 'Waiting Approval') { ?>
                    <a href="<?php echo base_url(); ?>MilitaryHealth/ApprovalMH/<?php echo $f['ID_MH']?>"><button class="btn btn-info">Approve</button></a>
                  <?php } ?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

        <div id="chartdiv"></div>   
      </div>


    </div>

  </div>
</section><!-- End About Us Section -->
</main>

<!-- Modal -->
<div class="modal fade" id="ModalInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detail Military Health</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <p>Nama : </p>
          </div>
          <div class="col-md-9 col-sm-9">
            <p id="Nama"></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <p>Start Date : </p>
          </div>
          <div class="col-md-9 col-sm-9">
            <p id="Start"></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <p>End Date : </p>
          </div>
          <div class="col-md-9 col-sm-9">
            <p id="End"></p>
          </div>
        </div>
        <br>
        <h6>Samapta A </h6>
        <hr>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <p>Running : </p>
          </div>
          <div class="col-md-9 col-sm-9">
            <p id="Lari"></p>
          </div>
        </div>
        <br>
        <h6>Samapta B </h6>
        <hr>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <p>Sit Up : </p>
          </div>
          <div class="col-md-9 col-sm-9">
            <p id="Sit_up"></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <p>Push Up : </p>
          </div>
          <div class="col-md-9 col-sm-9">
            <p id="Push_up"></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <p>Pull Up : </p>
          </div>
          <div class="col-md-9 col-sm-9">
            <p id="Pull_up"></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <p>Squat : </p>
          </div>
          <div class="col-md-9 col-sm-9">
            <p id="Squat"></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <p>Ver Jump : </p>
          </div>
          <div class="col-md-9 col-sm-9">
            <p id="verjump"></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <p>Step : </p>
          </div>
          <div class="col-md-9 col-sm-9">
            <p id="Step"></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <p>Sit Reach : </p>
          </div>
          <div class="col-md-9 col-sm-9">
            <p id="sit_reach"></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable();

    $('.dataTables_filter input').addClass('form-control');
    $('.dataTables_length select').addClass('form-control');
    $('.dataTables_filter input').attr('placeholder','Search');
  });
</script>
<script type="text/javascript">
  function delFA(ID){
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this file",
      icon: "warning",
      closeOnClickOutside: false,
      buttons: {
        confirm: {
          text: "OK",
          value: true,
          visible: true,
          className: "btn btn-lg btn-danger",
          closeModal: true
        },
        cancel: {
          text: "Cancel",
          value: null,
          visible: true,
          className: "btn btn-lg btn-default",
          closeModal: true
        },
      },
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: '<?php echo base_url(); ?>Master/delete_firstaid/' + ID,
          success: function(result){
            swal("Data have been deleted")
            .then((value) => {
              location.reload();
            });
          }
        });
      }
    });

    console.log(ID);
  }
</script>
<script type="text/javascript">
 $('#ModalInfo').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  $.ajax({
    url : "<?php echo base_url('MilitaryHealth/detailmh/')?>" + id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      console.log(data);
      $('#Nama').text(data.Nama);
      $('#Start').text(data.Start_Date);
      $('#End').text(data.End_Date);
      $('#Lari').text(data.Lari + ' - '+ data.remark_lari);
      $('#Sit_up').text(data.Sit_up + ' - '+ data.remark_situp);
      $('#Push_up').text(data.Push_up + ' - '+ data.remark_pushup);
      $('#Pull_up').text(data.Pull_up + ' - '+ data.remark_pushup);
      $('#Squat').text(data.Squat + ' - '+ data.remark_squat);
      $('#verjump').text(data.Vertical_jump + ' - '+ data.remark_verjump);
      $('#Step').text(data.Step + ' - '+ data.remark_step);
      $('#sit_reach').text(data.Sit_Reach + ' - '+ data.remark_sitreach);
      // $('#tanggal').text(data.Date);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      alert('Error get data from ajax');
    }
  });
});
</script>
<script type="text/javascript">
  /**
 * ---------------------------------------
 * This demo was created using amCharts 4.
 * 
 * For more information visit:
 * https://www.amcharts.com/
 * 
 * Documentation is available at:
 * https://www.amcharts.com/docs/v4/
 * ---------------------------------------
 */

// Themes begin
am4core.useTheme(am4themes_animated);
am4core.useTheme(am4themes_dataviz);

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);


// Add data
chart.data = [{
  "year": "2016",
  "europe": 2.5,
  "namerica": 2.5,
  "asia": 2.1,
  "lamerica": 0.3,
  "meast": 0.2,
  "africa": 0.1
}, {
  "year": "2017",
  "europe": 2.6,
  "namerica": 2.7,
  "asia": 2.2,
  "lamerica": 0.3,
  "meast": 0.3,
  "africa": 0.1
}, {
  "year": "2018",
  "europe": 2.8,
  "namerica": 2.9,
  "asia": 2.4,
  "lamerica": 0.3,
  "meast": 0.3,
  "africa": 0.1
}];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "year";
categoryAxis.renderer.grid.template.location = 0;


var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.inside = true;
valueAxis.renderer.labels.template.disabled = true;
valueAxis.min = 0;

// Create series
function createSeries(field, name) {

  // Set up series
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.name = name;
  series.dataFields.valueY = field;
  series.dataFields.categoryX = "year";
  series.sequencedInterpolation = true;

  // Make it stacked
  series.stacked = true;

  // Configure columns
  series.columns.template.width = am4core.percent(60);
  series.columns.template.tooltipText = "[bold]{name}[/]\n[font-size:14px]{categoryX}: {valueY}";

  // Add label
  var labelBullet = series.bullets.push(new am4charts.LabelBullet());
  labelBullet.label.text = "{valueY}";
  labelBullet.label.hideOversized = true;
  labelBullet.label.fill = am4core.color("#fff");
  labelBullet.locationY = 0.5;

  return series;
}

createSeries("europe", "Europe");
createSeries("namerica", "North America");
createSeries("asia", "Asia-Pacific");
createSeries("lamerica", "Latin America");
createSeries("meast", "Middle-East");
createSeries("africa", "Africa");

// Legend
chart.legend = new am4charts.Legend();

// Modify PDF export
chart.exporting.menu = new am4core.ExportMenu();

// Do not add URL
chart.exporting.getFormatOptions("pdf").addURL = false;


chart.exporting.adapter.add("pdfmakeDocument", function(pdf, target) {

  // Add title to the beginning
  pdf.doc.content.unshift({
    text: "Regional revenue comparison",
    margin: [0, 30],
    style: {
      fontSize: 25,
      bold: true,
    }
  });

  // // Add logo
  // pdf.doc.content.unshift({
  //   image: '<?php echo base_url(); ?>/assets/img/logo_mabestni.png',
  //   fit: [119, 54]
  // });

  // Add a two-column intro
  pdf.doc.content.push({
    alignment: 'justify',
    columns: [
      {
        text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Malit profecta versatur nomine ocurreret multavit, officiis viveremus aeternum superstitio suspicor alia nostram, quando nostros congressus susceperant concederetur leguntur iam, vigiliae democritea tantopere causae, atilii plerumque ipsas potitur pertineant multis rem quaeri pro, legendum didicisse credere ex maluisset per videtis. Cur discordans praetereat aliae ruinae dirigentur orestem eodem, praetermittenda divinum. Collegisti, deteriora malint loquuntur officii cotidie finitas referri doleamus ambigua acute. Adhaesiones ratione beate arbitraretur detractis perdiscere, constituant hostis polyaeno. Diu concederetur.'
      },
      {
        text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Malit profecta versatur nomine ocurreret multavit, officiis viveremus aeternum superstitio suspicor alia nostram, quando nostros congressus susceperant concederetur leguntur iam, vigiliae democritea tantopere causae, atilii plerumque ipsas potitur pertineant multis rem quaeri pro, legendum didicisse credere ex maluisset per videtis. Cur discordans praetereat aliae ruinae dirigentur orestem eodem, praetermittenda divinum. Collegisti, deteriora malint loquuntur officii cotidie finitas referri doleamus ambigua acute. Adhaesiones ratione beate arbitraretur detractis perdiscere, constituant hostis polyaeno. Diu concederetur.'
      }
    ],
    columnGap: 20,
    margin: [0, 30]
  });

  return pdf;
});
</script>