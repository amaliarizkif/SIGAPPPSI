
<main id="main">
 <section id="about" class="about">
  <div class="container">

    <div class="section-title">
      <h3>History Emergency Call</h3>
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

      <div class="col-lg-12 order-1 order-lg-2">
        <a href="<?php echo base_url(); ?>Emergency/EmergencyCallUser">
          <button type="button" class="btn btn-add"> <i class="mdi mdi-plus"></i>Emergency Call
          </button>
        </a>
      </div>
    </div>
    <div class="row ">
      <div class="table-responsive m-t-40">
        <table id="myTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="text-align: center;">Reporter</th>
              <th style="text-align: center;">Date</th>
              <th style="text-align: center;">Summary</th>
              <th style="text-align: center;">Solved By</th>
              <th style="text-align: center;">Status</th>
              <th style="text-align: center;" class="notexport">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($ec as $f){ ?>
              <tr>
                <td><?php echo $f['creator']?></td>
                <td><?php echo date("d-m-Y", strtotime($f['Date']));?></td>
                <td><?php echo $f['Summary']?></td>
                <td><?php echo $f['solver']?></td>
                <td><?php echo $f['Status']?></td>
                <td style="text-align: center;" >
                  <a href="<?php echo base_url(); ?>Emergency/EmergencyDetail/<?php echo $f['ID_ECL']?>"><button class="btn btn-success"><i class="fa fa-info" aria-hidden="true"></i></button></a>
                  <?php if( $f['ID_User'] !=  $this->session->userdata['ID_User']){?>
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