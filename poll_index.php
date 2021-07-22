<?php
	session_start();
	include("connection.php");
	// include("functions.php");
	$voter_id=$_SESSION['voter_id'];
	// $_SESSION['category_id'] = $poll['$category_id'];
	// $_SESSION['category_id'] = $category_id;
// $pollsQuery = mysqli_query($con, "SELECT category_id, category_name
	$pollsQuery = mysqli_query($con, "SELECT *
		FROM category");
		// WHERE DATE(NOW()) BETWEEN starts AND ends

	while ($row=mysqli_fetch_array($pollsQuery)) {
		$polls[]=$row;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>poll_index</title>
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
		#container{
			border:#bd6f2f solid 1px;
			padding:4px 6px 2px 6px;
			width:970px; 
			margin:0 auto; 
			background:#ABEBC6;  
			font-size:20px; 
			text-align:justify;
			margin-top:20px;
			}
		th {
			font-weight: bold;
			padding-bottom: 10px;
			text-align: center;
		}
 		body{
 			background-image: linear-gradient(to right,#99edc3,#fff9c4);
  			padding: 0 ;
  			font-family: Calibri;
 		}
                
        .ctable td{
 			text-align: center;
 			padding-bottom: 10px;
		}
	/*    .header {
		  padding: 10px 16px;
		  background: #b2d3c2;
		  color: #4F5752;
		}*/
 
    </style>
<!-- <script language="JavaScript" src="js/admin.js">
</script> -->
</head>
<body>
<div id="nav1">
<ul>
  <li><a>Online ELection Management System</a></li>
  <li><a href="voter_main_page.php">HOME</a></li>
  <li style="float:right"><a href="logout.php">LOGOUT</a></li>
</ul>
</div>
<!-- 		<div id="nav1">
		<ul>
			<li>Online ELection Management System</li>
			<li style="float:right"><a href="">Logout</a></li>
		</ul>
	</div> -->

<!--     <div class="header" id="myHeader">
  <h2>Online College Election</h2>
</div> -->




	<div id="container">
		<table class="ctable" border="0" width="620" align="center" font-size="18px">
			<CAPTION><h3>AVAILABLE POLLS</h3></CAPTION>
			<tr>
				<th>no</th>
				<th>POLL ID</th>
				<th>POLL NAME</th>
				<th>START DATE</th>
				<th>END DATE</th>
			</tr>

			<?php if(!empty($polls)){ ?>
				<?php
				 $inc=1;
				 foreach ($polls as $poll) { ?>
					<tr>
				 		<td><?php echo $inc;?></td>
				 		<td><?php echo $poll['category_id']; ?></td>
				 		<td><a href="poll.php?poll=<?php echo $poll['category_id'];?>"><?php echo $poll['category_name']; ?></a></td>
				 		<td><?php echo $poll['starts']; ?></td>
				 		<td><?php echo $poll['ends']; ?></td>
				 	</tr>
			<?php $inc++;}} ?>
		</table>
	</div>

	<?php if(empty($polls)){ ?>
		<p>Sorry no polls available</p>
	<?php } ?>
<br>
<br>

	<!-- <div style="text-align: center; font-size: 20px; text-decoration: underline;"><a href="voter_main_page.php">Go back to Home page</a></div> -->


<?php 
		include('footer.php');
	?>


</body>
</html>