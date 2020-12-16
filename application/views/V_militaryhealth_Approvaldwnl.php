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
      <h3>Download Approval Military Health</h3>
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
   
    </div>
    <div class="row ">
      <div id="chartdiv"></div> 
    </div>

  </div>
</section><!-- End About Us Section -->
</main>




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
chart.data = [
{
  "category": "Lari",
  "total": '<?php echo $mh->Lari; ?>',
},
{
  "category": "Sit Up",
  "total": '<?php echo $mh->Sit_up; ?>',
},{
  "category": "Push Up",
  "total": '<?php echo $mh->Push_up; ?>',
},
{
  "category": "Pull Up",
  "total": '<?php echo $mh->Pull_up; ?>',
},{
  "category": "Squat",
  "total": '<?php echo $mh->Squat; ?>',
},
{
  "category": "Vertical Jump",
  "total": '<?php echo $mh->Vertical_jump; ?>',
},
{
  "category": "Step",
  "total": '<?php echo $mh->Step; ?>',
},
{
  "category": "Sit & Reach",
  "total": '<?php echo $mh->Sit_Reach; ?>',
}];

// Create axes
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "category";
categoryAxis.renderer.grid.template.location = 0;


var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.inside = true;
valueAxis.renderer.labels.template.disabled = true;
valueAxis.min = 0;
// valueAxis.renderer.opposite = true;

// var  valueAxis = chart.xAxes.push(new am4charts.ValueAxis()); 



// Create series
function createSeries(field, name) {

  // Set up series
  var series = chart.series.push(new am4charts.ColumnSeries());
  series.name = name;
  series.dataFields.valueY = field;
  series.dataFields.categoryX = "category";
  series.sequencedInterpolation = true;

  // Make it stacked
  series.stacked = true;

  // Configure columns
  series.columns.template.width = am4core.percent(60);
  series.columns.template.tooltipText = "[bold]{category}[/]\n[font-size:14px]{categoryX}: {valueY}";

  // Add label
  var labelBullet = series.bullets.push(new am4charts.LabelBullet());
  labelBullet.label.text = "{valueY}";
  labelBullet.label.hideOversized = true;
  labelBullet.label.fill = am4core.color("#fff");
  labelBullet.locationY = 0.5;

  return series;
}

createSeries("total", "Jumlah");
// createSeries("namerica", "North America");
// createSeries("asia", "Asia-Pacific");
// createSeries("lamerica", "Latin America");
// createSeries("meast", "Middle-East");
// createSeries("africa", "Africa");

// Legend
chart.legend = new am4charts.Legend();

// Modify PDF export
chart.exporting.menu = new am4core.ExportMenu();

// Do not add URL
chart.exporting.getFormatOptions("pdf").addURL = false;


chart.exporting.adapter.add("pdfmakeDocument", function(pdf, target) {

  // Add title to the beginning
  pdf.doc.content.unshift({
    text: "Approval Military Health",
    margin: [30, 30],
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

  //Add a two-column intro
  pdf.doc.content.push({
    alignment: 'justify',
    columns: [
      {
        text: 'Approval Military Health\n Nama : <?php echo $mh->Nama; ?>\n\n'+
        'Lari : <?php echo $mh->Lari; ?>\n'+
        'Sit Up : <?php echo $mh->Sit_up; ?>\n'+
        'Push Up : <?php echo $mh->Push_up; ?>\n'+
        'Pull Up : <?php echo $mh->Pull_up; ?>\n'+
        'Squat : <?php echo $mh->Squat; ?>\n'+
        'Vertical Jump : <?php echo $mh->Vertical_jump; ?>\n'+
        'Step : <?php echo $mh->Step; ?>\n'+
        'Sit & Reach : <?php echo $mh->Sit_Reach; ?>\n'
      }
      // ,
      // {
      //   text: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Malit profecta versatur nomine ocurreret multavit, officiis viveremus aeternum superstitio suspicor alia nostram, quando nostros congressus susceperant concederetur leguntur iam, vigiliae democritea tantopere causae, atilii plerumque ipsas potitur pertineant multis rem quaeri pro, legendum didicisse credere ex maluisset per videtis. Cur discordans praetereat aliae ruinae dirigentur orestem eodem, praetermittenda divinum. Collegisti, deteriora malint loquuntur officii cotidie finitas referri doleamus ambigua acute. Adhaesiones ratione beate arbitraretur detractis perdiscere, constituant hostis polyaeno. Diu concederetur.'
      // }
    ],
    columnGap: 20,
    margin: [0, 30]
  });

  return pdf;
});
</script>