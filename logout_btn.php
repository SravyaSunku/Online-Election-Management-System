<?php 
	// session_start();
	// if($_SERVER['REQUEST_METHOD'] == "POST"){

	// 	if(isset($_SESSION['voter_id']))
	// 	{
	// 		unset($_SESSION['voter_id']);
	// 	}
	// 	header("Location: index.php");
	// 	die;
	// }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<style type="text/css">
		.brand{
			background: #CFFAD3 !important;
			color: grey;
		}
		.bckcolor{
			background: #b2d3c2;
/*			position: fixed;
			left: 0px;
			right: 0px;
			top: 0px;
			*/
		}
		.brand-text{
			color: #4F5752 !important;
		}
	</style>
</head>
<body>
	<div>
		<nav class="bckcolor z-depth-0">
			<div class="container">
				<a href="" class="brand-logo brand-text">College Election Management System</a>
				<ul id="nav-mobile" class="right hide-on-small-and-down">
					<li><a href="index.php" class="btn brand ">Logout</a></li>
				</ul>
			</div>
		</nav>
	</div>
</body>
</html>
