<?php
	session_start();
	include("connection.php");

	if(!isset($_GET['poll']))
	{
		header('Location: index.php');
	}

	$voter_id=$_SESSION['voter_id'];
	$id = $_GET['poll'];

	$_SESSION['res_id'] = $id;

	$completed = mysqli_query($con, "SELECT id FROM poll_res WHERE voter_id='$voter_id' AND category_id='$id'");

	$pollend = mysqli_query($con, "SELECT ends FROM category WHERE category_id='$id' AND ends<DATE(NOW())");


	if(mysqli_num_rows($completed)){


		$answer = mysqli_query($con, "
			SELECT candidate.id AS choice_id, candidate.candidate_id AS choice_name
			FROM poll_res
			JOIN candidate
			ON poll_res.candidate_id = candidate.id
			WHERE poll_res.voter_id = '$voter_id'
			AND poll_res.category_id = '$id'
			");

		$answerQuery = mysqli_query($con, "
			SELECT candidate.candidate_id,
			COUNT(poll_res.id) * 100 / (
				SELECT COUNT(*)
				FROM poll_res
				WHERE poll_res.category_id = '$id') AS percentage
			FROM candidate
			LEFT JOIN poll_res
			ON candidate.id = poll_res.candidate_id
			WHERE candidate.category_id = '$id'
			GROUP BY candidate.id
			");

		while ($row=mysqli_fetch_array($answerQuery))
		{
			$answers[] = $row;
		}
	}
 		$pollQuery = mysqli_query($con, "SELECT category_id, category_name
	  	FROM category
	  	WHERE category_id = '$id'");
	  	//AND DATE(NOW()) BETWEEN starts AND ends
	  	

  	$poll=mysqli_fetch_array($pollQuery);


  	
  	// $category_id=$_SESSION['category_id'];

	//get poll choices
	$choicesQuery = mysqli_query($con, "SELECT category.category_id, candidate.fullname AS name, candidate.id AS choice_id, candidate.candidate_id
		FROM category
		JOIN candidate
		ON category.category_id = candidate.category_id
		WHERE category.category_id = '$id'");
		// AND DATE(NOW()) BETWEEN starts AND ends

	while ($row=mysqli_fetch_array($choicesQuery)) 
	{
		$choices[]=$row;
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>poll</title>
	<style type="text/css">
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
		body{
 			background-image: linear-gradient(to right,#99edc3,#fff9c4);
  			padding: 0 ;
  			font-family: Calibri;
 		}
		.poll{
			padding: 20px;
			border: 1px solid grey;

		}
		.poll-question{
			font-weight: bold;
			margin-bottom: 20px;
		}
		.poll-options{
			margin-bottom: 20px;
			
		}
		.poll-option{
			margin-bottom: 10px;
			font-weight: bold;
		}
		.container{
			/*border:#bd6f2f solid 0; */
			/*1px*/
			padding:4px 6px 2px 6px;
			width:970px; 
			margin:0 auto; 
			background:#ABEBC6;  
			font-size:20px; 
			text-align:justify;
			margin-top:20px;
			}

			/*.header {
  padding: 10px 16px;
  background: #b2d3c2;
  color: #4F5752;
}*/

	
	</style>
</head>
<body>

	<!-- <div class="header" id="myHeader">
  <h2>Online College Election</h2>
</div> -->
<div id="nav1">
<ul>
  <li><a>Online ELection Management System</a></li>
  <li><a href="voter_main_page.php">HOME</a></li>
  <li style="float:right"><a href="">LOGOUT</a></li>
</ul>
</div>

	

<div class="container">
	<div class="poll">
		<div class="poll-question" style="font-size: 25px;">
			<?php echo "Postion: ".$poll['category_name'] ?>
		</div>

		<?php 
		if(mysqli_num_rows($pollend)){
			echo "<h2>Poll has ended.</h2>";
			echo "<a href='result_page.php'>Click here to check results</a><br>";
	    	echo "<a href='poll_index.php'>Go back to Ongoing POlls</a>";
		}
		else{?>

	<?php		
		if(mysqli_num_rows($completed)) {?>
	    	<?php echo "<h2>You have already voted for this Position!</h2>";
	    	echo "<a href='result_page.php'>Click here to check results</a><br>";
	    	// echo '<pre>', print_r($answer), '</pre>';
	    	echo "<a href='poll_index.php'>Go back to Ongoing POlls</a>";
	  	}
         else if(empty($choices))
         {
         	echo "<h3><b><center>no candidates registered</h3></b></center>";
         echo "<a href='poll_index.php'>Go back to Ongoing Polls</a>";
         }
	  	else { ?>

			<form action="vote.php" method="get">
				<div class="poll-options">
					<?php foreach ($choices as $index => $choice) { ?>
						<div class="poll-option">
							<input style="font-size: 20px;" type="radio" name="choice" value="<?php echo $choice['choice_id']?>" id="c<?php echo $index; ?>">
							<label style="font-size: 20px;" for="c<?php echo $index; ?>"><?php echo "ID: ".$choice['candidate_id']."; NAME: ".$choice['name'] ; ?></label>
						</div>
					<?php } ?>
				</div>

				<input href="poll_index.php" type="submit" name="" value="Submit answer">
				<input type="hidden" name="poll" value="<?php echo $id; ?>">

				<br><br><br>
				<a href='poll_index.php'>Go back to Ongoing POlls</a>
				
			</form>

	<?php } ?>
<?php } ?>
	</div>
	</div>



<?php 
		include('footer.php');
	?>
</body>
</html>


