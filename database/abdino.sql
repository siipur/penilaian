--create DATABASE
CREATE DATABASE siak_sekolah;

-- ================================================================
-- ## CREATE TABLE ##

-- ------------------------------------------
-- Table structure for table `tbl_siswa` --

CREATE TABLE IF NOT EXISTS  tbl_siswa
(
nis VARCHAR(15) NOT NULL,
nisn VARCHAR(15) NOT NULL,
password VARCHAR(50) NOT NULL,
nama_murid VARCHAR(35) NOT NULL ,
jenis_kelamin VARCHAR(15) NOT NULL,
tmp_lahir VARCHAR(20) NOT NULL,
tgl_lahir DATE NOT NULL,
agama VARCHAR(20) NOT NULL,
alamat VARCHAR(100) NOT NULL,
telepon VARCHAR(15) NOT NULL,
ortu_nama VARCHAR(35)NOT NULL,
tanggal_edit DATE NOT NULL,
img_siswa VARCHAR(100) NOT NULL,
PRIMARY KEY(nis)
);

-- ------------------------------------------
-- Table structure for table `tbl_guru` --

CREATE TABLE IF NOT EXISTS tbl_guru
(
nip VARCHAR(15) NOT NULL,
nuptk VARCHAR(15) NOT NULL,
password VARCHAR(50) NOT NULL,
nama_guru VARCHAR(35) NOT NULL,
jenis_kelamin VARCHAR(15) NOT NULL,
tmp_lahir VARCHAR(20) NOT NULL,
tgl_lahir DATE NOT NULL,
agama VARCHAR(20) NOT NULL,
alamat VARCHAR(100) NOT NULL,
telepon VARCHAR(15) NOT NULL,
tanggal_edit DATE NOT NULL,
img_guru VARCHAR(100) NOT NULL,
PRIMARY KEY(nip)
);

-- ---------------------------------------------
-- Table structure for table `tbl_th_ajaran` --

CREATE TABLE IF NOT EXISTS tbl_th_ajaran
(
id_th_ajaran INT(5) NOT NULL,
tahun_ajaran VARCHAR(5) NOT NULL,
PRIMARY KEY(id_th_ajaran)
);

-- -----------------------------------------
-- Table structure for table `tbl_kelas` --

CREATE TABLE IF NOT EXISTS tbl_kelas
(
id_kelas VARCHAR(15) NOT NULL,
tingkat_kelas VARCHAR(15) NOT NULL,
kapasitas VARCHAR(15) NOT NULL,
PRIMARY KEY(id_kelas)
);

-- ------------------------------------------------
-- Table structure for table `tbl_kelas_paralel --

CREATE TABLE IF NOT EXISTS tbl_kelas_paralel
(
id_paralel VARCHAR(15) NOT NULL,
nama_paralel VARCHAR(25) NOT NULL,
PRIMARY KEY(id_paralel)
);

-- ----------------------------------------
-- Table structure for table `tbl_mapel --

CREATE TABLE IF NOT EXISTS tbl_matpel
(
id_matpel VARCHAR(15) NOT NULL,
nama_matpel VARCHAR(30) NOT NULL,
jenis_matpel VARCHAR(20) NOT NULL,
PRIMARY KEY(id_matpel)
);

-- ----------------------------------------
-- Table structure for table `tbl_nilai --

CREATE TABLE IF NOT EXISTS tbl_nilai
(
id_nilai VARCHAR(15) NOT NULL,
id_matpel VARCHAR(15) NOT NULL,
nis VARCHAR(15) NOT NULL,
id_th_ajaran INT(5) NOT NULL,
id_kelas VARCHAR(15) NOT NULL,
id_paralel VARCHAR(15) NOT NULL,
semester VARCHAR(15) NOT NULL,
jenis_nilai VARCHAR(30) NOT NULL,
nilai INT(3) NOT NULL,
PRIMARY KEY(id_nilai)
);

-- ---------------------------------------------
-- Table structure for table `tbl_wali_kelas --

