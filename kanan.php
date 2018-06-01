<?php

$page = isset($_GET['page'])? $_GET['page']:"";

switch($page) {

	default:
		
		echo "

<link rel=\"stylesheet\" href=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css\">
<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
<script src=\"http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js\"></script>



		<div id=\"myCarousel\" class=\"carousel slide\" data-ride=\"carousel\">
			
			<ol class=\"carousel-indicators\">
				<li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>
				<li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>
				<li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>
				<li data-target=\"#myCarousel\" data-slide-to=\"3\"></li>
				<li data-target=\"#myCarousel\" data-slide-to=\"4\"></li>
				<li data-target=\"#myCarousel\" data-slide-to=\"5\"></li>
			</ol>

		
			<div class=\"carousel-inner\" role=\"listbox\">
				<div class=\"item active\">
					<img src=\"images/an_5.jpg\" alt=\"img1\" width=\"460\" height=\"300\">
					<div class=\"carousel-caption\">
						<p>Info Penerimaan Siswa Baru</p>
					</div>
				</div>

				<div class=\"item\">
					<img src=\"images/an_01.jpg\" alt=\"img2\" width=\"460\" height=\"300\">
					<div class=\"carousel-caption\">
						<p>Informasi Sekolah</p>
					</div>
				</div>
			
				<div class=\"item\">
					<img src=\"images/an_02.jpg\" alt=\"img3\" width=\"460\" height=\"300\">
					<div class=\"carousel-caption\">
						<p>Mumet.. mumettt mumeeeeett !!! Calm aja Bro</p>
					</div>
				</div>

				<div class=\"item\">
					<img src=\"images/an_03.jpg\" alt=\"img4\" width=\"460\" height=\"300\">
					<div class=\"carousel-caption\">
						<p>Beasiswa Terdidik</p>
					</div>
				</div>
				
				<div class=\"item\">
					<img src=\"images/an_04.jpg\" alt=\"img5\"width=\"460\" height=\"300\">
					<div class=\"carousel-caption\">
						<p>Lomba Makan Krufffuukk dan cuci mata !!!</p>
					</div>
				</div>
				<div class=\"item\">
					<img src=\"images/an_06.jpg\" alt=\"img6\"width=\"460\" height=\"300\">
					<div class=\"carousel-caption\">
						<p>Let's Join with US,, Kami tunggu</p>
					</div>
				</div>
				
			</div>

		
			<a href=\"#myCarousel\" class=\"left carousel-control\"  role=\"button\" data-slide=\"prev\">
				<span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></span>
				<span class=\"sr-only\">Previous</span>
			</a>
			<a href=\"#myCarousel\" class=\"right carousel-control\"  role=\"button\" data-slide=\"next\">
				<span class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></span>
				<span class=\"sr-only\">Next</span>
			</a>
		</div>
		
	";
		//include "latar_beranda.html";
	break;
	
	case "visimisi":
		echo "kiiiieeeeeeee visi misine lohhh";
	break;
	
	case "profile":
		echo "kiiiieeeeeeee Profile e";
	break;
	
	case "aboutus":
		include "about_us.php";
	break;
	
	case "kontak-kami":
		echo "
					<h2>Contact Us</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla iaculis mattis lorem, quis gravida nunc iaculis ac. Proin tristique tellus in est vulputate luctus fermentum ipsum molestie. Vivamus tincidunt sem eu magna varius elementum. Maecenas felis tellus, fermentum vitae laoreet vitae, volutpat et urna.</p>

					<div class=\"alert alert-success\">
						Well done! You successfully read this important alert message. 
					</div>

					<form action=\"#\" id=\"contact-form\">
						<div class=\"input-prepend\">
							<span class=\"add-on\"><i class=\"icon-user\"></i></span>
							<input class=\"span4\" id=\"prependedInput\" size=\"16\" type=\"text\" placeholder=\"Name\">
						</div>
						<div class=\"input-prepend\">
							<span class=\"add-on\"><i class=\"icon-envelope\"></i></span>
							<input class=\"span4\" id=\"prependedInput\" size=\"16\" type=\"text\" placeholder=\"Email Address\">
						</div>
						<div class=\"input-prepend\">
							<span class=\"add-on\"><i class=\"icon-globe\"></i></span>
							<input class=\"span4\" id=\"prependedInput\" size=\"16\" type=\"text\" placeholder=\"Website URL\">
						</div>
						<textarea class=\"span6\"></textarea>
						<div class=\"row\">
							<div class=\"span2\">
								<input type=\"submit\" class=\"btn btn-inverse\" value=\"Send Message\">
							</div>
						</div>
					</form>
				
		";
	break;
	
}
?>