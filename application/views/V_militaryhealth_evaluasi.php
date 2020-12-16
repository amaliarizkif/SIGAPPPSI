
<main id="main">
 <section id="about" class="about">
  <div class="container">

    <div class="section-title">
      <h3>Evaluasi Military Health</h3>
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
      <?php if ($this->session->userdata['Role'] == 'Admin' || $this->session->userdata['ID_Atasan'] == null) { ?>
        <a href="<?php echo base_url(); ?>MilitaryHealth/ExportAll">
          <button type="button" class="btn btn-add"> <i class="mdi mdi-plus"></i>Export All
          </button>
        </a>
      <?php  } ?>
    </div>
    <div class="row ">
      <div class="table-responsive m-t-40">
        <table id="myTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="text-align: center;">Bulan</th>
              <th style="text-align: center;">Judul</th>
              <?php if ($this->session->userdata['Role'] == 'Admin' || $this->session->userdata['ID_Atasan'] == null) { ?>
               <th style="text-align: center;">Nama</th>
             <?php  } ?>
             <th style="text-align: center;" class="notexport">Action</th>
           </tr>
         </thead>
         <tbody>
          <?php foreach ($mh as $f){ ?>
            <tr>
              <td><?php echo $f['bulan'] ?></td>
              <td><?php echo 'Hasil Evaluasi Military Health Periode '. $f['bulan'] ?></td>
              <?php if ($this->session->userdata['Role'] == 'Admin' || $this->session->userdata['ID_Atasan'] == null) { ?>
                <td><?php echo $f['Nama'] ?></td>
              <?php  } ?>
              <td style="text-align: center;" >
                <a href="<?php echo base_url(); ?>MilitaryHealth/DetailEvaluasi/<?php echo $f['ID_User']?>/<?php echo $f['bulan_angka']?>"><button class="btn btn-info">Detail</button></a>
                <a href="<?php echo base_url(); ?>MilitaryHealth/ReportEvaluasi/<?php echo $f['ID_User']?>/<?php echo $f['bulan_angka']?>"><button class="btn btn-secondary">Download</button></a>
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