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



	// Update Mydata
	if ($module=='profile' AND $act=='update') {

		#upload foto model1
		$target_dir		= "../../../siswa/images/";
		$lokasi_file 	= $_FILES['foto_siswa']['tmp_name'];
		$nama_foto 		= $_FILES['foto_siswa']['name'];
		$tipe_file 		= $_FILES['foto_siswa']['type'];
		$nama_foto_unik = rand(00000,99999)."_".$nama_foto;
		
		//jika proses edit password kosong
		if (empty($_POST['password'])) { 
			$nis = addslashes (strip_tags ($_POST['nis']));
		
			$update = mysql_query(
				"UPDATE tbl_siswa SET
							nama_murid		= '$_POST[nama_lengkap]',
							jenis_kelamin	= '$_POST[jenis_kelamin]',
							tmp_lahir		= '$_POST[tempat_lahir]',
							tgl_lahir		= '$_POST[tgl_lhr]',
							agama			= '$_POST[agama]',
							alamat			= '$_POST[alamat]',
							telepon			= '$_POST[telepon]',
							tgl_edit		= now()
						WHERE nis='$_POST[id]'" 
			);
		}	
		 //jika password akan diubah
		else {
			$nip = addslashes (strip_tags ($_POST['nip']));
			$pass=md5($_POST['password']);
			$update = mysql_query(
				"UPDATE tbl_guru SET 
							password		= '$pass',
							nama_murid		= '$_POST[nama_lengkap]',
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
					window.location=('../../index.php?module=siswa')</script>";
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
		if ($update) {
			$_SESSION['info'] = "
				<div class=\"alert alert-success\">
					<a href='index.php?module=profile' class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
					<strong>Success!</strong> Data berhasil diupdate.
				</div>
			";
			header('location:../../../siswa/index.php?module='.$module);
		} else {
			$_SESSION['info'] = "
				<div class=\"alert alert-warning\">
					<a href='index.php?module=profile' class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
					<strong>Warning!</strong> Data gagal diupdate. {mysql_error()};
				</div>
			";	
			header('location:../../../siswa/index.php?module='.$module);
		}

	}
	
}
?>
