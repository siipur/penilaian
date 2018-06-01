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
				<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
				</span> Master</a>
			</h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in">
			<div class="panel-body">
				<table class="table">
					<tr>
						<td>
							<span class="glyphicon glyphicon-user">
							</span> <a href='index.php?module=profile'>Data Saya</a>
						</td>
					</tr>
					<tr>
						<td>
							<span class="glyphicon glyphicon-user">
							</span> <a href='index.php?module=siswa'> Lihat Data Siswa</a>
						</td>
					</tr>

					<tr>
						<td>
							<span class="glyphicon glyphicon-book">
							</span> <a href='index.php?module=input-nilai'>Nilai Siswa</a>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	   
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a href='index.php?module=laporan-nilai'><span class="glyphicon glyphicon-book">
				</span> Laporan Penilaian</a>
			</h4>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a href='logout.php' onclick="return confirm('Keluar dari Aplikasi ini?')"><span class="glyphicon glyphicon-off">
				</span> Logout</a>
			</h4>
		</div>
	</div>
	
</div>