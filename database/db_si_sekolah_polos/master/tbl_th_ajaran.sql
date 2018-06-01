-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2015 at 07:58 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_th_ajaran`
--

CREATE TABLE IF NOT EXISTS `tbl_th_ajaran` (
  `id_th_ajaran` varchar(5) NOT NULL,
  `tahun_ajaran` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_th_ajaran`
--

INSERT INTO `tbl_th_ajaran` (`id_th_ajaran`, `tahun_ajaran`) VALUES
('1011', '2010/2011'),
('1112', '2011/2012'),
('1213', '2012/2013'),
('1314', '2013/2014'),
('1415', '2014/2015'),
('1516', '2015/2016'),
('1617', '2016/2017');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_th_ajaran`
--
ALTER TABLE `tbl_th_ajaran`
  ADD PRIMARY KEY (`id_th_ajaran`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
