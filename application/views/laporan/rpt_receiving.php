<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Report Receiving | Stok Bengkel Restu</title>

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
              <li><a class="nav-link" href="<?php echo base_url('Receiving')?>"><i class="fas fa-dolly"></i> <span>Barang Masuk</span></a></li>
              <li><a class="nav-link" href="<?php echo base_url('Delivery')?>"><i class="fas fa-truck-loading"></i> <span>Barang Keluar</span></a></li>
              <?php
              }
              ?>
              <li class="menu-header">Report</li>
              <li class="active"><a class="nav-link" href="<?php echo base_url('Rptreceiving')?>"><i class="fas fa-file-invoice"></i> <span>Laporan Barang Masuk</span></a></li>
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
            <h1>Report Receiving</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo base_url('Home')?>">Dashboard</a></div>
              <div class="breadcrumb-item">Report</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <!-- row satu  -->
              <div class="col-lg-5" >
                <div class="card">
                  <div class="card-header">
                    <strong>Report Receiving</strong>
                  </div>
                  <!--id formfilter adalah nama form untuk filter-->
                  <form id="formfilter">
                    <div class="card-body">
                      <input name="valnilai" type="hidden">
                      <div class="row form-group">
                        <div id="form-tanggal"></div>
                        <div class="col-md-6">
                          <select name="periode" id="periode" class="form-control">
                            <option value="">-PILIH-</option>
                            <option value="tanggal">Tanggal</option>
                            <option value="bulan">Bulan</option>
                            <option value="tahun">Tahun</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    
                    <div class="card-footer">  
                      <!--ketika di klik tombol Proses, maka akan mengeksekusi fungsi javascript prosesPeriode() , untuk menampilkan form-->
                      <button id="btnproses" type="button" onclick="prosesPeriode()" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Proses</button>

                      <!--ketika di klik tombol Reset, maka akan mengeksekusi fungsi javascript prosesReset() , untuk menyembunyikan form-->
                      <button onclick="prosesReset()" type="button" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Reset</button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- row kedua  -->
              <div class="col-lg-7" id="tanggalfilter">
                <div class="card">
                  <div class="card-header">
                    <strong>Filter by Date</strong>
                  </div>
                  <form action="<?php echo base_url(); ?>Rptreceiving/filter" method="POST" target="_blank">
                    <input type="hidden" name="nilaifilter" value="1">
                    
                    <input name="valnilai" type="hidden">
                    
                    <div class="card-body">
                      <div class="row form-group">
                        <div class="col-md-2" style="text-align: right;">
                          <label for="select">From Date</label>
                        </div>
                        <div class="col col-md-4">
                          <input name="tanggalawal" value="" type="date" class="form-control" id="tanggalawal" required="">
                        </div>
                        <div class="col col-md-2" style="text-align: right;">
                          <label for="select">To Date</label>
                        </div>
                        <div class="col col-md-4">
                          <input name="tanggalakhir" value="" type="date"  class="form-control" id="tanggalakhir" required="">
                        </div>
                      </div>
                    </div>

                    <div class="card-footer">
                      <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- row ketiga  -->
              <div class="col-lg-7" id="bulanfilter">
                <div class="card">
                  <div class="card-header">
                    <strong>Filter by Month</strong>
                  </div>
                  <form id="formbulan" action="<?php echo base_url(); ?>Rptreceiving/filter" method="POST" target="_blank">
                    <div class="card-body card-block">
                      <input type="hidden" name="nilaifilter" value="2">

                      <input name="valnilai" type="hidden">
                      
                      <div class="row form-group">
                        <div id="form-tanggal" class="col col-md-2"><label for="select">Select Year</label></div>
                        <div class="col-md-4">
                          <select name="tahun1" id="tahun1" class="form-control form-control-user">
                            <option value="">-PILIH-</option>
                            <?php foreach($tahun as $thn): ?>
                              <option value="<?php echo $thn->tahun; ?>"><?php echo $thn->tahun; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>

                      <div class="row form-group">
                        <div class="col col-md-2">
                          <label for="select" class=" form-control-label">From Month</label>
                        </div>
                        <div class="col col-md-3">
                          <select name="bulanawal" id="bulanawal" class="form-control form-control-user">
                            <option value="">-PILIH-</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                          </select>
                        </div>
                        <div class="col col-md-2"s>
                          <label for="select" class=" form-control-label">To Month</label>
                        </div>
                        <div class="col col-md-3">
                          <select name="bulanakhir" id="bulanakhir" class="form-control form-control-user">
                            <option value="">-PILIH-</option>
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- row keempat  -->
              <div class="col-lg-7" id="tahunfilter">
                <div class="card">
                  <div class="card-header">
                    <strong>Filter by Year</strong>
                  </div>
                  <form id="formtahun" action="<?php echo base_url(); ?>Rptreceiving/filter" method="POST" target="_blank">
                    <input name="valnilai" type="hidden">
                    <div class="card-body">

                      <input type="hidden" name="nilaifilter" value="3">
                      
                      <div class="row form-group">
                        <div id="form-tanggal" class="col col-md-2"><label for="select">Select Year</label></div>
                        <div class="col-md-4">
                          <select name="tahun2" id="tahun2" class="form-control form-control-user">
                            <option value="">-PILIH-</option>
                            <?php foreach($tahun as $thn): ?>
                              <option value="<?php echo $thn->tahun; ?>"><?php echo $thn->tahun; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="card-footer">
                      <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</button>
                    </div>
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
  <script src="<?php echo base_url('assets/modules/')?>datatables/datatables.min.js"></script>
  <script src="<?php echo base_url('assets/modules/')?>datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url('assets/modules/')?>datatables/Select-1.2.4/js/dataTables.select.min.js"></script>

  <!-- Template JS File -->
  <script src="<?php echo base_url('assets/js/')?>scripts.js"></script>
  <script src="<?php echo base_url('assets/js/')?>custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('assets/js/')?>page/modules-datatables.js"></script>

<script type="text/javascript">
  /*digunakan untuk menyembunyikan form tanggal, bulan dan tahun saat halaman di load */
  $(document).ready(function() {
    $("#tanggalfilter").hide();
    $("#tahunfilter").hide();
    $("#bulanfilter").hide();
    $("#cardbayar").hide();
  });

  /*digunakan untuk menampilkan form tanggal, bulan dan tahun*/
  function prosesPeriode(){
    var periode = $("[name='periode']").val();
    if(periode == "tanggal"){
      $("#btnproses").hide();
      $("#tanggalfilter").show();
      $("[name='valnilai']").val('tanggal');
    }else if(periode == "bulan"){
      $("#btnproses").hide();
      $("[name='valnilai']").val('bulan');
      $("#bulanfilter").show();
    }else if(periode == "tahun"){
      $("#btnproses").hide();
      $("[name='valnilai']").val('tahun');
      $("#tahunfilter").show();
    }
  }

  /*digunakan untuk menytembunyikan form tanggal, bulan dan tahun*/
  function prosesReset(){
    $("#btnproses").show();
    $("#tanggalfilter").hide();
    $("#tahunfilter").hide();
    $("#bulanfilter").hide();
    $("#cardbayar").hide();
    $("#periode").val('');
    $("#tanggalawal").val('');
    $("#tanggalakhir").val('');
    $("#tahun1").val('');
    $("#bulanawal").val('');
    $("#bulanakhir").val('');
    $("#tahun2").val('');
    $("#targetbayar").empty();
  }
</script>
</body>
</html>
