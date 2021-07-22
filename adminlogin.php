<?php 
	
	session_start();
	include("connection.php");
	include("functions.php");

	// $user_data=check_login($con);

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$admin_id = $_POST['admin_id'];
		$password = $_POST['password'];

		if(!empty($admin_id) && !empty($password))
		{
			//read from db

			$query = "CALL `select_admin`('$admin_id', '$password')";
			// $query = "CALL `select_admin`('$admin_id','$password')";

			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{
						$_SESSION['admin_id'] = $user_data['$admin_id'];
						$_SESSION['admin_id'] = $admin_id;
						    echo "<SCRIPT> //not showing me this
							        alert('ADMIN logged in successfully')
							        window.location.replace('admin_main_page.php');
							    </SCRIPT>";						
						// header("Location: admin_main_page.php");
						// die;
					}
				}
			}
						echo "please enter valid pw!";
		}
		else
		{
			echo "please enter valid info!";
		}
	}
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>admin Login</title>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
	
</head>
<body>
	<div id="nav1">
		<ul>
			<li><a href="index.php"><i class="fas fa-home"></i> home</a></li>
		</ul>
	</div>
	

	<div class="form">
		<p>admin Login</p>
		<form method="post">
			<i class="fas fa-user"></i>
			<input type="text" name="admin_id" placeholder="admin ID">
			<i class="fas fa-lock"></i>
			<input type="password" name="password" placeholder="Password">


			<!-- submit button -->
			&nbsp&nbsp&nbsp <input type="submit" name="Login">


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