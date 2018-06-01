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
	if ($module == 'kelas' AND $act == 'hapus') {
	
		$delete = mysql_query ("DELETE FROM tbl_kelas WHERE id_kelas = '$_GET[id_kls]'");
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
		}
	}
	
	//input kelas
	elseif ($module == 'kelas' AND $act == 'input') {
		$mlebukna = mysql_query ("
						INSERT INTO tbl_kelas
						VALUES
						('$_POST[id_kelas]','$_POST[tingkatan_kelas]',$_POST[kapasitas_kelas])
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
		$kd_kelas 	= addslashes(strip_tags($_POST['id_kelas']));
		$tingkatan	= addslashes(strip_tags($_POST['tingkatan_kelas']));
		$kuota		= addslashes(strip_tags($_POST['kapasitas_kelas']));
		
		$update = mysql_query("
			UPDATE tbl_kelas SET
				id_kelas 		= '$kd_kelas',
				tingkat_kelas	= '$tingkatan',
				kapasitas		= '$kuota'
			WHERE id_kelas = '$_POST[id_kls]'
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