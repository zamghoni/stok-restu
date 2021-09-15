<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard | Stok Bengkel Restu</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('node_modules/')?>jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?php echo base_url('node_modules/')?>summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="<?php echo base_url('node_modules/')?>owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url('node_modules/')?>owl.carousel/dist/assets/owl.theme.default.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/')?>style.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/')?>components.css">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <?php $this->load->view('template/navbar');?>

      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?php echo base_url('Home')?>">Stok Gudang</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo base_url('Home')?>">TA</a>
          </div>
          <ul class="sidebar-menu">
              <li class="active"><a class="nav-link" href="<?php echo base_url('Home')?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              <?php
              if ($this->session->userdata('level') == 'Administrator' OR $this->session->userdata('level') == 'Staff') {?>
              <li><a class="nav-link" href="<?php echo base_url('Supplier')?>"><i class="fas fa-city"></i> <span>Supplier</span></a></li>
              <?php
              }
              ?>
              <?php
              if ($this->session->userdata('level') == 'Administrator') {?>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box-open"></i> <span>Barang</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('Satuan')?>">Satuan Barang</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('Jenis')?>">Jenis Barang</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('Barang')?>">Data Barang</a></li>
                </ul>
              </li>
              <?php
              }
              ?>
              <?php
              if ($this->session->userdata('level') == 'Administrator' OR $this->session->userdata('level') == 'Staff') {?>
              <li class="menu-header">Transaksi</li>
              <li><a class="nav-link" href="<?php echo base_url('Receiving')?>"><i class="fas fa-dolly"></i> <span>Barang Masuk</span></a></li>
              <li><a class="nav-link" href="<?php echo base_url('Delivery')?>"><i class="fas fa-truck-loading"></i> <span>Barang Keluar</span></a></li>
              <?php
              }
              ?>
              <li class="menu-header">Report</li>
              <li><a class="nav-link" href="<?php echo base_url('Rptreceiving')?>"><i class="fas fa-file-invoice"></i> <span>Laporan Barang Masuk</span></a></li>
              <li><a class="nav-link" href="<?php echo base_url('Rptdelivery')?>"><i class="fas fa-file-contract"></i> <span>Laporan Barang Keluar</span></a></li>
              <li class="menu-header">Setting</li>
              <?php
              if ($this->session->userdata('level') == 'Administrator') {?>
              <li><a class="nav-link" href="<?php echo base_url('Petugas')?>"><i class="fas fa-user-cog"></i> <span>User Management</span></a></li>
              <?php
              }
              ?>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Barang
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count"><?= $satuan;?></div>
                      <div class="card-stats-item-label"><a class="nav-link" href="<?php echo base_url('Satuan')?>">Satuan</a></div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count"><?= $jenis;?></div>
                      <div class="card-stats-item-label"><a class="nav-link" href="<?php echo base_url('Jenis')?>">Jenis</a></div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-box-open"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Barang</h4>
                  </div>
                  <div class="card-body">
                    <?= $barang;?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Receive
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count"><?= $supplier;?></div>
                      <div class="card-stats-item-label"><a class="nav-link" href="<?php echo base_url('Supplier')?>">Supplier</a></div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-dolly"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Receiving PO</h4>
                  </div>
                  <div class="card-body">
                    <?= $receiving;?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Delivery
                  </div>
                  <div class="card-stats-items">
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-truck-loading"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Delivery Note</h4>
                  </div>
                  <div class="card-body">
                    <?= $delivery;?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-lg-12" id="chart"></div>
          </div>
        </section>
      </div>

      <?php $this->load->view('template/footer');?>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/js/')?>scripts.js"></script>
  <script src="<?php echo base_url('assets/js/')?>custom.js"></script>

  

    <script src="<?php echo base_url('assets/modules/')?>highcharts/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/modules/')?>highcharts/highcharts.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/modules/')?>highcharts/modules/exporting.js" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/modules/')?>highcharts/modules/offline-exporting.js" type="text/javascript"></script>
    <!-- Page Specific JS File -->
  <script src="<?php echo base_url('assets/js/')?>page/index.js"></script>

    <script type="text/javascript">
    jQuery(function(){
     new Highcharts.Chart({
      chart: {
       renderTo: 'chart',
       type: 'line',
      },
      title: {
       text: 'Grafik Statistik Receiving',
       x: -20
      },
      subtitle: {
       text: 'Count visitor',
       x: -20
      },
      xAxis: {
       categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                        'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des']
      },
      yAxis: {
       title: {
        text: 'Total'
       }
      },
      series: [{
       name: 'Barang Masuk',
       data: <?php echo json_encode($hasil); ?>
      }]
     });
    }); 
    </script>
</body>
</html>
