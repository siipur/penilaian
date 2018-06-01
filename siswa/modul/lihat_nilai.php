<?php
//ambil data dari database
$id_siswa = $_SESSION['namauser'];
$vw_hasil_nilai=mysql_query("
		SELECT * FROM 
			tbl_nilai nilai, tbl_siswa siswa, tbl_guru guru,
			tbl_matpel pelajaran, tbl_kelas kelas, 
			tbl_kelas_paralel kelas_p, tbl_th_ajaran thn_ajaran
		WHERE 
			nilai.nis=siswa.nis AND
			nilai.nip=guru.nip and
			nilai.id_kelas=kelas.id_kelas and 
			nilai.id_paralel=kelas_p.id_paralel and
			nilai.id_matpel=pelajaran.id_matpel and 
			nilai.id_th_ajaran = thn_ajaran.id_th_ajaran and
			siswa.nis='$id_siswa' 
		order by nilai.id_matpel
	");
	
?>

<legend><font color="lime">Laporan Nilai Siswa</font></legend>


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
		if(mysql_num_rows($vw_hasil_nilai)==0) {
			echo "<tr class='info'><td colspan=\"11\"><center><Font color='lime' style='background-color:black;'><strong>Maaf, belum ada data nilai saat ini</strong></font></center></td></tr>\n";		
		}
		else {
			
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
					<td><?php echo $id_siswa;?></td>
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
		<?php
				$i++;
			}
		}
		?>
			</tbody>
		
	</table>
</div>
		