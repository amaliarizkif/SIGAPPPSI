<style type="text/css">
  .about {
    min-height: 75vh;
  }
</style>
<main id="main">
 <section id="about" class="about">
  <div class="container">
    <div class="section-title">
      <h3>Edit First Aid Guide</h3>
    </div>
    <div class="row">
      <div class="col-lg-9 order-1 order-lg-2">
        <form action="<?php echo base_url()?>Master/edited_firstaid/<?php echo $this->uri->segment(3); ?>" method="POST"  enctype="multipart/form-data">
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Title</p>
            </div>
            <div class="col-md-9 col-sm-9">
              <input type="text" class="form-control" maxlength="50" name="Title" pattern="^[A-Za-z0-9](?!.*?[^\nA-Za-z0-9\s)(-.]).*?[A-Za-z0-9\s)(]*$" placeholder="Enter Title" required>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>Description</p>
            </div>
            <div class="col-md-9 col-sm-9">
              <textarea class="form-control" name="Description" required></textarea>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <p>File</p>
            </div>
            <div class="col-md-9 col-sm-9">
              <input type="file"  accept=".pdf,.docx" class="form-control" maxlength="50" name="File" required>
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