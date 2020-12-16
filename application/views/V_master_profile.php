
<main id="main">
 <section id="about" class="about">
  <div class="container">

    <div class="section-title">
      <h3>Profile</h3>
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
        <a href="<?php echo base_url(); ?>Master/add_profile">
          <button type="button" class="btn btn-add"> <i class="mdi mdi-plus"></i>Add Profile
          </button>
        </a>
        <a href="<?php echo base_url(); ?>Master/ExportProfile">
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
              <th style="text-align: center;">Name</th>
              <th style="text-align: center;">TTL</th>
              <th style="text-align: center;">Pangkat/Korps</th>
              <th style="text-align: center;">NRP/NBI</th>
              <th style="text-align: center;">Jabatan</th>
              <th style="text-align: center;">Email</th>
              <!-- <th style="text-align: center;">Gol Darah</th> -->
              <th style="text-align: center;" class="notexport">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pf as $f){ ?>
              <tr>
                <td><?php echo $f['Nama']?></td>
                <td><?php echo $f['Tempat_Lahir']?>, <?php echo date("d-m-Y", strtotime($f['Tanggal_Lahir']));?></td>
                <td><?php echo $f['Pangkat/Korps']?>
                <td><?php echo $f['NRP/NBI']?>
                <td><?php echo $f['Jabatan']?>
                <td><?php echo $f['Email']?>
                <!-- <td><?php echo $f['Gol_Darah']?> -->
                <td style="text-align: center;" >
                  <a href="<?php echo base_url(); ?>Master/detail_profile/<?php echo $f['ID_User']?>"><button class="btn btn-success"><i class="fa fa-info" aria-hidden="true"></i></button></a>
                  <a href="<?php echo base_url(); ?>Master/edit_profile/<?php echo $f['ID_User']?>"><button class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>
                  <button class="btn btn-danger" onclick="delUser(<?php echo $f['ID_User']?>)"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
  function delUser(ID){
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
          url: '<?php echo base_url(); ?>Master/delete_user/' + ID,
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