<?php
include "config/koneksi.php";

function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}
//variable
$username = anti_injection($_POST['id_user']);
$pass     = anti_injection(md5($_POST['password']));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  echo "Sekarang loginnya tidak bisa di injeksi lho.";
}
else {
	## LOGIN SEBAGAI ADMIN ##
	// Tugas TU disini sebagai Admin dalam sistem ini
	if (trim($_POST['jenis_user'])=='administrator') {

		//$pass=md5($_POST[password]);
		$login = mysql_query("SELECT * FROM users WHERE id_user='$username' AND password='$pass' AND blokir='N'");
		$ketemu=mysql_num_rows($login);
		$r=mysql_fetch_array($login);

	// Apabila username dan password ditemukan
		if ($ketemu > 0) {
			session_start();
			//session_register("namauser");
			//session_register("namalengkap");
			//session_register("passuser");
			//session_register("leveluser");
		
			$_SESSION['namauser']    = $r['id_user'];
			$_SESSION['namalengkap'] = $r['nama_lengkap'];
			$_SESSION['passuser']    = $r['password'];
			$_SESSION['leveluser']   = $r['level'];
		
			header('location:admin/index.php?module=home');
		}
		else
		{
			echo "<link href='config/adminstyle.css' rel='stylesheet' type='text/css'>";
			echo "<center>LOGIN GAGAL! <br>
				Username atau Password Anda tidak benar.<br>
				Atau Account Anda sedang diblokir.<br>";
			echo "<a href='index.php'><b>ULANGI LAGI</b></a></center>";
		}
	}

	## LOGIN SEBAGAI GURU ##
	if (trim($_POST['jenis_user'])=='guru') {
		//$pass=md5($_POST[password]);
		$login = mysql_query("SELECT * FROM tbl_guru WHERE nip='$username' AND password='$pass'");
		$ketemu=mysql_num_rows($login);
		$r=mysql_fetch_array($login);

	// Apabila username dan password ditemukan
		if ($ketemu > 0) {
			session_start();
			//session_register("namauser");
			//session_register("namalengkap");
			//session_register("passuser");
			//session_register("leveluser");
			$_SESSION['namauser']    = $r['nip'];
			$_SESSION['namalengkap'] = $r['nama_guru'];
			$_SESSION['passuser']    = $r['password'];
			$_SESSION['leveluser']   = $r['level'];
		
			header('location:guru/index.php?module=home');
		}
		else
		{
			echo "<link href='config/adminstyle.css' rel='stylesheet' type='text/css'>";
			echo "<center>LOGIN GAGAL! <br>
				Username atau Password Anda tidak benar.<br>
				Atau Account Anda sedang diblokir.<br>";
			echo "<a href='index.php'><b>ULANGI LAGI</b></a></center>";
		}
	}

	## LOGIN SEBAGAI SISWA ##
	if (trim($_POST['jenis_user'])=='siswa') {
		//$pass=md5($_POST['password']);
		$login = mysql_query("SELECT * FROM tbl_siswa WHERE nis='$username' AND password='$pass'");
		$ketemu=mysql_num_rows($login);
		$r=mysql_fetch_array($login);

	// Apabila username dan password ditemukan
		if ($ketemu > 0) {
			session_start();
			//session_register("namauser");
			//session_register("namalengkap");
			//session_register("passuser");
		//session_register("leveluser");
		
			$_SESSION['namauser']    = $r['nis'];
			$_SESSION['namalengkap'] = $r['nama_murid'];
			$_SESSION['passuser']    = $r['password'];
			$_SESSION['leveluser']   = $r['level'];
		
			header('location:siswa/index.php?module=home');
		}
		else
		{
			echo "<link href='config/adminstyle.css' rel='stylesheet' type='text/css'>";
			echo "<center>LOGIN GAGAL! <br>
				Username atau Password Anda tidak benar.<br>
				Atau Account Anda sedang diblokir.<br>";
			echo "<a href='index.php'><b>ULANGI LAGI</b></a></center>";
		}
	}

}
?>