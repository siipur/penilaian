<div class="panel-group" id="accordion">
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a href='index.php?module=home'><span class="glyphicon glyphicon-home">
				</span> Home</a>
			</h4>
		</div>
	</div>
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#master"><span class="glyphicon glyphicon-folder-close">
				</span> Master</a>
			</h4>
		</div>
		<div id="master" class="panel-collapse collapse in">
			<div class="panel-body">
				<table class="table">
				
					<tr>
						<td>
							<span class="glyphicon glyphicon-lock"></span> <a href="index.php?module=user"> Management User</a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="glyphicon glyphicon-user"></span> <a href="index.php?module=guru"> Data Guru</a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="glyphicon glyphicon-user"></span> <a href="index.php?module=siswa"> Data Siswa</a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="glyphicon glyphicon-book"></span> <a href="index.php?module=tahun-ajaran">Tahun Ajaran</a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="glyphicon glyphicon-book"></span> <a href="index.php?module=kelas">Data Kelas</a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="glyphicon glyphicon-book"></span> <a href="index.php?module=kelas_p">Data Kelas Paralel</a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="glyphicon glyphicon-book"></span> <a href="index.php?module=matpel"> Data Mata Pelajaran</a>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	
	
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#master"><span class="glyphicon glyphicon-folder-close">
				</span> Penjadwalan</a>
			</h4>
		</div>
		<div id="master" class="panel-collapse collapse in">
			<div class="panel-body">
				<table class="table">
					<tr>
						<td>
							<span class="glyphicon glyphicon-book"></span> <a href="index.php?module=bagi-kelas"> Ruang Kelas </a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="glyphicon glyphicon-book"></span> <a href="index.php?module=jadwal-pengajaran">Pembagian Pengajar</a>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#master"><span class="glyphicon glyphicon-folder-close">
				</span> Laporan</a>
			</h4>
		</div>
		<div id="master" class="panel-collapse collapse in">
			<div class="panel-body">
				<table class="table">
					<tr>
						<td>
							<span class="glyphicon glyphicon-book"></span> <a href="index.php?module=laporan-nilai-siswa"> Data Nilai Siswa </a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="glyphicon glyphicon-book"></span> <a href="index.php?module=cetak-nilai">Cetak Nilai</a>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	   
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title"> 
				<a href="logout.php" onclick="return confirm('Yakin Akan Keluar Aplikasi Ini?')"><span class="glyphicon glyphicon-off">
				</span> Logout</a>
			</h4>
		</div>
	</div>
	
</div>