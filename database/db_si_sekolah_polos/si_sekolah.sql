-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2015 at 10:50 AM
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
-- Table structure for table `tbl_guru`
--

CREATE TABLE IF NOT EXISTS `tbl_guru` (
  `nip` varchar(15) NOT NULL,
  `nuptk` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_guru` varchar(35) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `tgl_edit` datetime NOT NULL,
  `img_guru` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`nip`, `nuptk`, `password`, `nama_guru`, `jenis_kelamin`, `tmp_lahir`, `tgl_lahir`, `agama`, `alamat`, `telepon`, `tgl_edit`, `img_guru`) VALUES
('1111', '87878768', '14d2d4119982cd6c68a566e523cb16ae', 'kartono', 'laki-laki', '', '0000-00-00', 'Islam', '', '', '2015-12-12 00:00:00', '94155_my-avatar.jpg'),
('1234567', '12345678', '236307f059eaa819a61e23e7bda6e435', 'abdullah bae ah coba', 'laki-laki', 'brebes cyty', '2015-03-04', 'Kristen', 'terlangu dukuh', '08574534578', '2015-12-06 00:00:00', '54397_Penguins.jpg'),
('19671201', '19671201005', '498d3c6bfa033f6dc1be4fcc3c370aa7', 'Yudhi   S.Kom', 'laki-laki', 'Cikarang', '1947-01-06', '', 'Desa Telaga Asih Kec.Cikarang Kab.Bekasi', '089619323616', '2015-12-12 00:00:00', '46493_20140724_134010.jpg'),
('199709230001', '199709230001005', 'd0c5563b2d314c3d94959b73c30256a3', 'tes123', 'perempuan', 'brebes', '2015-11-12', 'Islam', 'brebes', '0797878789798', '2015-12-01 00:00:00', '75286_springff.jpg'),
('64764798', '758587', 'd307876e38f3d850b4eea7233d56dbdf', 'aaa', 'laki-laki', 'brebes', '0000-00-00', 'Islam', 'gkj', '', '2015-12-06 00:00:00', '36642_pirates.png'),
('765130', '765130-001', '9e0dca51bfdcf4d14aa09ac9e9be2f89', 'Didi Purnomo', 'laki-laki', 'brebes', '1994-01-06', 'Islam', 'brebes', '96969696986896', '2015-12-10 00:00:00', '26837_mba_dayah.jpg'),
('7777', '554757', 'd79c8788088c2193f0244d8f1f36d2db', 'doeng', 'laki-laki', '', '0000-00-00', 'Islam', '', '', '2015-12-12 00:00:00', '40838_');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE IF NOT EXISTS `tbl_jadwal` (
  `id_jadwal` int(5) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `id_matpel` varchar(15) NOT NULL,
  `id_paralel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('KL001', 'VII', '39'),
('KL002', 'VIII', '35'),
('KL003', 'IX', '35');

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
('P01', 'A'),
('P02', 'B'),
('P03', 'C'),
('P04', 'D');

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
('KM001', 'MTK', 'logika'),
('KM002', 'Bahasa Indonesia', 'bahasa'),
('KM003', 'Bahasa Inggris', 'Bahasa'),
('KM004', 'IPS', 'ilmu sosial'),
('KM005', 'IPA', 'ilmu alam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE IF NOT EXISTS `tbl_nilai` (
  `id_nilai` int(10) NOT NULL,
  `id_matpel` varchar(15) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `id_th_ajaran` varchar(10) NOT NULL,
  `id_kelas` varchar(15) NOT NULL,
  `id_paralel` varchar(15) NOT NULL,
  `semester` int(5) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nilai` int(3) NOT NULL,
  `kategori_nilai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE IF NOT EXISTS `tbl_ruangan` (
  `id_ruangan` int(5) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `id_kelas` varchar(15) NOT NULL,
  `id_paralel` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE IF NOT EXISTS `tbl_siswa` (
  `nis` varchar(15) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_murid` varchar(35) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tmp_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `ortu_nama` varchar(35) NOT NULL,
  `tgl_edit` datetime NOT NULL,
  `img_siswa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`nis`, `nisn`, `password`, `nama_murid`, `jenis_kelamin`, `tmp_lahir`, `tgl_lahir`, `agama`, `alamat`, `telepon`, `ortu_nama`, `tgl_edit`, `img_siswa`) VALUES
('151601', '15160-76001', '013f0f67779f3b1686c604db150d12ea', 'Didi Purnomo', 'laki-laki', 'Brebes city', '1994-01-06', 'Islam', 'Desa Terlangu Kec.Brebes Kab.Brebes berhias', '089619323616', 'Zaenal Saleh', '2015-12-09 00:00:00', '77685_my-avatar.jpg'),
('151612', '151601234', '013f0f67779f3b1686c604db150d12ea', 'Syifa Arum Dewanti tengik', 'perempuan', 'Tegal city', '2015-12-18', 'Islam', 'Desa Bojong Kec.Talang Kab.Tegal gede', '08571032367', 'Aris So', '2015-12-01 00:00:00', '23791_Penguins.jpg'),
('56557', '67476765', '6feadbd8f05e7aaf783800eaf8340e0e', 'sisi', 'perempuan', 'skcnscs', '1994-08-01', 'Kristen', 'jhvjhvjhv', '758755', 'hjvjhvjh', '2015-12-05 00:00:00', '7806_20140917_072226.jpg'),
('767676', '76767', 'e4c58ff6259e9731a60488c2bea1e167', 'siswa pa', 'laki-laki', 'alas', '2015-12-16', 'Islam', 'alas', '9798326598232', 'kartono', '2015-12-06 00:00:00', '43161_pirates.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wali_kelas`
--

CREATE TABLE IF NOT EXISTS `tbl_wali_kelas` (
  `id_wali_kelas` int(15) NOT NULL,
  `id_th_ajaran` varchar(5) NOT NULL,
  `id_kelas` varchar(15) NOT NULL,
  `id_paralel` varchar(15) NOT NULL,
  `nip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `level` varchar(20) NOT NULL,
  `blokir` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`) VALUES
('aab', 'e62595ee98b585153dac87ce1ab69c3c', 'abdullah aja', 'aab.cimada@gmail.com', '085743542542', 'user', 'N'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin_bae', 'admin@omah.com', '0210767621', 'user', 'Y'),
('didi', '9e0dca51bfdcf4d14aa09ac9e9be2f89', 'didi purnomo', 'ghopurnomo@gmail.com', '089619323616', 'user', 'N'),
('kartono', '14d2d4119982cd6c68a566e523cb16ae', 'kartono gemblung', 'uchihasenju@gmail.com', '087864747667777', 'user', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

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
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tbl_wali_kelas`
--
ALTER TABLE `tbl_wali_kelas`
  ADD PRIMARY KEY (`id_wali_kelas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id_jadwal` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruangan` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_wali_kelas`
--
ALTER TABLE `tbl_wali_kelas`
  MODIFY `id_wali_kelas` int(15) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
