<?php 
	session_start();
	include("connection.php");
	include("functions.php");
	// $user_data=check_login($con);


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin main page</title>
	<style type="text/css">
 		body{
 			background-image: linear-gradient(to right,#99edc3,#fff9c4);
  			padding: 0 ;
  			font-family: Calibri;
 		}
 		.sideleft{
			background-color: #b2d3c2;
			text-align: center;
			margin-left:10px;
			margin-top: 10px;
			margin-bottom: 10px;
			border-radius: 7px;
			padding: 20px;
			width: 400px;
			font-size:125%;
			margin: auto;
		}
						#nav1 ul {
		  list-style-type: none;
		  margin: 0;
		  padding: 0;
		  overflow: hidden;
		  background-color: #b2d3c2;
		}

		#nav1 li {
		  float: left;
		}

		#nav1 li a {
		  display: block;
		  color: grey;
		  text-align: center;
		  padding: 14px 16px;
		  text-decoration: none;
		}

		#nav1 li a:hover:not(.active) {
		  background-color: #CFFAD3;
		}
 	</style>
</head>
<body>
<div id="nav1">
<ul>
  <li><a>Online ELection Management System</a></li>
  <li><a href="admin_main_page.php">HOME</a></li>
  <li style="float:right"><a href="logout.php">LOGOUT</a></li>
</ul>
</div>
<br>

	<div style="text-align: center; font-size: 60px; color: #4F5752; margin: 0; padding: 0;">
		<?php 
		echo "WELCOME ADMIN ".$_SESSION['admin_id'];
		 ?>
	</div>

	<div class="sideleft">
		<img src="admin.png"><br/>
		<a href="admin_profile.php">View Profile</a><br/>
		<a href="positions.php">Manage Positions</a><br/>
		<a href="candidate.php">Manage Candidates</a><br/>
		<a href="voter.php">Manage Voters</a><br/>
		<a href="admin_result.php">View Results</a><br/>

	</div>

 	<?php 
		include('footer.php');
	?>

</body>
</html>