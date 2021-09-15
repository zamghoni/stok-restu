-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2021 at 02:03 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stok_restu`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nm_barang`, `stok`, `id_satuan`, `id_jenis`) VALUES
('BRG-00001', 'Material 1', 20, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `brg_keluar`
--

CREATE TABLE `brg_keluar` (
  `id_brgkeluar` varchar(15) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `jml_keluar` int(11) NOT NULL,
  `userid` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brg_keluar`
--

INSERT INTO `brg_keluar` (`id_brgkeluar`, `tgl_keluar`, `id_barang`, `jml_keluar`, `userid`) VALUES
('DTAM-00001', '2021-07-28', 'BRG-00001', 5, 'admin');

--
-- Triggers `brg_keluar`
--
DELIMITER $$
CREATE TRIGGER `brg_keluar` AFTER INSERT ON `brg_keluar` FOR EACH ROW BEGIN
UPDATE barang SET stok=stok-NEW.jml_keluar
WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `brg_keluar1` AFTER DELETE ON `brg_keluar` FOR EACH ROW BEGIN
UPDATE barang SET stok=stok+OLD.jml_keluar
WHERE id_barang=OLD.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `brg_keluar2` AFTER UPDATE ON `brg_keluar` FOR EACH ROW BEGIN
UPDATE barang SET stok=stok+OLD.jml_keluar-NEW.jml_keluar
WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `brg_masuk`
--

CREATE TABLE `brg_masuk` (
  `id_brgmasuk` varchar(15) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_supplier` varchar(10) NOT NULL,
  `reference` varchar(25) NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `jml_masuk` int(11) NOT NULL,
  `userid` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brg_masuk`
--

INSERT INTO `brg_masuk` (`id_brgmasuk`, `tgl_masuk`, `id_supplier`, `reference`, `id_barang`, `jml_masuk`, `userid`) VALUES
('TRM-0001', '2021-07-28', 'SPL-001', '-', 'BRG-00001', 25, 'admin');

--
-- Triggers `brg_masuk`
--
DELIMITER $$
CREATE TRIGGER `brg_masuk` AFTER INSERT ON `brg_masuk` FOR EACH ROW BEGIN
UPDATE barang SET stok=stok+NEW.jml_masuk
WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `brg_masuk1` AFTER DELETE ON `brg_masuk` FOR EACH ROW BEGIN
UPDATE barang SET stok=stok-OLD.jml_masuk
WHERE id_barang=OLD.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `brg_masuk2` AFTER UPDATE ON `brg_masuk` FOR EACH ROW BEGIN
UPDATE barang SET stok=stok-OLD.jml_masuk+NEW.jml_masuk
WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nm_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nm_jenis`) VALUES
(1, 'Raw Material');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `userid` varchar(25) NOT NULL,
  `nm_petugas` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('Administrator','Staff','Manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`userid`, `nm_petugas`, `password`, `level`) VALUES
('admin', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator'),
('manager', 'Manager', '1a8565a9dc72048ba03b4156be3e569f22771f23', 'Manager'),
('staff', 'Staff', '6ccb4b7c39a6e77f76ecfa935a855c6c46ad5611', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nm_satuan` varchar(10) NOT NULL,
  `deskripsi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nm_satuan`, `deskripsi`) VALUES
(1, 'Pcs', 'Pieces'),
(2, 'Kg', 'Kilogram');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `nm_supplier` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nm_supplier`, `no_telp`, `alamat`) VALUES
('SPL-001', 'PT Paxar Indonesia', '12345', 'Cikarang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `brg_keluar`
--
ALTER TABLE `brg_keluar`
  ADD PRIMARY KEY (`id_brgkeluar`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `brg_masuk`
--
ALTER TABLE `brg_masuk`
  ADD PRIMARY KEY (`id_brgmasuk`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
