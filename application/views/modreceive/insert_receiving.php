<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Receiving | Stok Bengkel Restu</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/')?>bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/')?>bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/')?>select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/')?>selectric/public/selectric.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/')?>bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?php echo base_url('assets/modules/')?>bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

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
              <li class="active"><a class="nav-link" href="<?php echo base_url('Receiving')?>"><i class="fas fa-dolly"></i> <span>Barang Masuk</span></a></li>
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
          <div class="section-header">
            <h1>Data Receiving</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('Home')?>">Dashboard</a></div>
              <div class="breadcrumb-item">Receiving</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Tambah Receiving</h2>

            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-body">
                    <form role="form" action="<?php echo base_url('Receiving/insert')?>" method="post">
                      <div class="form-group">
                        <label>No. Transaksi *</label>
                        <input type="text" class="form-control" id="kode" name="kode" autofocus>
                        <p><?php echo form_error('kode'); ?></p>
                      </div>
                      <div class="form-group">
                        <label>Tanggal Masuk *</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal">
                        <p><?php echo form_error('tanggal'); ?></p>
                      </div>
                      <div class="form-group">
                        <label>Supplier *</label>
                        <select class="form-control" name="supplier" id="supplier">
                          <option selected="selected" disabled>Pilih Supplier</option>
                          <?php
                          foreach ($supplier as $row) {
                          ?>
                          <option value="<?php echo $row->id_supplier ?>"><?php echo $row->nm_supplier ; ?></option>
                          <?php } ?>
                        </select>
                        <p><?php echo form_error('supplier'); ?></p>
                      </div>
                      <div class="form-group">
                        <label>No. reference</label>
                        <input type="text" class="form-control" id="reference" name="reference">
                      </div>
                      <div class="form-group">
                        <label>Barang *</label>
                        <select class="form-control" name="barang" id="barang">
                          <option selected="selected" disabled>Pilih Barang</option>
                          <?php
                          foreach ($barang as $row) {
                          ?>
                          <option value="<?php echo $row->id_barang ?>"><?php echo $row->nm_barang ; ?></option>
                          <?php } ?>
                        </select>
                        <p><?php echo form_error('barang'); ?></p>
                      </div>
                      <div class="form-group">
                        <label>Jumlah Masuk</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah">
                        <p><?php echo form_error('jumlah'); ?></p>
                      </div>
                      <br>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <a class="btn btn-secondary" href="<?php echo base_url('Receiving') ?>">Batal</a>
                    </form>
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
  <script src="<?php echo base_url('assets/modules/')?>cleave.js/dist/cleave.min.js"></script>
  <script src="<?php echo base_url('assets/modules/')?>cleave.js/dist/addons/cleave-phone.us.js"></script>
  <script src="<?php echo base_url('assets/modules/')?>jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?php echo base_url('assets/modules/')?>bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo base_url('assets/modules/')?>bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
  <script src="<?php echo base_url('assets/modules/')?>bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?php echo base_url('assets/modules/')?>bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
  <script src="<?php echo base_url('assets/modules/')?>select2/dist/js/select2.full.min.js"></script>
  <script src="<?php echo base_url('assets/modules/')?>selectric/public/jquery.selectric.min.js"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/js/')?>scripts.js"></script>
  <script src="<?php echo base_url('assets/js/')?>custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('assets/js/')?>page/forms-advanced-forms.js"></script>
</body>
</html>
