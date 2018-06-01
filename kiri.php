<form name="frmLogin" role="form" class="login-form well" id="frmLogin" method="post" action="cek_login.php"/>
	<span class="glyphicon glyphicon-user" style="padding:3;"> <b>USER LOGIN</b> </span>
	<hr/>
	<div class="form-group">
		<label class="sr-only" for="form-username">Username</label>
		<input type="text" name="id_user" placeholder="Username..." id="username" class="form-username form-control" id="form-username">
	</div>
	<div class="form-group">
		<label class="sr-only" for="form-password">Password</label>
		<input type="password" name="password" placeholder="Password..." id="password" class="form-password form-control" id="form password">
	</div>
	<div class="form-group">
		<label for="select" class="control-label">Jenis User :</label>
		<select name="jenis_user" class="form-control" id="select" required \>
			<option value='' selected> -- pilih user -- </option>
			<option value='administrator'>Pegawai Tata Usaha</option>
			<option value='guru'>Guru</option>
			<option value='siswa'>Siswa</option>
		</select>
	</div>
	
	<button type="submit" class="btn btn-primary">Masuk</button>
	<button type="reset" class="btn btn-primary">Batal</button>
	<br/>
</form>
