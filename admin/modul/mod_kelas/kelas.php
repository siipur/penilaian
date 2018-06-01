<?php
$aksi = "modul/mod_kelas/aksi_kelas.php";

if (isset($_SESSION['pesan']))
	 $pesan = $_SESSION['pesan'];
else $pesan = '';


$act = (isset($_GET['act']))?$_GET['act'] : "main";
switch($act) {
	// Tampil Kelas
	default:
?>
		<legend><font color="green">Data Kelas</font></legend>
		
		<a href='?module=kelas&act=tambahkelas' class="btn btn-primary">
			<i class="glyphicon glyphicon-plus"></i> Tambah Kelas</a> 
		<div>&nbsp;</div>
		
		<?php
			print($pesan);
			unset($_SESSION["pesan"]);
		?>
		
		<div class="table-responsive">
			<table class="table table-bordered" width="70px" >
				<thead style="background-color:grey">
					<tr>
						<td>No.</td>
						<td>id Kelas</td>
						<td>Tingkatan Kelas</td>
						<td>Kapasitas Kelas</td>
						<td>Aksi</td>
					</tr>
				</thead>
				
			<?php
			$tampil = mysql_query("SELECT * FROM tbl_kelas");
			$no = 1;
				
			while ($data = mysql_fetch_array($tampil)){
				//setting warna bgcolor tbody
				if($no%2 == 1)
					$warna="white";
				else
					$warna="silver";
				
				echo "
				<tbody style=\"background-color:$warna\">
		
					<tr>
						<td>$no</td>
						<td>$data[id_kelas]</td>
						<td>$data[tingkat_kelas]</td>
						<td>$data[kapasitas]</td>
						<td>
							<a href='?module=kelas&act=editkelas&id_kls=$data[id_kelas]' class=\"edit\">
								<i class=\"glyphicon glyphicon-edit\" alt=\"edit\"></i></a> &nbsp;&nbsp;
							<a href='$aksi?module=kelas&act=hapus&id_kls=$data[id_kelas]' class=\"hapus\">
								<i class=\"glyphicon glyphicon-trash\"></i></a>
						</td>
					</tr>
				</body>
				";
				$no++;
			}	
		?>
		
			</table>
		</div>
		
	<?php
	break;	
	?>
	<?php
	//tambah kelas
	case "tambahkelas":
	?>
		<legend><font color="green">Tambah Kelas</font></legend>
		<form class="form-horizontal" role="form" method="POST" action='<?php echo "$aksi?module=kelas&act=input";?>'>
		
			<div class="form-group">
				<label class="control-label col-sm-3">Id Kelas</label>
				<label class="control-label col-sm-1">:</label>
				<div class="col-sm-4">          
					<input type="text" class="form-control" name='id_kelas'  required>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">Tingkat Kelas</label>
				<label class="control-label col-sm-1">:</label>
				<div class="col-sm-4">     
					<input type="text" class="form-control" name='tingkatan_kelas'  required>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">Kapasitas Kelas</label>
				<label class="control-label col-sm-1">:</label>
				<div class="col-sm-4">     
					<input type="text" class="form-control" name='kapasitas_kelas'  required>
				</div>
			</div>
			
			<div class="form-group">        
				<div class="col-sm-offset-4 col-sm-8">
					<button type="submit" class="btn btn-success">Submit</button>
					<button type="reset" class="btn btn-danger" onclick=self.history.back()>Batal</button>
				</div>
			</div>
		</form>
	<?php
	break;
	?>
	
	<?php
	case "editkelas":
		$edit = mysql_query("SELECT * FROM tbl_kelas WHERE id_kelas ='$_GET[id_kls]'");
		$data = mysql_fetch_array($edit);
	?>
	<legend><font color="green">Tambah Kelas</font></legend>
		<form class="form-horizontal" role="form" method="POST" action='<?php echo "$aksi?module=kelas&act=update";?>' enctype=\"multipart/form-data\">
		
			<div class="form-group">
				<label class="control-label col-sm-3">Id Kelas</label>
				<label class="control-label col-sm-1">:</label>
				<div class="col-sm-4"> 
					<!-- input type hidden penting utk proses edit -->
					<input type="hidden" name='id_kls' value='<?php echo "$data[id_kelas]";?>' required>
					<input type="text" class="form-control" name='id_kelas' value='<?php echo "$data[id_kelas]";?>' required>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">Tingkat Kelas</label>
				<label class="control-label col-sm-1">:</label>
				<div class="col-sm-4">     
					<input type="text" class="form-control" name='tingkatan_kelas' value='<?php echo "$data[tingkat_kelas]";?>'  required>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">Kapasitas Kelas</label>
				<label class="control-label col-sm-1">:</label>
				<div class="col-sm-4">     
					<input type="text" class="form-control" name='kapasitas_kelas' value='<?php echo "$data[kapasitas]";?>' required>
				</div>
			</div>
			
			<div class="form-group">        
				<div class="col-sm-offset-4 col-sm-8">
					<button type="submit" class="btn btn-success">Submit</button>
					<button type="reset" class="btn btn-danger" onclick=self.history.back()>Batal</button>
				</div>
			</div>
		</form>
	<?php
	break;
	?>
	
<?php
}
?>