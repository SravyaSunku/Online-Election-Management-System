<?php	

	session_start();
	include("connection.php");


$voter_id=$_SESSION['voter_id'];
	$id = $_SESSION['res_id'];


$resultDate = mysqli_query($con, " SELECT ends AS endDate
			FROM category
			WHERE category_id = '$id'
			AND DATE(NOW()) NOT BETWEEN starts AND ends");
// $endsDate=mysqli_fetch($resultDate);
while($datesrow=mysqli_fetch_array($resultDate))
	$datesrows[]=$datesrow;


$answerQuery = mysqli_query($con, "
			SELECT candidate.*,
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
?>
<!DOCTYPE html>
<html>
<head>
	<title>poll results</title>
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
			font-size:18px; 
			text-align:justify;
			margin-top:20px;
			}
		.ctable th {
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
 		 		/*.myButton{
          background:#b2d3c2;
          border-radius:6px;
          text-decoration:none;
          font:1400 23px calibiri;
          height:40px;
          color: #4F5752;
          padding:10px 10px;
          text-align:center;
          position: absolute;
          top: 109px;
          right: 190px;
        }
		*/
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


	<script>
	function goBack() {
	  window.history.back();
	}
	</script>

	<div id="container">
		<?php if(empty($datesrows)){
			?><div><h4><center>
			<?php echo nl2br("Oops!\nPolls for the selected category is ongoing. Results would be declared after the polls end.");
			// echo "";
			// echo "";?>
			</center></h4></div>
		<?php }
		elseif(empty($answers))
		{
			echo "<h2><b>OOps...No candidates were registered</b></h2>";
		}

		
		else{ ?>
		<table class="ctable" border="0" width="620" align="center" font-size="18px">
			<CAPTION><h3>RESULTS</h3></CAPTION>
			<tr>
				<th>&nbsp&nbsp no</th>
				<th>CANDIDATE ID</th>
				<th>CANDIDATE NAME</th>
				<th>VOTES PERCENTAGE</th>
			</tr>

			<?php if(!empty($answers)){ ?>
				<?php
				 $inc=1;
				 $winner = $answers[1]['percentage'];
				 $winnerName = $answers[1]['fullname'];
				 foreach ($answers as $ans) { 
				 	if($ans['percentage'] > $winner){
				 		$winner = $ans['percentage'];
				 		$winnerName = $ans['fullname'];
				 	}
				 	?>
					<tr>
				 		<td><?php echo $inc;?></td>
				 		<td><?php echo $ans['candidate_id']; ?></td>
				 		<td><?php echo $ans['fullname']; ?></td>
				 		<td><?php echo number_format($ans['percentage'],2)?>%</td>
				 	</tr>
			<?php $inc++;}} ?>
		</table>
		<div style="text-align:center; color: darkgreen">
	 <?php echo "<h1><b>Winner is $winnerName!</b></h1>"; ?>
</div>
	<?php } ?>
	</div>
<br><br>

	<div style="text-align:center; text-decoration: underline; font-size: 20px; cursor: pointer;">
  <a onclick="goBack()">BACK</a>​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​
</div>



	<?php 
		include('footer.php');
	?>
</body>
</html>



