<?php

if(isset($_SESSION['info'])){
	$pesan = $_SESSION['info'];
} else {
	$pesan= '';
}

$aksi = "modul/mod_mydata/aksi_mydata.php";

$act = (isset($_GET['act']))? $_GET['act'] : "main";
switch($act) {
	
	// Tampil Siswa
	default:

	$tampil = mysql_query("SELECT * FROM tbl_siswa WHERE nis='$_SESSION[namauser]'");
		
	$data=mysql_fetch_array($tampil);

	$last_update = tgl_indo($data['tgl_edit']);
	$tgl_lahir = tgl_indo($data['tgl_lahir']);

	echo "
	<legend style='color:lime;'>Data Saya :</legend>";
	
		print($pesan);
		unset($_SESSION['info']);
		
	echo"
	<div class=\"jumbotron\">

		<div class=\"table-responsive\">
			<table class=\"table table-bordered\">
				<tbody>
				<tr>
					<td width=27%>
						<img src=\"../siswa/images/$data[img_siswa]\" class=\"img-rounded\" alt=\"foto\" width=200 height=284> 
					</td>
					<td>
						<table class=\"table  table-condensed\">
							<tbody>
								<tr><td>NIS</td> <td>:</td> <td>$data[nis]</td></tr>
								<tr><td>NISN</td> <td>:</td> <td>$data[nisn]</td></tr>
								<tr><td>Nama Lengkap</td> <td>:</td> <td>$data[nama_murid]</td></tr>
								<tr><td>Jenis Kelamin</td> <td>:</td> <td>$data[jenis_kelamin]</td></tr>
								<tr><td>Tempat,Tanggal Lahir </td><td>:</td> <td>$data[tmp_lahir],$tgl_lahir</td></tr>
								<tr><td>Agama </td><td>:</td> <td>$data[agama]</td></tr>
								<tr><td>Alamat </td><td>:</td> <td>$data[alamat]</td></tr>
								<tr><td>Tlp./Hp </td><td>:</td> <td>$data[telepon]</td></tr>
							</tbody>
						</table>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
		<pre>Last Update : $last_update</pre>
		<button type=\"reset\" class=\"btn btn-danger\" onclick=self.history.back()>Kembali</button>
		<button class=\"btn btn-warning\">
			<a href='?module=profile&act=editmydata&id=$data[nis]' class=\"edit\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"klik untuk edit !\">
			<i class=\"glyphicon glyphicon-edit\" alt=\"edit\"></i>&nbsp;Edit</a>
		</button>
					
	</div>
	<script>
	$(document).ready(function(){
	    $('[data-toggle=\"tooltip\"]').tooltip();   
	});
	</script>
	

	";
	
	break;
	
	

	// halaman edit data
	case "editmydata":
	$edit = mysql_query("SELECT * FROM tbl_siswa WHERE nis='$_GET[id]'");
	$r = mysql_fetch_array($edit);
	
	$last_update = tgl_indo($r['tgl_edit']);
	echo "
		<legend><font color=\"lime\">Edit My Data</font></legend>
	
		<form class=\"form-horizontal\" role=\"form\" method=POST action=$aksi?module=profile&act=update enctype=\"multipart/form-data\">
			<input type=hidden name=id value='$r[nis]'>
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">NIS</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" class=\"form-control\" name='nis' value='$r[nis]' disabled>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">NISN</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" class=\"form-control\" name='nisn' value='$r[nisn]' disabled>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Password</label>
				<label class=\"control-label col-sm-1\">:</label>
				*)
				<div class=\"col-sm-6\">   
					<input type=\"password\" name='password' class=\"form-control\">
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Nama Lengkap</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" class=\"form-control\" name='nama_lengkap' value='$r[nama_murid]' required>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Jenis Kelamin</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">";
					if($r['jenis_kelamin'] == 'Laki-laki')
						echo "
							<label class=\"radio-inline\"><input type=\"radio\" name='jenis_kelamin' value='Laki-laki' checked>Pria</label>
							<label class=\"radio-inline\"><input type=\"radio\" name='jenis_kelamin' value='Perempuan'>Wanita</label>
						";
					else
						echo "
							<label class=\"radio-inline\"><input type=\"radio\" name='jenis_kelamin' value='Laki-laki'>Pria</label>
							<label class=\"radio-inline\"><input type=\"radio\" name='jenis_kelamin' value='Perempuan' checked>Wanita</label>
						";
				echo"
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Tempat Lahir</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" class=\"form-control\" name='tempat_lahir' value='$r[tmp_lahir]' >
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Tanggal Lahir</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-4\">
					<input type=\"date\"  class=\"form-control\" name='tgl_lhr' value='$r[tgl_lahir]' >
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Agama</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-4\"> 
					<select class=\"form-control\" name='agama' value='$r[agama]'>";
					
						if($r[agama] == 'Islam'){
							echo "
								<option value='Islam' selected>Islam</option>
								<option value='Kristen'>Kristen</option>
								<option value='Khatolik'>Khatolik</option>
								<option value='Hindu'>Hindu</option>
								<option value='Budha'>Budha</option>
							";
						}
						elseif($r[agama] == 'Kristen'){
							echo "
								<option value='Islam'>Islam</option>
								<option value='Kristen' selected>Kristen</option>
								<option value='Khatolik'>Khatolik</option>
								<option value='Hindu'>Hindu</option>
								<option value='Budha'>Budha</option>
							";
						}
						elseif($r[agama] == 'Khatolik'){
							echo "
								<option value='Islam'>Islam</option>
								<option value='Kristen'>Kristen</option>
								<option value='Khatolik' selected>Khatolik</option>
								<option value='Hindu'>Hindu</option>
								<option value='Budha'>Budha</option>
							";
						}
						elseif($r[agama] == 'Hindu'){
							echo "
								<option value='Islam'>Islam</option>
								<option value='Kristen'>Kristen</option>
								<option value='Khatolik'>Khatolik</option>
								<option value='Hindu' selected>Hindu</option>
								<option value='Budha'>Budha</option>
							";
						}
						elseif($r[agama] == 'Budha'){
							echo "
								<option value='Islam'>Islam</option>
								<option value='Kristen'>Kristen</option>
								<option value='Khatolik'>Khatolik</option>
								<option value='Hindu'>Hindu</option>
								<option value='Budha' selected>Budha</option>
							";
						}
					echo "
					</select>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Alamat</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\"> 
					<textarea class=\"form-control\" name='alamat' rows=5 value='$r[alamat]'>$r[alamat]</textarea>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">No. Telp</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" class=\"form-control\" name='telepon' value='$r[telepon]'>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Foto</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<img src=\"images/$r[img_siswa]\" class=\"img-rounded\" alt=\"foto\" width=200 height=254> 
			
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Ubah Foto</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"file\" class=\"form-control\" name='foto_siswa'>
				</div>
			</div>
			
			<div class=\"form-group\">        
				<div class=\"col-sm-offset-4 col-sm-6\">
					*) Apabila password tidak diubah, dikosongkan saja. <br/>
					<div class=\"clearfix\">$nbsp</div>
					<button type=\"submit\" class=\"btn btn-success\">Update</button>
					<button type=\"reset\" class=\"btn btn-danger\" onclick=self.history.back()>Batal</button>
				</div>
			</div>
		
		</form> 
		<p>Terakhir di Update pada : $last_update</p>";
		
	break;
}
?>