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

<body onload="window.print()">
  <div id="app">
    <div class="main-wrapper">
      <!-- Main Content -->
      <div>
        <section class="section">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <div class="card" id="cardbayar">
                  <div class="card-body">
                    <br>
                    <center>
                      <b><h3><?php echo $title ?> <br></h3></b>
                      <h6><?php echo $subtitle ?> <br></h6>
                    </center>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <div class="table-responsive">
                    <table id="tabelbayar" width="100%" cellspacing="0" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>No.</th>
                        <th>No. Transaksi</th>
                        <th>Tgl. Transaksi</th>
                        <th>Kode Supplier</th>
                        <th>Nama Supplier</th>
                        <th>Reference</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Masuk</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no=1;
                        foreach ($datafilter as $row) :
                        ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row->id_brgmasuk; ?></td>
                        <td><?php echo $row->tgl_masuk; ?></td>
                        <td><?php echo $row->id_supplier; ?></td>
                        <td><?php echo $row->nm_supplier; ?></td>
                        <td><?php echo $row->reference; ?></td>
                        <td><?php echo $row->id_barang; ?></td>
                        <td><?php echo $row->nm_barang; ?></td>
                        <td><?php echo $row->jml_masuk; ?></td>
                      </tr>
                      <?php endforeach ?>
                      </tbody>
                    </table>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-body">
                  <div class="row form-group">
                      <div id="form-tanggal" class="col col-md-9"><label for="select"></label></div>
                      <div id="form-tanggal" class="col col-md-3"><label for="select">Cikarang, <?php echo date('d M Y')?></label></div>
                  </div>
                  <div class="row form-group">
                      <div id="form-tanggal" class="col col-md-9"><label for="select"></label></div>
                      <div id="form-tanggal" class="col col-md-3"><label for="select">Manager</label></div>
                  </div>
                  <br><br><br>
                  <div class="row form-group">
                      <div id="form-tanggal" class="col col-md-9"><label for="select"></label></div>
                      <div id="form-tanggal" class="col col-md-3"><label for="select">.............................................. </label></div>
                  </div>
                  <div>
                  </div>
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>
      </div>
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
