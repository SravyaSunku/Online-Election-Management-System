<?php 

	session_start();
	include("connection.php");
	include("functions.php");
	// include("function2.php");


	// $user_data=check_login($con);


	// //connect to database
	// $conn = mysqli_connect('localhost', 'prathikshasb', 'japa*123', 'online_election');
	// //check connection
	// if(!$conn){
	// 	echo 'connection error: '.mysqli_connect_error();
	// }
	// //write query for all voters
	// $sql = 'SELECT voter_id, firstname, lastname FROM voter ORDER BY voter_id';
	// //make query and get result
	// $result = mysqli_query($conn, $sql);

	// //fetch the resultung rowa as an array
	// $voters = mysqli_fetch_all($result, MYSQLI_ASSOC);
	// //free result from memory
	// mysqli_free_result($result);

	// //close the connection to db
	// mysqli_close($conn);

	// // print_r($voters);

 ?>


<!doctype html>
<html>
<head>
<title>homepage</title>
<!-- <link type="text/css" rel="stylesheet" href="stylesheet1.css">-->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 --><style type="text/css">
	body{
		/*background:#99edc3;
		background: linear-gradient(to right,#99edc3,#fff9c4);*/
		background:url(votepic.jpg);
		background-repeat:no-repeat;
		background-size:100% 100%;
		position:relative;
		opacity:0.7;
		margin:0px;
		height:750px;
	}

	.button{
		background:#5dbb63;
		color:white;
		border:2px solid;
		border-radius:6px;
		text-decoration:none;
		font:1400 26px calibiri;
		height:60px;
		line-height:56px;
		padding:15px 40px;
		text-align:center;
		margin-right:20px;
		box-sizing:border-box;
	}

	ul{
		padding:0;
		list-style-type:none;
		text-align:center;
	}

	li{
		display:inline;
	}

	ul li a:hover{
		color:white;
		background-color:#028a0f;
	}

	.lastt{
		position: absolute; 
	    bottom: 0px;
	    width: 100%;
	}
	.news {
		margin: auto;
		width:750px;
		font-weight: bold;
		color:red;
		font-size: 22px;
	}

</style>
</head>
<body>

<!-- 	<h4 class="center grey-text">voters!</h4>

	<div class="container">
		<div class="row">
			<?php foreach ($voters as $voter) { ?>
				
				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h6><?php echo $voter['voter_id'] ?></h6>
							<div><?php echo $voter['firstname'] ?></div>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="">more info</a>
						</div>
					</div>
				</div>

			<?php } ?>
		</div>
	</div> -->


<ul>
      <li><a class="button" href="index.php">Home</a></li>
      <li><a class="button" href="voterlogin.php">Voter Login</a></li>
      <li><a class="button" href="adminlogin.php">Admin Login</a></li>
      <li><a class="button" href="about_us.php">About Us</a></li>
</ul>

<div class="news"><marquee behavior="right">New polls are up and running. But they will not be up forever! Just Login and then go to Ongoing Polls to vote for your favourite candidates. </marquee></div>


<div class="lastt">
<?php 
		include('footer.php');

		?>
	</div>
</body>
</html>