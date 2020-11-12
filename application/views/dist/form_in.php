<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-breadcrumb">
              <!-- <div class="breadcrumb-item active"><a href="#">Dashboard</a></div> -->
              <div class="breadcrumb-item">  </div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title"><?php echo $title; ?></h2>
            <div class="row">
              <div class="col-12 col-md-3 col-lg-3">
              </div>
              <div class="col-12 col-md-6 col-lg-6">
              <form role="form" action="<?php echo base_url() ?>asset_trans/save_trans" method="post" enctype="multipart/form-data">
                <div class="card">
                  
                  <div class="card-header">
                    <div class="col-6 col-sm-8">
                      <h3 style="margin-top: 80px">ASSET INVENTORY</h3>
                    </div>
                    <div class="col-6 col-sm-4" >
                          <img src="<?php echo base_url(); ?>assets/img/mandiri_logo.png" alt="logo mandiri" width="200px" style="margin-left: -40px;margin-top: -70px" >
                    </div>
                  </div>
                  <div class="card-body">
                  <div class="form-group">
                      <input type="text" class="form-control" id="type" name="type" value="<?php echo $type; ?>" hidden />
                    </div>
                    <div class="form-group">
                      <label>Date</label>
                      <input type="text" class="form-control" value="<?php echo date('d/m/Y'); ?>" readonly />
                    </div>
                    <div class="form-group">
                      <label>Aset</label>
                      <input type="text" id="kode_aset" name="kode_aset" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Quantity</label>
                      <input type="number" id="qty" name="qty" min="1" value="1" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Stok Sekarang</label>
                      <input type="number"class="form-control" readonly>
                    </div>
                  
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>