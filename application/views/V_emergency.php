
<main id="main">
 <section id="about" class="about">
  <div class="container">

    <div class="section-title">
      <h3>Emergency Reports</h3>
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
       <?php if($this->session->userdata['Role'] != 'Dokter'){?>
        <a href="<?php echo base_url(); ?>Emergency/EmergencyCallUser">
          <button type="button" class="btn btn-add"> <i class="mdi mdi-plus"></i>Add Emergency Reports
          </button>
        </a>
      <?php } ?>
      <button type="button" class="btn btn-add" data-toggle="modal" data-target="#ModalInfo"> <i class="mdi mdi-plus"></i>Export</button>
    </div>
  </div>
  <div class="row ">
    <div class="table-responsive m-t-40">
      <table id="myTable" class="table table-bordered table-striped">
        <thead>
          <tr>
            <td></td>
            <th style="text-align: center;">Date</th>
            <th style="text-align: center;">Reporter</th>
            <th style="text-align: center; width: 250px;">Summary</th>
            <th style="text-align: center;">Solved By</th>
            <th style="text-align: center;">Status</th>
            <th style="text-align: center;" class="notexport">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($ec as $f){ ?>
            <tr>
              <td></td>
              <td><?php echo date("d-m-Y", strtotime($f['Date']));?></td>
              <td><?php echo $f['creator']?></td>
              <td style="width: 250px;"><?php echo $f['Summary']?></td>
              <td><?php echo $f['solver']?></td>
              <td><?php echo $f['Status']?></td>
              <td style="text-align: center;" >
                <a href="<?php echo base_url(); ?>Emergency/EmergencyDetail/<?php echo $f['ID_ECL']?>"><button class="btn btn-success"><i class="fa fa-info" aria-hidden="true"></i></button></a>
                <?php if($f['Status'] == 'Submitted' && $this->session->userdata['Role'] != 'Dokter' && $this->session->userdata['ID_User'] == $f['ID_User']){?>
                  <a href="<?php echo base_url(); ?>Emergency/EmergencyDetailEdit/<?php echo $f['ID_ECL']?>"><button class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                <?php }?>
                <?php if( $this->session->userdata['Role'] == 'Dokter' ){?>
                  <?php if($f['Status'] == 'Submitted'){?>
                    <a href="<?php echo base_url(); ?>Emergency/EmergencyCallAccept/<?php echo $f['ID_ECL']?>"><button class="btn btn-info"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Accept</button></a>
                  <?php }else if($f['Status'] == 'In Progress'){?>
                   <a href="<?php echo base_url(); ?>Emergency/EmergencyCallSolve/<?php echo $f['ID_ECL']?>"><button class="btn btn-secondary"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Solve</button></a>
                 <?php }?>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Export Emergency Reports</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-4 col-sm-4" style="align-items: center;">
           <a href="<?php echo base_url(); ?>Emergency/ExportSubmitted">
            <button type="button" class="btn btn-add"> <i class="mdi mdi-plus"></i>Submitted</button>
          </a>
        </div>
        <div class="col-md-4 col-sm-4" style="align-items: center;">
         <a href="<?php echo base_url(); ?>Emergency/ExportProgress">
          <button type="button" class="btn btn-add"> <i class="mdi mdi-plus"></i>In Progress</button>
        </a>
      </div>
      <div class="col-md-4 col-sm-4" style="align-items: center;">
       <a href="<?php echo base_url(); ?>Emergency/ExportComplete">
        <button type="button" class="btn btn-add"> <i class="mdi mdi-plus"></i>Complete</button>
      </a>
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