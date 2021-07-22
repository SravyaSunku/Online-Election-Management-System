<?php 
	function check_login($con)
	{
	
		if(isset($_SESSION['voter_id']))
		{
			$id = $_SESSION['voter_id'];
			$query = "select * from voter where voter_id = '$id' limit 1";
			$result = mysqli_query($con,$query);
			if($result && mysqli_num_rows($result) > 0)
			{
				$user_data = mysqli_fetch_assoc($result);
				return $user_data;
			}
		}

		//redirect to voter login
		header('Location: voterlogin.php');
		die;
	}


	function check_login_a($con)
	{
	
		if(isset($_SESSION['admin_id']))
		{
			$id = $_SESSION['admin_id'];
			$query = "select * from admin where admin_id = '$id' limit 1";
			$result = mysqli_query($con,$query);
			if($result && mysqli_num_rows($result) > 0)
			{
				$user_data = mysqli_fetch_assoc($result);
				return $user_data;
			}
		}

		//redirect to admin login
		header('Location: adminlogin.php');
		die;
	}




// 	function getUserById($id){
// 		global $con;
// 		$query = "SELECT * FROM users WHERE id=" . $id;
// 		$result = mysqli_query($con, $query);

// 		$voter = mysqli_fetch_assoc($result);
// 		return $voter;
// }

 ?>