<?php
//session_start();
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else {

	$aksi = "modul/mod_user/aksi_user.php";
	switch($_GET['act']){
		// Tampil User
		default:
		echo "
		<legend><font color=\"green\">Para User</font></legend>
		<a href='?module=user&act=tambahuser' class=\"btn btn-primary\"><i class=\"glyphicon glyphicon-plus\"></i> Tambah User</a> 
		<div>&nbsp;</div>
		<div class=\"table-responsive\">
			<table class=\"table table-striped\">
				<thead style=\"background-color:grey\">
					<tr>
						<td>No.</td>
						<td>Username</td>
						<td>Nama Lengkap</td>
						<td>E-mail</td>
						<td>No.Telp</td>
						<td>Blokir</td>
						<td>Aksi</td>
					</tr>
				</thead>";

			
			$tampil=mysql_query("SELECT * FROM users ORDER BY id_user");
			$no=1;
			while($r=mysql_fetch_array($tampil)) {
				echo "
				<tbody class=\"info\">
					<tr>
						<td>$no</td>
						<td>$r[id_user]</td>
						<td>$r[nama_lengkap]</td>
						<td><a href=mailto:$r[email]>$r[email]</a></td>
						<td>$r[no_telp]</td>
						<td align=center>$r[blokir]</td>
						<td>
							<a href=?module=user&act=edituser&id=$r[id_user] clas=\"edit\">
								<i class=\"glyphicon glyphicon-edit\"></i></a> &nbsp;
							<a href=$aksi?module=user&act=hapus&id=$r[id_user] class=\"hapus\">
								<i class=\"glyphicon glyphicon-trash\"></i></a>
						</td>
					</tr>
				</tbody>";
				$no++;
			}
			echo "	
			</table>
		</div>";
	break;

	case "tambahuser":
	echo "<legend><font color=\"green\">Tambah User</font></legend>
		<form class=\"form-horizontal\" role=\"form\" method=POST action='$aksi?module=user&act=input'>
		
		<table>
			<tr>
				<td>Username</td>
				<td> : <input type=text name='username'></td>
			</tr>
			<tr>
				<td>Password</td>
				<td> : <input type=text name='password'></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td> : <input type=text name='nama_lengkap' size=30></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td> : <input type=text name='email' size=30></td>
			</tr>
			<tr>
				<td>No. Telp</td>
				<td> : <input type=text name='no_telp' size=20></td>
			</tr>
			<tr>
				<td colspan=2><input type=submit value=Simpan><input type=button value=Batal onclick=self.history.back()></td>
			</tr>
		</table>
	</form>";
	break;

	case "edituser":
	$edit=mysql_query("SELECT * FROM users WHERE id_user='$_GET[id]'");
	$r=mysql_fetch_array($edit);

	echo "<h2>Edit User</h2>
	<form method=POST action=$aksi?module=user&act=update>
	<input type=hidden name=id value='$r[id_user]'>

	<table>
	<tr>
		<td>Username</td>
		<td> : <input type=text name='username' value='$r[id_user]'></td>
	</tr>
	<tr>
		<td>Password</td>
		<td> : <input type=text name='password'> *)</td>
	</tr>
	<tr>
		<td>Nama Lengkap</td>
		<td> : <input type=text name='nama_lengkap' size=30 value='$r[nama_lengkap]'></td>
	</tr>
	<tr>
		<td>E-mail</td>
		<td> : <input type=text name='email' size=30 value='$r[email]'></td>
	</tr>
	<tr>
		<td>No. Telp</td>
		<td> : <input type=text name='no_telp' size=30 value='$r[no_telp]'></td>
	</tr>";

	if ($r[blokir]=='N') {
		echo "<tr><td>Blokir</td>
				<td> : <input type=radio name='blokir' value='Y'> Y
				<input type=radio name='blokir' value='N' checked> N </td></tr>";
	}
	else {
		echo "<tr><td>Blokir</td>
				<td> : <input type=radio name='blokir' value='Y' checked> Y
				<input type=radio name='blokir' value='N'> N </td></tr>";
	}
	echo "<tr><td colspan=2>*) Apabila password tidak diubah, dikosongkan saja.</td></tr>
		<tr><td colspan=2><input type=submit value=Update><input type=button value=Batal onclick=self.history.back()></td></tr>
		</table></form>";
	break;
	}

}
?>