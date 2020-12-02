<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dist/_partials/header');
?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Aset</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $totalAset; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Stok</h4>
                  </div>
                  <div class="card-body">
                    <?php echo $totalQty; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                  <i class="far fa-file"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Max Stok</h4>
                  </div>
                  <div class="card-body">
                    <?php foreach ($maxAset as $row) 
                    {
                      echo $row->qty;
                    } ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                  <i class="fas fa-circle"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Min Stok</h4>
                  </div>
                  <div class="card-body">
                    <?php foreach ($minAset as $row) 
                    {
                      echo $row->qty;
                    } ?>
                  </div>
                </div>
              </div>
            </div>                  
          </div>
          <div class="row">
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Transaksi Masuk Terakhir</h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped table-md">
                      <thead>
                      <tr>
                        <th>No.</th>
                        <th>Aset</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                         foreach ($dataIn as $row) 
                         {
                          # code...
                            echo"<tr><td>".$no."</td>";
                            echo'<td class="font-weight-600">'.$row->nama_aset.'</td>';
                            echo "<td style='width:150px'>".$row->created_date."</td>";
                            echo "<td style='text-align:right'>".$row->qty."</td></tr>";
                            $no++;
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Transaksi Keluar Terakhir</h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped table-md">
                      <thead>
                      <tr>
                        <th>No.</th>
                        <th>Aset</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                         foreach ($dataOut as $row) 
                         {
                          # code...
                            echo"<tr><td>".$no."</td>";
                            echo'<td class="font-weight-600">'.$row->nama_aset.'</td>';
                            echo "<td style='width:150px'>".$row->created_date."</td>";
                            echo "<td style='text-align:right'>".$row->qty."</td></tr>";
                            $no++;
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
             <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Stok Aset</h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped table-md">
                      <thead>
                      <tr>
                        <th>No.</th>
                        <th>Aset</th>
                        <th>Jumlah</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                         foreach ($dataStok as $row) 
                         {
                          # code...
                            echo"<tr><td>".$no."</td>";
                            echo'<td class="font-weight-600">'.$row->nama_aset.'</td>';
                            echo "<td style='text-align:right'>".$row->qty."</td></tr>";
                            $no++;
                          }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('dist/_partials/footer'); ?>