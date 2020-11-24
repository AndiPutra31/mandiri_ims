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
              <div class="breadcrumb-item">List Users</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">List Users</h2>
            <p class="section-lead">
              Daftar user yang telah terdaftar pada sistem
            </p>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!-- <div class="card-header"> -->
                    <!-- <h4>Advanced Table</h4> -->
                  <!-- </div> -->
                  <div class="card-body">
                    <div class="table-responsive">
                      <button class="btn btn-success" id='addBtn'>+ Add New User</button>
                      <table class="table table-striped" id="recordsUser">
                        <thead>
                          <tr>
                            <th>Userid</th>
                            <th>Username</th>
                            <th>NIP</th>
                            <th>Nama Pegawai</th>
                            <th>Password</th>
                            <th>Roles</th>
                            <th>Status_id</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <!-- <tbody>
                          <tr>
                            <td hidden>1</td>
                            <td>Input data</td>
                            <td class="align-middle">
                              <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                <div class="progress-bar bg-success" data-width="100"></div>
                              </div>
                            </td>
                            <td>
                              <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-2.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Rizal Fakhri">
                              <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Isnap Kiswandi">
                              <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-4.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Yudi Nawawi">
                              <img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Khaerul Anwar">
                            </td>
                            <td><div class="badge badge-success">Completed</div></td>
                            <td><button class="btn btn-primary" id='detailBtn'>Detail</button></td>
                          </tr>
                        </tbody> -->
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Modal Goes Here -->
        <div class="modal" style="overflow-y: auto;" tabindex="-1" role="dialog" id="userModal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id ="modal_title"></h5>
                <button type="button" class="close" id='closeModal'  data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form id = 'formUser'>
              <div class="modal-body">
                <div class="form-group">
                  <label>Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-user"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" id="username" name="username">
                    <input type="text" class="form-control" value="0" id="user_id" name="user_id" hidden>
                  </div>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-lock"></i>
                      </div>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                  </div>
                </div>
                <div class="form-group">
                  <label>Nama Pegawai</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-user"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Nama Pegawai" name="pegawai_nama" id = "pegawai_nama">
                  </div>
                </div>
                <div class="form-group">
                  <label>NIP</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-id-card"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" placeholder="NIP" name="nip" id = "nip"> 
                  </div>
                </div>
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
                <div class="form-group">
                  <label>Role</label>
                  <div class="row">
                    <div class="col-12 col-md-8 col-lg-4">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="user" value="0" checked>
                        <label class="form-check-label" for="user">User</label>
                      </div>  
                    </div>
                    <div class="col-12 col-md-4 col-lg-8">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="admin" value="1" > 
                        <label class="form-check-label" for="admin">Admin</label>
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
             var table = $('#recordsUser').DataTable({
              "processing" :true,
              "serverSide" : true,
              "order" : [],
              "ajax" : {
                url : "<?php echo base_url().'user_controller/getData'; ?>",
                type : "POST"
              },
              "columnDefs": [
                  {
                      "targets": [ 0,4,5,6 ],
                      "visible": false,
                      "searchable": false
                  },
                  {
                    "targets" : [8],
                    "orderable": false
                  }
              ],
              'columns': [
                            { "data": "user_id"},
                            { "data": "user_name"},
                            { "data": "nip"},
                            { "data": "pegawai_nama"},
                            { "data": "user_pass"},
                            { "data": "role"},
                            { "data": "status"},
                            { "render": function (data, type, row, meta) {
                              var a = '';
                              // console.log(${row});
                              // console.log(data);

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
                            } },
                            { "render": function(){
                              return a = `
                                    '<button class="btn btn-primary" id="detailBtn">Detail</button>
                            `;
                            } },
                        ]
             });

            $("#BtnSave").click(function()
              {       
                var username = document.getElementsByName("username")[0];
                var user_id = document.getElementsByName("user_id")[0];
                var passwd = document.getElementsByName("password")[0];
                var pegawai_nama = document.getElementsByName("pegawai_nama")[0];
                var nip = document.getElementsByName("nip")[0];
                var status = document.querySelector('input[name="status"]:checked').value;
                var role = document.querySelector('input[name="role"]:checked').value;

               $.ajax({
                   type: "POST",
                   url: "<?php echo base_url();?>user_controller/save_trans", 
                   data: {
                      user_id       : user_id.value,
                      username      : username.value, 
                      passwd        : passwd.value,
                      pegawai_nama  : pegawai_nama.value,
                      nip           : nip.value,
                      status        : status,
                      role          : role,
                      type          : type
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
                          $("#formUser")[0].reset();
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
               return false;
             });
            var myHeader = document.getElementById("modal_title");
        // Get the modal
        var modal = document.getElementById("userModal");

        // Get the button that opens the modal
        var addBtn = document.getElementById("addBtn");
        console.log(addBtn);

        // Get the button  that closes the modal
        var close = document.getElementById("BtnClose");
        var closeModal = document.getElementById("closeModal");


        // When the user clicks the button, open the modal         
           $(document).on("click", "#detailBtn", function(e){
            myHeader.innerText = "Update Data User";
            $("#formUser")[0].reset();
            modal.style.display = "block";
            type = "update";
            
            //get selected data
            var data = table.row( $(this).parents('tr') ).data();

                document.getElementsByName("user_id")[0].value = data.user_id;
                document.getElementsByName("username")[0].value = data.user_name;
                document.getElementsByName("pegawai_nama")[0].value = data.pegawai_nama;
                document.getElementsByName("nip")[0].value = data.nip;
                var admin = document.getElementById("admin");
                var user = document.getElementById("user");
                var aktif = document.getElementById("aktif");
                var non = document.getElementById("nonAktif");
                if(data.status == 1)
                {
                 aktif.checked = true;
                }
                else
                {
                 non.checked = true;
                }
                if(data.role == 1)
                {
                 admin.checked = true;
                }
                else
                {
                 user.checked = true;
                }
          }) 

         addBtn.onclick = function() {
          myHeader.innerText = "Add New User";
          modal.style.display = "block";
          $("#formUser")[0].reset();
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