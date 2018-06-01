-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2015 at 11:34 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siak_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE IF NOT EXISTS `tbl_guru` (
  `nip` varchar(15) NOT NULL,
  `nuptk` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_guru` varchar(35) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `tgl_edit` date NOT NULL,
  `img_guru` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`nip`, `nuptk`, `password`, `nama_guru`, `jenis_kelamin`, `tmp_lahir`, `tgl_lahir`, `agama`, `alamat`, `telepon`, `tgl_edit`, `img_guru`) VALUES
('123456', '1234567', '236307f059eaa819a61e23e7bda6e435', 'abdullah bae ah', 'Laki-laki', 'brebes cyty', '2015-03-04', 'Kristen', 'terlangu dukuh', '08574534578', '2015-12-03', '54397_Penguins.jpg'),
('19671201', '19671201005', '92afb435ceb16630e9827f54330c59c9', 'Yudhi  io S.Kom', 'Laki-laki', 'Cikarang', '1947-01-06', '', 'Desa Telaga Asih Kec.Cikarang Kab.Bekasi', '089619323616', '2015-12-01', '46493_20140724_134010.jpg'),
('199709230001', '199709230001005', 'd0c5563b2d314c3d94959b73c30256a3', 'tes123', 'Perempuan', 'brebes', '2015-11-12', 'Islam', 'brebes', '0797878789798', '2015-12-01', '75286_springff.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE IF NOT EXISTS `tbl_kelas` (
  `id_kelas` varchar(15) NOT NULL,
  `tingkat_kelas` varchar(15) NOT NULL,
  `kapasitas` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `tingkat_kelas`, `kapasitas`) VALUES
('k1', 'X', '30'),
('k2', 'XI', '30'),
('k3', 'XI', '30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas_paralel`
--

CREATE TABLE IF NOT EXISTS `tbl_kelas_paralel` (
  `id_paralel` varchar(15) NOT NULL,
  `nama_paralel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kelas_paralel`
--

INSERT INTO `tbl_kelas_paralel` (`id_paralel`, `nama_paralel`) VALUES
('p1', 'A'),
('p2', 'B'),
('p3', 'C'),
('p4', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matpel`
--

CREATE TABLE IF NOT EXISTS `tbl_matpel` (
  `id_matpel` varchar(15) NOT NULL,
  `nama_matpel` varchar(30) NOT NULL,
  `jenis_matpel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_matpel`
--

INSERT INTO `tbl_matpel` (`id_matpel`, `nama_matpel`, `jenis_matpel`) VALUES
('m01', 'IPA', 'ilmu alam'),
('m02', 'IPS', 'ilmu sosial'),
('m03', 'MTK', 'logika'),
('m04', 'Bahasa Indonesia', 'bahasa'),
('m05', 'Bahasa Ingrris', 'bahasa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matpel_kelas`
--

CREATE TABLE IF NOT EXISTS `tbl_matpel_kelas` (
  `id_matpel_kelas` varchar(15) NOT NULL,
  `id_kelas` varchar(15) NOT NULL,
  `id_matpel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_matpel_kelas`
--

INSERT INTO `tbl_matpel_kelas` (`id_matpel_kelas`, `id_kelas`, `id_matpel`) VALUES
('mk1', 'k1', 'm03'),
('mk2', 'k2', 'm01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE IF NOT EXISTS `tbl_nilai` (
  `id_nilai` varchar(15) NOT NULL,
  `id_matpel` varchar(15) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `id_th_ajaran` int(5) NOT NULL,
  `id_kelas` varchar(15) NOT NULL,
  `id_paralel` varchar(15) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `jenis_nilai` varchar(30) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_matpel`, `nis`, `id_th_ajaran`, `id_kelas`, `id_paralel`, `semester`, `jenis_nilai`, `nilai`) VALUES
('n1', 'm03', '15160', 12, 'k2', 'p1', '4', 'A', 99),
('n2', 'm01', '15161', 13, 'k1', 'p3', '2', 'C', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE IF NOT EXISTS `tbl_siswa` (
  `nis` varchar(15) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_murid` varchar(35) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `ortu_nama` varchar(35) NOT NULL,
  `tgl_edit` date NOT NULL,
  `img_siswa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nisn`, `password`, `nama_murid`, `jenis_kelamin`, `tmp_lahir`, `tgl_lahir`, `agama`, `alamat`, `telepon`, `ortu_nama`, `tgl_edit`, `img_siswa`) VALUES
('15160', '15160620012', '013f0f67779f3b1686c604db150d12ea', 'Didi Purnomo jr', 'Laki-laki', 'Brebes city', '1994-01-06', 'Islam', 'Desa Terlangu Kec.Brebes Kab.Brebes berhias', '089619323616', 'Zaenal Saleh', '2015-12-01', '29904_Penguins.jpg'),
('15161', '151601234', '013f0f67779f3b1686c604db150d12ea', 'Syifa Arum Dewanti tengik', 'Perempuan', 'Tegal city', '2015-12-18', 'Islam', 'Desa Bojong Kec.Talang Kab.Tegal gede', '08571032367', 'Aris So', '2015-12-01', '23791_Penguins.jpg'),
('56557', '67476765', '6feadbd8f05e7aaf783800eaf8340e0e', 'sisi', 'Perempuan', 'skcnscs', '0000-00-00', 'Kristen', 'jhvjhvjhv', '758755', 'hjvjhvjh', '2015-11-30', '7806_20140917_072226.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_th_ajaran`
--

CREATE TABLE IF NOT EXISTS `tbl_th_ajaran` (
  `id_th_ajaran` int(5) NOT NULL,
  `tahun_ajaran` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_th_ajaran`
--

INSERT INTO `tbl_th_ajaran` (`id_th_ajaran`, `tahun_ajaran`) VALUES
(4, '2004'),
(10, '2010'),
(11, '2011'),
(12, '2012'),
(13, '2013'),
(14, '2014'),
(15, '2015'),
(16, '2016');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wali_kelas`
--

CREATE TABLE IF NOT EXISTS `tbl_wali_kelas` (
  `id_guru_kelas` varchar(15) NOT NULL,
  `id_th_ajaran` int(5) NOT NULL,
  `id_kelas` varchar(15) NOT NULL,
  `id_paralel` varchar(15) NOT NULL,
  `nip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wali_kelas`
--

INSERT INTO `tbl_wali_kelas` (`id_guru_kelas`, `id_th_ajaran`, `id_kelas`, `id_paralel`, `nip`) VALUES
('gk1', 12, 'k2', 'p1', '19671202'),
('gk2', 13, 'k1', 'p3', '19671201');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`) VALUES
('kartono', '14d2d4119982cd6c68a566e523cb16ae', 'kartono gemblung', 'uchihasenju@gmail.com', '087864747667777', 'user', 'N'),
('abdullah', 'e2ba65061db310551b6746e484ace254', 'abdullah aja', 'aab.cimada@gmail.com', '085743542542', 'user', 'N'),
('didi', '9e0dca51bfdcf4d14aa09ac9e9be2f89', 'didi purnomo', 'ghopurnomo@gmail.com', '089619323616', 'user', 'N'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin_bae', 'admin@omah.com', '0210767621', 'user', 'Y'),
('tessiiiiiiiiiiiiiiiiilit', '9613ed2252b4fc94dcdb934b305280b8', 'sfsfsf', 'sfsfsa', 'ffsfsaf', 'user', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_kelas_paralel`
--
ALTER TABLE `tbl_kelas_paralel`
  ADD PRIMARY KEY (`id_paralel`);

--
-- Indexes for table `tbl_matpel`
--
ALTER TABLE `tbl_matpel`
  ADD PRIMARY KEY (`id_matpel`);

--
-- Indexes for table `tbl_matpel_kelas`
--
ALTER TABLE `tbl_matpel_kelas`
  ADD PRIMARY KEY (`id_matpel_kelas`),
  ADD KEY `fkmatkelas` (`id_kelas`),
  ADD KEY `fkmatpel` (`id_matpel`);

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `fkniajar` (`id_th_ajaran`),
  ADD KEY `fknikelas` (`id_kelas`),
  ADD KEY `fkniparalel` (`id_paralel`),
  ADD KEY `fknimatpel` (`id_matpel`),
  ADD KEY `fknisiswa` (`nis`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_th_ajaran`
--
ALTER TABLE `tbl_th_ajaran`
  ADD PRIMARY KEY (`id_th_ajaran`);

--
-- Indexes for table `tbl_wali_kelas`
--
ALTER TABLE `tbl_wali_kelas`
  ADD PRIMARY KEY (`id_guru_kelas`),
  ADD KEY `fkwagu` (`nip`),
  ADD KEY `fkwatah` (`id_th_ajaran`),
  ADD KEY `fkwakepal` (`id_paralel`),
  ADD KEY `fkwakelas` (`id_kelas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_matpel_kelas`
--
ALTER TABLE `tbl_matpel_kelas`
  ADD CONSTRAINT `fkmatkelas` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`),
  ADD CONSTRAINT `fkmatpel` FOREIGN KEY (`id_matpel`) REFERENCES `tbl_matpel` (`id_matpel`);

--
-- Constraints for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD CONSTRAINT `fkniajar` FOREIGN KEY (`id_th_ajaran`) REFERENCES `tbl_th_ajaran` (`id_th_ajaran`),
  ADD CONSTRAINT `fknikelas` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`),
  ADD CONSTRAINT `fknimatpel` FOREIGN KEY (`id_matpel`) REFERENCES `tbl_matpel` (`id_matpel`),
  ADD CONSTRAINT `fkniparalel` FOREIGN KEY (`id_paralel`) REFERENCES `tbl_kelas_paralel` (`id_paralel`),
  ADD CONSTRAINT `fknisiswa` FOREIGN KEY (`nis`) REFERENCES `tbl_siswa` (`nis`);

--
-- Constraints for table `tbl_wali_kelas`
--
ALTER TABLE `tbl_wali_kelas`
  ADD CONSTRAINT `fkwagu` FOREIGN KEY (`nip`) REFERENCES `tbl_guru` (`nip`),
  ADD CONSTRAINT `fkwakelas` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`),
  ADD CONSTRAINT `fkwakepal` FOREIGN KEY (`id_paralel`) REFERENCES `tbl_kelas_paralel` (`id_paralel`),
  ADD CONSTRAINT `fkwatah` FOREIGN KEY (`id_th_ajaran`) REFERENCES `tbl_th_ajaran` (`id_th_ajaran`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
