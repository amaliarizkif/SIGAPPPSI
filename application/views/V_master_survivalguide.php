
<main id="main">
 <section id="about" class="about">
  <div class="container">

    <div class="section-title">
      <h3>Survival Guide Military</h3>
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
        <a href="<?php echo base_url(); ?>Master/add_survivalguide">
          <button type="button" class="btn btn-add"> <i class="mdi mdi-plus"></i>Add Survival Guide
          </button>
        </a>
        <a href="<?php echo base_url(); ?>Master/ExportSurvivalGuide">
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
              <th style="text-align: center;">Title</th>
              <th style="text-align: center;" style="width: 400px;">Description</th>
              <th style="text-align: center;">Created Date</th>
              <th style="text-align: center;" class="notexport">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sg as $f){ ?>
              <tr>
                <td><?php echo $f['Title']?></td>
                <td><?php echo substr($f['Description'], 0, 80)?> ...</td>
                <td><?php echo date("d-m-Y", strtotime($f['Created_Date']));?></td>
                <td style="text-align: center;" >
                  <a href="<?php echo base_url(); ?>Master/edit_survivalguide/<?php echo $f['ID_SGM']?>"><button class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                  <button class="btn btn-danger" onclick="delSG(<?php echo $f['ID_SGM']?>)"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
  function delSG(ID){
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
          url: '<?php echo base_url(); ?>Master/delete_survivalguide/' + ID,
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