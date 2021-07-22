<?php 

	session_start();
	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$voter_id = $_POST['voter_id'];
		$password = $_POST['password'];
		$gender = $_POST['gender'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];

		if(!empty($voter_id) && !empty($password) && !empty($firstname) && !empty($lastname) && !empty($gender) && !empty($email) && !empty($phone))
		{
			//save to db
			$query =  "CALL `insert_voter`('$voter_id','$password','$firstname','$lastname','$email','$gender','$phone')"; //this is the store dprocedure that is being called

			mysqli_query($con, $query);

			 echo "<SCRIPT> //not showing me this
							        alert('Registered successfully')
							        window.location.replace('voterlogin.php');
							    </SCRIPT>";


			//header("Location: voterlogin.php");
			die;


		}else
		{
			echo "please enter valid info!";
		}


	}


	// if(isset($_GET['submit'])){
	// 	echo $_GET['email'];
	// 	echo $_GET['phone'];
	// }
	// if(isset($_POST['submit'])){
	// 	if(empty($_POST['email'])){
	// 		echo 'an email is required <br />';
	// 	}
	// 	else{
	// 		$email=$_POST['email'];
	// 		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	// 			echo 'email must be valid';
	// 		}
	// 	}

	// 	// echo $_POST['email'];
	// 	// echo $_POST['phone'];
	// }
	// if(isset($_POST['submit'])){
	// 	header('Location: voter_front_page.php');
	// }

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>voter registration</title>
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 	<style type="text/css">
 		body{
 			  background-image: linear-gradient(to right,#99edc3,#fff9c4);
  padding: 0 10px;
  opacity: 80%;
 		}

 		form{
 			background-color: #b2d3c2;
 			max-width: 460px;
 			margin: 20px auto;
 			padding: 20px;
 		}
	#nav1 ul{
		padding: 14px;
		list-style-type: none;
		text-align: center;
		background-color: #b2d3c2;
		margin: 10px;
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
	<section class="container grey-text">
		<h4 class="center">New Voter Regitration</h4>
		<form class="white" action="voter_registration.php" method="POST">
			
			<label>First Name</label>
			<input type="text" name="firstname">
			
			<label>Last Name</label>
			<input type="text" name="lastname">
			
			<label>Voter id</label>
			<input type="text" name="voter_id" placeholder="your USN">
			
			<label>password</label>
			<input type="password" name="password">
			
			<!-- <label>confirm password</label>
			<input type="password" name="password"> -->
			
			<label>gender</label>
			<input type="text" name="gender" placeholder="male/female/others">
			
			<label>email id</label>
			<input type="text" name="email">
			
			<label>phone</label>
			<input type="text" name="phone">
			

			<div class="center">
				<input type="submit" value="register" class="btn brand">
			</div>
		</form>
	</section>



	<!-- <?php include('footer.php'); ?> -->
 
 </body>
 </html>