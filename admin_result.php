<?php
require('connection.php');
// retrieving candidate(s) results based on position
if (isset($_POST['Submit'])){   

    $position = addslashes( $_POST['position'] );
  
    $results = mysqli_query($con, "SELECT * FROM candidate where category_id='$position'");
    

    $resultDate = mysqli_query($con, " SELECT ends
			FROM category
			WHERE category_id = '$position'
			AND DATE(NOW()) BETWEEN starts AND ends");
    while($datesrow=mysqli_fetch_array($resultDate))
		$datesrows[]=$datesrow;

    $answerQuery = mysqli_query($con, "
			SELECT candidate.*,
			COUNT(poll_res.id) * 100 / (
				SELECT COUNT(*)
				FROM poll_res
				WHERE poll_res.category_id = '$position') AS percentage
			FROM candidate
			LEFT JOIN poll_res
			ON candidate.id = poll_res.candidate_id
			WHERE candidate.category_id = '$position'
			GROUP BY candidate.id
			");


		while ($row=mysqli_fetch_array($answerQuery))
		{
			$answers[] = $row;
		}
}
    else
        // do nothing
?> 
<?php
// retrieving positions sql query
$positions=mysqli_query($con, "SELECT * FROM category");
?>
<?php
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
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
 	</style>
</head>
<body>
	<div id="nav1">
<ul>
  <li><a>Online ELection Management System</a></li>
  <li><a href="admin_main_page.php">HOME</a></li>
  <li style="float:right"><a href="logout.php">LOGOUT</a></li>
</ul>
</div>
	<div id="container">
<table width="420" align="center">
<form name="fmNames" id="fmNames" method="post" action="admin_result.php" onSubmit="return positionValidate(this)">
	<br><br>
<tr>
    <td>Choose Position</td>
    <td><SELECT NAME="position" id="position">
    <OPTION VALUE="select">select
    <?php 
    //loop through all table rows
    while ($row=mysqli_fetch_array($positions)){
    echo "<OPTION VALUE=$row[category_id]>$row[category_name]"; 
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
    </SELECT></td>
    <td><input type="submit" name="Submit" value="See Results"/></td>
</tr>
<tr>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
</tr>
</form>
<!--  style="display:none onclick="func()""-->



<table class="ctable" border="0" width="620" align="center" font-size="18px">

<?php if(!empty($datesrows)){?>
	<div style="text-align:center;"><h2>Oops!Polls for the selected category is ongoing. Results would be declared after the polls end.</h2></div>
		<?php
		}
		elseif(empty($answers))
		{
			echo "<h2><b>OOps...No candidates were registered</b></h2>";
		}
		else{ ?>
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
			<?php
			error_reporting(E_ERROR | E_PARSE); // there was a warning here, so this command to dissapear the warning
			?>
			<div style="text-align:center; color: darkgreen">
	 			<?php echo "<h1><b>Winner is $winnerName!</b></h1>"; ?>
			</div>


<?php } ?>		
</table>

<br>
<br>


</div>
<!-- <script>
function func(){
 document.getElementById('ctable').style.display = 'block';
}
</script> -->

	<?php 
		include('footer.php');
	?>

</body>
</html>