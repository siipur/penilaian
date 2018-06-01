<?php
//session_start();
 if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else {
	
	$aksi = "modul/mod_user/aksi_user.php";
	
	$act = (isset($_GET['act']))? $_GET['act'] : "main";
	switch($act){
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
	echo "
		<legend><font color=\"green\">Tambah User</font></legend>
		<form class=\"form-horizontal\" role=\"form\" method=POST action='$aksi?module=user&act=input'>
		<div class=\"form-group\">
			<label class=\"control-label col-sm-2\" for=\"user\">Username</label>
			<div class=\"col-sm-10\">          
				<input type=\"text\" name='username' class=\"form-control\" id=\"usr\" required>
			</div>
		</div>
		<div class=\"form-group\">
			<label class=\"control-label col-sm-2\" for=\"password\">Password</label>
			<div class=\"col-sm-10\">          
				<input type=\"password\" name='password' class=\"form-control\" id=\"pwd\" required>
			</div>
		</div>
		<div class=\"form-group\">
			<label class=\"control-label col-sm-2\" for=\"nama_lengkap\">Nama Lengkap</label>
			<div class=\"col-sm-10\">          
				<input type=\"text\" name='nama_lengkap' class=\"form-control\" id=\"namalengkap\" required>
			</div>
		</div>
		<div class=\"form-group\">
			<label class=\"control-label col-sm-2\" for=\"email\">E-mail</label>
			<div class=\"col-sm-10\">          
				<input type=\"text\" name='email' class=\"form-control\" id=\"email\">
			</div>
		</div>
		<div class=\"form-group\">
			<label class=\"control-label col-sm-2\" for=\"no_telp\">No. Telp</label>
			<div class=\"col-sm-10\">          
				<input type=\"text\" name='no_telp' class=\"form-control\" id=\"cp\">
			</div>
		</div>
		<div class=\"form-group\">        
			<div class=\"col-sm-offset-2 col-sm-10\">
				<button type=\"submit\" class=\"btn btn-success\">Submit</button>
				<button type=\"reset\" class=\"btn btn-danger\" onclick=self.history.back()>Batal</button>
			</div>
		</div>
	</form>";
	break;

	case "edituser":
	$edit=mysql_query("SELECT * FROM users WHERE id_user='$_GET[id]'");
	$r=mysql_fetch_array($edit);

	echo "
		<legend><font color=\"green\">Edit User</font></legend>
		<form class=\"form-horizontal\" role=\"form\" method=POST action=$aksi?module=user&act=update>
			<input type=hidden name=id value='$r[id_user]'>
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\" for=\"user\">Username</label>
				<div class=\"col-sm-10\">          
					<input type=\"text\" name='username' class=\"form-control\" id=\"usr\" value='$r[id_user]'>
				</div>
			</div>
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\" for=\"password\">Password</label>
				<div class=\"col-sm-10\">          
					<input type=\"password\" name='password' class=\"form-control\" id=\"pwd\"> *)
				</div>
			</div>
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\" for=\"nama_lengkap\">Nama Lengkap</label>
				<div class=\"col-sm-10\">          
					<input type=\"text\" name='nama_lengkap' class=\"form-control\" id=\"namalengkap\" value='$r[nama_lengkap]'>
				</div>
			</div>
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\" for=\"email\">E-mail</label>
				<div class=\"col-sm-10\">          
					<input type=\"text\" name='email' class=\"form-control\" id=\"email\" value='$r[email]'>
				</div>
			</div>
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\" for=\"no_telp\">No. Telp</label>
				<div class=\"col-sm-10\">          
					<input type=\"text\" name='no_telp' class=\"form-control\" id=\"cp\" value='$r[no_telp]'>
				</div>
			</div>";
	if ($r['blokir']=='N') {
		echo "
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\" for=\"blokir\">Blokir</label>
				<div class=\"col-sm-10\">  
					<label class=\"radio-inline\"><input type=\"radio\" name='blokir' value='Y'> Y</label>
					<label class=\"radio-inline\"><input type=\"radio\" name='blokir' value='N' checked> N</label>
				</div>
			</div>";
	}
	else {
		echo "
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\" for=\"blokir\">Blokir</label>
				<div class=\"col-sm-10\">  
					<label class=\"radio-inline\"><input type=\"radio\" name='blokir' value='Y' checked> Y</label>
					<label class=\"radio-inline\"><input type=\"radio\" name='blokir' value='N'> N</label>
				</div>
			</div>";
	}
	echo "
			<div class=\"form-group\">        
				<div class=\"col-sm-offset-2 col-sm-10\">
					Note : *) Jika password tidak akan diubah, dikosongkan saja :D.
				</div>
			</div>
			<div class=\"form-group\">        
				<div class=\"col-sm-offset-2 col-sm-10\">
					<button type=\"submit\" class=\"btn btn-success\">Update</button>
					<button type=\"reset\" class=\"btn btn-danger\" onclick=self.history.back()>Batal</button>
				</div>
			</div>
		</form>";
	break;
	}

}
?>