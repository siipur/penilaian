<?php
$aksi = "modul/mod_guru_mengajar/aksi_gurumengajar.php";
if (isset($_SESSION['pesan']))
	 $pesan = $_SESSION['pesan'];
else $pesan = '';

$act = (isset($_GET['act']))?$_GET['act'] : "main";
switch($act) {

	default :
		print "$pesan";
		unset ($_SESSION['pesan']);
	
		echo "
		<legend><font color=\"green\">Jadwal Pengajaran</font></legend>
			<form class=\"form-horizontal\" role=\"form\" method=POST action='$aksi?module=jadwal-pengajaran&act=input' enctype='multipart/form-data'>
				
				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Guru</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">  
						<select name=\"kode_guru\"  class=\"form-control\" required>
							<option value=''> &lt;&lt; Pilih Guru &gt;&gt; </option>";
							$vw_guru = mysql_query("select * from tbl_guru order by nip asc");
							while($row1=mysql_fetch_array($vw_guru)){
								echo "
								  <option value='$row1[nip]'>$row1[nip] -- $row1[nama_guru]</option>
								";
							}		
		echo"				  
						</select>
					</div>
				</div>
			
				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Pelajaran</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">          
						<select name=\"kode_matpel\" class=\"form-control\" required>
						<option value=''> &gt;&gt; Pilih Pelajaran &lt;&lt;</option>";
						  $vw_matpel = mysql_query("select * from tbl_matpel order by id_matpel asc");
						  while($row1=mysql_fetch_array($vw_matpel)){
							echo "
							  <option value='$row1[id_matpel]'>$row1[id_matpel] -- $row1[nama_matpel]</option>
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
			<p><em>*Tidak boleh 1 Kelas, 1 Pelajaran di ajarkan oleh 2 Guru atau lebih</em></p>    
		";
	
		//tampilan hasil input 
		echo "
			<div class=\"table-responsive\">
					<table class=\"table table-bordered\" >
						<thead style=\"background-color:grey\">
							<tr>
								<td>No.</td>
								<td>NIP</td>
								<td>Nama Guru</td>
								<td>Spesialis mengajar</td>
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
					tbl_jadwal jadwal,
					tbl_kelas kelas, 
					tbl_kelas_paralel kelas_p, 
					tbl_matpel matpel,
					tbl_guru guru
				WHERE 
					jadwal.id_kelas = kelas.id_kelas AND
					jadwal.id_paralel = kelas_p.id_paralel AND
					jadwal.id_matpel = matpel.id_matpel AND
					jadwal.nip = guru.nip 
				ORDER BY jadwal.id_kelas ASC  
				LIMIT $posisi,$batas
			");
			
			$no=$posisi+1;
			while($r = mysql_fetch_array($view)){
					//setting warna bgcolor tbody
					if($no%2 == 1)
						$warna="white";
					else
						$warna="silver";
						
				echo "
					<tbody style=\"background-color:$warna\">
						
						<tr><td>$no</td>
							<td>$r[nip]</td>
							<td width=15%>
								<a href='index.php?module=detail-guru&id=$r[nip]'>$r[nama_guru]</a>
							</td>
							<td>$r[nama_matpel]</td>
							<td>$r[tingkat_kelas] $r[nama_paralel]</td>
							<td>
								<a href='?module=jadwal-pengajaran&act=edit-jadwal-pengajaran&id=$r[id_jadwal]' class=\"edit\">
										<i class=\"glyphicon glyphicon-edit\" alt=\"edit\"></i></a> &nbsp;
								<a href='$aksi?module=jadwal-pengajaran&act=hapus&id=$r[id_jadwal]' class=\"hapus\">
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
			$pagination = mysql_query("
				SELECT * FROM  
					tbl_jadwal jadwal,
					tbl_kelas kelas, 
					tbl_kelas_paralel kelas_p, 
					tbl_matpel matpel,
					tbl_guru guru
				WHERE 
					jadwal.id_kelas = kelas.id_kelas AND
					jadwal.id_paralel = kelas_p.id_paralel AND
					jadwal.id_matpel = matpel.id_matpel AND
					jadwal.nip = guru.nip 
				ORDER BY jadwal.id_kelas AND jadwal.id_paralel ASC 
			");
			$jmldata=mysql_num_rows($pagination);

			$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
			$linkHalaman= $p->navHalaman($_GET['halaman'],$jmlhalaman);
			echo "<p>$linkHalaman</p>"; 
		
	break;
	
	
	//untuk edit pembagian kelas suatu siswa
	case "edit-jadwal-pengajaran":
		
		$edit = mysql_query("
		SELECT * FROM  
			tbl_jadwal jadwal, tbl_kelas kelas, 
			tbl_kelas_paralel kelas_p, 
			tbl_matpel matpel, tbl_guru guru 
		WHERE 
			jadwal.id_kelas = kelas.id_kelas AND
			jadwal.id_paralel  = kelas_p.id_paralel AND
			jadwal.id_matpel = matpel.id_matpel AND
			jadwal.nip = guru.nip AND
			jadwal.id_jadwal = '$_GET[id]'
		");
		
		$r = mysql_fetch_array($edit);
		
		echo "
		<legend><font color=\"green\">Edit Pembagian Kelas</font></legend>
		
		<form class=\"form-horizontal\" role=\"form\" method=POST action='$aksi?module=jadwal-pengajaran&act=update' enctype='multipart/form-data'>
			<div class=\"form-group\">
				<input type='hidden' name='id' value='$r[id_jadwal]'>
				<input type='hidden' name='id_matpel' value='$r[id_matpel]'>
				
			</div>
			<div class=\"form-group\">
				<label for=\"disabledSelect\" class=\"control-label col-sm-3\">Guru</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\"> 
					<select id=\"disabledSelect\" name=\"kode_guru\" class=\"form-control\" disabled>"; 
						if($r['nip'] == TRUE){
							echo "
								<option value='$r[nip]' id=\"disabledSelect\"> $r[nip] -- $r[nama_guru]</option>
							";	
						}					  
			echo"	</select>
				</div>
			</div>
		
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Pelajaran</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">  
					<input type='hidden' name='id_matpel' value='$r[id_matpel]'>
					<select name=\"kode_matpel\" class=\"form-control\" required>";
				
						if($r['id_matpel'] == TRUE){
						echo"<option value='$r[id_matpel]'>($r[id_matpel])&nbsp;$r[nama_matpel]</option>";	
						}
						
						$vw_matpel = mysql_query("select * from tbl_matpel order by id_matpel asc");
						while($row1=mysql_fetch_array($vw_matpel)){
							if($row1['id_matpel'] != $r['id_matpel']){
								echo "
								  <option value='$row1[id_matpel]'>($row1[id_matpel]) $row1[nama_matpel]</option>
								";
							}
						}
						
	echo"		
					</select>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Kelas</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<select name=\"kode_kelas\" class=\"form-control\" required>";
					
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
					<select name=\"kode_kelas_p\" class=\"form-control\" required>";
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
							<td>NIP</td>
							<td>Nama Guru</td>
							<td>Spesialis mengajar</td>
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
					tbl_jadwal jadwal,
					tbl_kelas kelas, 
					tbl_kelas_paralel kelas_p, 
					tbl_matpel matpel,
					tbl_guru guru
				WHERE 
					jadwal.id_kelas = kelas.id_kelas AND
					jadwal.id_paralel = kelas_p.id_paralel AND
					jadwal.id_matpel = matpel.id_matpel AND
					jadwal.nip = guru.nip 
				ORDER BY jadwal.id_kelas AND jadwal.id_paralel ASC  
				LIMIT $posisi,$batas
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
							<td>$r[nip]</td>
							<td width=15%>
								<a href='index.php?module=detail-guru&id=$r[nip]'>$r[nama_guru]</a>
							</td>
							<td>$r[nama_matpel]</td>
							<td>$r[tingkat_kelas] $r[nama_paralel]</td>
							<td>
								<a href='?module=jadwal-pengajaran&act=edit-jadwal-pengajaran&id=$r[id_jadwal]' class=\"edit\">
										<i class=\"glyphicon glyphicon-edit\" alt=\"edit\"></i></a> &nbsp;
								<a href='$aksi?module=jadwal-pengajaran&act=hapus&id=$r[id_jadwal]' class=\"hapus\">
										<i class=\"glyphicon glyphicon-trash\"></i></a>	
							</td>
						</tr>
					</tbody>";
				$no++;
			}
			echo "
					</table>
				</div>
				
				";
				
			//buat pagination
			$pagination = mysql_query("
				SELECT * FROM  
					tbl_jadwal jadwal,
					tbl_kelas kelas, 
					tbl_kelas_paralel kelas_p, 
					tbl_matpel matpel,
					tbl_guru guru
				WHERE 
					jadwal.id_kelas = kelas.id_kelas AND
					jadwal.id_paralel = kelas_p.id_paralel AND
					jadwal.id_matpel = matpel.id_matpel AND
					jadwal.nip = guru.nip 
				ORDER BY jadwal.id_kelas AND jadwal.id_paralel ASC 
			");
			$jmldata=mysql_num_rows($pagination);

			$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
			$linkHalaman= $p->navHalaman($_GET['halaman'],$jmlhalaman);
			echo "<p>$linkHalaman</p>"; 
	break;
}

?>


