<?php 
	session_start();
	include("connection.php");

	// if(isset($_POST['poll'], $_POST['choice']))	{

		$poll = $_GET['poll'];
		$choice = $_GET['choice'];
		$voter_id = $_SESSION['voter_id'];


		$sql=mysqli_query($con, "SELECT category_id,voter_id FROM poll_res WHERE category_id='$poll' AND voter_id='$voter_id'");

		// if(mysqli_num_rows($sql))
		// {
  //   		echo "<h3>You have already done your for this Position</h3>";
  // 		}
		// else
		// {
		//     $ins=mysqli_query($con,"INSERT INTO poll_res (voter_id, category_id, candidate_id) VALUES ('$voter_id', '$poll', '$choice')");
		//     echo "<h3>Voted successfully!</h3>";
		//     echo "<a href='poll_index.php'>Go back to Ongoing polls</a>";
		// }

		// $q="SELECT voter_id, category_id, id
		// 	FROM category
		// 	WHERE EXISTS (
		// 		SELECT category_id
		// 		FROM category
		// 		WHERE category_id = '$poll')
		// 	AND EXISTS (
		// 		SELECT id
		// 		FROM candidate
		// 		WHERE id = '$choice')
		// 	AND NOT EXISTS (
		// 		SELECT id
		// 		FROM poll_res
		// 		WHERE voter_id = '$voter_id'
		// 		AND category_id = '$poll')
		// 	AND DATE(NOW()) BETWEEN starts AND ends
		// 	LIMIT 1";

		// $result = mysqli_query($con, $q);

		// $vote_arr = mysqli_fetch_assoc($result);

		// $newVoter_id = $vote_arr['voter_id'];
		// $newCategory_id = $vote_arr['category_id'];
		// $newCandidate_id = $vote_arr['id'];


		// $voteQuery = mysqli_query($con, "INSERT INTO poll_res (voter_id, category_id, candidate_id) VALUES ('$newVoter_id', '$newCategory_id','$newCandidate_id')");

		// header('Location: poll.php');

	// }

	// header('Location: poll_index.php');

 ?>

<!DOCTYPE html>
 <html>
 <head>
 	<title>Voted!</title>
 		<style type="text/css">
 		body{
 			background-image: linear-gradient(to right,#99edc3,#fff9c4);
  			padding: 0 ;
  			font-family: Calibri;
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

/*
.sticky {
  position: fixed;
  top: 0;
  width: 100%
}*/
		.container{
			/*border:#bd6f2f solid 0; */
			/*1px*/
			padding:4px 6px 2px 6px;
			width:970px; 
			margin:0 auto; 
			/*background:#ABEBC6;  */
			font-size:20px; 
			text-align:justify;
			margin-top:20px;
			}

 	</style>
 </head>
 <body>
 		<div id="nav1">
<ul>
  <li><a>Online ELection Management System</a></li>
  <li><a href="voter_main_page.php">HOME</a></li>
  <li style="float:right"><a href="">LOGOUT</a></li>
</ul>
</div>
<div class="container">
 	<?php
 			if(mysqli_num_rows($sql))
		{
    		echo "<h3>You have already done your for this Position</h3>";
  		}
		else
		{
		    $ins=mysqli_query($con,"INSERT INTO poll_res (voter_id, category_id, candidate_id) VALUES ('$voter_id', '$poll', '$choice')");
		    echo "<h2>THANK YOU!</h2>";
		    echo "<h3>Voted successfully!</h3>";
		    echo "<a href='poll_index.php'>Go back to Ongoing polls</a>";
		}
 	?>
 </div>
 	<?php 
		include('footer.php');
	?>
 
 </body>
 </html>