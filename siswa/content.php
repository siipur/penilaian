<div class="panel panel-default" style="background-color:maroon;">
	<div class="panel-body" style="color:white;">
	
<?php
include "../config/koneksi.php";
include "../config/library.php";
include "../config/fungsi_indotgl.php";
//include "../config/fungsi_combobox.php";
//include "../config/class_paging.php";

// Bagian Home
	if ($_GET['module']=='home') {
	echo "
			<h2>Selamat Datang</h2>
			<p>Hai <b>$_SESSION[namalengkap]</b>, selamat datang di halaman Pengelolaan Sistem Informasi Sekolah.<br>
			Silahkan klik menu pilihan yang berada di sebelah kiri untuk data yang diinginkan.</p>
			<p>&nbsp;</p>

 		 	<table border=1 width=60% class=\"table table-condensed  table-bordered\">
				<th colspan=5 class=\"danger\"><center>Control Panel</center></th>
				<tr class=\"success\">
					<td width=120 align=center><a href=index.php?module=profile><img src=../images/siswa.jpg border=none></a></td>
					<td width=120 align=center><a href=index.php?module=nilai><img src=../images/nilai.png border=none></a></td>
				</tr>
				<tr class=\"info\">
					<th width=120><center><b>Data Saya</b></center></th>
					<th width=120><center><b>Lihat Nilai</b></center></th>
				</tr>
				
			</table>
			<div>&nbsp;</div>

			<p align='left'>Login : $hari_ini, ";
			echo tgl_indo(date("Y m d")); 
			echo " | "; 
			date_default_timezone_set("Asia/Jakarta");
			echo date("H:i:s");
			echo " WIB</p>";
	}

	// Bagian Data Profile Guru
	elseif ($_GET['module']=='profile') {
		include "modul/mod_mydata/mydata.php";
	}
	
	// Bagian Data Nilai
	elseif ($_GET['module']=='nilai') {
		include "modul/lihat_nilai.php";
	}
	
	/*
	// Bagian Cetak Nilai
	elseif ($_GET['module']=='cetaknilai') {
		include "modul/mod_cetaknilai/cetak_nilai.php";
	}
	*/

?>
	</div>
</div>