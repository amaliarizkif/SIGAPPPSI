<style type="text/css">
  .about {
    min-height: 75vh;
  }
</style>
<main id="main">
 <section id="about" class="about">
  <div class="container">
    <div class="section-title">
      <h3>Military Health</h3>
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
    <div class="row">
      <div class="col-lg-12 order-1 order-lg-2">
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <h6>Nama : </h6>
          </div>
          <div class="col-md-9 col-sm-9">
            <p><?php echo  $this->session->userdata['Nama']?></p>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <h6>NRP/NBI : </h6>
          </div>
          <div class="col-md-9 col-sm-9">
            <?php echo $p->nrp?>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <h6>Jabatan : </h6>
          </div>
          <div class="col-md-9 col-sm-9">
            <?php echo $p->Jabatan?>
          </div>
        </div>
        <?php if ($this->session->userdata['Role'] == 'Admin' || $this->session->userdata['ID_Atasan'] == null) { ?>
          <div class="row mt-5 mb-4">
            <div class="col-md-2"></div>
            <div class="col-md-2">
              <?php if ($mh->persenlari == null && $mh->End_Date == null) { ?>
                <a href="<?php echo base_url(); ?>MilitaryHealth/UpdateMonitoring">
                  <button type="button" class="btn btn-add" style="height: 130px; width: 130px; border-radius: 100px"><i class="fa fa-pencil" style="font-size: 50px;" aria-hidden="true"></i><br>CREATE
                  </button>
                </a>
              <?php }else{  ?>
                <button type="button" class="btn btn-add" style="height: 130px; width: 130px; border-radius: 100px" disabled=""><i class="fa fa-pencil" style="font-size: 50px;" aria-hidden="true"></i><br>CREATE
                </button>
              <?php }  ?>
            </div>
            <div class="col-md-2">
              <a href="<?php echo base_url(); ?>MilitaryHealth/HistoryMilitaryHealth">
                <button type="button" class="btn btn-add" style="height: 130px; width: 130px; border-radius: 100px"><i class="fa fa-history" style="font-size: 50px;" aria-hidden="true"></i></i>HISTORY
                </button>
              </a>
            </div>
            <div class="col-md-2">
              <a href="<?php echo base_url(); ?>MilitaryHealth/ApprovalMilitaryHealth">
                <button type="button" class="btn btn-add" style="height: 130px; width: 130px; border-radius: 100px"><i class="fa fa-check" style="font-size: 50px;" aria-hidden="true"></i></i>APPROVAL
                </button>
              </a>
            </div>
            <div class="col-md-2">
              <a href="<?php echo base_url(); ?>MilitaryHealth/MilitaryEvaluation">
                <button type="button" class="btn btn-add" style="height: 130px; width: 130px; border-radius: 100px"><i class="fa fa-percent" style="font-size: 50px;" aria-hidden="true"></i></i>EVALUATION
                </button>
              </a>
            </div>
            <div class="col-md-2"></div>
          </div>
        <?php } else { ?>
          <div class="row mt-5 mb-4">
            <div class="col-md-3"></div>
            <div class="col-md-2">
              <?php if ($mh->persenlari == null && $mh->End_Date == null) { ?>
                <a href="<?php echo base_url(); ?>MilitaryHealth/UpdateMonitoring">
                  <button type="button" class="btn btn-add" style="height: 130px; width: 130px; border-radius: 100px"><i class="fa fa-pencil" style="font-size: 50px;" aria-hidden="true"></i><br>CREATE
                  </button>
                </a>
              <?php }else{  ?>
                <button type="button" class="btn btn-add" style="height: 130px; width: 130px; border-radius: 100px" disabled=""><i class="fa fa-pencil" style="font-size: 50px;" aria-hidden="true"></i><br>CREATE
                </button>
              <?php }  ?>
            </div>
            <div class="col-md-2">
              <a href="<?php echo base_url(); ?>MilitaryHealth/HistoryMilitaryHealth">
                <button type="button" class="btn btn-add" style="height: 130px; width: 130px; border-radius: 100px"><i class="fa fa-history" style="font-size: 50px;" aria-hidden="true"></i></i>HISTORY
                </button>
              </a>
            </div>
            <div class="col-md-2">
              <a href="<?php echo base_url(); ?>MilitaryHealth/MilitaryEvaluation">
                <button type="button" class="btn btn-add" style="height: 130px; width: 130px; border-radius: 100px"><i class="fa fa-percent" style="font-size: 50px;" aria-hidden="true"></i></i>EVALUASI
                </button>
              </a>
            </div>
            <div class="col-md-3"></div>
          </div>
        <?php } ?>
        <br>
        <?php if($this->session->userdata['Role'] != 'Admin'){?>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <h5>Progress ( <?php echo date('d-M-Y');?>)</h5>
            </div>
            <div class="col-md-9 col-sm-9">
              <!-- <?php echo $pf[0]['Tanggal_Lahir']?> -->
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6">
              <div class="row mt-3 mb-3">
                <div class="col-md-3 col-sm-3">
                  <h6>Running</h6>
                </div>
                <div class="col-md-9 col-sm-9">
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $mh->persenlari;?>%" aria-valuenow="<?php echo $mh->persenlari;?>" aria-valuemin="0" aria-valuemax="100"><?php echo $mh->persenlari;?>%</div>
                  </div>
                </div>
              </div>
              <div class="row mt-3 mb-3">
                <div class="col-md-3 col-sm-3">
                  <h6>Sit Up</h6>
                </div>
                <div class="col-md-9 col-sm-9">
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $mh->persensitup;?>%" aria-valuenow="<?php echo $mh->persensitup;?>" aria-valuemin="0" aria-valuemax="100"><?php echo $mh->persensitup;?>%</div>
                  </div>
                </div>
              </div>
              <div class="row mt-3 mb-3">
                <div class="col-md-3 col-sm-3">
                  <h6>Push Up</h6>
                </div>
                <div class="col-md-9 col-sm-9">
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $mh->persenpushup;?>%" aria-valuenow="<?php echo $mh->persenpushup;?>" aria-valuemin="0" aria-valuemax="100"><?php echo $mh->persenpushup;?>%</div>
                  </div>
                </div>
              </div>
              <div class="row mt-3 mb-3">
                <div class="col-md-3 col-sm-3">
                  <h6>Pull Up</h6>
                </div>
                <div class="col-md-9 col-sm-9">
                 <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $mh->persenpullup;?>%" aria-valuenow="<?php echo $mh->persenpullup;?>" aria-valuemin="0" aria-valuemax="100"><?php echo $mh->persenpullup;?>%</div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row mt-3 mb-3">
              <div class="col-md-3 col-sm-3">
                <h6>Squats</h6>
              </div>
              <div class="col-md-9 col-sm-9">
               <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $mh->persensquat;?>%" aria-valuenow="<?php echo $mh->persensquat;?>" aria-valuemin="0" aria-valuemax="100"><?php echo $mh->persensquat;?>%</div>
              </div>
            </div>
          </div>
          <div class="row mt-3 mb-3">
            <div class="col-md-3 col-sm-3">
              <h6>Step</h6>
            </div>
            <div class="col-md-9 col-sm-9">
             <div class="progress">
              <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $mh->persenstep;?>%" aria-valuenow="<?php echo $mh->persenstep;?>" aria-valuemin="0" aria-valuemax="100"><?php echo $mh->persenstep;?>%</div>
            </div>
          </div>
        </div>
        <div class="row mt-3 mb-3">
          <div class="col-md-3 col-sm-3">
            <h6>Vertical Jump</h6>
          </div>
          <div class="col-md-9 col-sm-9">
           <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $mh->persenverjump;?>%" aria-valuenow="<?php echo $mh->persenverjump;?>" aria-valuemin="0" aria-valuemax="100"><?php echo $mh->persenverjump;?>%</div>
          </div>
        </div>
      </div>
      <div class="row mt-3 mb-3">
        <div class="col-md-3 col-sm-3">
          <h6>Sit and Reach</h6>
        </div>
        <div class="col-md-9 col-sm-9">
         <div class="progress">
          <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $mh->persensitreach;?>%" aria-valuenow="<?php echo $mh->persensitreach;?>" aria-valuemin="0" aria-valuemax="100"><?php echo $mh->persensitreach;?>%</div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!-- <a href="<?php echo base_url(); ?>Master/Profile"><button class="btn btn-add" style="float: right;">Back</button></a> -->
</div>
</div>



</div>
</section><!-- End About Us Section -->
</main>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload File Medical Check up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>MilitaryHealth/UploadMedicalCheckup" method="POST"  enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleInputEmail1">File Medical Check Up</label>
            <input type="file" class="form-control" accept=".png,.jpg,.jpeg,.pdf" name="medicalcheckup" required="">
            <small>Format:.png, .jpg, .jpeg, .pdf | Max size: 20Mb </small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>