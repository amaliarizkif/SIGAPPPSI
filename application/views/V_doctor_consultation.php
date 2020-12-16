
<main id="main">
 <section id="about" class="about">
  <div class="container">

    <div class="section-title">
      <h3>Doctor Consultation</h3>
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
        <?php if ($this->session->userdata['Role'] == 'User'){?>
          <a href="<?php echo base_url(); ?>Emergency/AddDC">
            <button type="button" class="btn btn-add"> <i class="mdi mdi-plus"></i>Add Doctor Consultation
            </button>
          </a>
        <?php } ?>
        <a href="<?php echo base_url(); ?>Emergency/ExportDC">
          <button type="button" class="btn btn-add"> <i class="mdi mdi-plus"></i>Export
          </button>
        </a>
      </div>

    </div>
    <div class="row ">
      <div class="table-responsive m-t-40">
        <table id="myTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th></th>
              <th style="text-align: center;">Date</th>
              <th style="text-align: center;">Nama</th>
              <th style="text-align: center;">Keluhan</th>
              <th style="text-align: center;">Dokter</th>
              <th style="text-align: center;">Status</th>
              <th style="text-align: center;" class="notexport">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($dc as $f){ ?>
              <tr>
                <td></td>
                <td><?php echo date("d-m-Y", strtotime($f['Date']));?></td>
                <td><?php echo $f['pasien']?></td>
                <td><?php echo $f['Keluhan']?></td>
                <td><?php echo $f['dokter']?></td>
                <td><?php echo $f['Status']?></td>
                <td style="text-align: center;" >
                  <?php if($f['Status'] == 'Done' && $this->session->userdata['Nama'] == $f['pasien']){?>
                    <button class="btn btn-primary" data-id="<?php echo $f['ID_DC']?>"  data-toggle="modal" data-target="#ModalInfo"><i class="fa fa-info" aria-hidden="true"></i></button>
                    <button class="btn btn-info" data-id="<?php echo $f['ID_DC']?>" data-toggle="modal" data-target="#ModalReceipt"><i class="fa fa-medkit" aria-hidden="true"></i></button>
                  <?php }else { ?>
                    <button class="btn btn-danger" onclick="delDC(<?php echo $f['ID_DC']?>)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                  <?php }?>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Doctor Consultation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <p>User : </p>
          </div>
          <div class="col-md-9 col-sm-9">
            <p id="pasien"></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <p>Tanggal : </p>
          </div>
          <div class="col-md-9 col-sm-9">
            <p id="tanggal"></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <p>Keluhan : </p>
          </div>
          <div class="col-md-9 col-sm-9">
            <p id="keluhan"></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <p>Dokter : </p>
          </div>
          <div class="col-md-9 col-sm-9">
            <p id="dokter"></p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-3">
            <p>Summary : </p>
          </div>
          <div class="col-md-9 col-sm-9">
            <p id="summary"></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalReceipt" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Resep</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="bodymod"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
 $('#ModalInfo').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  $.ajax({
    url : "<?php echo base_url('Emergency/detaildocconsul/')?>" + id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      console.log(data);
      $('#pasien').text(data.pasien);
      $('#dokter').text(data.dokter);
      $('#keluhan').text(data.Keluhan);
      $('#summary').text(data.Summary);
      $('#tanggal').text(data.Date);
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      alert('Error get data from ajax');
    }
  });
});
</script>

<script type="text/javascript">
 $('#ModalReceipt').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id')
  $.ajax({
    url : "<?php echo base_url('Emergency/detaildocconsul/')?>" + id,
    type: "GET",
    dataType: "JSON",
    success: function(data)

    {
      $('#bodymod').empty();
      $('#bodymod').append('<object id="imageview" style="position: relative; width: 100%; height:500px;" type="application/pdf" data="<?php echo base_url();?>assets/files/receipt/'+ data.Receipt+'?#zoom=50&scrollbar=0&toolbar=0&navpanes=0"><p>Insert your error message here, if the PDF cannot be displayed.</p></object>');
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      alert('Error get data from ajax');
    }
  });
  
});
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#myTable').DataTable();

    $('.dataTables_filter input').addClass('form-control');
    $('.dataTables_length select').addClass('form-control');
    $('.dataTables_filter input').attr('placeholder','Search');
  });
</script>
<script type="text/javascript">
  function delDC(ID){
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
          url: '<?php echo base_url(); ?>Emergency/delete_dc/' + ID,
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