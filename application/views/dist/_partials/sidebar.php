<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url(); ?>dist/index">Mandiri IMS</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url(); ?>dist/index">MIMS</a>
          </div>
          <ul class="sidebar-menu">
            <li class="<?php echo $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>"><a class="nav-link" href="<?php echo base_url(); ?>dist/index_0">General Dashboard</a></li>
            <li class="menu-header">Master Data</li>
            <li>
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Master</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url(); ?>user_controller/"><i class="fas fa-people"></i> <span>Master User</span></a></li>
                <li><a class="nav-link" href="<?php echo base_url(); ?>asset_controller/listAset"><i class="fas fa-box"></i> <span>Master Aset</span></a></li>
              </ul>
            </li>
            <li class="menu-header">Transaksi Data</li>
            <li>
              <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Transaksi</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url(); ?>asset_trans/input"><i class="far fa-file-alt"></i> <span>Input Stok Masuk</span></a></li>
                <li><a class="nav-link" href="<?php echo base_url(); ?>asset_trans/output"><i class="far fa-file-alt"></i><span>Input Stok Keluar</span></a></li>
              </ul>
            </li>
            <li class="menu-header">Laporan</li>
            <li>
              <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Laporan</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?php echo base_url(); ?>laporan_controller/laporanStok"><i class="far fa-file-alt"></i> <span>Laporan Stok Aset</span></a></li>
                <li><a class="nav-link" href="<?php echo base_url(); ?>laporan_controller/laporanPenggunaan"><i class="far fa-file-alt"></i><span>Laporan Penggunaan Aset</span></a></li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>
