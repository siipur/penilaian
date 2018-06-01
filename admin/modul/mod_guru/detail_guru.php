<?php 

$tampil_detail = mysql_query ("SELECT * FROM tbl_guru Where nip=$_GET[id]");
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
						<img src=\"../guru/images/$data[img_guru]\" class=\"img-rounded\" alt=\"foto\" width=200 height=284> 
					</td>
					<td>
						<table class=\"table  table-condensed\">
							<tbody>
								<tr><td>NIP</td> <td>:</td> <td>$data[nip]</td></tr>
								<tr><td>NUPTK</td> <td>:</td> <td>$data[nuptk]</td></tr>
								<tr><td>Nama Lengkap</td> <td>:</td> <td>$data[nama_guru]</td></tr>
								<tr><td>Jenis Kelamin</td> <td>:</td> <td>$data[jenis_kelamin]</td></tr>
								<tr><td>Tempat,Tanggal Lahir </td><td>:</td> <td>$data[tmp_lahir],$tgl_lahir</td></tr>
								<tr><td>Agama </td><td>:</td> <td>$data[agama]</td></tr>
								<tr><td>Alamat </td><td>:</td> <td>$data[alamat]</td></tr>
								<tr><td>Tlp./Hp </td><td>:</td> <td>$data[telepon]</td></tr>
							</tbody>
						</table>
					</td>
				</tr>
				</tbody>
			</table>
		</div>
		<pre>Last Update : $last_update</pre>
		<button type=\"reset\" class=\"btn btn-danger\" onclick=self.history.back()>Kembali</button>
		<button type=\"text\" class=\"btn btn-warning\">
			<a href='?module=guru&act=editguru&id=$data[nip]' class=\"edit\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"klik untuk edit !\">
			<i class=\"glyphicon glyphicon-edit\" alt=\"edit\"></i>&nbsp;Edit</a>
		</button>
		<button type=\"text\" class=\"btn btn-warning\">
			<a href='..\admin\modul\mod_guru\cetak_kartu.php?&nip=$_GET[id]' target='_blank' class=\"cetak\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"klik untuk Cetak !\">
			<i class=\"glyphicon glyphicon-print\" alt=\"o/t\"></i>&nbsp;Cetak</a>
		</button>
	</div>
	<script>
	$(document).ready(function(){
	    $('[data-toggle=\"tooltip\"]').tooltip();   
	});
	</script>
	

	";
?>