CREATE TABLE IF NOT EXISTS tbl_wali_kelas
(
id_guru_kelas VARCHAR(15) NOT NULL,
id_th_ajaran INT(5) NOT NULL,
id_kelas VARCHAR(15) NOT NULL,
id_paralel VARCHAR(15) NOT NULL,
nip VARCHAR(15) NOT NULL,
PRIMARY KEY(id_guru_kelas)
);

-- ------------------------------------------------
-- Table structure for table `tbl_matpel_kelas --

CREATE TABLE IF NOT EXISTS tbl_matpel_kelas
(
id_matpel_kelas VARCHAR(15) NOT NULL,
id_kelas VARCHAR(15) NOT NULL,
id_matpel VARCHAR(15) NOT NULL,
PRIMARY KEY(id_matpel_kelas)
);

-- --------------------------------------------------------
-- Table structure for table `users`


CREATE TABLE IF NOT EXISTS users
(
id_user VARCHAR(50) COLLATE latin1_general_ci NOT NULL,
password VARCHAR(50) COLLATE latin1_general_ci NOT NULL,
nama_lengkap VARCHAR(100) COLLATE latin1_general_ci NOT NULL,
email VARCHAR(100) COLLATE latin1_general_ci NOT NULL,
no_telp VARCHAR(20) COLLATE latin1_general_ci NOT NULL,
level VARCHAR(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
blokir ENUM('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
PRIMARY KEY (id_user)
) ENGINE=MYISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


-- ================================================================
-- ## MERELASIKAN TABEL ##

ALTER TABLE tbl_wali_kelas
ADD CONSTRAINT fkwagu FOREIGN KEY (nip)
REFERENCES tbl_guru (nip);

ALTER TABLE tbl_wali_kelas
ADD CONSTRAINT fkwatah FOREIGN KEY (id_th_ajaran)
REFERENCES tbl_th_ajaran (id_th_ajaran);

ALTER TABLE tbl_wali_kelas
ADD CONSTRAINT fkwakepal FOREIGN KEY (id_paralel)
REFERENCES tbl_kelas_paralel (id_paralel);

ALTER TABLE tbl_wali_kelas
ADD CONSTRAINT fkwakelas FOREIGN KEY (id_kelas)
REFERENCES tbl_kelas (id_kelas);

ALTER TABLE tbl_nilai
ADD CONSTRAINT fkniajar FOREIGN KEY (id_th_ajaran)
REFERENCES tbl_th_ajaran (id_th_ajaran);

ALTER TABLE tbl_nilai
ADD CONSTRAINT fknikelas FOREIGN KEY (id_kelas)
REFERENCES tbl_kelas (id_kelas);

ALTER TABLE tbl_nilai
ADD CONSTRAINT fkniparalel FOREIGN KEY (id_paralel)
REFERENCES tbl_kelas_paralel (id_paralel);

ALTER TABLE tbl_nilai
ADD CONSTRAINT fknimatpel FOREIGN KEY (id_matpel)
REFERENCES tbl_matpel (id_matpel);

ALTER TABLE tbl_nilai
ADD CONSTRAINT fknisiswa FOREIGN KEY (nis)
REFERENCES tbl_siswa (nis);

ALTER TABLE tbl_matpel_kelas
ADD CONSTRAINT fkmatkelas FOREIGN KEY (id_kelas)
REFERENCES tbl_kelas (id_kelas);

ALTER TABLE tbl_matpel_kelas
ADD CONSTRAINT fkmatpel FOREIGN KEY (id_matpel)
REFERENCES tbl_matpel (id_matpel);



-- ================================================================
-- ## Memasukan data ke tabel database (INSERT INTO TABLE) ##
--

-- Dumping data for table `tbl_siswa` --
INSERT INTO tbl_siswa 
(nis,nisn,password,nama_murid,jenis_kelamin,tmp_lahir,tgl_lahir,agama,alamat,telepon,ortu_nama,tanggal_edit,img_siswa)
VALUES
('15160','1516062001','013f0f67779f3b1686c604db150d12ea','Didi Purnomo','Laki-laki','Brebes','1994-01-06','Islam','Desa Terlangu Kec.Brebes Kab.Brebes','089619323616','Zaenal Saleh','2010-11-06','foto.jpg'),
('15161','1516162001','013f0f67779f3b1686c604db150d12ea','Syifa Arum Dewanti','Perempuan','Tegal','1996-04-04','Islam','Desa Bojong Kec.Talang Kab.Tegal','085710323676','Aris','2010-11-07','tengik.jpg');

-- Dumping data for table `tbl_guru` --
INSERT INTO tbl_guru 
(nip,nuptk,password,nama_guru,jenis_kelamin,tmp_lahir,tgl_lahir,agama,alamat,telepon,tanggal_edit,img_guru)
VALUES
('19671201','19671201005','92afb435ceb16630e9827f54330c59c9','Yudhi S.Kom','Laki-laki','Bekasi','1947-01-06','islam','Desa Telaga Asih Kec.Cikarang Kab.Bekasi','089619323616','2010-11-06','foto.jpg'),
('19671202','19701102005','440a21bd2b3a7c686cf3238883dd34e9','Mega Dewi','Perempuan','Tegal','1945-04-04','islam','Desa Bojong Kec.Talang Kab.Tegal','085710323676','2010-11-07','tengik.jpg');

-- Dumping data for table `tbl_th_ajaran` --
INSERT INTO tbl_th_ajaran
(id_th_ajaran,tahun_ajaran) VALUES
(11,'2011'),
(12,'2012'),
(13,'2013'),
(14,'2014'),
(15,'2015'),
(16,'2016');

-- Dumping data for table `tbl_kelas` --
INSERT INTO tbl_kelas 
(id_kelas,tingkat_kelas,kapasitas) VALUES
('k1','X','30'),
('k2','XI','30'),
('k3','XI','30');

-- Dumping data for table `tbl_kelas_paralel` --
INSERT INTO tbl_kelas_paralel 
(id_paralel,nama_paralel) VALUES
('p1','A'),
('p2','B'),
('p3','C'),
('p4','D');

-- Dumping data for table `tbl_matpel` --
INSERT INTO tbl_matpel 
(id_matpel,nama_matpel,jenis_matpel) VALUES
('m01','IPA','ilmu alam'),('m02','IPS','ilmu sosial'),('m03','MTK','logika'),
('m04','Bahasa Indonesia','bahasa'),('m05','Bahasa Ingrris','bahasa');

-- Dumping data for table `tbl_nilai` --
INSERT INTO tbl_nilai 
(id_nilai,id_matpel,nis,id_th_ajaran,id_kelas,id_paralel,semester,jenis_nilai,nilai) 
VALUES
('n1','m03','15160','12','k2','p1','4','A','99'),
('n2','m01','15161','13','k1','p3','2','C','50');

-- Dumping data for table `tbl_wali_kelas` --
INSERT INTO tbl_wali_kelas 
(id_guru_kelas,id_th_ajaran,id_kelas,id_paralel,nip) 
VALUES
('gk1','12','k2','p1','19671202'),
('gk2','13','k1','p3','19671201');

-- Dumping data for table `tbl_matpel_kelas` --
INSERT INTO tbl_matpel_kelas VALUES
('mk1','k1','m03'),
('mk2','k2','m01');

-- Dumping data for table `users`
INSERT INTO `users` (`id_user`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`) VALUES
('kartono', 'c4e1c33222b8a6520859cd951f50f062', 'kartono PA', 'uchihasenju@gmail.com', '087864747667', 'user', 'N'),
('abdullah', '24dc11294127a03878fb6532d305184e', 'abdullah somplak', 'aab.cimada@gmail.com', '085743542542', 'user', 'N'),
('didi', '9e0dca51bfdcf4d14aa09ac9e9be2f89', 'didi purnomo', 'ghopurnomo@gmail.com', '089619323616', 'user', 'N'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin_bae', 'admin@omah.com', '0210767621', 'user', 'N');


-- ================================================================
-- ## Menampilkan masing2 tabel pada database ##
--

SELECT * FROM tbl_siswa,
SELECT * FROM tbl_guru,
SELECT * FROM tbl_kelas,
SELECT * FROM tbl_matpel_kelas,
SELECT * FROM tbl_nilai,
SELECT * FROM tbl_user,
SELECT * FROM tbl_wali_kelas,
SELECT * FROM tbl_matpel,
SELECT * FROM tbl_kelas_paralel,
SELECT * FROM tbl_matpel_kelas;


-- ================================================================
-- ## Memasukan data ke tabel database (INSERT INTO TABLE) via PHP ##
--

--1. INSERT tabel tbl_guru di PHP
INSERT INTO tbl_guru  VALUES('$nip','$nuptk','$nama_guru','$jenis_kelamin','$tmp_lahir','$tgl_lahir','$agama','$alamat','$telepon','$tanggal_edit','$img_guru')

--2. INSERT tabel tbl_siswa
INSERT INTO tbl_siswa  VALUES('$nis','$nisn','$nama_murid','$jenis_kelamin','$tmp_lahir','$tgl_lahir','$agama','$alamat','$telepon','$ortu_nama','$tanggal_edit','$img_siswa')

--3. INSERT tabel tbl_kelas_paralel
INSERT INTO tbl_kelas_paralel  VALUES('$id_paralel','$nama_paralel')

--4. INSERT tabel tbl_nilai
INSERT INTO tbl_nilai  VALUES('$id_nilai','$semester','$jenis_nilai','$nilai')

--5. INSERT tabel tbl_th_ajaran
INSERT INTO tbl_th_ajaran  VALUES('$id_th_ajaran','$tahun_ajaran')

--6. INSERT tabel tbl_kelas
INSERT INTO tbl_kelas  VALUES('$id_kelas','$tingkat_kelas','$kapasitas')

--7. INSERT tabel tbl_matpel
INSERT INTO tbl_matpel  VALUES('$id_matpel','$nama_matpel','$jenis_matpel')

--8. INSERT tabel tbl_wali_kelas
INSERT INTO tbl_wali_kelas  VALUES('$id_guru_kelas')

--9. INSERT tabel tbl_matpel_kelas
INSERT INTO tbl_matpel_kelas  VALUES('$id_matpel_kelas')


-- ================================================================
-- ## MENAMPILKAN TABEL via PHP ##
--

--1. menampilkan TABLE tbl_guru 
SELECT nip, nuptk, nama_guru, jenis_kelamin, tmp_lahir, tgl_lahir, agama, alamat, telepon, tanggal_edit, img_guru
FROM tbl_guru ORDER BY nip

--2. menampilkan tabel tbl_siswa
SELECT nis, nisn, nama_murid, jenis_kelamin, tmp_lahir, tgl_lahir, agama, alamat, telepon, ortu_nama, tanggal_edit, img_siswa
FROM tbl_siswa ORDER BY nis

--3. menampilkan tabel tbl_kelas_paralel
SELECT id_paralel,nama_paralel
FROM tbl_kelas_paralel ORDER BY id_paralel

--4. menampilkan tabel tbl_th_ajaran 
SELECT id_th_ajaran,tahun_ajaran 
FROM tbl_th_ajaran ORDER BY id_th_ajaran

--5. nemapilkan tabel tbl_kelas
SELECT id_kelas,tingkat_kelas, kapasitas
FROM tbl_kelas ORDER BY id_kelas

--6. menampilkan tabel tbl_matpel
SELECT id_matpel,nama_matpel,jenis_matpel
FROM tbl_matpel ORDER BY id_matpel


--=====================================================================
--MENGAHAPUS COLUMN PADA TABLE DATABASE

--1. menghapus DATA baris pada tabel tbl_guru
$QUERY = "DELETE FROM tbl_guru WHERE id_guru='$id_guru'";
		$SQL = mysql_query ($QUERY);
		
--2. menghapus DATA baris pada tabel tbl_kelas_paralel
$QUERY = "DELETE FROM tbl_kelas_paralel WHERE id_paralel='$id_paralel'";
		$SQL = mysql_query ($QUERY);
		
--3. menghapus DATA baris pada tabel tbl_kelas
$QUERY = "DELETE FROM tbl_kelas WHERE id_kelas='$id_kelas'";
		$SQL = mysql_query ($QUERY);
		
--4. menghapus DATA baris pada tabel tbl_matpel
$QUERY = "DELETE FROM tbl_matpel WHERE id_matpel='$id_matpel'";
		$SQL = mysql_query ($QUERY);

--5. menghapus DATA baris pada tabel tbl_matpel_kelas
$QUERY = "DELETE FROM tbl_matpel_kelas WHERE id_matpel_kelas='$id_matpel_kelas'";
		$SQL = mysql_query ($QUERY);

--6. menghapus DATA baris pada tabel tbl_nilai
$QUERY = "DELETE FROM tbl_nilai WHERE id_nilai='$id_nilai'";
		$SQL = mysql_query ($QUERY);
		
--7. menghapus DATA baris pada tabel tbl_siswa
$QUERY = "DELETE FROM tbl_siswa WHERE nis='$nis'";
		$SQL = mysql_query ($QUERY);
		
--8. menghapus DATA baris pada tabel tbl_th_ajaran
$QUERY = "DELETE FROM tbl_th_ajaran WHERE id_th_ajaran='$id_th_ajaran'";
		$SQL = mysql_query ($QUERY);
		
--9. menghapus DATA baris pada tabel tbl_wali_kelas
$QUERY = "DELETE FROM tbl_wali_kelas WHERE id_guru_kelas='$id_guru_kelas";
		$SQL = mysql_query ($QUERY);
		
--==========================================================================

--EDIT DATA PADA TABLE

-- 1. edit tabel tbl_guru
$QUERY = "UPDATE tbl_guru SET nuptk='$nuptk',nama_guru='$nama_guru',jenis_kelamin='$jenis_kelamin',
			  tmp_lahir='$tmp_lahir',tgl_lahir='$tgl_lahir',agama='$agama',alamat='$alamat',telepon='$telepon',tanggal_edit='$tanggal_edit',img_guru='$img_guru'
			   WHERE id_guru='$id_guru'";
	$SQL = mysql_query ($QUERY);
	
-- 2. edit tabel tbl_kelas
$QUERY = "UPDATE tbl_kelas SET tingkat_kelas='$tingkat_kelas',kapasitas='$kapasitas'
			  WHERE id_kelas='$id_kelas'";
	$SQL = mysql_query ($QUERY);
	
--3. edit tabel tbl_kelas_paralel
$QUERY = "UPDATE tbl_kelas_paralel SET nama_paralel='$nama_paralel'
			  WHERE id_paralel='$id_paralel'";
	$SQL = mysql_query ($QUERY);
	
--4. edit tabel tbl_matpel
$QUERY = "UPDATE tbl_matpel SET nama_matpel='$nama_matpel',jenis_matpel='$jenis_matpel'
			  WHERE id_matpel='$id_matpel'";
	$SQL = mysql_query ($QUERY);

--5. edit tabel tbl_nilai
$QUERY = "UPDATE tbl_nilai SET semester='$semester',jenis_nilai='$jenis_nilai',nilai='$nilai'
			  WHERE id_nilai='$id_nilai'";
	$SQL = mysql_query ($QUERY);

-- 6. edit tabel tbl_siswa
$QUERY = "UPDATE tbl_siswa SET nisn='$nisn',nama_murid='$nama_murid',jenis_kelamin='$jenis_kelamin',tmp_lahir='$tmp_lahir',tgl_lahir='$tgl_lahir',agama='$agama',alamat='$alamat',
			telepon='$telepon',ortu_nama='$ortu_nama',tanggal_edit='$tanggal_edit',img_siswa='$img_siswa'
			  WHERE nis='$nis'";
	$SQL = mysql_query ($QUERY);	
	
--7. edit tabel tbl_th_ajaran
$QUERY = "UPDATE tbl_th_ajaran SET tahun_ajaran='$tahun_ajaran'
			  WHERE id_th_ajaran='$id_th_ajaran'";
	$SQL = mysql_query ($QUERY);

--===========================================================================