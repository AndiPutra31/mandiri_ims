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
              <form id ='formInput' >
                <div class="card">
                  
                  <div class="card-header">
                    <div class="col-6 col-sm-8">
                      <h3 style="margin-top: 80px">Laporan Stok</h3>
                    </div>
                    <div class="col-6 col-sm-4" >
                          <img src="<?php echo base_url(); ?>assets/img/mandiri_logo.png" alt="logo mandiri" width="200px" style="margin-left: -40px;margin-top: -70px" >
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Periode</label>
                      <input type="month" id = 'periode' class="form-control datepicker"/>
                    </div>
                    <div class="form-group">
                      <label>Tipe Laporan</label>
                        <select class="form-control" id ='type'>
                          <option value='rekap' selected="selected">Rekap</option>
                          <option value='detail'>Detail</option>
                        </select>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="button" id='BtnSave'>Save</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </section>
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script>
          $(document).ready(function(){
            $("#BtnSave").click(function()
                {       
                  var periode = document.getElementById("periode");
                  var type = document.getElementById("type");
                  if(periode.value != '')
                  {
                    $.ajax({
                         type: "POST",
                         url: "<?php echo base_url() ?>laporan_controller/createLaporan", 
                         data: {
                            periode      : periode.value, 
                            type         : type.value
                         },
                         dataType: "text",  
                         cache:false,
                         success: 
                              function(response){
                                console.log(response);
                                var data = JSON.parse(response);
                                console.log(data.filename);
                                window.open("<?php echo base_url() ?>"+data.filename,'_blank');
                              }
                          });
                     
                  }
                  else
                  {
                    var message ='Periode Belum dipilih';

                    toastr['warning'](message)

                                toastr.options = {
                                  "closeButton": true,
                                  "debug": false,
                                  "newestOnTop": false,
                                  "progressBar": false,
                                  "positionClass": "toast-top-right",
                                  "preventDuplicates": false,
                                  "onclick": null,
                                  "showDuration": "300",
                                  "hideDuration": "1000",
                                  "timeOut": "5000",
                                  "extendedTimeOut": "1000",
                                  "showEasing": "swing",
                                  "hideEasing": "linear",
                                  "showMethod": "fadeIn",
                                  "hideMethod": "fadeOut"
                                }
                  }
                 return false;
               });
          });
        </script>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>