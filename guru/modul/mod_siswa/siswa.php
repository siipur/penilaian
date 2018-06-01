<?php


	echo "
		<legend><font color=\"green\">Data Para Siswa</font></legend>
	
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

	
?>