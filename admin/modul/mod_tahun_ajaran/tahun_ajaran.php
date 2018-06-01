<?php
if (isset($_SESSION['pesan']))
	$pesan = $_SESSION['pesan'];
else
	$pesan = '';

$aksi = "modul/mod_tahun_ajaran/aksi_tahun_ajaran.php";

$act = (isset($_GET['act']))? $_GET['act'] : "main";

switch($act) {
	
	//tampilan awal
	default :
?>
		<legend><font color="green">Tahun Ajaran</font></legend>
		
		<a href='?module=tahun-ajaran&act=tambah_tahun_ajaran' class="btn btn-primary">
			<i class="glyphicon glyphicon-plus"></i> Tambah Tahun Ajaran</a> 
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
						<td>id tahun ajaran</td>
						<td>Tahun Ajaran</td>
						<td>Aksi</td>
					</tr>
				</thead>
				
		<?php
			$tampil = mysql_query("SELECT * FROM tbl_th_ajaran");
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
						<td>$data[id_th_ajaran]</td>
						<td>$data[tahun_ajaran]</td>
						<td>
							<a href='?module=tahun-ajaran&act=edit_tahun_ajaran&id_thn=$data[id_th_ajaran]' class=\"edit\">
								<i class=\"glyphicon glyphicon-edit\" alt=\"edit\"></i></a> &nbsp;&nbsp;
							<a href='$aksi?module=tahun-ajaran&act=hapus&id_thn=$data[id_th_ajaran]' class=\"hapus\">
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
	//<?php echo substr($data[tahun_ajaran],2,3); 
	break;
	?>
	
	<?php
	//tambah tahun ajaran
	case "tambah_tahun_ajaran" :
	?>
		<legend><font color="green">Tambah Tahun Ajaran</font></legend>
		<form class="form-horizontal" role="form" method="POST" action='<?php echo "$aksi?module=tahun-ajaran&act=input";?>' enctype='multipart/form-data'>
		
			<div class="form-group">
				<label class="control-label col-sm-3">Kode Tahun Ajaran</label>
				<label class="control-label col-sm-1">:</label>
				<div class="col-sm-4">          
					<input type="text" class="form-control" name='id_thn_ajaran'  required>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-3">Tahun Ajaran</label>
				<label class="control-label col-sm-1">:</label>
				<div class="col-sm-4">     
				
					<select class="form-control input-sm" name='thn_ajaran' required>
						<?php
							echo "<option value=''> -- Pilih tahun ajaran -- </option>";
							$thn_sekarang = date('Y') +1;
							for ($i=2001; $i<=$thn_sekarang; $i++) {
								$j = $i +1;
								echo "
								<option value='$i/$j'> $i / $j </option>";
							}
						?>
					</select>
					
				</div>
			</div>
			<div class="form-group">        
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-success">Submit</button>
					<button type="reset" class="btn btn-danger" onclick=self.history.back()>Batal</button>
				</div>
			</div>
		</form>
	<?php
	break;
	?>
	
	<?php
	// edit tahun ajaran
	case "edit_tahun_ajaran" :
		$edit = mysql_query("SELECT * FROM tbl_th_ajaran WHERE id_th_ajaran='$_GET[id_thn]'" );
		$data = mysql_fetch_array($edit);
	?>
	
		<legend><font color="green">Edit Tahun Ajaran</font></legend>
		<form class="form-horizontal" role="form" method="POST" action='<?php echo "$aksi?module=tahun-ajaran&act=update";?>'>
			
			<div class="form-group">
				<label class="control-label col-sm-3">Kode Tahun Ajaran</label>
				<label class="control-label col-sm-1">:</label>
				<div class="col-sm-4">          
					<input type="hidden" name='id_thn' value='<?php echo "$data[id_th_ajaran]";?>'>
					<input type="text" class="form-control" name='id_thn_ajaran'  value='<?php echo "$data[id_th_ajaran]";?>' required>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Tahun Ajaran</label>
				<label class="control-label col-sm-1">:</label>
				<div class="col-sm-4">     
				
					<select class="form-control input-sm" name='thn_ajaran' value ='<?php echo "$data[tahun_ajaran]";?>' required>
						<?php
							$thn_sekarang = date('Y') +1;	
								for ($i=2001; $i<=$thn_sekarang; $i++) {
									$j = $i +1;
									echo "<option value='$i/$j'> $i / $j </option>";
									if ($data[tahun_ajaran] == $i.'/'.$j ) {
										echo "
										<option value='$i/$j' selected>$i / $j</option>";
									}
								}
							
						?>
					</select>
					
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