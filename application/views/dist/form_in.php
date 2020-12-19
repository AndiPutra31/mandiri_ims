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
                      <input type="text" id="kode_aset" onchange="searchAset()" name="kode_aset" class="form-control">
                      <input type="text" id="asset_id" name="asset_id" value= "0" hidden />

                    </div>
                    <div class="form-group">
                      <label>Quantity</label>
                      <input type="number" id="qty" name="qty" min="1" value="1" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Stok Sekarang</label>
                      <input type="number" id ='stock'class="form-control" readonly>
                    </div>
                  
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit" id='BtnSave'>Submit</button>
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
          // var type = '';
          function searchAset()
            {
              var kode_aset = document.getElementById("kode_aset");

              $.ajax({
                         type: "POST",
                         url: "<?php echo base_url() ?>asset_controller/search", 
                         data: {
                            kode_aset      : kode_aset.value, 
                         },
                         dataType: "text",  
                         cache:false,
                         success: 
                              function(response){
                                console.log(response);
                                var responses = JSON.parse(response);
                                var data = responses.data;
                                console.log(data);
                                console.log(data.aset_id);
                                document.getElementById("asset_id").value = data.aset_id;
                                document.getElementById("stock").value = data.qty;
                              }
                          });
            }
          $(document).ready(function(){
            $("#BtnSave").click(function()
                {       
                  var asset_id = document.getElementById("asset_id");
                  var qty = document.getElementById("qty");
                  var type = document.getElementById("type");
                  var stock = document.getElementById("stock");
                  var sisa_stock = stock.value - qty.value
                  console.log(sisa_stock);
                  console.log(parseInt(qty.value));
                  if(asset_id.value >0 && qty.value > 0 && ((sisa_stock>= 0 && type.value =='out') || type.value == 'in' ))
                  {
                  console.log('lalala');
                    $.ajax({
                         type: "POST",
                         url: "<?php echo base_url() ?>asset_trans/save_trans", 
                         data: {
                            aset_id      : asset_id.value, 
                            qty            : qty.value,
                            type            : type.value
                         },
                         dataType: "text",  
                         cache:false,
                         success: 
                              function(response){
                                console.log(response);
                                var data = JSON.parse(response);
                                console.log(data.message);
                                if(data.status =='success')
                                {
                                  $("#formInput")[0].reset();
                                }
                                toastr[data.status](data.message)
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
                          });
                     
                  }
                  else
                  {
                    var message ='';
                    if(kode_aset.value =='' || qty.value == 0 )
                    {
                      if(kode_aset.value =='')
                      {
                        message = message + 'Kode Aset'
                      }
                      
                      else if(parseInt(qty.value) < parseInt('1'))
                      {
                        console.log('aa');
                        if(message.length > 0)
                        {
                          message = message+',';
                        }
                        message = message + 'Quantity';
                      }
                      message = message+' tidak boleh kosong';
                    }
                    else if (asset_id.value == 0)
                    {
                      message = 'Kode Aset Salah Atau Aset Tidak Aktif';
                    }
                    else if(sisa_stock < 0)
                    {
                      console.log(stock.value);
                      console.log(qty.value);
                      console.log(stock.value - qty.value);

                      message = 'Stok barang kurang ';
                    }
                    else
                    {
                      message = 'Quantity Harus Positif';
                    }
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