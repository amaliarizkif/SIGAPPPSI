<style type="text/css">
  .about {
    min-height: 75vh;
  }
</style>
<main id="main">
 <section id="about" class="about">
  <div class="container">
    <div class="section-title">
      <h3>Add Profile</h3>
    </div>
    <div class="row">
      <div class="col-lg-9 order-1 order-lg-2">
        <form action="<?php echo base_url()?>Master/added_profile" method="POST"  enctype="multipart/form-data">
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Nama</p>
            </div>
            <div class="col-md-9 col-sm-9">
              <input type="text" class="form-control" maxlength="50" name="Nama" pattern="^[A-Za-z0-9](?!.*?[^\nA-Za-z0-9\s)(-.]).*?[A-Za-z0-9\s)(]*$" placeholder="Nama" required>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Tempat Lahir</p>
            </div>
            <div class="col-md-9 col-sm-9">
              <input type="text" class="form-control" maxlength="50" name="Tempat_Lahir" pattern="^[A-Za-z0-9](?!.*?[^\nA-Za-z0-9\s)(-.]).*?[A-Za-z0-9\s)(]*$" placeholder="Tempat Lahir" required>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Tanggal Lahir</p>
            </div>
            <div class="col-md-9 col-sm-9">
              <input type="date" class="form-control" maxlength="50" name="Tanggal_Lahir" required>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Pangkat/Korps</p>
            </div>
            <div class="col-md-9 col-sm-9">
              <input type="text" class="form-control" maxlength="50" name="Pangkat" pattern="^[A-Za-z0-9](?!.*?[^\nA-Za-z0-9\s)(-.]).*?[A-Za-z0-9\s)(]*$" placeholder="Pangkat/Korps" required>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>NRP/NBI</p>
            </div>
            <div class="col-md-9 col-sm-9">
              <input type="text" class="form-control" maxlength="50" name="NRP" pattern="^[A-Za-z0-9](?!.*?[^\nA-Za-z0-9\s)(-.]).*?[A-Za-z0-9\s)(]*$" placeholder="NRP/NBI" required>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Jabatan</p>
            </div>
            <div class="col-md-9 col-sm-9">
              <input type="text" class="form-control" maxlength="50" name="Jabatan" pattern="^[A-Za-z0-9](?!.*?[^\nA-Za-z0-9\s)(-.]).*?[A-Za-z0-9\s)(]*$" placeholder="Jabatan" required>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Kesatuan</p>
            </div>
            <div class="col-md-9 col-sm-9">
              <input type="text" class="form-control" maxlength="50" name="Kesatuan" pattern="^[A-Za-z0-9](?!.*?[^\nA-Za-z0-9\s)(-.]).*?[A-Za-z0-9\s)(]*$" placeholder="Kesatuan" required>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Golongan Darah</p>
            </div>
            <div class="col-md-9 col-sm-9">
              <select class="form-control" name="Gol_darah" required>
                <option value="" readonly>Golongan Darah</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="O">O</option>
                <option value="AB">AB</option>
              </select>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Email</p>
            </div>
            <div class="col-md-9 col-sm-9">
              <input type="email" class="form-control" maxlength="50" name="Email" placeholder="Email" required>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Password</p>
            </div>
            <div class="col-md-9 col-sm-9">
              <input type="password" class="form-control" maxlength="50" name="Password" pattern="^[A-Za-z0-9](?!.*?[^\nA-Za-z0-9\s)(-.]).*?[A-Za-z0-9\s)(]*$" placeholder="Password" required>
            </div>
          </div>
          <button type="submit" class="btn btn-add" style="float: right;"> <i class="mdi mdi-plus"></i>Submit
          </button>
        </form>
      </div>
    </div>

    

  </div>
</section><!-- End About Us Section -->
</main>