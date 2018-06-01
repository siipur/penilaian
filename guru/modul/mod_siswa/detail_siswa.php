<?php 
$tampil_detail = mysql_query ("SELECT * FROM tbl_siswa Where nis=$_GET[id]");
$data  = mysql_fetch_array($tampil_detail);

$last_update = tgl_indo($data['tgl_edit']);
$tgl_lahir = tgl_indo($data['tgl_lahir']);


	echo "
		<legend>Informasi Pribadi :</legend>
	<div class=\"jumbotron\">
		

		<div class=\"table-responsive\">
			<table class=\"table table-bordered\">
				<tbody>
				<tr>
					<td width=27%>
						<img src=\"../siswa/images/$data[img_siswa]\" class=\"img-rounded\" alt=\"foto\" width=200 height=284> 
					</td>
					<td>
						<table class=\"table  table-condensed\">
							<tbody>
								<tr><td>NIS</td> <td>:</td> <td>$data[nis]</td></tr>
								<tr><td>NISN</td> <td>:</td> <td>$data[nisn]</td></tr>
								<tr><td>Nama Lengkap</td> <td>:</td> <td>$data[nama_murid]</td></tr>
								<tr><td>Jenis Kelamin</td> <td>:</td> <td>$data[jenis_kelamin]</td></tr>
								<tr><td>Tempat,Tanggal Lahir </td><td>:</td> <td>$data[tmp_lahir],$tgl_lahir</td></tr>
								<tr><td>Agama </td><td>:</td> <td>$data[agama]</td></tr>
								<tr><td>Alamat </td><td>:</td> <td>$data[alamat]</td></tr>
								<tr><td>Tlp./Hp </td><td>:</td> <td>$data[telepon]</td></tr>
								<tr><td>Orang Tua / Wali Murid </td><td>:</td> <td>$data[ortu_nama]</td></tr>
							</tbody>
						</table>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
		<pre>Last Update : $last_update</pre>
		<button type=\"reset\" class=\"btn btn-danger\" onclick=self.history.back()>Kembali</button>	
	</div>
	";
?>