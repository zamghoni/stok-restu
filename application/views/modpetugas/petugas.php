<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Petugas | Stok Bengkel Restu</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/')?>/datatables.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/')?>datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/')?>datatables/Select-1.2.4/css/select.bootstrap4.min.css">

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
              <li><a class="nav-link" href="<?php echo base_url('Home')?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
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
              <li><a class="nav-link" href="<?php echo base_url('Receiving')?>"><i class="fas fa-dolly"></i> <span>Barang Keluar</span></a></li>
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
              <li class="active"><a class="nav-link" href="<?php echo base_url('Petugas')?>"><i class="fas fa-user-cog"></i> <span>User Management</span></a></li>
              <?php
              }
              ?>
        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Petugas</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('Home')?>">Dashboard</a></div>
              <div class="breadcrumb-item">Petugas</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title"><a class="btn btn-outline-primary btn-sm" href="<?php echo base_url('Petugas/insert')?>"><i class="fa fa-plus"> Add Data</i></a></h2>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Nama Petugas</th>
                            <th>Level</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i=1;
                          foreach ($petugas as $data) {
                          ?>
                          <tr>
                            <td><?php echo $i ?></td>
                             <td><?php echo $data->userid ?></td>
                             <td><?php echo $data->nm_petugas ?></td>
                             <td><?php echo $data->level ?></td>
                             <td>
                              <a href="<?php echo base_url('Petugas/edit/'.$data->userid);?>">
                                <button type="button" class="btn btn-outline-success btn-rounded btn-sm"><i class="fa fa-edit"> Edit</i></button>
                              </a>
                              <a href="<?php echo base_url('Petugas/delete/'.$data->userid);?>" onclick="return confirm('Yakin akan hapus data <?php echo $data->nm_petugas?> ?')">
                                <button type="button" class="btn btn-outline-danger btn-rounded btn-sm"><i class="fa fa-trash"> Delete</i></button>
                              </a>
                            </td>
                          </tr>
                          <?php
                            $i++;
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

      <?php $this->load->view('template/footer');?>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?php echo base_url('assets/js/')?>stisla.js"></script>

  <!-- JS Libraies -->
  <script src="<?php echo base_url('assets/modules/')?>datatables/datatables.min.js"></script>
  <script src="<?php echo base_url('assets/modules/')?>datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('assets/modules/')?>datatables/Select-1.2.4/js/dataTables.select.min.js"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/js/')?>scripts.js"></script>
  <script src="<?php echo base_url('assets/js/')?>custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('assets/js/')?>page/modules-datatables.js"></script>
</body>
</html>
