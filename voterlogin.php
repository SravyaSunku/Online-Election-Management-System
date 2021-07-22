<?php 
	
	session_start();
	include("connection.php");
	include("functions.php");

	// $user_data=check_login($con);

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$voter_id = $_POST['voter_id'];
		$password = $_POST['password'];

		if(!empty($voter_id) && !empty($password))
		{
			//read from db
			$query = "select * from voter where voter_id = '$voter_id' limit 1";

			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{
						$_SESSION['voter_id'] = $user_data['$voter_id'];
						$_SESSION['voter_id'] = $voter_id;
						    echo "<SCRIPT> //not showing me this
							        alert('logged in successfully')
							        window.location.replace('voter_main_page.php');
							    </SCRIPT>";
						// echo '<script type="text/javascript">';
						// echo 'document.write("Hello World!")';
						// echo '</script>';
						// header("Location: voter_main_page.php");
						// die;
					}
				}
			}
						echo "<h2>please enter valid pw!</h2>";
		}
		else
		{
			echo "<h2>please enter valid info!</h2>";
		}
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Voter Login</title>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
	
</head>
<body>
	<div id="nav1">
		<ul>
			<li><a href="index.php"><i class="fas fa-home"></i> home</a></li>
		</ul>
	</div>
	

	<div class="form">
		<p>Voter Login</p>
		<form method="post">
			<i class="fas fa-user"></i>
			<input type="text" name="voter_id" placeholder="Voter ID">
			<i class="fas fa-lock"></i>
			<input type="password" name="password" placeholder="Password">


			<!-- submit button -->
			&nbsp&nbsp&nbsp <input type="submit" name="Login">

			<!-- <button>login</button> -->
			

			<!-- signup page -->
			<p class="message">Not registered? <a href="voter_registration.php">Register Now!</a></p>
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