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
	//include "../../../config/class_paging.php";

	$module	=$_GET['module'];
	$act	=$_GET['act'];
	
	/*
	// Hapus 
	if ($module=='input-nilai' AND $act=='hapus') {
		mysql_query("DELETE FROM tbl_nilai WHERE id_nilai='$_GET[id]'");
		header('location:../../../guru/index.php?module='.$module.'&act='.$act);
	
	}
	*/

	//input nilai siswa pada suatu kelas
	if ($module == 'input-nilai' AND $act == 'input-nilai-siswa') {

		$jumSis = $_POST['jumlah'];
		for ($i=1; $i<=$jumSis; $i++) 
		{
			$id_siswa = $_POST['id_siswa'.$i];
			$nilai  = $_POST['nilai'.$i];

		   	if($nilai <= 30){
		   		$kategori_nilai = "E";
		   	}
		   	elseif($nilai>30 && $nilai<=50){
		   		$kategori_nilai = "D";
		   	}
		   	elseif($nilai>50 && $nilai<=70){
		   		$kategori_nilai = "C";
		   	}
		   	elseif($nilai>70 && $nilai<=85){
		   		$kategori_nilai = "B";
		   	}
		   	elseif($nilai>85 && $nilai<=100){
		   		$kategori_nilai = "A";
		   	}

			$id_guru = $_POST['id_guru'];
			$id_kelas = $_POST['id_kelas'];
			$id_kls_p = $_POST['id_kelas_p'];
			$id_pelajaran = $_POST['id_pelajaran'];
			$id_thn_ajaran = $_POST['id_thn_ajaran'];
			$semester = $_POST['smstr'];

			//proses input
			$lebokna_nilai = mysql_query ("
				INSERT INTO tbl_nilai 
				VALUES
				('','$id_pelajaran','$id_siswa','$id_thn_ajaran','$id_kelas','$id_kls_p','$semester','$id_guru','$nilai','$kategori_nilai')
			");
		}
		
		if($lebokna_nilai) {
			$_SESSION['pesan'] = "
				<script language='javascript'>
					alert('Nilai berhasil diinput');
				</script>
			";
			header('location: ../../../guru/index.php?module='.$module.'&act=nilai-selesai&id_guru='.$id_guru.'&id_kelas='.$id_kelas.'&id_kelas_p='.$id_kls_p.'&id_pelajaran='.$id_pelajaran.'&id_thn_ajaran='.$id_thn_ajaran.'&smstr='.$semester);

		} else {
			$_SESSION['pesan'] = "
				<script language='javascript'>
					alert('Nilai Gagal diinput');
				</script>
			";
			header('location: ../../../guru/index.php?module='.$module.'&act=input-nilai-selesai&status=2');

		}
	} //tutup input proses

	## Proses EDIT
	elseif ($module == 'input-nilai' AND $act == 'update-nilai-siswa') {

		$jumSis = $_POST['jumlah'];

		for ($i=1; $i<=$jumSis; $i++) 
		{
		   $id_siswa = $_POST['id_siswa'.$i];
		   $nilai  = $_POST['nilai'.$i];

		   	if($nilai <= 30){
		   		$kategori_nilai = "E";
		   	}
		   	elseif($nilai>30 && $nilai<=50){
		   		$kategori_nilai = "D";
		   	}
		   	elseif($nilai>50 && $nilai<=70){
		   		$kategori_nilai = "C";
		   	}
		   	elseif($nilai>70 && $nilai<=85){
		   		$kategori_nilai = "B";
		   	}
		   	elseif($nilai>85 && $nilai<=100){
		   		$kategori_nilai = "A";
		   	}

		
		   $id_guru = $_POST['id_guru'];
		   $id_kelas = $_POST['id_kelas'];
		   $id_kls_p = $_POST['id_kelas_p'];
		   $id_pelajaran = $_POST['id_pelajaran'];
		   $id_thn_ajaran = $_POST['id_ajaran'];
		   $semester = $_POST['smstr'];

		 
			$update_nilai = mysql_query ("
				UPDATE tbl_nilai SET 
					nilai= '$nilai',
					kategori_nilai='$kategori_nilai',
					id_th_ajaran = '$id_thn_ajaran',
					semester = '$semester'
				WHERE 
					nis 		= '$id_siswa' And
					nip 		= '$id_guru' And
					id_kelas 	= '$id_kelas' And
					id_paralel	= '$id_kls_p' And
					id_matpel 	= '$id_pelajaran' 
			");
		}
		
		if($update_nilai) {
			$_SESSION['pesan'] = "
				<script language='javascript'>
					alert('Nilai berhasil diupdate');
				</script>
			";
			header('location: ../../../guru/index.php?module='.$module.'&act=nilai-selesai&id_guru='.$id_guru.'&id_kelas='.$id_kelas.'&id_kelas_p='.$id_kls_p.'&id_pelajaran='.$id_pelajaran.'&id_thn_ajaran='.$id_thn_ajaran.'&smstr='.$semester);
		} else {
			$_SESSION['pesan'] = "
				<script language='javascript'>
					alert('Nilai Gagal diupdate');
				</script>
			";
			//header('location: ../../../guru/index.php?module='.$module.'&act=input-nilai-selesai&status=0');

		}
	}
}

?>
