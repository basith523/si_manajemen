-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2016 at 08:37 
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` enum('Pembelian','Penjualan','Manager') NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`username`, `password`, `level`, `nama_lengkap`) VALUES
('manager', 'c4ca4238a0b923820dcc509a6f75849b', 'Manager', 'Zaki Nur Fatah'),
('pembelian', 'c4ca4238a0b923820dcc509a6f75849b', 'Pembelian', 'Abiq Sabiqul Khoir'),
('penjualan', 'c4ca4238a0b923820dcc509a6f75849b', 'Penjualan', 'M. Ridwan Farhan');

-- --------------------------------------------------------

--
-- Table structure for table `tblbarang`
--

CREATE TABLE `tblbarang` (
  `IDBarang` char(9) NOT NULL,
  `IDSuplier` char(9) NOT NULL,
  `NamaBarang` varchar(55) NOT NULL,
  `Jenis` varchar(50) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Jml_min` int(11) NOT NULL,
  `Jml_max` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbarang`
--

INSERT INTO `tblbarang` (`IDBarang`, `IDSuplier`, `NamaBarang`, `Jenis`, `Harga`, `Jml_min`, `Jml_max`) VALUES
('brg001', 'sup001', 'marlboro', 'rokok', 5000, 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tblsuplier`
--

CREATE TABLE `tblsuplier` (
  `IDSuplier` char(9) NOT NULL,
  `NamaSuplier` varchar(35) NOT NULL,
  `AlamatSuplier` varchar(100) NOT NULL,
  `Telepon` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsuplier`
--

INSERT INTO `tblsuplier` (`IDSuplier`, `NamaSuplier`, `AlamatSuplier`, `Telepon`) VALUES
('sup001', 'sampoerna', 'pontianak', '08989898'),
('sup002', 'google', 'afrika', '24324');

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaksi`
--

CREATE TABLE `tbltransaksi` (
  `IDTransaksi` int(11) NOT NULL,
  `IDBarang` char(9) NOT NULL,
  `TglTransaksi` date NOT NULL,
  `Keterangan` varchar(50) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Status` enum('masuk','keluar') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltransaksi`
--

INSERT INTO `tbltransaksi` (`IDTransaksi`, `IDBarang`, `TglTransaksi`, `Keterangan`, `Jumlah`, `Status`) VALUES
(1, 'brg001', '2016-01-22', '', 50, 'masuk'),
(2, 'brg001', '2016-01-22', '', 40, 'keluar');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_barang_suplier`
--
CREATE TABLE `v_barang_suplier` (
`IDBarang` char(9)
,`IDSuplier` char(9)
,`NamaBarang` varchar(55)
,`Jenis` varchar(50)
,`Harga` int(11)
,`NamaSuplier` varchar(35)
,`AlamatSuplier` varchar(100)
,`Telepon` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_laporan_pembelian`
--
CREATE TABLE `v_laporan_pembelian` (
`IDTransaksi` int(11)
,`IDBarang` char(9)
,`TglTransaksi` date
,`Keterangan` varchar(50)
,`Jumlah` int(11)
,`NamaBarang` varchar(55)
,`Jenis` varchar(50)
,`Harga` int(11)
,`NamaSuplier` varchar(35)
,`AlamatSuplier` varchar(100)
,`Telepon` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_laporan_penjualan`
--
CREATE TABLE `v_laporan_penjualan` (
`IDTransaksi` int(11)
,`IDBarang` char(9)
,`TglTransaksi` date
,`Keterangan` varchar(50)
,`Jumlah` int(11)
,`NamaBarang` varchar(55)
,`Jenis` varchar(50)
,`Harga` int(11)
,`NamaSuplier` varchar(35)
,`AlamatSuplier` varchar(100)
,`Telepon` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `v_barang_suplier`
--
DROP TABLE IF EXISTS `v_barang_suplier`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_barang_suplier`  AS  select `tblbarang`.`IDBarang` AS `IDBarang`,`tblbarang`.`IDSuplier` AS `IDSuplier`,`tblbarang`.`NamaBarang` AS `NamaBarang`,`tblbarang`.`Jenis` AS `Jenis`,`tblbarang`.`Harga` AS `Harga`,`tblsuplier`.`NamaSuplier` AS `NamaSuplier`,`tblsuplier`.`AlamatSuplier` AS `AlamatSuplier`,`tblsuplier`.`Telepon` AS `Telepon` from (`tblbarang` left join `tblsuplier` on((`tblsuplier`.`IDSuplier` = `tblbarang`.`IDSuplier`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_laporan_pembelian`
--
DROP TABLE IF EXISTS `v_laporan_pembelian`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_laporan_pembelian`  AS  select `tbltransaksi`.`IDTransaksi` AS `IDTransaksi`,`tbltransaksi`.`IDBarang` AS `IDBarang`,`tbltransaksi`.`TglTransaksi` AS `TglTransaksi`,`tbltransaksi`.`Keterangan` AS `Keterangan`,`tbltransaksi`.`Jumlah` AS `Jumlah`,`tblbarang`.`NamaBarang` AS `NamaBarang`,`tblbarang`.`Jenis` AS `Jenis`,`tblbarang`.`Harga` AS `Harga`,`tblsuplier`.`NamaSuplier` AS `NamaSuplier`,`tblsuplier`.`AlamatSuplier` AS `AlamatSuplier`,`tblsuplier`.`Telepon` AS `Telepon` from ((`tbltransaksi` left join `tblbarang` on((`tblbarang`.`IDBarang` = `tbltransaksi`.`IDBarang`))) left join `tblsuplier` on((`tblsuplier`.`IDSuplier` = `tblbarang`.`IDSuplier`))) where (`tbltransaksi`.`Status` = 'masuk') ;

-- --------------------------------------------------------

--
-- Structure for view `v_laporan_penjualan`
--
DROP TABLE IF EXISTS `v_laporan_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_laporan_penjualan`  AS  select `tbltransaksi`.`IDTransaksi` AS `IDTransaksi`,`tbltransaksi`.`IDBarang` AS `IDBarang`,`tbltransaksi`.`TglTransaksi` AS `TglTransaksi`,`tbltransaksi`.`Keterangan` AS `Keterangan`,`tbltransaksi`.`Jumlah` AS `Jumlah`,`tblbarang`.`NamaBarang` AS `NamaBarang`,`tblbarang`.`Jenis` AS `Jenis`,`tblbarang`.`Harga` AS `Harga`,`tblsuplier`.`NamaSuplier` AS `NamaSuplier`,`tblsuplier`.`AlamatSuplier` AS `AlamatSuplier`,`tblsuplier`.`Telepon` AS `Telepon` from ((`tbltransaksi` left join `tblbarang` on((`tblbarang`.`IDBarang` = `tbltransaksi`.`IDBarang`))) left join `tblsuplier` on((`tblsuplier`.`IDSuplier` = `tblbarang`.`IDSuplier`))) where (`tbltransaksi`.`Status` = 'keluar') ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tblbarang`
--
ALTER TABLE `tblbarang`
  ADD PRIMARY KEY (`IDBarang`);

--
-- Indexes for table `tblsuplier`
--
ALTER TABLE `tblsuplier`
  ADD PRIMARY KEY (`IDSuplier`);

--
-- Indexes for table `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
  ADD PRIMARY KEY (`IDTransaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbltransaksi`
--
ALTER TABLE `tbltransaksi`
  MODIFY `IDTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
