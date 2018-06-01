<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>::: Sistem Informasi Akademik Sekolah :::</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<meta name="robots" content="index, follow" />
<link rel="shortcut icon" href="favicon.png" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">

<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/jquery.lightbox-0.5.css">

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


<script src="js/bootstrap.min.js"></script>
<style type="text/css">
.carousel-inner > .item > img,
.carousel-inner > .item > a > img {
  width: 70%;
  margin: auto;
}
</style>

</head>

<body style="background:url(images/seamless_patterns_12.jpg) ;">

<div class="container" style="background:#f9f9f8 url(images/img9.png);">

	<!--  ini bagian header -->
	<div class="row">
		<div class="col-sm-12">
			<div class="page-header" id="header"> 
				<img src="images/header_asli.jpg" class="img-rounded" alt="header" width="100%" height="154"> 
			</div>
		</div>
	</div>
	
	<!-- navigasi -->
			<?php include "nav_atas.php"; ?>
	
	<!-- bagian tengah-->
	<div class="row">
		<div class="col-sm-3" id="kiri">
		
			<?php include "kiri.php"; ?>
			
		</div>
		<div class="col-sm-9" id="kanan">
			<div class="panel panel-default" style="background-color:maroon;">
				<div class="panel-body" style="color:white;">
			<?php 
				include "kanan.php";
			?>
				</div>
			</div>
			
		</div>
	</div>
	<div>&nbsp;</div>
	
	<?php include "footer.php"; ?>
	
</div>

</body>
</html>
<script src="jquery.min.js"></script>