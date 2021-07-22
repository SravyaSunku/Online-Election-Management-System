<?php
  session_start();
  include("connection.php");
  include("functions.php");
  //$user_data=check_login($con);
?>


<!DOCTYPE html>
<html>
<head>
	 <title>admin profile</title>
   <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <style type="text/css">
        .wrapper
        {
      	width: 400px;
        margin: 0 auto;
        color: black;
        }
        table.table
        {
          font-family:verdana,arial,sans-serif;
          font-size:14px;
          color: #4F5752;
          border-width: 2px;
          border-color: black;
        }
        table.table tr td
        {
          border-width:2px;
          padding:8px;
          border-style:solid;
          border-color: black;
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
</head>
<body style="background-image: linear-gradient(to right,#99edc3,#fff9c4); padding: 0 ;">

<div id="nav1">
<ul>
  <li><a>Online ELection Management System</a></li>
  <li><a href="admin_main_page.php">HOME</a></li>
  <li style="float:right"><a href="">LOGOUT</a></li>
</ul>
</div>


  <!-- <div class="sideleft">
    <img src="admin.png"><br/>
    <a href="admin_main_page.php">Back</a><br/>
    <a href="">View Ongoing Elections</a>
  </div> -->

	<div class="container">
    

    <!-- <a href="admin_main_page.php" class="myButton">BACK</a> -->


	 <div class="wrapper">
	     	
	   <?php
	     $adminid=$_SESSION['admin_id'];
       $q= "select * from admin where admin_id= '$adminid'";
      ?>
      <br><br>

     <h1 style="text-align: center;">My Profile</h1>
     <br>

     <?php
       $result=mysqli_query($con, $q);
       $row=mysqli_fetch_assoc($result);

       echo "<b>";
         echo "<table class='table table-bordered text-align:center'>";
                    
           echo "<tr>"; 
             echo "<td>";
               echo "<b>admin_id:</b> "; 
             echo "</td>"; 
             echo "<td>"; 
               echo $row['admin_id']  ;
             echo "</td>";
           echo "</tr>";

           echo "<tr>"; 
             echo "<td>";
               echo "<b>password</b>:"; 
             echo "</td>";
             echo "<td>"; 
               echo $row['password']  ; 
             echo "</td>";
           echo "</tr>";

           echo "<tr>"; 
             echo "<td>"; 
               echo "<b>fullname:</b>"; 
             echo "</td>"; 
             echo "<td>"; 
               echo $row['fullname']  ; 
             echo "</td>";
           echo "</tr>";

           echo "<tr>";  
             echo "<td>";
               echo "<b>email:</b>"; 
             echo "</td>";
             echo "<td>"; 
               echo $row['email_id'] ; 
             echo "</td>"; 
           echo "</tr>";

         echo "</table>";
       echo "</b>";                    
	   ?>
	     </div>
	</div>	
  <div style="text-align: center; font-size: 20px; text-decoration: underline; padding-top: 10px; padding-bottom: 50px;"><a href="admin_main_page.php">Go back to Home page</a></div>

  <?php 
    include('footer.php');
  ?>
</body>
</html>
