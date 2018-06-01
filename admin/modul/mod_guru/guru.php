<?php
$aksi = "modul/mod_guru/aksi_guru.php";

$act = (isset($_GET['act']))? $_GET['act'] : "main";
switch($act) {
	
	// Tampil guru
	default:
		echo "
		<legend><font color=\"green\">Para Guru</font></legend>
		
		<a href='?module=guru&act=tambahguru' class=\"btn btn-primary\" style='align:right;'><i class=\"glyphicon glyphicon-plus\"></i> Tambah Guru</a> 
		<div>&nbsp;</div>
		
		<form class=\"form-search\" method='get' action='$_SERVER[PHP_SELF]'> 
            <div class=\"input-append\" style=\"color:maroon;\">
				<input type=\"hidden\" value='guru' name='module'>
                <input type=\"text\" class=\"span2 search-query\" placeholder=\"&nbsp; Cari Guru\" name='kata'>
                <button type=\"submit\" class=\"btn btn-primary\"><span class=\"glyphicon glyphicon-search\"></span></button>
            </div>
	   </form>
	   <div style=\"clearfix\"></div>
	   ";
	
		//jika form search kosong(tidak diisi)
		if (empty($_GET['kata'])){
			echo "
			
			<div class=\"table-responsive\">
				<table class=\"table table-bordered\" >
					<thead style=\"background-color:grey\">
						<tr>
							<td>No.</td>
							<td>NIP</td>
							<td>Nama </td>
							<td>Jenis Kelamin</td>
							<td width=15%>Tempat,<br>
							Tgl Lahir</td>
							<td>Agama</td>
							<td>Alamat</td>
							<td>Telepon</td>
							<td width=7%>Aksi</td>
						</tr>
					</thead>";
					
			$batas=5;
			$p= new Paging;
			$posisi=$p->cariposisi($batas);

			$tampil = mysql_query("SELECT * FROM tbl_guru ORDER BY nip limit $posisi,$batas");
			$no=$posisi+1;
			while($r=mysql_fetch_array($tampil)){
				$tglhr = tgl_indo($r['tgl_lahir']);
				
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
							<td>$r[jenis_kelamin]</td>
							<td>$r[tmp_lahir],<br> $tglhr</td>
							<td>$r[agama]</td>
							<td>$r[alamat]</td>
							<td>$r[telepon]</td>
							<td>
								<a href='?module=guru&act=editguru&id=$r[nip]' class=\"edit\">
										<i class=\"glyphicon glyphicon-edit\" alt=\"edit\"></i></a> &nbsp;
								<a href='$aksi?module=guru&act=hapus&id=$r[nip]' class=\"hapus\">
										<i class=\"glyphicon glyphicon-trash\"></i></a>	
							</td>
						</tr>
					</tbody>";
			$no++;
			}
			echo "</table>
			</div>";

			//buat pagination
			$tampil2=mysql_query("select * from tbl_guru ORDER BY nip");
			$jmldata=mysql_num_rows($tampil2);

			$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
			$linkHalaman= $p->navHalaman($_GET['halaman'],$jmlhalaman);
			echo "<p>$linkHalaman</p>"; 
		
		//jika form search diisi
		}
		else {
			echo "
			<div class=\"table-responsive\">
				<table class=\"table table-bordered\" >
					<thead style=\"background-color:grey\">
						<tr>
							<td>No.</td>
							<td>NIP</td>
							<td>Nama </td>
							<td>Jenis Kelamin</td>
							<td width=15%>Tempat,<br>
							Tgl Lahir</td>
							<td>Agama</td>
							<td>Alamat</td>
							<td>Telepon</td>
							<td width=7%>Aksi</td>
						</tr>
					</thead>";
			
			$batas=5;
			$p= new Paging;
			$posisi=$p->cariposisi($batas);

			$tampil = mysql_query("
				SELECT * FROM tbl_guru WHERE nama_guru LIKE '%$_GET[kata]%' ORDER BY nip limit $posisi,$batas");
			
			$no=$posisi+1;
			while($r=mysql_fetch_array($tampil)){
				$tglhr = tgl_indo($r['tgl_lahir']);
				
				if($no%2 == 0)
					$warna="silver";
				else
					$warna="white";
				
				echo "
					<tbody style=\"background-color:$warna\">
						<tr><td>$no</td>
							<td>$r[nip]</td>
							<td width=15%>
								<a href='index.php?module=detail-guru&id=$r[nip]'>$r[nama_guru]</a>
							</td>
							<td>$r[jenis_kelamin]</td>
							<td>$r[tmp_lahir],<br> $tglhr</td>
							<td>$r[agama]</td>
							<td>$r[alamat]</td>
							<td>$r[telepon]</td>
							<td>
								<a href='?module=guru&act=editguru&id=$r[nip]' class=\"edit\">
										<i class=\"glyphicon glyphicon-edit\" alt=\"edit\"></i></a> &nbsp;
								<a href='$aksi?module=guru&act=hapus&id=$r[nip]' class=\"hapus\">
										<i class=\"glyphicon glyphicon-trash\"></i></a>	
							</td>
						</tr>
					</tbody>";
				$no++;
			}
			echo "
				</table>
			</div>";
	
			// buat pagination
			$tampil2=mysql_query("select * from tbl_guru WHERE nama_guru LIKE '%$_GET[kata]%' ORDER BY nip");
			$jmldata=mysql_num_rows($tampil2);

			$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
			$linkHalaman= $p->navHalaman($_GET['halaman'],$jmlhalaman);
			echo "<p>$linkHalaman</p>"; 
		}
	break;
	
	
	//tambah guru
	case "tambahguru":
		echo "
		<legend><font color=\"green\">Tambah Guru</font></legend>
		
		<form class=\"form-horizontal\" role=\"form\" method=POST action='$aksi?module=guru&act=input' enctype='multipart/form-data'>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">NIP</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" name='nip' class=\"form-control\" required>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">NUPTK</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" name='nuptk' class=\"form-control\"  required>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Password</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"password\" name='password' class=\"form-control\" id=\"pwd\" required>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Nama Lengkap</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" name='nama_lengkap' class=\"form-control\" required>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Jenis Kelamin</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<label class=\"radio-inline\"><input type=\"radio\" name='jenis_kelamin' value='Laki-laki'>Pria</label>
					<label class=\"radio-inline\"><input type=\"radio\" name='jenis_kelamin' value='Perempuan'>Wanita</label>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Tempat Lahir</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" name='tempat_lahir' class=\"form-control\">
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Tanggal Lahir</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-3\">
					<input type=\"date\" class=\"form-control\" id=\"ex2\" name='tgl_lhr'>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Agama</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-3\"> 
					<select class=\"form-control\" id=\"ex2\"  name='agama'>
						<option value='Islam'>Islam</option>
						<option value='Kristen'>Kristen</option>
						<option value='Khatolik'>Khatolik</option>
						<option value='Hindu'>Hindu</option>
						<option value='Budha'>Budha</option>
					</select>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Alamat</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\"> 
					<textarea class=\"form-control\" name='alamat' rows=5 id=\"alamat\"></textarea>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">No. Telp</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" name='telepon' class=\"form-control\" id=\"cp\">
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Foto</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"file\" class=\"form-control\" name='foto_guru'>
				</div>
			</div>
			
			<div class=\"form-group\">        
				<div class=\"col-sm-offset-4 col-sm-6\">
					<button type=\"submit\" class=\"btn btn-success\">Submit</button>
					<button type=\"reset\" class=\"btn btn-danger\" onclick=self.history.back()>Batal</button>
				</div>
			</div>
		
		</form>";
	break;
	
	
	// halaman edit guru
	case "editguru":
	$edit = mysql_query("SELECT * FROM tbl_guru WHERE nip='$_GET[id]'");
	$r = mysql_fetch_array($edit);
	
	$last_update = tgl_indo($r['tgl_edit']);
	echo "
		<legend><font color=\"green\">Edit Data Guru</font></legend>
	
		<form class=\"form-horizontal\" role=\"form\" method=POST action=$aksi?module=guru&act=update enctype=\"multipart/form-data\">
			<input type=hidden name=id value='$r[nip]'>
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">NIP</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" class=\"form-control\" name='nip' value='$r[nip]'>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">NUPTK</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" class=\"form-control\" name='nuptk' value='$r[nuptk]'>
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
					<input type=\"text\" class=\"form-control\" name='nama_lengkap' value='$r[nama_guru]' required>
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
					<img src=\"../guru/images/$r[img_guru]\" class=\"img-rounded\" alt=\"foto\" width=200 height=254> 
			
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Ubah Foto</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"file\" class=\"form-control\" name='foto_guru'>
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