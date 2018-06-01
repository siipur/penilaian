<?php
$aksi = "modul/mod_pelajaran/aksi_pelajaran.php";
if (isset($_SESSION['pesan']))
	$pesan = $_SESSION['pesan'];
else
	$pesan = '';
	
$act = (isset($_GET['act']))? $_GET['act'] : "main";

switch($act) {
	//Tampil Mata_Pelajaran
	default :
?>
<?php
			print($pesan);
			unset($_SESSION["pesan"]);

		echo "
			<legend><font color=\"green\">Mata Pelajaran</font></legend>
		
			<a href='?module=matpel&act=tambah_matpel' class=\"btn btn-primary\">
			<i class=\"glyphicon glyphicon-plus\"></i> Tambah Mata Pelajaran</a> 
			<div>&nbsp;</div>
			
			<div class=\"table-responsive\">
				<table class=\"table table-bordered\" >
					<thead style=\"background-color:grey\">
						<tr>
							<td>No.</td>
							<td>Kode Matpel</td>
							<td>Mata Pelajaran </td>
							<td>Jenis Mata pelajaran</td>
							<td>Aksi</td>
						</tr>
					</thead>";
					
			$tampil = mysql_query("SELECT * FROM tbl_matpel ORDER BY id_matpel");
			
			$no=1;
			while($r=mysql_fetch_array($tampil)){
				//setting warna bgcolor tbody
				if($no%2 == 1)
					$warna="white";
				else
					$warna="silver";
				
				echo "
					<tbody style=\"background-color:$warna\">
						<tr><td>$no</td>
							<td>$r[id_matpel]</td>
							<td>$r[nama_matpel]</td>
							<td>$r[jenis_matpel]</td>
							<td>
								<a href='?module=matpel&act=edit_matpel&id_matpel=$r[id_matpel]' class=\"edit\">
										<i class=\"glyphicon glyphicon-edit\" alt=\"edit\"></i></a> &nbsp;
								<a href='$aksi?module=matpel&act=hapus&id_matpel=$r[id_matpel]' class=\"hapus\">
										<i class=\"glyphicon glyphicon-trash\"></i></a>	
							</td>
						</tr>
					</tbody>";
			$no++;
			}
			echo "</table>
			</div>";
	break;
	
	//Tambah Mata_Pelajaran
	case "tambah_matpel" :
		echo "
		<legend><font color=\"green\">Tambah Mata Pelajaran</font></legend>
	
		<form class=\"form-horizontal\" role=\"form\" method=POST action='$aksi?module=matpel&act=input' enctype='multipart/form-data'>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Kode Mata Kuliah</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" name='kode_matpel' class=\"form-control\" required>
				</div>
			</div>
		
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Nama Mata Kuliah</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" name='nm_matpel' class=\"form-control\" required>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Jenis Mata Kuliah</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" name='jns_matpel' class=\"form-control\" required>
				</div>
			</div>
			
			<div class=\"form-group\">        
				<div class=\"col-sm-offset-4 col-sm-6\">
					<button type=\"submit\" class=\"btn btn-success\">Submit</button>
					<button type=\"reset\" class=\"btn btn-danger\" onclick=self.history.back()>Batal</button>
				</div>
			</div>
		</form>
		";
	break;
	
	//Edit Mata_Pelajaran
	case "edit_matpel" :
		$edit = mysql_query("
			SELECT * FROM tbl_matpel WHERE id_matpel ='$_GET[id_matpel]'
		");
		$data = mysql_fetch_array($edit);
		
		echo "
		<legend><font color=\"green\">Edit Mata Pelajaran</font></legend>
	
		<form class=\"form-horizontal\" role=\"form\" method='POST' action='$aksi?module=matpel&act=update' enctype='multipart/form-data'>
		
			<div class=\"form-group\">         
				<input type=\"hidden\" class=\"form-control\" name='id_matpel'  value='$data[id_matpel]'>
			</div>
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Kode Mata Kuliah</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" name='kode_matpel' class=\"form-control\" value='$data[id_matpel]' required>
				</div>
			</div>
		
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Nama Mata Kuliah</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" name='nm_matpel' class=\"form-control\" value='$data[nama_matpel]'required>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Jenis Mata Kuliah</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" name='jns_matpel' class=\"form-control\" value='$data[jenis_matpel]' required>
				</div>
			</div>
			
			<div class=\"form-group\">        
				<div class=\"col-sm-offset-4 col-sm-6\">
					<button type=\"submit\" class=\"btn btn-success\">Submit</button>
					<button type=\"reset\" class=\"btn btn-danger\" onclick=self.history.back()>Batal</button>
				</div>
			</div>
			
		</form>
		";
		
	break;
	
}
?>