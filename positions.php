<?php
session_start();
include('connection.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
//retrive positions from the category table
$result=mysqli_query($con, "SELECT * FROM category");
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>
<?php
	// inserting sql query
    $today=date("y-m-d");
	if (isset($_POST['Submit']))
	{
		$newCategory = addslashes( $_POST['position'] );
		$newStarts = $_POST['starts'];
		$newEnds = $_POST['ends'];
		 //prevents types of SQL injection

		if($newStarts < $today){
			echo "<SCRIPT>
			alert('pls choose a valid start date(today or the upcoming dates)')
			window.location.replace('positions.php');
			</SCRIPT>";
		}

		else if(($newEnds < $today)||($newEnds < $newstarts)){
		     echo "<SCRIPT>
			alert('pls choose a valid end date(must be greater than the sstart date)')
			window.location.replace('positions.php');
			</SCRIPT>";	
		}
		else{
		$sql = mysqli_query($con, "INSERT INTO category (category_name, starts, ends) VALUES ('$newCategory', '$newStarts', '$newEnds')");
		// redirect back to positions
		header("Location: positions.php");
		     }
	}
?>
<?php
	// deleting sql query
	// check if the 'id' variable is set in URL
	if (isset($_GET['id']))
	{
		// get id value
		$id = $_GET['id']; 
		// delete the entry
		$result = mysqli_query($con, "DELETE FROM category WHERE category_id='$id'");
		// redirect back to positions
		header("Location: positions.php");
	 }
	 else
	 // do nothing
    
?>
<!DOCTYPE html>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<html>
<!-- <html xmlns="http://www.w3.org/1999/xhtml"> -->
<head>
<!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> -->
<title>Positions</title>
	<style type="text/css">
 		body{
 			background-image: linear-gradient(to right,#99edc3,#fff9c4);
  			padding: 0 ;
  			font-family: Calibri;
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
		th {
			font-weight: bold;
			text-align: center;

		}
		tr{
            font-size: 18px;
			padding-bottom: 10px;
		}
		      .ctable td{
            text-align: center;
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

 	</style>
<!-- <script language="JavaScript" src="js/admin.js">
</script> -->
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
	<table width="380" align="center" >
		<CAPTION><h3>ADD NEW POSITION</h3></CAPTION>
		<form name="fmPositions" id="fmPositions" action="positions.php" method="post" onsubmit="return positionValidate(this)">
		<tr style="text-align: center;">
		    <td>&nbsp&nbsp Position Name: </td>
		    <td><input type="text" name="position" /></td>
		    <td><input type="date" name="starts" /></td>
		    <td><input type="date" name="ends" /></td>

		    <td><input type="submit" name="Submit" value="Add" /></td>
		</tr>
	</table>
	<hr>
		<table class="ctable" border="0" width="950" align="center" font-size="18px">
		<CAPTION><h3>AVAILABLE POSITIONS</h3></CAPTION>
	<tr>
		<th>&nbsp&nbsp Position ID</th>
		<th>Position Name</th>
		<th>start date</th>
		<th>end date</th>
	</tr>

<?php
//loop through all table rows
	$inc=1;
	while ($row=mysqli_fetch_array($result))
	{
		echo "<tr>";
			// echo "<td>" .$inc."</td>";
			echo "<td>" . $row['category_id']."</td>";
			echo "<td>" . $row['category_name']."</td>";
			echo "<td>" . $row['ends']."</td>";
			echo "<td>" . $row['starts']."</td>";
			//echo out start and end dates
			echo '<td><a href="positions.php?id=' . $row['category_id'] . '">Delete Position</a></td>';
		echo "</tr>";
		$inc++;
	}
	mysqli_free_result($result);
	mysqli_close($con);
?>
</table>


<hr>
</div>
<div style="text-align: center; font-size: 20px; text-decoration: underline; padding-top: 10px; padding-bottom: 50px;"><a href="admin_main_page.php">Go back to Home page</a></div>
 	<?php 
		include('footer.php');
	?>
<!-- </div> -->
</body>
</html>