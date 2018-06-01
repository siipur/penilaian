<?php
/*
		if(isset($_POST['submit'])) {
			
			$id_guru=htmlentities($_POST['id_guru']);
			$id_siswa=htmlentities($_POST['id_siswa']);
			$id_pelajaran=htmlentities($_POST['id_matpel']);
			$id_kelas=htmlentities($_POST['id_kelas']);
			$id_kelas_p=htmlentities($_POST['id_kelas_p']);
			

			if($id_guru == TRUE){
				$filter_guru="and nilai.nip=$id_guru";
			}else{
				$filter_guru="";
			}
			
			if($id_siswa == TRUE){
				$filter_siswa="and nilai.nis='$id_siswa'"; 
			}else{
				$filter_siswa=""; 
			}
			
			if($id_pelajaran == TRUE){
				$filter_pelajaran="and nilai.id_matpel='$id_pelajaran'";
			}else{
				$filter_pelajaran=""; 
			}
			
			if($id_kelas == TRUE){
				$filter_kelas="and nilai.id_kelas='$id_kelas'";
			}else{
				$filter_kelas="";
			}
			
			if($id_kelas_p == TRUE){
				$filter_kelas_p="and nilai.id_paralel='$id_kelas_p'";
			}else{
				$filter_kelas="";
			}	
		}
		else {
			unset($_POST['submit']);
		}
		
		$vw_hasil_nilai=mysql_query("
			SELECT * FROM 
				tbl_nilai nilai, tbl_siswa siswa, tbl_guru guru,
				tbl_matpel pelajaran, tbl_kelas kelas, 
				tbl_kelas_paralel kelas_p, tbl_th_ajaran thn_ajaran
			WHERE 
				nilai.nis=siswa.nis
				$filter_guru $filter_siswa $filter_pelajaran $filter_kelas $filter_kelas_p
			order by siswa.nama_murid
		");
*/
?>

<legend><font color="green">Laporan Nilai</font></legend>

<!-- start form Filter-->
<form class="form-horizontal" role="form" method=POST action='' enctype='multipart/form-data'>
	
	<div class="form-group">
		<label class="control-label col-sm-3">Guru</label>
		<label class="control-label col-sm-1">:</label>
		<div class="col-sm-6">  
			<select name="id_guru"  class="form-control">
				<option value='0'>&gt;&gt; Pilih Guru &lt;&lt;</option>

			<?php
			$vw_guru = mysql_query("select * from tbl_guru order by nama_guru asc");
			while($row=mysql_fetch_array($vw_guru)){
				echo "<option value='$row[nip]'>$row[nip] -- $row[nama_guru]</option>";
			}		
			?>

			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-3">Siswa</label>
		<label class="control-label col-sm-1">:</label>
		<div class="col-sm-6">  
			<select name="id_siswa"  class="form-control" required>
				<option value='0'>--Pilih Siswa--</option>
			  
			  	<?php
			  	$vw_siswa = mysql_query("select * from tbl_siswa order by nama_murid asc");
			  	while($row=mysql_fetch_array($vw_siswa)){
					echo "<option value='$row[nis]'> $row[nis] -- $row[nama_murid]</option>";
			 	}	
			 	?>	
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-3">Pelajaran</label>
		<label class="control-label col-sm-1">:</label>
		<div class="col-sm-6">          
			<select name="id_matpel" class="form-control" required>
				<option value='0'> &gt;&gt; Pilih Pelajaran &lt;&lt;</option>
				<?php
				  	$vw_matpel = mysql_query("select * from tbl_matpel order by id_matpel asc");
				 	while($row=mysql_fetch_array($vw_matpel)){
					echo "<option value='$row[id_matpel]'>$row[id_matpel] -- $row[nama_matpel]</option>";
				  }	
			  	?>				  
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-sm-3">Kelas</label>
		<label class="control-label col-sm-1">:</label>
		<div class="col-sm-6">          
			<select name="id_kelas" class="form-control">
			<option value='0'>--Pilih Kelas--</option>
			<?php
			  $vw_kelas = mysql_query("select * from tbl_kelas order by id_kelas asc");
			  while($row1=mysql_fetch_array($vw_kelas)){
				echo "
				  <option value='$row1[id_kelas]'>$row1[tingkat_kelas]</option>
				";
			  }		
			?>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<label class="control-label col-sm-3">Kelas Paralel</label>
		<label class="control-label col-sm-1">:</label>
		<div class="col-sm-6">          
			<select name="id_kelas_p" class="form-control" >
				<option value='0'>--Pilih Kelas Paralel--</option>
			<?php
			  $vw_kelas_p = mysql_query("select * from tbl_kelas_paralel order by id_paralel asc");
			  while($row1=mysql_fetch_array($vw_kelas_p)){
				echo "
				  <option value='$row1[id_paralel]'>$row1[nama_paralel]</option>
				";
			  }		
			?>
			</select>
		</div>
	</div>

	<div class="form-group">        
		<div class="col-sm-offset-4 col-sm-6">
			<button type="submit" class="btn btn-success">Filter Data</button>
		</div>
	</div>
