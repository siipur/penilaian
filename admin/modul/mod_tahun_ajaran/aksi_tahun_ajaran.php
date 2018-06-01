<?php

session_start();

if(empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
	echo "
		<link href='style.css' rel='stylesheet' type='text/css'>
		<center>
			Untuk mengakses modul, Anda harus login <br>
			<a href=../../index.php><b>LOGIN</b></a>
		</center>
	";
}
else {
  
	//lokasi setting ke file konfigurasi : modul_taun_ajaran/admin/abdino/config
	include "../../../config/koneksi.php"; // file koneksi
	include "../../../config/library.php"; //file setting format waktu
	
	$module = $_GET['module'];
	$act	= $_GET['act'];
	
	//hapus tahun ajaran
	if ($module == 'tahun-ajaran' AND $act == 'hapus') {
	
		$delete = mysql_query ("DELETE FROM tbl_th_ajaran WHERE id_th_ajaran = '$_GET[id_thn]'");
		if($delete) {
			//dialihkan kembali : aksi_thn_ajaran -> modul_tahun_ajaran -> modul -> admin
			header('location: ../../../admin/index.php?module='.$module);
			$_SESSION['pesan'] = "
				<script language='javascript'>
					alert('Data berhasil diHapus');
				</script> 
			";
		} else {
			$_SESSION['pesan'] = "
				<script language='javascript'>
					alert('Data Gagal diHapus');
				</script>
			";
		}
	}
	
	//input tahun ajaran 
	elseif ($module == 'tahun-ajaran' AND $act == 'input') {
	
		$id_thn		 = addslashes(strip_tags($_POST['id_thn_ajaran']));
		$thn_ajaran	 = addslashes(strip_tags($_POST['thn_ajaran']));
		
		$mlebukna = mysql_query ("
						INSERT INTO tbl_th_ajaran (id_th_ajaran,tahun_ajaran)
						VALUES
						('$id_thn','$thn_ajaran')
					");
		if($mlebukna) {
			$_SESSION['pesan'] = "
				<script language='javascript'>
					alert('Data berhasil ditambahkan');
				</script>
			";
			header('location: ../../../admin/index.php?module='.$module);
		} else {
			$_SESSION['pesan'] = "
				<script language='javascript'>
					alert('Data Gagal ditambahkan');
				</script>
			";
		}
	}
	//Edit tahun Ajaran
	elseif ($module == 'tahun-ajaran' AND $act == 'update') {
		$id_thn 	= addslashes(strip_tags($_POST['id_thn_ajaran']));
		$thn_ajaran = addslashes(strip_tags($_POST['thn_ajaran']));
		$update = mysql_query("
			UPDATE tbl_th_ajaran SET
				id_th_ajaran = '$id_thn',
				tahun_ajaran = '$thn_ajaran'
			WHERE id_th_ajaran = '$_POST[id_thn]'
		");
		if($update) {
			$_SESSION['pesan'] = "
				<script language='javascript'>
					alert('Data berhasil diupdate');
				</script>
			";
			header('location: ../../../admin/index.php?module='.$module);
		} else {
			$_SESSION['pesan'] = "
				<script language='javascript'>
					alert('Data Gagal diUPdate');
				</script>
			";
		}
	}
} 

?>