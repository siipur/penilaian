<?php

session_start();
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{

	include "../../../config/koneksi.php";
	include "../../../config/library.php";
	include "../../../config/class_paging.php";
	//include "../../../config/fn_uploads.php";

	$module=$_GET['module'];
	$act=$_GET['act'];

	// Hapus Dosen
	if ($module=='guru' AND $act=='hapus') {
		mysql_query("DELETE FROM tbl_guru WHERE nip='$_GET[id]'");
		header('location:../../../admin/index.php?module='.$module);
	}

	// Input Guru
	elseif ($module=='guru' AND $act=='input') {

		$nip = addslashes (strip_tags ($_POST['nip']));
		$nuptk = addslashes (strip_tags ($_POST['nuptk']));
		$pass=md5($_POST['password']);
		$nama = addslashes (strip_tags ($_POST['nama_lengkap']));
		$Jenis_kelamin = addslashes (strip_tags ($_POST['jenis_kelamin']));
		$tempat_lahir = addslashes (strip_tags ($_POST['tempat_lahir']));
		$tglhr =$_POST['tgl_lhr'];
		$agama = addslashes (strip_tags ($_POST['agama']));
		$alamat = addslashes (strip_tags ($_POST['alamat']));
		$telepon = addslashes (strip_tags ($_POST['telepon']));
		
	
		#upload foto model1
		$lokasi_file 	= $_FILES['foto_guru']['tmp_name'];
		$nama_foto 		= $_FILES['foto_guru']['name'];
		$tipe_file 		= $_FILES['foto_guru']['type'];
		$nama_foto_unik = rand(00000,99999)."_".$nama_foto;
		$target_dir		= "../../../guru/images/";
		
		if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
			echo "
				<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
				window.location=('../../index.php?module=guru&act=tambahguru')</script>";
		}
		else {
			
			
				if(is_uploaded_file($lokasi_file)) {
					move_uploaded_file ($lokasi_file, $target_dir . $nama_foto_unik);
				}
			
		}
	
		$q = "INSERT INTO tbl_guru VALUES (
				'$nip','$nuptk','$pass',
				'$nama','$Jenis_kelamin',
				'$tempat_lahir','$tglhr','$agama',
				'$alamat','$telepon',now(),'$nama_foto_unik')";
		$sql = mysql_query($q);
		if ($sql) {
			echo "
			<font color='blue'><h4>Berhasil ditambahkan</h4></font><br/>";
			header('location:../../../admin/index.php?module='.$module);
		
		} else {
			echo "<font color='red'><h4>Gagal ditambahkan</h4></font><br/>";
		} 	
	}


	// Update Dosen
	elseif ($module=='guru' AND $act=='update') {

		#upload foto model1
		$target_dir		= "../../../guru/images/";
		$lokasi_file 	= $_FILES['foto_guru']['tmp_name'];
		$nama_foto 		= $_FILES['foto_guru']['name'];
		$tipe_file 		= $_FILES['foto_guru']['type'];
		$nama_foto_unik = rand(00000,99999)."_".$nama_foto;
		
		//jika proses edit password kosong
		if (empty($_POST['password'])) { 
			$nip = addslashes (strip_tags ($_POST['nip']));
		
			$update = mysql_query(
				"UPDATE tbl_guru SET
							nip				= '$nip',
							nuptk 			= '$_POST[nuptk]',
							nama_guru		= '$_POST[nama_lengkap]',
							jenis_kelamin	= '$_POST[jenis_kelamin]',
							tmp_lahir		= '$_POST[tempat_lahir]',
							tgl_lahir		= '$_POST[tgl_lhr]',
							agama			= '$_POST[agama]',
							alamat			= '$_POST[alamat]',
							telepon			= '$_POST[telepon]',
							tgl_edit		= now()
						WHERE nip='$_POST[id]'" 
			);
		}	
		 //jika password akan diubah
		else {
			$nip = addslashes (strip_tags ($_POST['nip']));
			$pass=md5($_POST['password']);
			$update = mysql_query(
				"UPDATE tbl_guru SET 
							password		= '$pass',
							nip				= '$nip',
							nuptk 			= '$_POST[nuptk]',
							nama_guru		= '$_POST[nama_lengkap]',
							jenis_kelamin	= '$_POST[jenis_kelamin]',
							tmp_lahir		= '$_POST[tempat_lahir]',
							tgl_lahir		= '$_POST[tgl_lhr]',
							agama			= '$_POST[agama]',
							alamat			= '$_POST[alamat]',
							telepon			= '$_POST[telepon]',
							tgl_edit		= now()
						WHERE nip='$_POST[id]'" 
			);
		}	
	
		if (!empty($lokasi_file)) {
			if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
				echo "
					<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
					window.location=('../../index.php?module=guru')</script>";
			}
			else {

				
					if(is_uploaded_file($lokasi_file)) {
						move_uploaded_file ($lokasi_file, $target_dir . $nama_foto_unik);
					}
					$update =
						mysql_query("
							UPDATE tbl_guru SET img_guru='$nama_foto_unik', tgl_edit=now()
							WHERE nip='$_POST[id]'
						");
				
			}
		}	
		if($update){
			header('location:../../../admin/index.php?module='.$module);
		}
		else {
			echo "Gagal Update";
			echo mysql_error();
		}
	}
	
}
?>
