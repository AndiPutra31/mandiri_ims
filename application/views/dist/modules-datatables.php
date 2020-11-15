<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>List Users</h1>
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
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th>Username</th>
                            <th>Nama Pegawai</th>
                            <th>NIP</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
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
                        </tbody>
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
                    <input type="password" class="form-control" placeholder="Password" name="password">
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
                    <div class="col-12 col-md-4 col-lg-4">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="admin" value="1" checked>
                        <label class="form-check-label" for="admin">Admin</label>
                      </div>  
                    </div>
                    <div class="col-12 col-md-8 col-lg-8">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="role" id="user" value="0">
                        <label class="form-check-label" for="user">User</label>
                      </div>  
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" id='BtnClose'>Cancel</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
             // $('#userTable').DataTable({
             //    'processing': true,
             //    'serverSide': true,
             //    'serverMethod': 'post',
             //    'ajax': {
             //        'url':'<?php echo base_url() ?>user_controller/list_user'
             //    },
             //    'columns': [
             //       { data: 'user_id' },
             //       { data: 'user_name' },
             //       { data: 'passwd' },
             //       { data: 'pegawai_nama' },
             //       { data: 'nip' },
             //       { data: 'status' },
             //       { data: 'role' },

             //    ]
             // });

             //get selected table row
             var table = $('#table-2').DataTable();
 
            $('#table-2 tbody').on( 'click', 'tr', function () {
                var data = table.row( this ).data()
                console.log( data[2] );
            } );
          });
        </script>
        <script>
        var myHeader = document.getElementById("modal_title");
        // Get the modal
        var modal = document.getElementById("userModal");

        // Get the button that opens the modal
        var btn = document.getElementById("detailBtn");
        // var addBtn = document.getElementById("addBtn");

        // Get the button  that closes the modal
        var close = document.getElementById("BtnClose");
        var closeModal = document.getElementById("closeModal");

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          myHeader.innerText = "Update Data User";
          modal.style.display = "block";
        }

        //  addBtn.onclick = function() {
        //   myHeader.innerText = "Add New User";
        //   modal.style.display = "block";

        // }

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
        </script>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>