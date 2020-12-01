<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?php echo $title; ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Master</a></div>
              <div class="breadcrumb-item">List Asets</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">List Aset</h2>
            <p class="section-lead">
              Daftar aset yang telah terdaftar pada sistem
            </p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- <div class="card-header"> -->
                    <!-- <h4>Advanced Table</h4> -->
                  <!-- </div> -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <button class="btn btn-success" id='addBtn'>+ Add New Asset</button>
                      <table class="table table-striped" id="recordsAsset">
                        <thead>
                          <tr>
                            <th>AsetID</th>
                            <th>Kode Aset</th>
                            <th>Nama Aset</th>
                            <th>Jenis AsetID</th>
                            <th>Jenis Aset</th>
                            <th>Status_id</th>
                            <th>Status</th>
                            <th>Qty</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Modal Goes Here -->
        <div class="modal" style="overflow-y: auto;" tabindex="-1" role="dialog" id="assetModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id ="modal_title"></h5>
                <button type="button" class="close" id='closeModal'  data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id = 'formAsset'>
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Aset</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-id-card"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Nama Aset" id="aset_name" name="aset_name">
                    <input type="text" class="form-control" value="0" id="aset_id" name="aset_id" hidden>
                  </div>
                </div>
                <div class="form-group">
                  <label>Kode Aset</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-barcode"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Kode Aset" name="aset_kode" id="aset_kode">
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label>Jenis Aset</label>
                  <div class ='row'>
                    <div class="input-group-prepend" style="width: 43px;margin-left: 15px">
                      <div class="input-group-text">
                        <i class="fas fa-list"></i>
                      </div>
                    </div>
                    <select class="form-control select2" id ='jenis_aset' style="width: 85%;">
                      <option value='0' selected="selected">-- Pilih Salah Satu --</option>
                      <option value='1'>Formulir</option>
                      <option value='2'>ATK</i></option>
                      <option value='3'>Surat Berharga</option>
                    </select>
                  </div>
                </div> -->
                <div class="form-group">
                  <label>Status</label>
                  <div class="row">
                    <div class="col-12 col-md-4 col-lg-4">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="aktif" value="1" checked>
                        <label class="form-check-label" for="aktif">Aktif</label>
                      </div>  
                    </div>
                    <div class="col-12 col-md-8 col-lg-8">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="status" id="nonAktif" value="0">
                        <label class="form-check-label" for="nonAktif">Non Aktif</label>
                      </div>  
                    </div>
                  </div>
                </div>
              </div>
            </form>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" id='BtnClose'>Cancel</button>
                <button type="button" class="btn btn-primary" id="BtnSave">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script type="text/javascript">
          var type = '';
          $(document).ready(function(){
            

             //get selected table row
             var table = $('#recordsAsset').DataTable({
              "processing" :true,
              "serverSide" : true,
              "order" : [],
              "ajax" : {
                url : "<?php echo base_url().'asset_controller/getData'; ?>",
                type : "POST"
              },
              "columnDefs": [
                  {
                      "targets": [ 0,3,4,5],
                      "visible": false,
                      "searchable": false
                  },
                  {
                    "targets" : [8],
                    "orderable": false
                  }
              ],
              'columns': [
                            { "data": "aset_id"},
                            { "data": "aset_kode"},
                            { "data": "aset_name"},
                            { "data": "jenis_aset_id"},
                            { "data": "jenis_aset"},
                            { "data": "status"},
                            { "render": function (data, type, row, meta) {
                                var a = '';

                                console.log(row.status);

                                if(row.status == 1)
                                {
                                  a = '<div class="badge badge-success">Aktif</div>'
                                }
                                else
                                {
                                  a = '<div class="badge badge-info">Non Aktif</div>'
                                }
                                return a;
                              } 
                            },
                            { "data": "qty"},
                            { "render": function(){
                              return a = `
                                    '<button class="btn btn-primary" id="detailBtn">Detail</button>
                            `;
                            } },
                        ]
             });

            $("#BtnSave").click(function()
              {       
                var aset_kode = document.getElementsByName("aset_kode")[0];
                var aset_id = document.getElementsByName("aset_id")[0];
                var aset_name = document.getElementsByName("aset_name")[0];
                // var jenis_aset = document.getElementById("jenis_aset");
                var status = document.querySelector('input[name="status"]:checked').value;
                if(aset_name.value != '' && aset_kode.value != ''
                  // &&jenis_aset.value > 0 
                  )
                {
                   $.ajax({
                       type: "POST",
                       url: "<?php echo base_url();?>asset_controller/save_trans", 
                       data: {
                          aset_id        : aset_id.value,
                          aset_kode      : aset_kode.value, 
                          aset_name      : aset_name.value, 
                          // jenis_aset     : jenis_aset.value,
                          status          : status,
                          type            : type
                       },
                       dataType: "text",  
                       cache:false,
                       success: 
                            function(response){
                              console.log(response);
                              var data = JSON.parse(response);
                              console.log(data.message);
                              table.ajax.reload();
                              if(data.status == 'success')
                              {
                                modal.style.display = "none";  
                              }
                              $("#formAsset")[0].reset();
                              // jenis_aset.value = 0 
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
                        });// you have missed this bracket
                }
                else
                {
                  var message ='';
                  if(aset_name.value == '')
                  {
                    message = message + 'Nama Aset'
                  }

                  if(aset_kode.value == '')
                  {
                    if(message.length > 0)
                    {
                      message = message+',';
                    }
                    message = message + 'Kode Aset'
                  }
                  
                  // if(jenis_aset.value == 0)
                  // {
                  //   if(message.length > 0)
                  //   {
                  //     message = message+',';
                  //   }
                  //   message = message + 'Jenis Aset';
                  // }
                  message = message+' tidak boleh kosong';
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
            var myHeader = document.getElementById("modal_title");
        // Get the modal
        var modal = document.getElementById("assetModal");

        // Get the button that opens the modal
        var addBtn = document.getElementById("addBtn");
        console.log(addBtn);

        // Get the button  that closes the modal
        var close = document.getElementById("BtnClose");
        var closeModal = document.getElementById("closeModal");


        // When the user clicks the button, open the modal         
           $(document).on("click", "#detailBtn", function(e){
            myHeader.innerText = "Update Data Asset";
            $("#formAsset")[0].reset();
            modal.style.display = "block";
            type = "update";
            
            //get selected data
            var data = table.row( $(this).parents('tr') ).data();

                document.getElementsByName("aset_id")[0].value = data.aset_id;
                document.getElementsByName("aset_kode")[0].value = data.aset_kode;
                document.getElementsByName("aset_name")[0].value = data.aset_name;

                $('#jenis_aset').val(data.jenis_aset_id);
                
          }) 

         addBtn.onclick = function() {
          myHeader.innerText = "Create New Asset";
          modal.style.display = "block";
          $("#formAsset")[0].reset();
          type = "insert";

        }

        // When the user clicks close, close the modal
        close.onclick = function() {
          modal.style.display = "none";
        }

        closeModal.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
            // $('#userTable tbody').on( 'click', 'tr', function () {
            //     var data = table.row( this ).data()
            //     console.log( data[2] );
            // } );
          });


        </script>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>