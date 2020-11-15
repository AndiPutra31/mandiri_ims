<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?php echo base_url(); ?>assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>

              <div class="card-body">
                <form method="POST" action="#" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your username
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <button id = "submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#submit").click(function(){
    var email = $("#email").val();
    var passwd = $("#password").val();
    // alert(passwd);
     $.ajax({
          url: 'ajax_isiotomatis.php',
          type: 'POST',
          dataType: 'json',
          data: {
              'npwp': email
          },
          success: function (datarbk) {
              // $("#nama").val(datarbk['nama']);
          }
      });
    // $.ajax({url: "demo_test.txt", success: function(result){
      // $("#div1").html(result);
    // }});
  });
});
</script> -->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type='text/javascript'>
  $(document).ready(function(){   

    $("#submit").click(function()
    {       
     $.ajax({
         type: "POST",
         url: "<?php echo base_url();?>user_controller/login", 
         data: {
                username: $("#username").val(), 
                passwd : $("#password").val()
              },
         dataType: "text",  
         cache:false,
         success: 
              function(data){
                window.location.href = "<?php echo base_url();?>"; //as a debugging message.
              }
          });// you have missed this bracket
     return false;
 });
 });
 </script>


<?php $this->load->view('dist/_partials/js'); ?>