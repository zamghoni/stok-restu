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