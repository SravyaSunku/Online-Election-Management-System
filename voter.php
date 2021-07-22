<?php
session_start();
require('connection.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
} 
//retrive voters from the tbvoters table
$result=mysqli_query($con,"SELECT * FROM voter");
if (mysqli_num_rows($result)<1){
    $result = null;
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
 $result = mysqli_query($con, "DELETE FROM voter WHERE voter_id='$id'");
 
 // redirect back to voters
 header("Location: voter.php");
 }
 else
 // do nothing   
?>

<!DOCTYPE html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> -->
<title>voter</title>
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
            font-size:25px; 
            text-align:justify;
            margin-top:20px;
            }
        th {
            font-weight: bold;
            text-align: center;
            font-family: Calibri;
            padding-bottom: 10px;

        }
        tr
        {
            font-size: 18px;
            font-family: Calibri;
            text-align: center;
        }
                .ctable td{
            text-align: center;
            padding-bottom: 10px;
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
  <!--   <div class="header" id="myHeader">
  <h2>Online College Election</h2>
</div>
 -->

<!-- <div id="page"> -->

<div id="container">

<table class="ctable" border="0" width="950" align="center">
<CAPTION><h3>ALL REGISTERED VOTERS</h3></CAPTION>
<tr>
<th>S.No</th>
<th>voter ID</th>
<th>voter firstname</th>
<th>voter lastname</th>
<th>voter email_id</th>
<th>voter gender</th>
<th>voter phone</th>
</tr>

<?php
//loop through all table rows
$inc=1;
while ($row=mysqli_fetch_array($result)){
    
echo "<tr>";
echo "<td>" . $inc."</td>";
echo "<td>" . $row['voter_id']."</td>";
echo "<td>" . $row['firstname']."</td>";
echo "<td>" . $row['lastname']."</td>";
echo "<td>" . $row['email_id']."</td>";
echo "<td>" . $row['gender']."</td>";
echo "<td>" . $row['phone']."</td>";
echo '<td><a href="voter.php?id=' . $row['voter_id'] . '">Delete voter</a></td>';
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