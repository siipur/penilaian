<html>
<head>
<title>::: Login Sistem Informasi Sekolah :::</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="robots" content="index, follow" />
<link rel="shortcut icon" href="favicon.png" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>


	<div class="container" style="background-color:green;">
<!--  ini bagian header -->
	<div class="row">
		<div class="col-sm-12">
			<div class="page-header" id="header"> 
				<img src="images/header_asli.jpg" class="img-rounded" alt="header" width="100%" height="154"> 
	
			</div>
		</div>
	</div>
	
		<center>
			<div class="row-fluid">
				<div class="well span5 center login-box" style="width:500px; text-align:center;">
					<div class="alert alert-info">
					Silahkan login dengan Username dan Password anda
					</div>
					
					<form class="form-horizontal" method="post" name="frmLogin" action="cek_login.php">
						<input type="hidden" name="form_name" value="loginform">
							<div class="form-group">
							<label for="select">Jenis User :</label>
							<select name="jenis_user" class="form-control-sm" id="select" required>
								<option value='' selected> --pilih user-- </option>
								<option value='administrator'>Pegawai Tata Usaha</option>
								<option value='guru'>Guru</option>
								<option value='siswa'>Siswa</option>
							</select>
							</div>
							<div class="input-prepend" title="Username" data-rel="tooltip">
								<div class="input-group">
									<span class="input-group-addon">User Name</span>
                                	<input autofocus class="form-control" name="id_user" id="user" type="text" />
                                </div>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
                            	<div class="input-group">
									<span class="input-group-addon">Password&nbsp;&nbsp;</span>
                                    <input class="form-control" name="password" id="pass" type="password" />
                            	</div>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend">
							<label class="remember" for="remember"><input type="checkbox" id="remember" value="rememberme"/>
							Ingatkan saya</label></div>
							<div class="clearfix"></div>

							<p class="center span5">
							<button name="login" type="submit" class="btn btn-primary">Login</button> 
							<a class="btn btn-danger"  href="index.php"> Kembali </a>
						  </p>
						
					</form>
				</div><!--/span-->
			</div><!--/row-->
		</center>
<?php
include"footer.php";
?>
	</div>
</body>
</html>