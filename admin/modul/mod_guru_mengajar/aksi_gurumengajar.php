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
	if ($module == 'jadwal-pengajaran' AND $act == 'hapus') {
	
		$delete = mysql_query ("DELETE FROM tbl_jadwal WHERE id_jadwal = '$_GET[id]'");
		if($delete) {
			$_SESSION['pesan'] = "
				<script language='javascript'>
					alert('Data berhasil diHapus');
				</script> 
			";
			header('location: ../../../admin/index.php?module='.$module);
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
	elseif ($module == 'jadwal-pengajaran' AND $act == 'input') {
		$id_guru		= htmlentities($_POST['kode_guru']);
		$id_matpel		= htmlentities($_POST['kode_matpel']);
		$id_kelas		= htmlentities($_POST['id_kelas']);
		$kls_paralel 	= htmlentities($_POST['kls_paralel']);
		$mlebukna = mysql_query ("
						INSERT INTO tbl_jadwal (id_jadwal,nip,id_matpel,id_kelas,id_paralel)
						VALUES
						('','$id_guru','$id_matpel','$id_kelas','$kls_paralel')
					");
		if($mlebukna) {
			$_SESSION['pesan'] = "
				<script language='javascript'>
					alert('Data berhasil ditambahkan');
				</script>
			";
			header('location: ../../../admin/index.php?module='.$module);
		} else {
			mysql_error();
			$_SESSION['pesan'] = "
				<script language='javascript'>
					alert('Data Gagal ditambahkan');
				</script>
			";
			
		}
	} 
	
	
	//Edit bagi Kelas
	elseif ($module == 'jadwal-pengajaran' AND $act == 'update') {
		$id_matpel		= htmlentities($_POST['kode_matpel']);
		$id_kelas		= htmlentities($_POST['kode_kelas']);
		$id_paralel 	= htmlentities($_POST['kode_kelas_p']);
	
		$update = mysql_query("
			UPDATE tbl_jadwal SET
				id_matpel 	= '$id_matpel',
				id_kelas	= '$id_kelas',
				id_paralel	= '$id_paralel'
			WHERE id_jadwal = '$_POST[id]'
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