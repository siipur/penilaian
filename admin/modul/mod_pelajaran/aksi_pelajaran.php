<?php
session_start();

if (isset($_SESSION['pesan']))
	$pesan = $_SESSION['pesan'];
else
	$pesan = '';

if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

	include "../../../config/koneksi.php";
	include "../../../config/library.php";

	$module=$_GET['module'];
	$act=$_GET['act'];

	// Hapus Mata Pelajaran
	if ($module=='matpel' AND $act=='hapus') {
		$bersihkan = mysql_query("DELETE FROM tbl_matpel WHERE id_matpel='$_GET[id_matpel]'");
		if($bersihkan){
			$_SESSION['pesan'] = "
					<script language='javascript'>
						alert('Data berhasil diHapus');
					</script> 
				";
			header('location:../../../admin/index.php?module='.$module);
		} else {
			$_SESSION['pesan'] = "
					<script language='javascript'>
						alert('Data Gagal diHapus');
					</script> 
				";
		}
	}
	elseif($module=='matpel' AND $act=='input'){
		$idmatpel 	= addslashes(strip_tags($_POST['kode_matpel']));
		$namamatpel = addslashes(strip_tags($_POST['nm_matpel']));
		$jnsmatpel	= addslashes(strip_tags($_POST['jns_matpel']));
		
		$mlebukna = mysql_query("
			INSERT INTO tbl_matpel (id_matpel,nama_matpel,jenis_matpel)
			VALUES
			('$idmatpel','$namamatpel','$jnsmatpel')
		");
		if($mlebukna){
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
	elseif($module=='matpel' AND $act=='update'){
	
		//bungkus di variable
		$idmatpel_new 	= addslashes(strip_tags($_POST['kode_matpel']));
		$namamatpel		= addslashes(strip_tags($_POST['nm_matpel']));
		$jnsmatpel		= addslashes(strip_tags($_POST['jns_matpel']));
		
		$update = mysql_query("
			UPDATE tbl_matpel SET
						id_matpel		= '$idmatpel_new',
						nama_matpel		= '$namamatpel',
						jenis_matpel 	= '$jnsmatpel'
			WHERE id_matpel = '$_POST[id_matpel]'
		");
		if($update){
			$_SESSION['pesan'] = "
				<script language='javascript'>
					alert('Data berhasil diupdate');
				</script>
			";
			header('location: ../../../admin/index.php?module='.$module);
		} else {
			$_SESSION['pesan'] = "
				<script language='javascript'>
					alert('Data Gagal diupdate');
				</script>
			";
		}
	}
}

?>