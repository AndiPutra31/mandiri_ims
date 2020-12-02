<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php header('Access-Control-Allow-Origin : *'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?php echo $title; ?> &mdash; Stisla</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css"> -->

  <!-- toastr libraries -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/toastr/toastr.min.css">


  <!-- CSS Libraries -->
<?php
if(!isset($_SESSION))
{
  session_start();
}
if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "index") { ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
<?php
}elseif ($this->uri->segment(2) == "index_0") { ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/weather-icon/css/weather-icons.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/weather-icon/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.css">
<?php
}elseif ($this->uri->segment(2) == "listAset") { ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
<?php
}elseif (
  // $this->uri->segment(2) == "auth_login"
  empty($_SESSION)
) { ?>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-social/bootstrap-social.css">
<?php
} ?>

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<?php

if ($this->uri->segment(2) == "layout_transparent") {
  $this->load->view('dist/_partials/layout-2');
  $this->load->view('dist/_partials/sidebar-2');
}elseif ($this->uri->segment(2) == "layout_top_navigation") {
  $this->load->view('dist/_partials/layout-3');
  $this->load->view('dist/_partials/navbar');
}elseif (!empty($_SESSION) ) {
  $this->load->view('dist/_partials/layout');
  $this->load->view('dist/_partials/sidebar');
}
?>
