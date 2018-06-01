<?php
$aksi = "modul/mod_kelas_paralel/aksi_kelas_p.php";

if (isset($_SESSION['pesan']))
	 $pesan = $_SESSION['pesan'];
else $pesan = '';


$act = (isset($_GET['act']))?$_GET['act'] : "main";
switch($act) {
	// Tampil Kelas
	default:
?>
		<legend><font color="green">Data Kelas Paralel</font></legend>
		
		<a href='?module=kelas_p&act=tambahkelas_p' class="btn btn-primary">
			<i class="glyphicon glyphicon-plus"></i> Tambah Kelas Paralel</a> 
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
						<td>id Paralel</td>
						<td>nama paralel kelas</td>
						<td>Aksi</td>
					</tr>
				</thead>
				
			<?php
			$tampil = mysql_query("SELECT * FROM tbl_kelas_paralel");
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
						<td>$data[id_paralel]</td>
						<td>$data[nama_paralel]</td>
						<td>
							<a href='?module=kelas_p&act=editkelas_p&id=$data[id_paralel]' class=\"edit\">
								<i class=\"glyphicon glyphicon-edit\" alt=\"edit\"></i></a> &nbsp;&nbsp;
							<a href='$aksi?module=kelas_p&act=hapus&id=$data[id_paralel]' class=\"hapus\">
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
	case "tambahkelas_p":
	?>
		<legend><font color="green">Tambah Kelas Paralel</font></legend>
		<form class="form-horizontal" role="form" method="POST" action='<?php echo "$aksi?module=kelas_p&act=input";?>'>
		
			<div class="form-group">
				<label class="control-label col-sm-3">Id Paralel</label>
				<label class="control-label col-sm-1">:</label>
				<div class="col-sm-4">          
					<input type="text" class="form-control" name='id_paralel'  required>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">Nama Kelas Paralel</label>
				<label class="control-label col-sm-1">:</label>
				<div class="col-sm-4">     
					<input type="text" class="form-control" name='nm_paralel'  required>
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
	// halaman edit kelas
	case "editkelas_p":
		$edit = mysql_query("SELECT * FROM tbl_kelas_paralel WHERE id_paralel ='$_GET[id]'");
		$data = mysql_fetch_array($edit);
	?>
	<legend><font color="green">Tambah Kelas Paralel</font></legend>
		<form class="form-horizontal" role="form" method="POST" action='<?php echo "$aksi?module=kelas&act=update";?>' enctype=\"multipart/form-data\">
		
			<div class="form-group">
				<label class="control-label col-sm-3">Id Kelas</label>
				<label class="control-label col-sm-1">:</label>
				<div class="col-sm-4"> 
					<!-- input type hidden penting utk proses edit -->
					<input type="hidden" name='id' value='<?php echo "$data[id_paralel]";?>'>
					<input type="text" class="form-control" name='id_paralel' value='<?php echo "$data[id_paralel]";?>' required>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">Nama Kelas Paralel</label>
				<label class="control-label col-sm-1">:</label>
				<div class="col-sm-4">     
					<input type="text" class="form-control" name='nm_paralel' value='<?php echo "$data[nama_paralel]";?>'  required>
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