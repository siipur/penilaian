<div class="panel panel-default" style="background-color:maroon;">
	<div class="panel-body" style="color:white;">
<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/fungsi_combobox.php";
include "../config/class_paging.php";

// Bagian Home
if ($_SESSION['leveluser']=='admin' OR $_SESSION['leveluser']=='user') {

	if ($_GET['module']=='home') {
	echo "	
		<h2>Selamat Datang</h2>
		<p>Hai <b>$_SESSION[namalengkap]</b>, selamat datang di halaman Pengelolaan Sistem Informasi Sekolah.<br>
		Silahkan klik menu pilihan yang berada di sebelah kiri untuk data yang diinginkan.</p>
		<p>&nbsp;</p>

			<table width=60% class=\"table table-condensed  table-bordered\">
				<th colspan=5 class=\"danger\"><center>Control Panel</center></th>
				
				<tr class=\"success\">
					<td width=120 align=center class=\"table-hover\"><a href=index.php?module=user><img src=../images/user.png border=none></a></td>
					<td width=120 align=center class=\"table-hover\"><a href=index.php?module=guru><img src=../images/guru.png border=none></a></td>
					<td width=120 align=center class=\"table-hover\"><a href=index.php?module=siswa><img src=../images/siswa.jpg border=none></a></td>
				</tr>
				<tr class=\"info\">
					<th width=120><center><b>Manajemen User</b></center></th>
					<th width=120><center><b>Manajemen Guru</b></center></th>
					<th width=120><center><b>Manajemen Siswa</b></center></th>
				</tr>
				
				<tr class=\"success\">
					<td width=120 align=center class=\"table-hover\"><a href=index.php?module=tahun-ajaran><img src=../images/siswa.jpg border=none></a></td>
					<td width=120 align=center class=\"hover\"><a href=index.php?module=kelas><img src=../images/kelas.png border=none></a></td>
					<td width=120 align=center class=\"hover\"><a href=index.php?module=kelas_p><img src=../images/kelas.png border=none></a></td>
				</tr>
				<tr class=\"info\">
					<th width=120><center><b>Taun Ajaran</b></center></th>
					<th width=120><center><b>Manajemen Kelas</b></center></th>
					<th width=120><center><b>Kelas Paralel </b></center></th>
				</tr>
				
				<tr class=\"success\">
					<td width=120 align=center class=\"hover\"><a href=index.php?module=matpel><img src=../images/nilai.png border=none></a></td>
					<td width=120 align=center class=\"hover\"><a href=index.php?module=bagi-kelas><img src=../images/nilai.png border=none></a></td>
					<td width=120 align=center class=\"hover\"><a href=index.php?module=jadwal-pengajaran><img src=../images/nilai.png border=none></a></td>
				</tr>
				<tr class=\"info\">
					<th width=120><center><b>Manajemen MaPel</b></center></th>
					<th width=120><center><b>Bagi Kelas</b></center></th>
					<th width=120><center><b>Bagi Pengajar</b></center></th>	
				</tr>
			</table>
		
		<div>&nbsp;</div>

		<p align='left'>Login : $hari_ini, ";
		
		echo tgl_indo(date("Y m d")); echo " | "; date_default_timezone_set("Asia/Jakarta");
		echo date("H:i:s");echo " WIB</p>";
	}
	
	##-------------------------------------
	##Bagian Master File
	##-------------------------------------
	//bagian Hak Akses
	elseif ($_GET['module']=='user') {
		include "modul/mod_user/user.php";
	}

	// Bagian Data Guru
	elseif ($_GET['module']=='guru') {
		include "modul/mod_guru/guru.php";
	}
	// bagian detail guru
	elseif ($_GET['module']=='detail-guru') {
		include "modul/mod_guru/detail_guru.php";
	}
	
	// Bagian Data Siswa
	elseif ($_GET['module']=='siswa') {
		include "modul/mod_siswa/siswa.php";
	}
	// bagian detail Siswa
	elseif ($_GET['module']=='detail-siswa') {
		include "modul/mod_siswa/detail_siswa.php";
	}
	
	//bagian tahun-ajaran
	elseif ($_GET['module']=='tahun-ajaran') {
		include "modul/mod_tahun_ajaran/tahun_ajaran.php";
	}
	
	// Bagian Data Kelas
	elseif ($_GET['module']=='kelas') {
		include "modul/mod_kelas/kelas.php";
	}
	// Bagian Data Kelas Paralel
	elseif ($_GET['module']=='kelas_p') {
		include "modul/mod_kelas_paralel/kelas_p.php";
	}
	
	// Bagian Mata Pelajarn
	elseif ($_GET['module']=='matpel') {
		include "modul/mod_pelajaran/pelajaran.php";
	}
	
	
	##-------------------------------------
	##Bagian Transaksi File
	##-------------------------------------
	
	// sistem pembagian Kelas
	elseif($_GET['module']=='bagi-kelas'){
		include "modul/mod_kelas_siswa/bagi_kelas.php";
	}
	
	//sistem pembagian guru mengajar
	elseif($_GET['module']=='jadwal-pengajaran'){
		include "modul/mod_guru_mengajar/gurumengajar.php";
	}
	
	//bagian laporan nilai siswa
	elseif(($_GET['module']=='laporan-nilai-siswa')){
		include "modul/mod_nilai/nilai.php";
	}

	// Bagian Cetak Nilai
	elseif ($_GET['module']=='cetak-nilai') {
		//include "modul/mod_cetaknilai/cetak_nilai.php";
		echo "Untuk Saat Ini Belum Bisa cetak nilai yo!! :(";
	}
	
}

?>
</div>
</div>
