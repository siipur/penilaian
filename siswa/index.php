<?php
session_start();

if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])) {
	echo "<link href='../config/adminstyle.css' rel='stylesheet' type='text/css'>
	<center>Untuk mengakses modul Sistem Ini, Anda harus login <br>";
	echo "<a href=../index.php><b>LOGIN</b></a></center>";
}
else
{
?>

<html>
<head>
<title>::: Program(Sistem Informasi Sekolah) :::</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="robots" content="index, follow" />
<link rel="shortcut icon" href="favicon.png" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</head>
<body style="background:url(images/seamless_patterns_12.jpg) ;">

<div class="container" style="background:#f9f9f8 url(images/img9.png);">

	<!--  ini bagian header -->
	<div class="row">
		<div class="col-sm-12">
			<div class="page-header" id="header"> 
				<img src="../images/header1.jpg" class="img-rounded" alt="header" width="100%" height="154"> 
			</div>
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-sm-3" id="kiri">
			
			<?php include "menu.php"; ?>
			
		</div>
		<div class="col-sm-9" id="kanan" >
			
			<?php include "content.php"; ?>
		</div>
	</div>
	<div>&nbsp;</div>
	<?php include "../footer.php"; ?>
	
</div>
</body>
</html>
<?php
}
?>