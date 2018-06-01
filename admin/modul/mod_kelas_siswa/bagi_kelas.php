<?php
$aksi = "modul/mod_kelas_siswa/aksi_bagi_kelas.php";
if (isset($_SESSION['pesan']))
	 $pesan = $_SESSION['pesan'];
else $pesan = '';

$act = (isset($_GET['act']))?$_GET['act'] : "main";
switch($act) {

	default :
	print "$pesan";
	unset ($_SESSION['pesan']);
	
	echo "
	<legend><font color=\"green\">Pembagian Kelas</font></legend>
		<form class=\"form-horizontal\" role=\"form\" method=POST action='$aksi?module=bagi-kelas&act=input' enctype='multipart/form-data'>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Siswa</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">  
					<select name=\"nis\"  class=\"form-control\" required>
						<option value=''>--Pilih Siswa--</option>";
					  $vw_siswa = mysql_query("select * from tbl_siswa order by nama_murid asc");
					  while($row1=mysql_fetch_array($vw_siswa)){
						echo "
                          <option value='$row1[nis]'> $row1[nis] -- $row1[nama_murid]</option>
						";
					  }		
	echo"				  
				</select>
				</div>
			</div>
		
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Kelas</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<select name=\"id_kelas\" class=\"form-control\" required>
					<option value=''>--Pilih Kelas--</option>";
					  $vw_kelas = mysql_query("select * from tbl_kelas order by id_kelas asc");
					  while($row1=mysql_fetch_array($vw_kelas)){
						echo "
                          <option value='$row1[id_kelas]'>$row1[tingkat_kelas]</option>
						";
					  }		
	echo"				  
					</select>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Kelas Paralel</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<select name=\"kls_paralel\" class=\"form-control\" required>
						<option value=''>--Pilih Kelas Paralel--</option>";
					  $vw_kelas_p = mysql_query("select * from tbl_kelas_paralel order by id_paralel asc");
					  while($row1=mysql_fetch_array($vw_kelas_p)){
						echo "
                          <option value='$row1[id_paralel]'>$row1[nama_paralel]</option>
						";
					  }		
	echo"				  
					</select>
				</div>
			</div>
			
			<div class=\"form-group\">        
				<div class=\"col-sm-offset-4 col-sm-6\">
					<button type=\"submit\" class=\"btn btn-success\">Submit</button>
					<button type=\"reset\" class=\"btn btn-danger\" onclick=self.history.back()>Batal</button>
				</div>
			</div>
		</form>
		<p><em>*Satu Siswa hanya untuk Satu Ruang Kelas</em></p>    
	";
	//tampilan hasil input 
	echo "
		<div class=\"table-responsive\">
			<table class=\"table table-bordered\" >
				<thead style=\"background-color:grey\">
					<tr>
						<td>No.</td>
						<td>NIS</td>
						<td>Nama Siswa</td>
						<td>Kelas</td>
						<td>Aksi</td>
					</tr>
				</thead>
	";
		$batas=5;
			$p= new Paging;
			$posisi=$p->cariposisi($batas);
			
			$view = mysql_query("
				SELECT * FROM  
					tbl_ruangan ruangan, 
					tbl_kelas kelas, 
					tbl_siswa siswa, 
					tbl_kelas_paralel kelas_p
				WHERE 
					ruangan.id_kelas = kelas.id_kelas AND
					ruangan.id_paralel = kelas_p.id_paralel AND
					ruangan.nis = siswa.nis 
				ORDER BY ruangan.id_kelas ASC 
				limit $posisi,$batas
			");
			
			$no=$posisi+1;
			WHILE($r = mysql_fetch_array($view)){
					//setting warna bgcolor tbody
					if($no%2 == 1)
						$warna="white";
					else
						$warna="silver";
						
				echo "
					<tbody style=\"background-color:$warna\">
						<tr><td>$no</td>
							<td>$r[nis]</td>
							<td width=15%>
								<a href='index.php?module=detail-siswa&id=$r[nis]'>$r[nama_murid]</a>
							</td>
							<td>$r[tingkat_kelas] $r[nama_paralel]</td>
							<td>
								<a href='?module=bagi-kelas&act=edit-bagi-kelas&id=$r[id_ruangan]' class=\"edit\">
										<i class=\"glyphicon glyphicon-edit\" alt=\"edit\"></i></a> &nbsp;
								<a href='$aksi?module=bagi-kelas&act=hapus&id=$r[id_ruangan]' class=\"hapus\">
										<i class=\"glyphicon glyphicon-trash\"></i></a>	
							</td>
						</tr>
					</tbody>";
				$no++;
			}
			echo "
					</table>
				</div>";
				
			//buat pagination
			$pagination=mysql_query("
				SELECT * FROM  tbl_ruangan ruangan, tbl_kelas kelas, tbl_siswa siswa, tbl_kelas_paralel kelas_p
				WHERE 
				ruangan.id_kelas = kelas.id_kelas AND
				ruangan.id_paralel = kelas_p.id_paralel AND
				ruangan.nis = siswa.nis 
				ORDER BY ruangan.id_kelas
			");
			$jmldata=mysql_num_rows($pagination);

			$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
			$linkHalaman= $p->navHalaman($_GET['halaman'],$jmlhalaman);
			echo "<p>$linkHalaman</p>"; 
		
	break;
	
	
	//untuk edit pembagian kelas suatu siswa
	case "edit-bagi-kelas":
		
		$edit = mysql_query("
		SELECT * FROM  
			tbl_ruangan ruangan,
			tbl_kelas kelas, 
			tbl_siswa siswa, 
			tbl_kelas_paralel kelas_p
		WHERE 
			ruangan.id_kelas = kelas.id_kelas AND
			ruangan.id_paralel = kelas_p.id_paralel AND
			ruangan.nis = siswa.nis AND
			id_ruangan = '$_GET[id]'
		");
		$r = mysql_fetch_array($edit);
			$last_update = tgl_indo($r['tgl_edit']);
		
		echo "
		<legend><font color=\"green\">Edit Pembagian Kelas</font></legend>
		
		<form class=\"form-horizontal\" role=\"form\" method=POST action='$aksi?module=bagi-kelas&act=update' enctype='multipart/form-data'>
			<div class=\"form-group\">
				<input type='hidden' name='id' value='$r[id_ruangan]'>
			</div>
			<div class=\"form-group\">
				<label for=\"disabledSelect\" class=\"control-label col-sm-3\">Siswa</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\"> 
					<select id=\"disabledSelect\" name=\"nis\" class=\"form-control\" disabled>"; 
						if($r['nis'] == TRUE){
							//echo "
							//	<input class=\"form-control\" name='nis' id=\"disabledInput\" type=\"text\" value='$r[nis] -- $r[nama_murid]' disabled>
							//";
							echo "
								<option value='$r[nis]' id=\"disabledSelect\"> $r[nis] -- $r[nama_murid]</option>
							";	
						}					  
			echo"	</select>
				</div>
			</div>
		
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Kelas</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<select name=\"id_kelas\" class=\"form-control\" required>";
					
						if($r['id_kelas'] == TRUE){
							echo"<option value='$r[id_kelas]'>$r[tingkat_kelas]</option>";
							
						}
						$vw_kelas = mysql_query("select * from tbl_kelas order by id_kelas asc");
						while($row1=mysql_fetch_array($vw_kelas)){
							if($row1['id_kelas'] != $r['id_kelas']){
								echo "
									<option value='$row1[id_kelas]'>$row1[tingkat_kelas]</option>
								";
							}
						}				
			echo"	</select>			  
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Kelas Paralel</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<select name=\"kls_paralel\" class=\"form-control\" required>";
						if($r['id_paralel'] == TRUE){
							echo"<option value='$r[id_paralel]'>$r[nama_paralel]</option>";
						}
						$vw_kelas_p = mysql_query("select * from tbl_kelas_paralel order by id_paralel asc");
						while($row1=mysql_fetch_array($vw_kelas_p)){
							if($row1['id_paralel'] != $r['id_paralel']){
								echo "
									<option value='$row1[id_paralel]'>$row1[nama_paralel]</option>
								";
							}
						}		
			echo"	</select>			  
				</div>
			</div>
			
			<div class=\"form-group\">        
				<div class=\"col-sm-offset-4 col-sm-6\">
					<button type=\"submit\" class=\"btn btn-success\">Submit</button>
					<button type=\"reset\" class=\"btn btn-danger\" onclick=self.history.back()>Batal</button>
				</div>
			</div>
		</form>
		<p><em>*Satu Siswa hanya untuk Satu Ruang Kelas</em></p>    
	";
	//tampilan hasil input 
	echo "
		<div class=\"table-responsive\">
				<table class=\"table table-bordered\" >
					<thead style=\"background-color:grey\">
						<tr>
							<td>No.</td>
							<td>NIS</td>
							<td>Nama Siswa</td>
							<td>Kelas</td>
							<td>Aksi</td>
						</tr>
					</thead>
	";
		$batas=5;
			$p= new Paging;
			$posisi=$p->cariposisi($batas);
			
			$view = mysql_query("
				SELECT * FROM  tbl_ruangan ruangan, tbl_kelas kelas, tbl_siswa siswa, tbl_kelas_paralel kelas_p
				WHERE 
				ruangan.id_kelas = kelas.id_kelas AND
				ruangan.id_paralel = kelas_p.id_paralel AND
				ruangan.nis = siswa.nis ORDER BY ruangan.id_kelas AND ruangan.id_paralel  ASC 
				limit $posisi,$batas
			");
			
			$no=$posisi+1;
			WHILE($r = mysql_fetch_array($view)){
					//setting warna bgcolor tbody
					if($no%2 == 1)
						$warna="white";
					else
						$warna="silver";
						
				echo "
					<tbody style=\"background-color:$warna\">
						<tr><td>$no</td>
							<td>$r[nis]</td>
							<td width=15%>
								<a href='index.php?module=detail-siswa&id=$r[nis]'>$r[nama_murid]</a>
							</td>
							<td>$r[tingkat_kelas] $r[nama_paralel]</td>
							<td>
								<a href='?module=bagi-kelas&act=edit-bagi-kelas&id=$r[id_ruangan]' class=\"edit\">
										<i class=\"glyphicon glyphicon-edit\" alt=\"edit\"></i></a> &nbsp;
								<a href='$aksi?module=bagi-kelas&act=hapus&id=$r[id_ruangan]' class=\"hapus\">
										<i class=\"glyphicon glyphicon-trash\"></i></a>	
							</td>
						</tr>
					</tbody>";
				$no++;
			}
			echo "
					</table>
					<p>Terakhir di Update pada : $last_update</p>
				</div>
				
				";
				
			//buat pagination
			$pagination=mysql_query("
				SELECT * FROM  tbl_ruangan ruangan, tbl_kelas kelas, tbl_siswa siswa, tbl_kelas_paralel kelas_p
				WHERE 
				ruangan.id_kelas = kelas.id_kelas AND
				ruangan.id_paralel = kelas_p.id_paralel AND
				ruangan.nis = siswa.nis ORDER BY ruangan.id_kelas
			");
			$jmldata=mysql_num_rows($pagination);

			$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
			$linkHalaman= $p->navHalaman($_GET['halaman'],$jmlhalaman);
			echo "<p>$linkHalaman</p>"; 
	break;
}

?>


