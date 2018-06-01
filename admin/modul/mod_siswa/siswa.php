<?php
if (isset($_SESSION['info']))
	$pesan = $_SESSION['info'];
else
	$pesan = '';

$aksi = "modul/mod_siswa/aksi_siswa.php";

$act = (isset($_GET['act']))? $_GET['act'] : "main";
switch($act) {
	
	// Tampil Data Siswa
	default:

		echo "
		<legend><font color=\"green\">Para Siswa</font></legend>
		
		<a href='?module=siswa&act=tambahsiswa' class=\"btn btn-primary\"><i class=\"glyphicon glyphicon-plus\"></i> Tambah Siswa</a> 
		<div>&nbsp;</div>";
			print($pesan);
			unset($_SESSION['info']);
		echo"
		<form class=\"form-search\" method='get' action='$_SERVER[PHP_SELF]'> 
            <div class=\"input-append\" style=\"color:maroon;\">
				<input type=\"hidden\" value='siswa' name='module'>
                <input type=\"text\" class=\"span2 search-query\" placeholder=\"&nbsp; Cari Siswa\" name='kata'>
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
							<td>NIS</td>
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
				SELECT * FROM tbl_siswa ORDER BY nis limit $posisi,$batas");

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
							<td>$r[nis]</td>
							<td width=15%>
								<a href='index.php?module=detail-siswa&id=$r[nis]'>$r[nama_murid]</a>
							</td>
							<td>$r[jenis_kelamin]</td>
							<td>$r[tmp_lahir],<br> $tglhr</td>
							<td>$r[agama]</td>
							<td>$r[alamat]</td>
							<td>$r[telepon]</td>
							<td>
								<a href='?module=siswa&act=editsiswa&id=$r[nis]' class=\"edit\">
										<i class=\"glyphicon glyphicon-edit\" alt=\"edit\"></i></a> &nbsp;
								<a href='$aksi?module=siswa&act=hapus&id=$r[nis]' class=\"hapus\">
										<i class=\"glyphicon glyphicon-trash\"></i></a>	
							</td>
						</tr>
					</tbody>";
			$no++;
			}
			echo "</table>
			</div>";

			//buat pagination
			$tampil2=mysql_query("select * from tbl_siswa ORDER BY nis");
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
							<td>NIS</td>
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
				SELECT * FROM tbl_siswa WHERE nama_murid LIKE '%$_GET[kata]%' OR nis LIKE '%$_GET[kata]%' ORDER BY nis limit $posisi,$batas");
			
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
							<td>$r[nis]</td>
							<td width=15%>
								<a href='index.php?module=detail-siswa&id=$r[nis]'>$r[nama_murid]</a>
							</td>
							<td>$r[jenis_kelamin]</td>
							<td>$r[tmp_lahir],<br> $tglhr</td>
							<td>$r[agama]</td>
							<td>$r[alamat]</td>
							<td>$r[telepon]</td>
							<td>
								<a href='?module=siswa&act=editsiswa&id=$r[nis]' class=\"edit\">
										<i class=\"glyphicon glyphicon-edit\" alt=\"edit\"></i></a> &nbsp;
								<a href='$aksi?module=siswa&act=hapus&id=$r[nis]' class=\"hapus\">
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
			$tampil2=mysql_query("select * from tbl_siswa WHERE nama_murid LIKE '%$_GET[kata]%' ORDER BY nis");
			$jmldata=mysql_num_rows($tampil2);

			$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
			$linkHalaman= $p->navHalaman($_GET['halaman'],$jmlhalaman);
			echo "<p>$linkHalaman</p>"; 
		}
	break;
	
	//tambah Siswa
	case "tambahsiswa":
		echo "
		<legend><font color=\"green\">Tambah Siswa</font></legend>
		
		<form class=\"form-horizontal\" role=\"form\" method=POST action='$aksi?module=siswa&act=input' enctype='multipart/form-data'>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">NIS</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" name='nis' class=\"form-control\" required>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">NISN</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" name='nisn' class=\"form-control\"  required>
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
				<div class=\"col-sm-4\">
					<input type=\"date\" name='tgl_lhr' class=\"form-control\">
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Agama</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-4\"> 
					<select name=\"agama\" class=\"form-control\">
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
				<label class=\"control-label col-sm-3\">Ortu Murid/Wali Murid</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"text\" name='ortu' class=\"form-control\">
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-3\">Foto</label>
				<label class=\"control-label col-sm-1\">:</label>
				<div class=\"col-sm-6\">          
					<input type=\"file\" class=\"form-control\" name='foto_siswa'>
				</div>
			</div>
			
			<div class=\"form-group\">        
				<div class=\"col-sm-offset-4 col-sm-8\">
					<button type=\"submit\" class=\"btn btn-success\">Submit</button>
					<button type=\"reset\" class=\"btn btn-danger\" onclick=self.history.back()>Batal</button>
				</div>
			</div>
		
		</form>";
	break;
	
	
	// halaman edit Siswa
	case "editsiswa":
	$edit = mysql_query("SELECT * FROM tbl_siswa WHERE nis='$_GET[id]'");
	$r = mysql_fetch_array($edit);
	
	$last_update = tgl_indo($r['tgl_edit']);
	echo "
		<legend><font color=\"green\">Edit Data Siswa</font></legend>
	
		<form class=\"form-horizontal\" role=\"form\" method=POST action='$aksi?module=siswa&act=update' enctype='multipart/form-data'>
			<input type=hidden name=id value='$r[nis]'>
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\">NIS</label>
				<div class=\"col-sm-10\">          
					<input type=\"text\" class=\"form-control\" name='nis' value='$r[nis]' required >
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\">NISN</label>
				<div class=\"col-sm-10\">          
					<input type=\"text\" class=\"form-control\" name='nisn' value='$r[nisn]'>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\">Password</label>
				<div class=\"col-sm-10\">          
					<input type=\"password\" name='password' class=\"form-control\" id=\"pwd\"> *
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\">Nama Lengkap</label>
				<div class=\"col-sm-10\">          
					<input type=\"text\" class=\"form-control\" name='nama_lengkap' value='$r[nama_murid]' required>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\">Jenis Kelamin</label>
				<div class=\"col-sm-10\">";
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
				<label class=\"control-label col-sm-2\">Tempat Lahir</label>
				<div class=\"col-sm-10\">          
					<input type=\"text\" class=\"form-control\" name='tempat_lahir' value='$r[tmp_lahir]' >
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\">Tanggal Lahir</label>
				<div class=\"col-sm-10\">
					<input type=\"date\"  class=\"form-control\" name='tgl_lhr' value='$r[tgl_lahir]' >
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\">Agama</label>
				<div class=\"col-sm-10\"> 
					<select class=\"form-control\" name='agama'>";
					
						if($r['agama'] == 'Islam'){
							echo "
								<option value='Islam' selected>Islam</option>
								<option value='Kristen'>Kristen</option>
								<option value='Khatolik'>Khatolik</option>
								<option value='Hindu'>Hindu</option>
								<option value='Budha'>Budha</option>
							";
						}
						elseif($r['agama'] == 'Kristen'){
							echo "
								<option value='Islam'>Islam</option>
								<option value='Kristen' selected>Kristen</option>
								<option value='Khatolik'>Khatolik</option>
								<option value='Hindu'>Hindu</option>
								<option value='Budha'>Budha</option>
							";
						}
						elseif($r['agama'] == 'Khatolik'){
							echo "
								<option value='Islam'>Islam</option>
								<option value='Kristen'>Kristen</option>
								<option value='Khatolik' selected>Khatolik</option>
								<option value='Hindu'>Hindu</option>
								<option value='Budha'>Budha</option>
							";
						}
						elseif($r['agama'] == 'Hindu'){
							echo "
								<option value='Islam'>Islam</option>
								<option value='Kristen'>Kristen</option>
								<option value='Khatolik'>Khatolik</option>
								<option value='Hindu' selected>Hindu</option>
								<option value='Budha'>Budha</option>
							";
						}
						else{
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
				<label class=\"control-label col-sm-2\">Alamat</label>
				<div class=\"col-sm-10\"> 
					<textarea class=\"form-control\" name='alamat' rows=5 value='$r[alamat]'>$r[alamat]</textarea>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\">No. Telp</label>
				<div class=\"col-sm-10\">          
					<input type=\"text\" class=\"form-control\" name='telepon' value='$r[telepon]'>
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\">Ortu Murid/Wali Murid</label>
				<div class=\"col-sm-10\">          
					<input type=\"text\" class=\"form-control\" name='ortu' value='$r[ortu_nama]' >
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\">Foto</label>
				<div class=\"col-sm-10\">          
					<img src=\"../siswa/images/$r[img_siswa]\" class=\"img-rounded\" alt=\"foto\" width=200 height=254> 
			
				</div>
			</div>
			
			<div class=\"form-group\">
				<label class=\"control-label col-sm-2\">Ubah Foto</label>
				<div class=\"col-sm-10\">          
					<input type=\"file\" class=\"form-control\" name='foto_siswa'>
				</div>
			</div>
			
			<div class=\"form-group\">        
				<div class=\"col-sm-offset-2 col-sm-10\">
					<button type=\"submit\" class=\"btn btn-success\">Submit</button>
					<button type=\"reset\" class=\"btn btn-danger\" onclick=self.history.back()>Batal</button>
				</div>
			</div>
		
		</form> 
		<p>Terakhir di Update pada : $last_update</p>";
	break;
}
?>