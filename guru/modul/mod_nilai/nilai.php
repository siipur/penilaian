<?php
$aksi = "modul/mod_nilai/aksi_nilai.php";
if (isset($_SESSION['pesan']))
	 $pesan = $_SESSION['pesan'];
else $pesan = '';


$act = (isset($_GET['act']))? $_GET['act'] : "main";
switch($act) {
	
	// Tampil 
	default:
		
		if(isset($_GET['id_guru'])){
			
			$id_guru=$_GET['id_guru'];
			$id_kelas=$_GET['id_kelas'];
			$id_kls_p=$_GET['id_kelas_p'];
			$id_pelajaran=$_GET['id_pelajaran'];
			
			$query=mysql_query("
				select * from tbl_nilai
				where 
					nip='$id_guru' and
					id_kelas='$id_kelas' and 
					id_paralel='$id_kls_p' and
					id_matpel='$id_pelajaran'
			");

			$cek=mysql_num_rows($query);
		
			if($cek == '0'){
				//kalo belum ada -> mode input
				echo "<script language='javascript'>document.location.href='?module=input-nilai&act=input-nilai-siswa&id_guru=$id_guru&id_pelajaran=$id_pelajaran&id_kelas=$id_kelas&id_kelas_p=$id_kls_p';</script>";
				//header('location:?module=input-nilai&act=input-nilai-siswa&id_guru=$id_guru&id_pelajaran=$id_pelajaran&id_kelas=$id_kelas&id_kelas_p=$id_kls_p');
			}else{
				$r=mysql_fetch_array($query);
				//kalo sudah ada -> mode update
				echo "<script language=\"javascript\">document.location.href='?module=input-nilai&act=update-nilai-siswa&id_guru=$id_guru&id_pelajaran=$id_pelajaran&id_kelas=$id_kelas&id_kelas_p=$id_kls_p&id_thn_ajaran=$r[id_th_ajaran]&&smstr=$r[semester]';</script>";
				//header('location:?module=input-nilai&act=update-nilai-siswa&id_guru=$id_guru&id_pelajaran=$id_pelajaran&id_kelas=$id_kelas&id_kelas_p=$id_kls_p&id_ajaran=$r[id_th_ajaran]&smstr=$r[semester]');
			}
			
		}else{
			unset($_POST['id_guru']);
		}


		echo "
		<legend><font color=\"lime\">Input Atau Update Nilai Siswa</font></legend>

		<!--  start step -->
		<div class=\"col-sm-8\">
			<div class=\"btn-group btn-group-justified\">
				<span class=\"btn btn-success\"><span class=\"badge\">1</span>&nbsp; Pilih Mata Pelajaran</span>
				<span class=\"btn btn-default\"><span class=\"badge\">2</span>&nbsp; Input Nilai Siswa</span>
				<span class=\"btn btn-default\"><span class=\"badge\">3</span>&nbsp; Selesai</span>
			</div>
		</div>
		<div class=\"clearfix\">&nbsp;</div>
		<br/>
		<!--  end step -->

		<form id='mainform' action=''>

		<div class=\"table-responsive\">
				<table class=\"table table-bordered\" >
					<thead style=\"background-color:grey\">
						<tr>
							<td>No.</td>
							<td>Nama Mata Pelajaran</td>
							<td>Kelas</td>
						</tr>
					</thead>
		";
		
		$id_guru 	= $_SESSION['namauser'] ;
		$view = mysql_query("
			SELECT * FROM  
				tbl_jadwal jadwal,
				tbl_kelas kelas, 
				tbl_kelas_paralel kelas_p, 
				tbl_matpel matpel
			WHERE 
				jadwal.id_kelas		= kelas.id_kelas AND
				jadwal.id_paralel	= kelas_p.id_paralel AND
				jadwal.id_matpel	= matpel.id_matpel AND
				jadwal.nip			= '$id_guru'
			ORDER BY jadwal.id_jadwal ASC
		");	
		
		$no=1;
		
		WHILE($r = mysql_fetch_array($view)){
			//setting warna bgcolor tbody
			if($no%2 == 1)
				$warna="white";
			else
				$warna="silver";
					
			echo "
				<tbody style=\"background-color:$warna\">
					<tr><td>$no</td>
						<td>
							<a href=\"?module=input-nilai&id_guru=$id_guru&id_pelajaran=$r[id_matpel]&id_kelas=$r[id_kelas]&id_kelas_p=$r[id_paralel]\" title=\"Pilih Mata Pelajaran\">$r[nama_matpel]</a>
						</td>
						<td>$r[tingkat_kelas] $r[nama_paralel]</td>
					</tr>
				</tbody>";
			$no++;
		}
		echo "
			</table>
		</div>
		</form>
		";
	break;


	//mode proses input nilai siswa
	case "input-nilai-siswa" :

		echo "

			<legend><font color=\"lime\">Input Nilai Siswa</font></legend>

			<!--  start step -->
			<div class=\"col-sm-8\">
				<div class=\"btn-group btn-group-justified\">
					<span class=\"btn btn-default\"><a href='?module=input-nilai'><span class=\"badge\">1</span>&nbsp; Pilih Mata Pelajaran</a></span>
					<span class=\"btn btn-success\"><span class=\"badge\">2</span>&nbsp; Input Nilai Siswa</span>
					<span class=\"btn btn-default\"><span class=\"badge\">3</span>&nbsp; Selesai</span>
				</div>
			</div>
			<!--  end step -->
			<div class=\"clearfix\">&nbsp;</div>
			<br/>";
			
			//tangkap id 
			$id_guru		= $_GET['id_guru'];
			$id_kelas		= $_GET['id_kelas'];
			$id_kls_p		= $_GET['id_kelas_p'];
			$id_pelajaran	= $_GET['id_pelajaran'];
			
			$guru  		= mysql_fetch_array(mysql_query("select * from tbl_guru where nip='$id_guru' "));
			$kelas 		= mysql_fetch_array(mysql_query("select * from tbl_kelas where id_kelas='$id_kelas'"));
			$kelas_p 	= mysql_fetch_array(mysql_query("select * from tbl_kelas_paralel where id_paralel='$id_kls_p'"));
			$pelajaran 	= mysql_fetch_array(mysql_query("select * from tbl_matpel where id_matpel='$id_pelajaran'"));
			
			$nama_guru		= $guru['nama_guru'];
			$nama_kelas		= $kelas['tingkat_kelas'];
			$nama_kls_p		= $kelas_p['nama_paralel'];
			$nama_pelajaran	= $pelajaran['nama_matpel'];
			

		echo "

			<form class=\"form-horizontal\" role=\"form\" method=POST action=$aksi?module=input-nilai&act=input-nilai-siswa enctype=\"multipart/form-data\">
				
				<!--Note: ////////////////////////////////////////////////
				##
				##	deskripsi name='' -> untuk proses input kedatabase 
				##	deskripsi value='' -> menampilkan isi database
				##
				//////////////////////////////////////////////////////-->

				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Nama Guru</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">          
						<input type=\"text\" class=\"form-control\" name='id_guru' value='$nama_guru' disabled>
					</div>
				</div>
				
				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Mata Pelajaran</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">          
						<input type=\"text\" class=\"form-control\" name='id_pelajaran' value='$nama_pelajaran' disabled>
					</div>
				</div>

				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Kelas</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">        
						<input type=\"text\" class=\"form-control\" name='id_kelas' value='$nama_kelas' disabled>
					</div>
				</div>
				
				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Kelas</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">        
						<input type=\"text\" class=\"form-control\" name='id_kelas_p' value='$nama_kls_p' disabled>
					</div>
				</div>

				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Tahun Ajaran</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">          
						<select class=\"form-control input-sm\" name='id_thn_ajaran' required>
							<option value=''> -- Pilih tahun ajaran -- </option>";
			
							$vw_thn_ajaran =  mysql_query(" 
								SELECT * FROM tbl_th_ajaran ORDER By id_th_ajaran
							");
							while ($r=mysql_fetch_array($vw_thn_ajaran)) {
								echo "
									<option value='$r[id_th_ajaran]'>$r[tahun_ajaran]</option>
								";
							}
				echo "
						</select>
					</div>
				</div>

				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Semester</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">          
						<select class=\"form-control input-sm\" name='smstr' required>
							<option value=''> -- Pilih Semester-- </option>";
							for($n=1;$n<=2;$n++){
								echo "
									<option value='$n'>$n</option>
								";
							}
					echo"
						</select>
					</div>
				</div>



				<!-- tampilan table hasil -->

				<div class=\"table-responsive\">
					<table class=\"table table-bordered\" >
						<thead style=\"background-color:grey\">
							<tr>
								<td>No.</td>
								<td>NIS</td>
								<td>Nama Siswa</td>
								<td>Nilai Siswa</td>
							</tr>
						</thead>
				";

					$view = mysql_query("
						SELECT * FROM  
							tbl_ruangan ruangan, 
							tbl_siswa siswa,
							tbl_kelas kelas,
							tbl_kelas_paralel kelas_p
						WHERE 
							ruangan.nis = siswa.nis AND
							ruangan.id_kelas = '$id_kelas' AND
							ruangan.id_paralel = '$id_kls_p' AND
							ruangan.id_kelas = kelas.id_kelas AND
							ruangan.id_paralel = kelas_p.id_paralel
						ORDER BY siswa.nama_murid ASC 
				
					");
					
					$i = 1;
					while($row=mysql_fetch_array($view)){	
						//setting warna bgcolor tbody
						if($i%2 == 1)
							$warna="white";
						else
							$warna="silver";
						//variable
								
						echo "
						<tbody style=\"background-color:$warna\">

							<input type=\"hidden\" name=\"id_guru\" value='$id_guru'/>
							<input type=\"hidden\" name=\"id_pelajaran\" value='$id_pelajaran' />	
							<input type=\"hidden\" name=\"id_kelas\" value='$id_kelas'/>
							<input type=\"hidden\" name=\"id_kelas_p\" value='$id_kls_p'/>
							
							<input type=\"hidden\" name='id_siswa".$i."' value='".$row['nis']."' />
							<tr><td>$i</td>
								<td>$row[nis]</td>
								<td>$row[nama_murid]</td>
								
								<td>
									<input type=\"text\" class=\"form-control\" name='nilai".$i."' />
								</td>
							</tr> ";
						$i++;
					}

					$jumSis = $i - 1;

			echo "			<input type=\"hidden\" name='jumlah' value='$jumSis' />
						</tbody>
					</table>
				</div>
				<div class=\"clearfix\"></div>


				<div class=\"form-group\">        
					<div class=\"col-sm-offset-4 col-sm-8\">
						<button type=\"submit\" class=\"btn btn-success\" onclick='return confirm('Apakah Anda yakin?')'> Submit </button>
						<button type=\"reset\" class=\"btn btn-danger\" onclick=self.history.back()>Batal</button>
					</div>
				</div>
				
			</form> 
			<div class=\"clearfix\"></div>";

	break;

	
	case "nilai-selesai" :

		print "$pesan";
		unset($pesan);
		
		echo "
		<legend><font color=\"lime\">Input Nilai</font></legend>

		<!--  start step -->
		<div class=\"col-sm-8\">
			<div class=\"btn-group btn-group-justified\">
				<span class=\"btn btn-default\"><a href='?module=input-nilai'><span class=\"badge\">1</span>&nbsp; Pilih Mata Pelajaran</a></span>
				<span class=\"btn btn-default\"><span class=\"badge\">2</span>&nbsp; Input Nilai Siswa</span>
				<span class=\"btn btn-success\"><span class=\"badge\">3</span>&nbsp; Selesai</span>
			</div>
		</div>
		<!--  end step -->
		<div class=\"clearfix\">&nbsp;</div>
		<br/>";

		$id_guru		= $_GET['id_guru'];
		$id_kelas		= $_GET['id_kelas'];
		$id_kls_p		= $_GET['id_kelas_p'];
		$id_pelajaran	= $_GET['id_pelajaran'];
		$id_thn_ajaran 	= $_GET['id_thn_ajaran'];

		$guru  		= mysql_fetch_array(mysql_query("select * from tbl_guru where nip='$id_guru' "));
		$kelas 		= mysql_fetch_array(mysql_query("select * from tbl_kelas where id_kelas='$id_kelas'"));
		$kelas_p 	= mysql_fetch_array(mysql_query("select * from tbl_kelas_paralel where id_paralel='$id_kls_p'"));
		$pelajaran 	= mysql_fetch_array(mysql_query("select * from tbl_matpel where id_matpel='$id_pelajaran'"));
		$thn_ajaran = mysql_fetch_array(mysql_query("select * from tbl_th_ajaran where id_th_ajaran='$id_thn_ajaran'"));
		$smstr 		= mysql_fetch_array(mysql_query("select * from tbl_nilai where semester='$_GET[smstr]'"));
		
		$nama_guru		= $guru['nama_guru'];
		$nama_kelas		= $kelas['tingkat_kelas'];
		$nama_kls_p		= $kelas_p['nama_paralel'];
		$nama_pelajaran	= $pelajaran['nama_matpel'];
		$nm_thn_ajaran 	= $thn_ajaran['tahun_ajaran'];
		$semester 		= $smstr['semester'];

		echo "

			<form class=\"form-horizontal\" role=\"form\" method=post action='?module=input-nilai'>
				
			
				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Nama Guru</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">          
						<input type=\"text\" class=\"form-control\" name='id_guru' value='$nama_guru' disabled>
					</div>
				</div>
				
				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Mata Pelajaran</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">          
						<input type=\"text\" class=\"form-control\" name='id_pelajaran' value='$nama_pelajaran' disabled>
					</div>
				</div>

				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Kelas</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">          
						<input type=\"text\" class=\"form-control\" name='id_kelas' value='$nama_kelas $nama_kls_p' disabled>
					</div>
				</div>

				<!--
				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Kelas paralel</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">          
						<input type=\"text\" class=\"form-control\" name='id_kelas_p' value='$nama_kls_p' disabled>
					</div>
				</div>
				-->

				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Tahun Ajaran</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">          
						<select class=\"form-control input-sm\" name='id_thn_ajaran' disabled>
							<option value='$id_pelajaran'>$nm_thn_ajaran</option>
						</select>
					</div>
				</div>

				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Semester</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">          
						<select class=\"form-control input-sm\" name='smstr' disabled>
							<option value='$semester'>$semester</option>
						</select>
					</div>
				</div>

				<!-- tampilan table hasil nilai -->
				<div class=\"table-responsive\">
					<table class=\"table table-bordered\" >
						<thead style=\"background-color:grey\">
							<tr>
								<td>No.</td>
								<td>NIS</td>
								<td>Nama Siswa</td>
								<td>Nilai Siswa</td>
								<td>Kategori Nilai</td>
							</tr>
						</thead>";

					$view=mysql_query("
						SELECT * FROM 
							tbl_nilai nilai,
							tbl_siswa siswa
						WHERE 
							nilai.nis 			= siswa.nis and 
							nilai.nip 			='$id_guru' and
							nilai.id_kelas 		='$id_kelas' and 
							nilai.id_paralel 	='$id_kls_p' and
							nilai.id_matpel 	='$id_pelajaran'
						order by siswa.nama_murid asc
					");

					$i = 1;
					while($row=mysql_fetch_array($view)){	
						//setting warna bgcolor tbody
						if($i%2 == 1)
							$warna="white";
						else
							$warna="silver";
						//variable
								
						echo "
						<tbody style=\"background-color:$warna\">
							<tr><td>$i</td>
								<td>$row[nis]</td>
								<td>$row[nama_murid]</td>
								<td>$row[nilai]</td>
								<td>$row[kategori_nilai]</td>
							</tr> ";
						$i++;
					}
					$jumSis = $i - 1;

			echo "			<input type=\"hidden\" name='jumlah' value='$jumSis' />
						</tbody>
					</table>
				</div>
			</form> 
			<div class=\"clearfix\"></div>";
	break;
	
	
	case "update-nilai-siswa":
		/*
		if($_GET[status]=='0'){
				echo"
            		<div id=\"message-red\">
            			<table border=0 width=100% cellpadding=0 cellspacing=0>
				            <tr>
				                <td class=\"red-left\">mysql_error()</td>
				                <td class=\"red-right\"><a class=\"close-red\"><img src=\"images/table/icon_close_red.gif\"/></a></td>
				            </tr>
			            </table>
		            </div>";
		}
		*/
		
		echo "

			<legend><font color=\"lime\">Update Nilai Siswa</font></legend>";
		    echo"
			<!--  start step -->
			<div class=\"col-sm-8\">
				<div class=\"btn-group btn-group-justified\">
					<span class=\"btn btn-default\"><a href='?module=input-nilai'><span class=\"badge\">1</span>&nbsp; Pilih Mata Pelajaran</a></span>
					<span class=\"btn btn-success\"><span class=\"badge\">2</span>&nbsp; Update Nilai Siswa</span>
					<span class=\"btn btn-default\"><span class=\"badge\">3</span>&nbsp; Selesai</span>
				</div>
			</div>
			<!--  end step -->
			<div class=\"clearfix\">&nbsp;</div>
			<br/>";

			$id_guru		= $_GET['id_guru'];
			$id_kelas		= $_GET['id_kelas'];
			$id_kls_p		= $_GET['id_kelas_p'];
			$id_pelajaran	= $_GET['id_pelajaran'];
			
			$guru  		= mysql_fetch_array(mysql_query("select * from tbl_guru where nip='$id_guru' "));
			$kelas 		= mysql_fetch_array(mysql_query("select * from tbl_kelas where id_kelas='$id_kelas'"));
			$kelas_p 	= mysql_fetch_array(mysql_query("select * from tbl_kelas_paralel where id_paralel='$id_kls_p'"));
			$pelajaran 	= mysql_fetch_array(mysql_query("select * from tbl_matpel where id_matpel='$id_pelajaran'"));
			$tahun_ajaran= mysql_fetch_array(mysql_query("SELECT * from tbl_th_ajaran, tbl_nilai where tbl_nilai.id_th_ajaran='$_GET[id_thn_ajaran]'")); 
			
			$nama_guru		= $guru['nama_guru'];
			$nama_kelas		= $kelas['tingkat_kelas'];
			$nama_kls_p		= $kelas_p['nama_paralel'];
			$nama_pelajaran	= $pelajaran['nama_matpel'];
			

			echo "
			<form class=\"form-horizontal\" role=\"form\" method=POST action=$aksi?module=input-nilai&act=update-nilai-siswa enctype=\"multipart/form-data\">
				
				<!--Note: ////////////////////////////////////////////////
				##
				##	deskripsi name='' -> untuk proses input kedatabase 
				##	deskripsi value='' -> menampilkan isi database
				##
				//////////////////////////////////////////////////////-->
				
				<input type='hidden' name=id_thn_ajaran value='$tahun_ajaran[id_th_ajaran]'/>

				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Nama Guru</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">          
						<input type=\"text\" class=\"form-control\" name='id_guru' value='$nama_guru' disabled>
					</div>
				</div>
				
				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Mata Pelajaran</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">          
						<input type=\"text\" class=\"form-control\" name='id_pelajaran' value='$nama_pelajaran' disabled>
					</div>
				</div>

				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Kelas</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">          
						<input type=\"text\" class=\"form-control\" name='id_kelas' value='$nama_kelas $nama_kls_p' disabled>
					</div>
				</div>

				<!--
				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Kelas paralel</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">          
						<input type=\"text\" class=\"form-control\" name='id_kelas_p' value='$nama_kls_p' disabled>
					</div>
				</div>
				-->

				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Tahun Ajaran</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">  
						<select class=\"form-control input-sm\" name='id_ajaran' required>";
						
							$vw_thn_ajaran =  mysql_query(" 
								SELECT * FROM tbl_th_ajaran order by id_th_ajaran
							");
							while ($r=mysql_fetch_array($vw_thn_ajaran)) {
								if($r['id_th_ajaran'] != $tahun_ajaran['id_th_ajaran']){
									echo "
										<option value='$r[id_th_ajaran]'>$r[tahun_ajaran]</option>
									";
								}
								elseif($tahun_ajaran['id_th_ajaran'] == $r['id_th_ajaran']){
									echo "
										<option value='$tahun_ajaran[id_th_ajaran]' selected>$r[tahun_ajaran]</option>
									";
								}
							}
							
				echo "
						</select>
					</div>
				</div>

				<div class=\"form-group\">
					<label class=\"control-label col-sm-3\">Semester</label>
					<label class=\"control-label col-sm-1\">:</label>
					<div class=\"col-sm-6\">          
						<select class=\"form-control input-sm\" name='smstr' required>";
							
							$semester =  mysql_query(" 
								SELECT semester FROM tbl_nilai
							");
							$r=mysql_fetch_array($semester);
							for($n=1;$n<=2;$n++){
								if($n != $r['semester'])
								echo "
									<option value='$n'>$n</option>
								";
							}
							if($r['semester']=='1'){
								echo "
									<option value='1' selected>$r[semester]</option>
								";
							} else {
								echo "
									<option value='2' selected>$r[semester]</option>
								";
							}
					echo"
						</select>
					</div>
				</div>

				<!-- tampilan table hasil -->
				<div class=\"table-responsive\">
					<table class=\"table table-bordered\" >
						<thead style=\"background-color:grey\">
							<tr>
								<td>No.</td>
								<td>NIS</td>
								<td>Nama Siswa</td>
								<td>Nilai Siswa</td>
							</tr>
						</thead>
				";

					$view=mysql_query("
						SELECT * FROM 
							tbl_nilai nilai,
							tbl_siswa siswa
						WHERE 
							nilai.nis 			= siswa.nis and 
							nilai.nip 			='$id_guru' and
							nilai.id_kelas 		='$id_kelas' and 
							nilai.id_paralel 	='$id_kls_p' and
							nilai.id_matpel 	='$id_pelajaran'
						order by siswa.nama_murid asc
					");
					
					$i = 1;
					while($row=mysql_fetch_array($view)){	
						//setting warna bgcolor tbody
						if($i%2 == 1)
							$warna="white";
						else
							$warna="silver";
						//variable
								
						echo "
						<tbody style=\"background-color:$warna\">
							<input type=\"hidden\" name=\"id_guru\" value='$id_guru'/>
							<input type=\"hidden\" name=\"id_pelajaran\" value='$id_pelajaran' />	
							<input type=\"hidden\" name=\"id_kelas\" value='$id_kelas'/>
							<input type=\"hidden\" name=\"id_kelas_p\" value='$id_kls_p'/>
							<input type=\"hidden\" name='id_siswa".$i."' value='".$row['nis']."' />
							
							<tr><td>$i</td>
								<td>$row[nis]</td>
								<td>$row[nama_murid]</td>
								<td>
									<input type=\"text\" class=\"form-control\" name='nilai".$i."' value='".$row['nilai']."' />
								</td>
							</tr> ";
						$i++;
					}
					$jumSis = $i - 1;
			echo "			<input type=\"hidden\" name='jumlah' value='$jumSis' />
						</tbody>
					</table>
				</div>
				<div class=\"clearfix\"></div>
				
				<div class=\"form-group\">        
					<div class=\"col-sm-offset-4 col-sm-8\">
						<button type=\"submit\" class=\"btn btn-success\" onclick=\"return confirm('Apakah Anda yakin?')\"> Submit </button>
						<button type=\"reset\" class=\"btn btn-danger\" onclick=self.history.back()>Batal</button>
					</div>
				</div>
				
			</form>
			
			<div class=\"clearfix\"></div>";
	break;
}

?>