</form>
<!-- / End form Filter-->

<div class="table-responsive">
	<table class="table table-bordered" >
		<thead style="background-color:grey">
			<tr>
				<td>No.</td>
				<td>NIS</td>
				<td>Nama Siswa</td>
				<td>Kelas</td>
				<td>Mata Pelajaran</td>
				<td>NIP</td>
				<td>Guru Pengajar</td>
				<td>Semester</td>
				<td>Tahun Ajaran</td>
				<td>Nilai Siswa</td>
				<td>Kategori Nilai</td>
			</tr>
		</thead>
	<?php
	/*

	
	*/
	/*****/
	
		$vw_hasil_nilai=mysql_query("
			SELECT * FROM 
				tbl_nilai nilai, tbl_siswa siswa, tbl_guru guru,
				tbl_matpel pelajaran, tbl_kelas kelas, 
				tbl_kelas_paralel kelas_p, tbl_th_ajaran thn_ajaran
			WHERE 
				nilai.nis=siswa.nis and 
				nilai.id_kelas=kelas.id_kelas and 
				nilai.id_paralel=kelas_p.id_paralel and
				nilai.id_matpel=pelajaran.id_matpel and 
				nilai.id_th_ajaran = thn_ajaran.id_th_ajaran and
				nilai.nip=guru.nip 
			order by siswa.nama_murid
		");
		
		/*			
		$vw_hasil_nilai = mysql_query("
			SELECT nis,nama_murid,tingkat_kelas,nama_paralel,nama_matpel,nip,nama_guru,semester,tahun_ajaran,nilai,jenis_nilai
			FROM tbl_nilai nilai, tbl_siswa siswa, tbl_kelas kelas, tbl_kelas_paralel kelas_p, tbl_matpel pelajaran, tbl_guru guru,tbl_th_ajaran tahun_ajaran 
			WHERE
				nilai.nis=siswa.nis and nilai.id_kelas=kelas.id_kelas and nilai.id_paralel=kelas_p.id_paralel and
				nilai.id_matpel=pelajaran.id_matpel and nilai.nip=guru.nip and nilai.id_th_ajaran=tahun_ajaran.id_th_ajaran and
				$filter_guru $filter_siswa $filter_pelajaran $filter_kelas
			ORDER BY siswa.nama_murid ASC
		");*/
		$i = 1;
		while($row = mysql_fetch_array($vw_hasil_nilai)){
			//setting warna bgcolor tbody
			if($i%2 == 1)
				$warna="white";
			else
				$warna="silver";
	?>

		<tbody style="background-color:<?php echo $warna; ?>">
			<tr>
		        <td><?php echo $i;?></td>
		        <td><?php echo $row['nis'];?></td>
				<td><?php echo $row['nama_murid'];?></td>
				<td><?php echo $row['tingkat_kelas'];?> <?php echo $row['nama_paralel'];?></td>
		        <td><?php echo $row['nama_matpel'];?></td>
		        <td><?php echo $row['nip'];?></td>
		        <td><?php echo $row['nama_guru'];?></td>
		        <td><?php echo $row['semester'];?></td>
		        <td><?php echo $row['tahun_ajaran'];?></td>
		        <td><?php echo $row['nilai'];?></td>
		        <td><?php echo $row['kategori_nilai'];?></td>
			</tr>
		</tbody>
		<?php
			$i++;
		}
			$jumSis = $i-1;
		?>
		
	</table>
</div>
		