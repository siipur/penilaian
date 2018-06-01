-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2015 at 09:58 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_sekolah_abdino`
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
('2008082201', '332008082201', '166241ecad7f14bf9ea4bfdc43d5de15', 'RIA AMELIA', 'perempuan', 'Indramayu', '1988-12-08', 'Islam', 'Jl. Remaja No.16 Indramayu', '057766891311', '2015-12-24 02:17:30', '47488_ria_amel.jpg'),
('2010111301', '332010111301', '7a7f8714a9c5bef9f201b7562af3f6cb', 'INDAH RAHAYU', 'perempuan', 'Pemalang', '1990-01-12', 'Islam', 'Jl. Cempaka Pemalang', '089667788345', '2015-12-24 02:00:27', '30545_indah_r.jpg'),
('2010111302', '332010111302', '1d0b3ea68053a33930812bc1302062f7', 'RIKO FADILAH', 'laki-laki', 'Pekalongan', '1990-12-09', 'Islam', 'Jl. Gajah duduk No.76 Kota Pekalongan', '087790456166', '2015-12-24 02:21:10', '27230_rico.jpg'),
('2010111303', '332010111303', '4fed83ae372c12dbbc2e9538450aed69', 'MEGA WULANDARI', 'perempuan', 'Brebes', '1990-03-07', 'Islam', 'Jl. Rumah Masa Depan Desa Terlangu Brebes', '089239808808', '2015-12-25 09:43:16', '74307_mega.jpg'),
('2010111304', '332010111304', '9aa6ab44c1ab3d8966439db4e7ea3e4b', 'INDAH DWI P', 'perempuan', 'Jakarta', '1990-04-18', 'Khatolik', 'Kp. Jatinegara Jakarta Timur', '085768686868', '2015-12-24 02:49:54', '14315_indah_d.jpg'),
('2011070701', '332011070701', 'a2d480bf7ee30dea7737b9b8672d3507', 'AJI SETIA BUDI', 'perempuan', 'Tegal', '1987-08-24', 'Islam', 'Desa Sumur Panggang Kota Tegal', '085776634515', '2015-12-24 02:17:56', '31677_aji_sb.jpg'),
('2011070702', '332011070702', '4211baf8839213879897f64d052dafb6', 'ADI NUGROHO', 'perempuan', 'Purwokerto', '1989-03-12', 'Islam', 'Jl. Raya Selatan Purwokerto', '087776645319', '2015-12-24 02:18:15', '22323_adi_n.jpg'),
('2011070703', '332011070703', 'fa597ce24f511cab9b5f2ee4faad4fb0', 'EKA YULIA', 'perempuan', 'Solo', '1990-02-03', 'Islam', 'Jl. Gajah Mada No.17 Solo', '085667789195', '2015-12-24 02:27:53', '25247_eka.jpg'),
('2011070704', '332011070704', '86a8bb0e9b72593923bbe31a5df9ee6e', 'DODI RAHARJO', 'laki-laki', 'Tegal', '1985-09-23', 'Islam', 'Jl. Poso Kota Tegal', '089665743538', '2015-12-24 02:31:27', '25555_dodi_r.jpg'),
('2011070705', '332011070705', '366f1634f43f680b470964acc45072ca', 'AHMAD ANWAR', 'laki-laki', 'Cirebon', '1989-03-12', 'Islam', 'Jl. Udang haur Kota Cirebon', '089123778711', '2015-12-24 02:37:53', '97766_aa.jpg'),
('2012060601', '332012060601', '659c3a19e9676d272a3103eebd3d5e20', 'RATNA ANJALI', 'perempuan', 'Brebes', '1990-03-07', 'Islam', 'Desa Pasar Batang Brebes', '089912667612', '2015-12-24 02:14:04', '28759_retno_a.jpg'),
('2014021401', '332014021401', 'be6796dd5ff6ef15fb1e22ad2908ee87', 'ANGGA RIHADI', 'laki-laki', 'Bekasi', '1991-08-24', 'Islam', 'Perum Telaga Harapan Blok J2 Kab.Bekasi', '085437765143', '2015-12-24 02:34:47', '13839_angga.jpg'),
('2015070676', '332015070676', 'fdebbd1a2161064e9e5746c47d70399d', 'SONGHOPUR JR', 'laki-laki', 'CIKARANG', '1976-06-07', 'Islam', 'Perum Telaga Murni Blok E6/no.2 kec. Cikarang Barat Kab.Bekasi 17520', '087676767676', '2015-12-25 09:51:26', '8895_son.jpg'),
('2015120101', '332015120101', '0f3aa8fe96c130003261027e3ddfc963', 'DEWI ANJANI', 'perempuan', 'Malang', '1995-04-09', 'Kristen', 'Jl. Merak putih No. 3 Kota Malang', '085667189178', '2015-12-24 02:42:02', '87930_dewi_anjani.jpg'),
('2015120102', '332015120102', '7db35d70aa9016840fb31ce6c2b234b6', 'AYU DEWI', 'perempuan', 'Yogyakarta', '1995-02-18', 'Islam', 'Jl. Mawar No.7', '089758858548', '2015-12-24 02:45:48', '14263_ayu_d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE IF NOT EXISTS `tbl_jadwal` (
  `id_jadwal` int(5) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `id_matpel` varchar(15) NOT NULL,
  `id_kelas` varchar(15) NOT NULL,
  `id_paralel` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `nip`, `id_matpel`, `id_kelas`, `id_paralel`) VALUES
(6, '2008082201', 'KM002', 'KL001', 'P01'),
(7, '2010111302', 'KM003', 'KL001', 'P01'),
(8, '2010111303', 'KM001', 'KL001', 'P01'),
(9, '2011070701', 'KM005', 'KL001', 'P01'),
(10, '2010111304', 'KM004', 'KL001', 'P01'),
(11, '2011070702', 'KM001', 'KL001', 'P02'),
(12, '2011070703', 'KM002', 'KL001', 'P02'),
(13, '2011070704', 'KM003', 'KL001', 'P02'),
(14, '2011070705', 'KM004', 'KL001', 'P02'),
(15, '2012060601', 'KM005', 'KL001', 'P02'),
(16, '2014021401', 'KM001', 'KL001', 'P03'),
(17, '2015120101', 'KM002', 'KL001', 'P03'),
(18, '2015120102', 'KM003', 'KL001', 'P03'),
(19, '2010111303', 'KM004', 'KL001', 'P03'),
(20, '2008082201', 'KM005', 'KL001', 'P03'),
(21, '2008082201', 'KM001', 'KL002', 'P01'),
(22, '2010111301', 'KM002', 'KL002', 'P01'),
(23, '2011070701', 'KM003', 'KL002', 'P01'),
(24, '2012060601', 'KM004', 'KL002', 'P01'),
(25, '2015120102', 'KM005', 'KL002', 'P01'),
(26, '2011070703', 'KM001', 'KL002', 'P02'),
(27, '2011070704', 'KM002', 'KL002', 'P02'),
(28, '2011070705', 'KM003', 'KL002', 'P02'),
(29, '2012060601', 'KM004', 'KL002', 'P02'),
(30, '2015120102', 'KM004', 'KL002', 'P02'),
(31, '2015070676', 'KM005', 'KL002', 'P02'),
(32, '2011070702', 'KM001', 'KL002', 'P03'),
(33, '2010111303', 'KM002', 'KL002', 'P03'),
(34, '2011070705', 'KM003', 'KL002', 'P03'),
(35, '2011070704', 'KM004', 'KL002', 'P03'),
(36, '2010111304', 'KM005', 'KL002', 'P03'),
(37, '2015070676', 'KM001', 'KL003', 'P01'),
(38, '2015070676', 'KM001', 'KL003', 'P02'),
(39, '2015070676', 'KM001', 'KL003', 'P03'),
(40, '2015070676', 'KM002', 'KL003', 'P01'),
(41, '2015070676', 'KM002', 'KL003', 'P02'),
(42, '2015070676', 'KM002', 'KL003', 'P03'),
(43, '2015070676', 'KM003', 'KL003', 'P01'),
(44, '2015070676', 'KM002', 'KL003', 'P02'),
(45, '2015070676', 'KM003', 'KL003', 'P02'),
(46, '2015070676', 'KM003', 'KL003', 'P03'),
(47, '2015070676', 'KM004', 'KL003', 'P02'),
(48, '2015070676', 'KM003', 'KL003', 'P03'),
(49, '2015070676', 'KM004', 'KL003', 'P01'),
(50, '2015070676', 'KM004', 'KL003', 'P02'),
(51, '2015070676', 'KM004', 'KL003', 'P03'),
(52, '2015070676', 'KM005', 'KL003', 'P01'),
(53, '2015070676', 'KM005', 'KL003', 'P02'),
(54, '2015070676', 'KM005', 'KL003', 'P03');

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
('P03', 'C');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id_nilai`, `id_matpel`, `nis`, `id_th_ajaran`, `id_kelas`, `id_paralel`, `semester`, `nip`, `nilai`, `kategori_nilai`) VALUES
(1, 'KM001', '15163', '1213', 'KL003', 'P01', 1, '2015070676', 70, 'C'),
(2, 'KM001', '15196', '1213', 'KL003', 'P01', 1, '2015070676', 60, 'C'),
(3, 'KM001', '15197', '1213', 'KL003', 'P01', 1, '2015070676', 75, 'B'),
(4, 'KM001', '15198', '1213', 'KL003', 'P01', 1, '2015070676', 80, 'B'),
(5, 'KM001', '15199', '1213', 'KL003', 'P01', 1, '2015070676', 70, 'C'),
(6, 'KM001', '15200', '1213', 'KL003', 'P01', 1, '2015070676', 70, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ruangan`
--

CREATE TABLE IF NOT EXISTS `tbl_ruangan` (
  `id_ruangan` int(5) NOT NULL,
  `nis` varchar(15) NOT NULL,
  `id_kelas` varchar(15) NOT NULL,
  `id_paralel` varchar(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ruangan`
--

INSERT INTO `tbl_ruangan` (`id_ruangan`, `nis`, `id_kelas`, `id_paralel`) VALUES
(1, '15168', 'KL001', 'P01'),
(2, '15169', 'KL001', 'P01'),
(3, '15164', 'KL001', 'P01'),
(4, '15170', 'KL001', 'P01'),
(5, '15211', 'KL001', 'P01'),
(6, '15173', 'KL001', 'P01'),
(7, '15211', 'KL001', 'P02'),
(8, '15171', 'KL001', 'P02'),
(9, '15172', 'KL001', 'P02'),
(10, '15174', 'KL001', 'P02'),
(11, '15175', 'KL001', 'P02'),
(12, '15160', 'KL001', 'P03'),
(13, '15165', 'KL001', 'P02'),
(14, '15176', 'KL001', 'P03'),
(15, '15178', 'KL001', 'P03'),
(16, '15179', 'KL001', 'P03'),
(17, '15194', 'KL002', 'P01'),
(18, '15180', 'KL002', 'P01'),
(19, '15181', 'KL002', 'P01'),
(20, '15182', 'KL002', 'P01'),
(21, '15183', 'KL002', 'P01'),
(22, '15185', 'KL002', 'P01'),
(23, '15186', 'KL002', 'P02'),
(24, '15187', 'KL002', 'P02'),
(25, '15188', 'KL002', 'P02'),
(26, '15177', 'KL002', 'P02'),
(27, '15189', 'KL002', 'P02'),
(28, '15190', 'KL002', 'P03'),
(29, '15191', 'KL002', 'P03'),
(30, '15192', 'KL002', 'P03'),
(31, '15193', 'KL002', 'P03'),
(32, '15167', 'KL002', 'P03'),
(33, '15195', 'KL002', 'P03'),
(34, '15163', 'KL003', 'P01'),
(35, '15196', 'KL003', 'P01'),
(36, '15197', 'KL003', 'P01'),
(37, '15198', 'KL003', 'P01'),
(38, '15199', 'KL003', 'P01'),
(39, '15200', 'KL003', 'P01'),
(40, '15201', 'KL003', 'P02'),
(41, '15202', 'KL003', 'P02'),
(42, '15184', 'KL003', 'P02'),
(43, '15203', 'KL003', 'P02'),
(44, '15204', 'KL003', 'P02'),
(45, '15206', 'KL003', 'P02'),
(46, '15161', 'KL003', 'P02'),
(47, '15162', 'KL003', 'P03'),
(48, '15166', 'KL003', 'P03'),
(49, '15205', 'KL003', 'P03'),
(50, '15207', 'KL003', 'P03'),
(51, '15208', 'KL003', 'P03'),
(52, '15209', 'KL003', 'P03'),
(53, '15210', 'KL003', 'P03');

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
('15160', '7615160', '997440836d4c2346926d8aca03690f78', 'DIDI PURNOMO', 'laki-laki', 'Brebes', '1994-01-06', 'Islam', 'Jl. Rumah Masa Depan No.57 Kec.Brebes Kab.Brebes', '0819323616', 'Zaenal Saleh', '2015-12-25 22:20:15', '31567_my-avatar.jpg'),
('15161', '7615161', 'a16c4fcdf57c6ec5ed30e21c1ae0df74', 'SYIFA ARUM DEWANTI', 'perempuan', 'Jakarta', '1996-04-04', 'Islam', 'Desa Pagongan Tegal', '085774675676', 'Aris', '2015-12-25 22:21:46', '12142_syifa.jpg'),
('15162', '7615162', '957d6e060bd7c0125f9b60b1558c6257', 'TANISAH', 'perempuan', 'Brebes', '1994-04-24', 'Islam', 'Desa Pulosari dukmir Brebes', '087823436376', 'Doeng', '2015-12-25 01:23:07', '16018_tanisha.jpg'),
('15163', '7615163', '413333e31c0413282b0ce35f00e51d2c', 'RETNO Y', 'perempuan', 'Bekasi', '1995-04-07', 'Islam', 'Desa Karang asem kec. cikarang - Bekasi', '087789867575', 'Zunaidi', '2015-12-25 10:08:37', '16476_retno.jpg'),
('15164', '7615164', 'a7ef1270d275a7879bf01af8385dbd91', 'ADI SAPUTRA', 'laki-laki', 'Indramayu', '1996-06-05', 'Islam', 'Ds. Tanjungkerta kec. Kroya - Indramayu', '0894567346', 'Darpan', '2015-12-25 07:15:35', '56948_adi_s.jpg'),
('15165', '7615165', '90ecce8d5dad4396f681182cb470872c', 'ERWANTO', 'laki-laki', 'Bekasi', '1996-01-08', 'Islam', 'Ds. Banjarsari Kec. Tambelang - Kota Bekasi', '081213556443', 'Ripto', '2015-12-25 07:15:56', '99786_erwanto.jpg'),
('15166', '7615166', '1b8df7db8a335c9096e43973615601d8', 'TARSONO', 'laki-laki', 'Tegal', '1997-11-06', 'Islam', 'Ds. Telaga Asin Kec. Cikarang - Bekasi', '087656784666', 'Damun', '2015-12-25 06:49:47', '73266_tarsono.jpg'),
('15167', '7615167', '9e57f78cdc3a5f5052ff53af3df8e6eb', 'PECE', 'laki-laki', 'Jakarta', '1993-07-01', 'Kristen', 'Ds. Danau Indah Kec. Tambun - Bekasi', '08567384928', 'ALEX', '2015-12-25 06:56:14', '23446_pece.jpg'),
('15168', '7615168', 'a25067c6d17ee06552ad5e147ae25c49', 'ADANG', 'laki-laki', 'Karawang', '1996-01-06', 'Hindu', 'Ds. Mekarmukti Kec. Cikrang Utara - Bekasi', '087822412114', 'nyanyak', '2015-12-25 06:58:51', '76171_ADANG.jpg'),
('15169', '7615169', '0d906a38328b8e0b0d070c66e4719b13', 'ADI GUNAWAN', 'laki-laki', 'Cirebon', '1997-06-01', 'Islam', 'Ds. Taruma Jaya Kec. Tambun - Bekasi', '089764537654', 'Dirpan', '2015-12-25 07:11:56', '40408_ADIGUNAWAN.jpg'),
('15170', '7615170', '1352d2eb517ab94728c89acc30c5e141', 'BAMBANG SETIAWAN', 'laki-laki', 'Brebes', '1998-06-05', 'Islam', 'Ds. Mekarmukti Kec. Cikarang - Bekasi', '087645673564', 'jumadi', '2015-12-25 07:14:40', '15618_BAMBANG.jpg'),
('15171', '7615171', '126548d403b6c39820e63fed2cd54db3', 'CARDAWI', 'laki-laki', 'Indramayu', '1998-07-01', 'Islam', 'Ds. Bojong Kec. Cikarang Utara - Bekasi', '0897641872', 'Turnyep', '2015-12-25 07:51:16', '40112_CARDAWI.jpg'),
('15172', '7615172', '406c841592c4176af37a6fc376bef0b6', 'CECEP', 'laki-laki', 'Bekasi', '1997-06-15', 'Islam', 'Ds. Danau Serem Kec. Klari - Karawang', '088963527482', 'Kurma', '2015-12-25 07:53:07', '4171_cecep.jpg'),
('15173', '7615173', '30fdec73f395aaec13bbe56565be4353', 'CICIH', 'perempuan', 'Cikarang', '1994-04-07', 'Islam', 'Ds. Kandang Kec. Cikarang - Bekasi', '089367858765', 'Rana', '2015-12-25 07:55:07', '65887_cici.jpg'),
('15174', '7615174', 'darwin', 'DARWIN', 'laki-laki', 'Cirebon', '1997-01-01', 'Islam', 'Ds. Babakan Kec. Tambun - Bekasi', '08632843282', 'Urip', '2015-12-25 07:57:16', '60031_darwin.jpg'),
('15175', '7615175', 'f540b5a543ecdae19fa0876e80f10528', 'DENI', 'laki-laki', 'Cikarang', '0000-00-00', 'Islam', 'Ds. Mekarmukti Kec. Tambelang - Bekasi', '08237472828', 'Daryo', '2015-12-25 07:59:12', '64419_DENIKANDAR.jpg'),
('15176', '7615176', '3d76cc27d29c076b2c374df9ac79d6a8', 'FAIZA ALI M', 'laki-laki', 'Indramayu', '1998-01-07', 'Islam', 'Ds. Tanjung Kec. Kertajaya -Karawang', '08965364876', 'Turyana', '2015-12-25 08:00:57', '89093_faisa.jpg'),
('15177', '7615177', '46c5976b94ffe3389fe63bed55f9cc8f', 'M. FAIZAL', 'laki-laki', 'Bumiayu', '1999-09-12', 'Islam', 'Ds. Mekarmukti Kec. Cikarang - Bekasi', '087472658788', 'Darto', '2015-12-25 08:11:34', '58187_FAISAL.jpg'),
('15178', '7615178', '21278babe2d47009e94cc926bccd426a', 'FERI HARIYANTO', 'laki-laki', 'Indramayu', '1998-01-06', 'Islam', 'Ds. Tanjung Kec. Raharja - Karawang', '081213556443', 'Dirja', '2015-12-25 08:17:22', '82629_fery.jpg'),
('15179', '7615179', '922f33cdefb2792b0f0f72965146208f', 'FRANIKA', 'laki-laki', 'Bekasi', '1999-01-07', 'Islam', 'Ds. Bojong Kec. Babelan - Kota Bekasi', '089736472647', 'Irwan', '2015-12-25 08:22:23', '75463_FRANIKA.jpg'),
('15180', '7615180', 'hardius', 'HARDIUS', 'laki-laki', 'Cikarang', '1998-01-07', 'Kristen', 'Ds. Danau Indah Kec. Cikarang - Bekasi', '089763727627', 'Hildan', '2015-12-25 08:24:55', '74908_HARDIUS.jpg'),
('15181', '7615181', '0e87de457be3fffbc57408200d762452', 'HASAN UDIN', 'laki-laki', 'Karawang', '1999-01-06', 'Islam', 'Ds. Rawa Suren Kec. Cikarang - Bekasi', '08967273627', 'Kasja', '2015-12-25 08:26:43', '25735_hasan.jpg'),
('15182', '7615182', 'cd9dee20024dab5622a853bfb3f1bcfc', 'INDRA MULYAWAN', 'laki-laki', 'Majalengka', '1999-06-01', 'Islam', 'Ds. Karang Tengah Kec. Telaga Asih - Bekasi', '088747284929', 'Roni', '2015-12-25 08:31:02', '28778_indraC.jpg'),
('15183', '7615183', 'cd14d7eac0e4638dca6ef495702dd013', 'INO SETIAWAN', 'laki-laki', 'Bekasi', '1999-03-07', 'Islam', 'Ds. Rawa Suren Kec. Cikarang - Bekasi', '087654287649', 'Rindam', '2015-12-25 08:32:48', '74569_ino.jpg'),
('15184', '7615184', '1264dbec13e4c46523e30782ad31727f', 'SUPLI', 'laki-laki', 'Bekasi', '1997-03-07', 'Budha', 'Ds. karang Asih Kec. Cikarang - Bekasi', '0887863638281', 'Diryanto', '2015-12-25 08:35:17', '15109_SUPLI.jpg'),
('15185', '76151855', 'e38c9a9b9ca7607ce912ab7fe7106f3d', 'IRFAN HAKIM', 'laki-laki', 'Bekasi', '1996-07-07', 'Islam', 'Ds. Sumberjaya Kec. Tambun - Bekasi', '087653728548', 'Irya', '2015-12-25 08:37:02', '73583_irfan.jpg'),
('15186', '7615186', '5b3b3e573becfa5d7fac4916f8bc0fed', 'JAJAT', 'laki-laki', 'Indramayu', '1996-07-07', 'Islam', 'Ds. Mekarmukti Kec. Cikarang - bekasi', '086372872893', 'Warpan', '2015-12-25 08:38:45', '86145_jajat.jpg'),
('15187', '7615187', '956936879f66f5cf4ffbf3aefffd56ca', 'JEPRI JUNAIDI', 'laki-laki', 'Berebes', '1998-06-12', 'Islam', 'Ds. Karang Turi Kec. Tambelang - Bekasi', '08768827378', 'william', '2015-12-25 08:40:52', '83328_JEPRI.jpg'),
('15188', '7615188', '8a20d7c7b4ca634d08739cf614e6063c', 'JOHAN FIRMANSYAH', 'laki-laki', 'Bekasi', '1997-11-06', 'Islam', 'Ds. Karang Tengah Kec. Babelan - Kota Bekasi', '08963772947', 'Robert', '2015-12-25 08:42:31', '18890_johan.jpg'),
('15189', '7615189', 'a72805672a5c12f86c22eb67eb8bf7b8', 'MASEKO', 'laki-laki', 'Cikarang', '1996-08-15', 'Islam', 'Ds. Mekarmukti Kec. Cikarang - Bekasi', '08897276381', 'Rudianto', '2015-12-25 08:43:37', '71231_maseko.jpg'),
('15190', '7615190', 'b327c02ddad53e2fbb1c163884ae837f', 'MIRNA', 'perempuan', 'Indramayu', '1996-06-17', 'Islam', 'Ds. Turma Jaya Kec. Babelan', '08794562768', 'Erix', '2015-12-25 08:46:01', '44049_mirna.jpg'),
('15191', '7615191', 'c7174a563613088e59471c70d9d2c09e', 'MURUDIN UDIN', 'laki-laki', 'Jakarta', '1998-12-30', 'Islam', 'Ds. Buek Kec. Tambun - Bekasi', '089962737737', 'Reno', '2015-12-25 08:47:31', '10897_munur.jpg'),
('15192', '7615192', '182340c28a4350468fce307ff1bab29e', 'NASIHIN', 'laki-laki', 'Berebes', '1997-07-30', 'Islam', 'Ds. Buana Kec. Kroya - Karawang', '087822456799', 'Indra', '2015-12-25 08:49:43', '99850_nasikin.jpg'),
('15193', '7615193', '25e646de1d14a0538e631e7f3605eb12', 'NESIH WINGI', 'perempuan', 'Indramayu', '1999-10-07', 'Islam', 'Ds. Buek Kec. Tambun - Bekasi', '0823784928438', 'Indah', '2015-12-25 08:52:12', '35437_nesih.jpg'),
('15194', '7615194', '3b93d91c6ca4990fffd61e37d9235acb', 'FRISKA', 'laki-laki', 'Indramayu', '1998-07-25', 'Islam', 'Ds. Mekarmukti Kec. Cikarang - Bekasi', '087528398529', 'Ruslan', '2015-12-25 08:54:00', '33349_FRISKA.jpg'),
('15195', '7615195', '59b109c700b500daa9ef3a6769bc8c6f', 'REKO RIKI', 'laki-laki', 'Cikarang', '1999-07-12', 'Islam', 'Ds. Sumber Jaya Kec. Tambun -  Bekasi', '089763768868', 'yugo', '2015-12-25 08:55:41', '6558_reko.jpg'),
('15196', '7615196', '973cf0f1e5cb6a86bcc5a188d698a7bc', 'REZKA SEGARA', 'laki-laki', 'Bekasi', '1998-07-17', 'Islam', 'Ds. Mungkur Kec. Cikarang - Bekasi', '087327638274', 'Kusja', '2015-12-25 08:59:26', '97781_RESZA.jpg'),
('15197', '7615197', 'cdeb62ca10f63c94f575fa8f7f7a2b1f', 'RIKI HARANTA', 'laki-laki', 'Cikarang', '1999-11-12', 'Hindu', 'Ds. Pasir Gombong Kec. Cikarang - Bekasi', '0876372839294', 'turya', '2015-12-25 09:00:55', '94281_riki.jpg'),
('15198', '7615198', 'd8e1d5073bde1c96433e0463f000bb35', 'RONI SUGANDA', 'laki-laki', 'Cirebon', '0000-00-00', 'Islam', 'Ds. Buek Kec. Tambun - Bekasi', '087537637288', 'Tarya', '2015-12-25 09:02:05', '17428_roni.jpg'),
('15199', '7615199', '21928eda50b8057eb6708e3c4d52faed', 'RUDI HARIONO', 'laki-laki', 'Bekasi', '1998-12-29', 'Islam', 'Ds. Bojong Kec. Babelan - Kota Bekasi', '089997377737', 'Yono', '2015-12-25 09:03:34', '7208_RUDI.jpg'),
('15200', '7615200', 'b1370fcd515bccf46591ed09a543d21b', 'RUSLANI', 'laki-laki', 'Cikarang', '1997-10-27', 'Islam', 'Ds. Tanah Baru Kec. Cikarang - Bekasi', '08977777636', 'Ratno', '2015-12-25 09:06:12', '57748_ruslan.jpg'),
('15201', '7615201', 'siti', 'SITI AISYAH', 'perempuan', 'Indramayu', '1997-06-04', 'Islam', 'Ds. Mekarmukti Kec. Cikarang', '089747383847', 'Dirya', '2015-12-25 09:07:55', '51452_siti.jpg'),
('15202', '7615202', 'e65d4c415d8f7f41751b1c0415f03eae', 'SUKARDI', 'laki-laki', 'Indramayu', '1999-06-17', 'Islam', 'Ds. Buek Kec. Tambun - Bekasi', '087864838744', 'Rianto', '2015-12-25 09:09:36', '52261_sukardi.jpg'),
('15203', '7615203', '614416c557d290c3e81571330d44acc6', 'SURASA', 'perempuan', 'Bekasi', '1996-11-20', 'Islam', 'Ds. Tanah Baru Kec CikArang - Bekasi', '087898775677', 'Surya', '2015-12-25 09:11:08', '52563_surasa.jpg'),
('15204', '7615204', '80ef6a7e213de4ec82a410e1ee31b422', 'SURATNO', 'laki-laki', 'Cikarang', '1999-12-17', 'Islam', 'Ds. Mekarmukti Kec. Cikarang - Bekasi', '08784328473', 'Wildan', '2015-12-25 09:12:56', '88848_suratno.jpg'),
('15205', '7615205', '5ea763996272c7979378368f88a31725', 'TOHOR', 'laki-laki', 'Bekasi', '1999-11-23', 'Budha', 'Ds. Kompas Kec. Tambun - Bekasi', '085678589237', 'Udin', '2015-12-25 09:17:35', '56576_tohor.jpg'),
('15206', '7615206', '99927ed3f11c0f361bd4c0c7d61d246f', 'SUTRISNO', 'laki-laki', 'Cikarang', '1998-06-12', 'Islam', 'Ds. Telaga Asih Kec. Cikarang - Bekasi', '0876346582938', 'Trisno', '2015-12-25 09:21:20', '24829_tris.jpg'),
('15207', '7615207', 'b5e93461a6b1f9f5f6542740442d2233', 'TURYANA', 'laki-laki', 'Subang', '1999-08-23', 'Islam', 'Ds. Karang Tengah Kec. Cikarang', '08567382849', 'Ojan', '2015-12-25 09:22:34', '54592_turyana.jpg'),
('15208', '7615208', '3ce3bd302af473f2307962dd07653315', 'UMAR', 'laki-laki', 'Indramayu', '1998-02-23', 'Islam', 'Ds. Buek Kec. Tambun - Bekasi', '08672384899', 'Juli', '2015-12-25 09:23:29', '99237_umar.jpg'),
('15209', '7615209', '60dfd04289ecf518443e02289a0cd633', 'WANTO', 'laki-laki', 'Brebes', '1999-11-23', 'Islam', 'Ds. Singosari Kec. Cikarang - Bekasi', '087834628372', 'Tria', '2015-12-25 09:25:02', '20138_wanto.jpg'),
('15210', '7615210', '84272201880d8473e169b46ab0a50719', 'WENDI', 'laki-laki', 'Cikarang', '1996-12-30', 'Islam', 'Ds. Mekarmukti Kec. Cikarang - Bekasi', '082472983922', 'Sarya', '2015-12-25 09:26:20', '59338_wendi.jpg'),
('15211', '7615211', '36ac2b589744fa94bfe694b604971bf0', 'CANDRA', 'perempuan', 'Bekasi', '1995-03-03', 'Islam', 'Desa Karang asem kec. cikarang utara - Bekasi', '08788780098', 'Waspan', '2015-12-25 10:11:30', '82510_candra.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_th_ajaran`
--

CREATE TABLE IF NOT EXISTS `tbl_th_ajaran` (
  `id_th_ajaran` varchar(15) NOT NULL,
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
('1516', '2015/2016');

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
('abdullah', '24dc11294127a03878fb6532d305184e', 'AAB', 'aab.cimada@gmail.com', '085743542542', 'user', 'N'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin_bae', 'admin@omah.com', '02107676212', 'user', 'N'),
('didi_p', '9e0dca51bfdcf4d14aa09ac9e9be2f89', 'didi purnomo', 'ghopurnomo@gmail.com', '089619323616', 'user', 'N'),
('kartono', '48f564572602de61402e864d5a326448', 'kartono PA', 'uchihasenju@gmail.com', '087864747667777', 'user', 'N');

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
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `fkjanip` (`nip`),
  ADD KEY `fkjamat` (`id_matpel`),
  ADD KEY `fkjakepal` (`id_paralel`);

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
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `fkwakelas` (`id_matpel`),
  ADD KEY `fknikel` (`id_kelas`),
  ADD KEY `fkninis` (`nis`),
  ADD KEY `fkniparalel` (`id_paralel`),
  ADD KEY `fkninip` (`nip`),
  ADD KEY `fknitah` (`id_th_ajaran`);

--
-- Indexes for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD PRIMARY KEY (`id_ruangan`),
  ADD KEY `fkrusis` (`nis`),
  ADD KEY `fkrukel` (`id_kelas`),
  ADD KEY `fkrukepal` (`id_paralel`);

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
  ADD PRIMARY KEY (`id_wali_kelas`),
  ADD KEY `fkwatah` (`id_th_ajaran`),
  ADD KEY `fkwakel` (`id_kelas`),
  ADD KEY `fkwakepal` (`id_paralel`),
  ADD KEY `fkwagu` (`nip`);

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
  MODIFY `id_jadwal` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  MODIFY `id_ruangan` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tbl_wali_kelas`
--
ALTER TABLE `tbl_wali_kelas`
  MODIFY `id_wali_kelas` int(15) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD CONSTRAINT `fkjakepal` FOREIGN KEY (`id_paralel`) REFERENCES `tbl_kelas_paralel` (`id_paralel`),
  ADD CONSTRAINT `fkjamat` FOREIGN KEY (`id_matpel`) REFERENCES `tbl_matpel` (`id_matpel`),
  ADD CONSTRAINT `fkjanip` FOREIGN KEY (`nip`) REFERENCES `tbl_guru` (`nip`);

--
-- Constraints for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD CONSTRAINT `fknikel` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`),
  ADD CONSTRAINT `fkninip` FOREIGN KEY (`nip`) REFERENCES `tbl_guru` (`nip`),
  ADD CONSTRAINT `fkninis` FOREIGN KEY (`nis`) REFERENCES `tbl_siswa` (`nis`),
  ADD CONSTRAINT `fknipar` FOREIGN KEY (`id_paralel`) REFERENCES `tbl_kelas_paralel` (`id_paralel`),
  ADD CONSTRAINT `fkniparalel` FOREIGN KEY (`id_paralel`) REFERENCES `tbl_kelas_paralel` (`id_paralel`),
  ADD CONSTRAINT `fknitah` FOREIGN KEY (`id_th_ajaran`) REFERENCES `tbl_th_ajaran` (`id_th_ajaran`),
  ADD CONSTRAINT `fkwakelas` FOREIGN KEY (`id_matpel`) REFERENCES `tbl_matpel` (`id_matpel`);

--
-- Constraints for table `tbl_ruangan`
--
ALTER TABLE `tbl_ruangan`
  ADD CONSTRAINT `fkrukel` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`),
  ADD CONSTRAINT `fkrukepal` FOREIGN KEY (`id_paralel`) REFERENCES `tbl_kelas_paralel` (`id_paralel`),
  ADD CONSTRAINT `fkrusis` FOREIGN KEY (`nis`) REFERENCES `tbl_siswa` (`nis`);

--
-- Constraints for table `tbl_wali_kelas`
--
ALTER TABLE `tbl_wali_kelas`
  ADD CONSTRAINT `fkwagu` FOREIGN KEY (`nip`) REFERENCES `tbl_guru` (`nip`),
  ADD CONSTRAINT `fkwakel` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`),
  ADD CONSTRAINT `fkwakepal` FOREIGN KEY (`id_paralel`) REFERENCES `tbl_kelas_paralel` (`id_paralel`),
  ADD CONSTRAINT `fkwatah` FOREIGN KEY (`id_th_ajaran`) REFERENCES `tbl_th_ajaran` (`id_th_ajaran`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
