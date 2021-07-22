<?php
session_start();
require('connection.php');
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
} 
//retrive candidates from the tbcandidates table
$result=mysqli_query($con,"SELECT * FROM candidate ORDER BY category_id");
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>
<?php
// retrieving positions sql query
$positions_retrieved=mysqli_query($con, "SELECT * FROM category WHERE DATE(NOW()) BETWEEN starts AND ends");
/*
$row = mysqli_fetch_array($positions_retrieved);
 if($row)
 {
 // get data from db
 $positions = $row['position_name'];
 }
 */
?>
<?php
// inserting sql query
if (isset($_POST['Submit']))
{
$newCandidateid = $_POST['candidateid'];
$newCandidatename = $_POST['candidatename'];
$newCandidateemail = $_POST['candidateemail']; //prevents types of SQL injection
$newCandidatePosition = $_POST['position']; //prevents types of SQL injection

$sql = mysqli_query($con, "INSERT INTO candidate(category_id, candidate_id, fullname, email_id) VALUES ('$newCandidatePosition','$newCandidateid','$newCandidatename','$newCandidateemail')" );

// redirect back to candidates
 header("Location: candidate.php");
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
 $result = mysqli_query($con, "DELETE FROM candidate WHERE candidate_id='$id'");
 
 // redirect back to candidates
 header("Location: candidate.php");
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
<title>Candidate</title>
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
        }
        .ctable tr
        {
            font-size: 18px;
            font-family: Calibri;
            /*text-align: justify;*/
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


<!-- <div id="page"> -->

<div id="container">
<table class="ctable" width="950" align="center">
<CAPTION><h4>ADD NEW CANDIDATE</h4></CAPTION>
<form name="fmCandidates" id="fmCandidates" action="candidate.php" method="post" onsubmit="return candidateValidate(this)">
<tr>
    <td>Candidate Id</td>
    <td><input type="text" name="candidateid" /></td>
    <td>Candidate Name</td>
    <td><input type="text" name="candidatename" /></td>
    <td>Candidate Email_id</td>
    <td><input type="text" name="candidateemail" /></td>
</tr>
<tr>
    <td>Candidate Position</td>
    <td><SELECT NAME="position" id="position">select
    <OPTION VALUE="select">select
    <?php
    //loop through all table rows
    while ($row=mysqli_fetch_array($positions_retrieved)){
    echo "<OPTION VALUE=$row[category_id]>$row[category_name]";
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
    </SELECT>
    </td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Add" /></td>
</tr>
</table>
<hr>
<table class="ctable" border="0" width="950" align="center">
<CAPTION><h3>AVAILABLE CANDIDATES</h3></CAPTION>
<tr>
<th>S.No</th>
<th>Candidate ID</th>
<th>Candidate Name</th>
<th>Candidate Position</th>
<th>Candidate Email id</th>
</tr>

<?php
//loop through all table rows
$inc=1;
while ($row=mysqli_fetch_array($result)){
    
echo "<tr>";
echo "<td>" . $inc."</td>";
echo "<td>" . $row['candidate_id']."</td>";
echo "<td>" . $row['fullname']."</td>";
echo "<td>" . $row['category_id']."</td>";
echo "<td>" . $row['email_id']."</td>";
echo '<td><a href="candidate.php?id=' . $row['candidate_id'] . '">Delete Candidate</a></td>';
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