-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2015 at 04:53 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `latihan_ci`
--
CREATE DATABASE IF NOT EXISTS `latihan_ci` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `latihan_ci`;

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE IF NOT EXISTS `master_user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` enum('Kepegawaian','Keuangan','Pimpinan') NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `photo` varchar(250) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`username`, `password`, `level`, `nama_lengkap`, `photo`) VALUES
('Abiq', '202cb962ac59075b964b07152d234b70', 'Keuangan', 'Abiq Sabiqul Khoir', 'abiq.jpg'),
('farhan', '202cb962ac59075b964b07152d234b70', 'Kepegawaian', 'M. Ridwan Farhan', 'farhan.jpg'),
('zaki', '202cb962ac59075b964b07152d234b70', 'Pimpinan', 'Zaki Nur Fatah', 'zaki.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
