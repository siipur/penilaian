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

	$module=$_GET['module'];
	$act=$_GET['act'];

	// Hapus Siswa
	if ($module=='siswa' AND $act=='hapus') {
		$delete = mysql_query("DELETE FROM tbl_siswa WHERE nis='$_GET[id]'");
		if($delete){
			$_SESSION['info'] = "
				<div class=\"alert alert-success\">
					<a href='index.php?module=siswa' class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
					<strong>Success!</strong> Data berhasil dihapus.
				</div>
			";
			header('location:../../../admin/index.php?module='.$module);
		} else {
			$_SESSION['info'] = "
				<div class=\"alert alert-warning\">
					<a href='index.php?module=siswa' class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
					<strong>Warning!</strong> Data gagal dihapus.
				</div>
			";	
			header('location:../../../admin/index.php?module='.$module);
		}
	}

	// Input Siswa
	elseif ($module=='siswa' AND $act=='input') {

		$nis = addslashes (strip_tags ($_POST['nis']));
		$nisn = addslashes (strip_tags ($_POST['nisn']));
		$pass=md5($_POST['password']);
		$nama = addslashes (strip_tags ($_POST['nama_lengkap']));
		$Jenis_kelamin = addslashes (strip_tags ($_POST['jenis_kelamin']));
		$tempat_lahir = addslashes (strip_tags ($_POST['tempat_lahir']));
		$tglhr =$_POST['tgl_lhr'];
		$agama = addslashes (strip_tags ($_POST['agama']));
		$alamat = addslashes (strip_tags ($_POST['alamat']));
		$telepon = addslashes (strip_tags ($_POST['telepon']));
		$nama_ortu = addslashes (strip_tags ($_POST['ortu']));
		
		#upload foto model1
		$lokasi_file 	= $_FILES['foto_siswa']['tmp_name'];
		$nama_foto 		= $_FILES['foto_siswa']['name'];
		$tipe_file 		= $_FILES['foto_siswa']['type'];
		$nama_foto_unik = rand(00000,99999)."_".$nama_foto;
		$target_dir		= "../../../siswa/images/";
	
		if ($tipe_file != "image/jpeg" AND $tipe_file != "image/pjpeg"){
			echo "
				<script>window.alert('Upload Gagal, Pastikan File yang di Upload bertipe *.JPG');
				window.location=('../../index.php?module=siswa&act=tambahsiswa')</script>";
		}
		else {
			
			
				if(is_uploaded_file($lokasi_file)) {
					move_uploaded_file ($lokasi_file, $target_dir . $nama_foto_unik);
				}
			
		}
		
		$in = "INSERT INTO tbl_siswa VALUES (
				'$nis','$nisn','$pass',
				'$nama','$Jenis_kelamin',
				'$tempat_lahir','$tglhr','$agama',
				'$alamat','$telepon','$nama_ortu',now(),'$nama_foto_unik')";
		$sql = mysql_query($in);
		if ($sql) {
			$_SESSION['info'] = "
				<div class=\"alert alert-success\">
					<a href='index.php?module=siswa' class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
					<strong>Success!</strong> Data berhasil diinput.
				</div>
			";
			header('location:../../../admin/index.php?module='.$module);
		} else {
			$_SESSION['info'] = "
				<div class=\"alert alert-warning\">
					<a href='index.php?module=siswa' class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
					<strong>Warning!</strong> Data gagal diinput.
				</div>
			";	
			header('location:../../../admin/index.php?module='.$module);
		}
	}


	// Update Siswa
	elseif ($module=='siswa' AND $act=='update') {
	
		#upload foto model1
		$target_dir		= "../../../siswa/images/";
		$lokasi_file 	= $_FILES['foto_siswa']['tmp_name'];
		$nama_foto 		= $_FILES['foto_siswa']['name'];
		$tipe_file 		= $_FILES['foto_siswa']['type'];
		$nama_foto_unik = rand(00000,99999)."_".$nama_foto;
	
		if (empty($_POST['password'])) { //jika proses edit password kosong
			$nis = addslashes (strip_tags ($_POST['nis']));
			$update = mysql_query(
				" UPDATE tbl_siswa SET 
							nis				= '$nis',
							nisn			= '$_POST[nisn]',
							nama_murid		= '$_POST[nama_lengkap]',
							jenis_kelamin	= '$_POST[jenis_kelamin]',
							tmp_lahir		= '$_POST[tempat_lahir]',
							tgl_lahir		= '$_POST[tgl_lhr]',
							agama			= '$_POST[agama]',
							alamat			= '$_POST[alamat]',
							telepon			= '$_POST[telepon]',
							ortu_nama		= '$_POST[ortu]',
							tgl_edit	= now()
						WHERE nis='$_POST[id]' " 
			);
		}
		else { //jika password akan diubah
			$pass=md5($_POST['password']);
			$nis = addslashes (strip_tags ($_POST['nis']));
			
			$update = mysql_query( 
				" UPDATE tbl_siswa SET 
							password 		= '$pass',
							nisn 			= '$nis',
							nisn			= '$_POST[nisn]',
							nama_murid		= '$_POST[nama_lengkap]',
							jenis_kelamin	= '$_POST[jenis_kelamin]',
							tmp_lahir		= '$_POST[tempat_lahir]',
							tgl_lahir		= '$_POST[tgl_lhr]',
							agama			= '$_POST[agama]',
							alamat			= '$_POST[alamat]',
							telepon			= '$_POST[telepon]',
							ortu_nama		= '$_POST[ortu]',
							tgl_edit	= now()
						WHERE nis='$_POST[id]' 
				" 
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
					
					$update = mysql_query("
						UPDATE tbl_siswa SET img_siswa='$nama_foto_unik',tgl_edit=now()
						WHERE nis='$_POST[id]'
					");
				
			}
		}	
	
		if ($update) {
			$_SESSION['info'] = "
				<div class=\"alert alert-success\">
					<a href='index.php?module=siswa' class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
					<strong>Success!</strong> Data berhasil diupdate.
				</div>
			";
			header('location:../../../admin/index.php?module='.$module);
		} else {
			$_SESSION['info'] = "
				<div class=\"alert alert-warning\">
					<a href='index.php?module=siswa' class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
					<strong>Warning!</strong> Data gagal diupdate. {mysql_error()};
				</div>
			";	
			header('location:../../../admin/index.php?module='.$module);
		}
	}
}
?>
