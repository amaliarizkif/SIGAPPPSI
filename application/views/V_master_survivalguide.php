
<main id="main">
 <section id="about" class="about">
  <div class="container">

    <div class="section-title">
      <h3>Survival Guide</h3>
    </div>
    <div class="row mb-4">

      <div class="col-lg-12 order-1 order-lg-2">
        <a href="<?php echo base_url(); ?>Master/add_firstaid">
          <button type="button" class="btn btn-add"> <i class="mdi mdi-plus"></i>Add Survival Guide
          </button>
        </a>
      </div>
    </div>
    <div class="row ">
      <div class="table-responsive m-t-40">
        <table id="myTable" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th style="text-align: center;"></th>
              <th style="text-align: center;">Title</th>
              <th style="text-align: center;">Description</th>
              <th style="text-align: center;">Created Date</th>
              <th style="text-align: center;" class="notexport">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sg as $s){ ?>
              <tr>
                <td>1</td>
                <td><?php echo $s['Title']?></td>
                <td><?php echo $s['Description']?></td>
                <td><?php echo date("d-m-Y", strtotime($s['Created_Date']));?></td>
                <td></td>
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
  });
</script>