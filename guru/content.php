<div class="panel panel-default" style="background-color:maroon;">
	<div class="panel-body" style="color:white;">
	
<?php

include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
include "../config/class_paging.php";



// Bagian Beranda [Halaman Depan]
	if ($_GET['module']=='home') {
		echo "
		<h2 style='color:lime;'>Selamat Datang</h2>
		<p>Hai <b>$_SESSION[namalengkap]</b>, selamat datang di halaman Pengelolaan Sistem Informasi Sekolah.<br>
		Silahkan klik menu pilihan yang berada di sebelah kiri atau menu dibawah ini untuk data yang diinginkan.</p>
		<p>&nbsp;</p>

		<table border=1 width=60% class=\"table table-condensed  table-bordered\">
			<th colspan=5 class=\"danger\"><center>Control Panel</center></th>
			<tr class=\"success\">
				<td width=120 align=center><a href=index.php?module=profile><img src=../images/guru.png border=none></a></td>
				<td width=120 align=center><a href=index.php?module=siswa><img src=../images/siswa.jpg border=none></a></td>
				<td width=120 align=center><a href=index.php?module=input-nilai><img src=../images/nilai.png border=none></a></td>
			</tr>
			<tr class=\"info\">
				<th width=120><b>Data Saya</b></th>
				<th width=120><center><b>Lihat Data Siswa</b></center></th>
				<th width=120><center><b>Nilai Siswa</b></center></th>
			</tr>
			
		</table>
		<div>&nbsp;</div>

		<p align='left'><em>Login : $hari_ini, ";

		echo tgl_indo(date("Y m d")); echo " | "; date_default_timezone_set("Asia/Jakarta");
		echo date("H:i:s");echo " WIB</em></p>";
	}
	
	// Bagian Data Profile Guru
	elseif ($_GET['module']=='profile') {
		include "modul/mod_mydata/mydata.php";
	}
	
	// Bagian Data Siswa
	elseif ($_GET['module']=='siswa') {
		include "modul/mod_siswa/siswa.php";
	}
	
	// bagian detail Siswa
	elseif ($_GET['module']=='detail-siswa') {
		include "modul/mod_siswa/detail_siswa.php";
	}
	
	// Bagian Input Nilai
	elseif ($_GET['module']=='input-nilai') {
		include "modul/mod_nilai/nilai.php";
	}

	// Bagian Lihat Laporan Penilaian 
	elseif($_GET['module']== 'laporan-nilai') {
		include "modul/mod_nilai/hasil_nilai.php";
	}
	

	/*// Bagian Cetak Nilai
	elseif ($_GET['module']=='cetaknilai') {
		include "modul/mod_cetaknilai/cetak_nilai.php";
	}
	*/

?>
	</div>
</div>