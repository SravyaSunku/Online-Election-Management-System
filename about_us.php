<!DOCTYPE html>
<html>
<head>
	<title>Abpout Us</title>
	<!-- <link rel="stylesheet" type="text/css" href="loginstyle.css"> -->
	<style type="text/css">
		@import "https://use.fontawesome.com/releases/v5.5.0/css/all.css";
/* body background css */
		body{
			padding: 0;
			margin: 0;
			background-image: linear-gradient(to right,#99edc3,#fff9c4);

		}.form{
			font-family: "Roboto", sans-serif;
			position: relative;
			z-index: 1;
			background: #b2d3c2;
			opacity: 99%;
			max-width: 800px;
			margin: 40px auto ;
			padding: 5px 40px 25px 40px;
			text-align: : center;
			box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
			border-radius: 10px;
		}
		#nav1 ul{
			padding: 14px;
			margin-top: 0;
			list-style-type: none;
			text-align: center;
			background-color: #b2d3c2;
			/*margin: 10px;*/
			border-radius: 5px;
		}
		#nav1 ul li{
			display: inline;
			color:white;
			margin: 15px;
		}
		#nav1 ul li a{
			text-decoration: none;
			font-family: Arial;
			padding: .2em 1em;
			color: #5D6D7E;
			background: #CFFAD3;
			border-radius: 7px;
		}
		#nav1 ul li a:hover{
			background: #A4FFAC;
			transition: all 1s ease 0s;
		}
	</style>
	
</head>
<body>
	<div id="nav1">
		<ul>
			<li><a href="index.php"><i class="fas fa-home"></i> home</a></li>
		</ul>
	</div>
	

	<div class="form">
		<h1><center>About Us</center></h1>
		<form style="text-align: center;">
			The College Election Management software is designed to provide
an easy way to vote online in an efficient manner. This software maintains
individual candidate and voter accounts for each election.
<br>The voter can cast his/her vote online to their desired candidate by
registering themselves online. Once a person casts his/her vote with proper
authentication, revoting is prohibited. After the voting procedure is done,
votes are counted online and the results will be uploaded.<br>
This method of web voting can provide security and no proxy voting
can be done hence maintaining the integrity of the poll results.
		</form>
	</div>
	<div class="form" style="max-width: 500px; padding-bottom: 5px;"><h3><center>Our contact Info:</center></h3>
	<form style="text-align: center;">
		<p><center><b>PRATHIKSHA.S.B</b>: 9632734966 & email-id: prathikshasb@gmail.com</center></p>
		<p><center><b>S.SRAVYA</b>: 9441924406 & email-id: sunkusravya9@gmail.com</center></p>
	</form>
</div>

	</div>




	<div>
	<?php 
		include('footer.php');
	?>
	</div>

</body>
</html>