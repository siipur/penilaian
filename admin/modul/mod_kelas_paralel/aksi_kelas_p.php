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
	include "../../../config/koneksi.php"; // file koneksi
	include "../../../config/library.php"; //file setting format waktu
	
	//variabel
	$module = $_GET['module']; $act = $_GET['act'];
	
	//hapus kelas
	if ($module == 'kelas_p' AND $act == 'hapus') {
	
		$delete = mysql_query ("DELETE FROM tbl_kelas_paralel WHERE id_paralel = '$_GET[id]'");
		if($delete) {
			
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
			mysql_error();
		}
	}
	
	//input kelas
	elseif ($module == 'kelas_p' AND $act == 'input') {
		$mlebukna = mysql_query ("
						INSERT INTO tbl_kelas_paralel
						VALUES
						('$_POST[id_paralel]','$_POST[nm_paralel]')
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
	//Edit Kelas
	elseif ($module == 'kelas' AND $act == 'update') {
		$kd_paralel 	= addslashes(strip_tags($_POST['id_paralel']));
		$nama_kelas_p 	= addslashes(strip_tags($_POST['nm_paralel']));
		$update = mysql_query("
			UPDATE tbl_kelas_paralel SET
				id_paralel 		= '$kd_paralel',
				nama_paralel	= '$nama_kelas_p'
			WHERE id_paralel = '$_POST[id]'
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
					window.alert('Data Gagal diUPdate');
				</script>
			";
		}
		
	}
	
}
?>