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
	include "../../../config/class_paging.php"; //file buat paginations
	
	//variabel
	$module = $_GET['module']; $act = $_GET['act'];
	
	//hapus kelas
	if ($module == 'bagi-kelas' AND $act == 'hapus') {
	
		$delete = mysql_query ("DELETE FROM tbl_ruangan WHERE id_ruangan = '$_GET[id]'");
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
			unset($_SESSION['pesan']);
		}
	}
	
	//input bagi kelas ke tbl_ruangan
	elseif ($module == 'bagi-kelas' AND $act == 'input') {
		$id_siswa		= htmlentities($_POST['nis']);
		$id_kelas		= htmlentities($_POST['id_kelas']);
		$kls_paralel 	= htmlentities($_POST['kls_paralel']);
		$mlebukna = mysql_query ("
						INSERT INTO tbl_ruangan (id_ruangan,nis,id_kelas,id_paralel)
						VALUES
						('','$id_siswa','$id_kelas','$kls_paralel')
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
			unset($_SESSION['pesan']);
		}
	} 
	
	
	//Edit bagi Kelas
	elseif ($module == 'bagi-kelas' AND $act == 'update') {

		$id_kelas		= htmlentities($_POST['id_kelas']);
		$kls_paralel 	= htmlentities($_POST['kls_paralel']);
	
		$update = mysql_query("
			UPDATE tbl_ruangan SET
				id_kelas	= '$id_kelas',
				id_paralel	= '$kls_paralel'
			WHERE id_ruangan = '$_POST[id]'
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
			mysql_error();
		}
		
	}
	
}
?>