<?php
  session_start();
  include("connection.php");
  include("functions.php");
  //$user_data=check_login($con);
?>


<!DOCTYPE html>
<html>
<head>
   <title>profile</title>
  <!-- <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
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
        .myButton{
          background:#b2d3c2;
          border-radius:6px;
          text-decoration:none;
          font:1400 26px calibiri;
          height:50px;
          color: #4F5752;
          padding:15px 15px;
          text-align:center;
          box-sizing:border-box;
          position: absolute;
          top: 109px;
          right: 190px;
        }
   </style> 
</head>
<body style="background-image: linear-gradient(to right,#99edc3,#fff9c4); padding: 0 ;">

    <?php 
    include('logout_btn.php');
  ?>

  <!-- <div class="sideleft">
    <img src="voter.png"><br/>
    <a href="voter_main_page.php">Back</a><br/>
    <a href="">View Ongoing Elections</a>
  </div> -->

  <div class="container">
    

    <a href="voter_front_page.php" class="myButton">BACK</a>


   <div class="wrapper">
        
     <?php
       $voterid=$_SESSION['voter_id'];
       $q= "select * from voter where voter_id= '$voterid'";
        $result=mysqli_query($con, $q);
       // echo "WELCOME ".$_SESSION['voter_id']; 
      ?>

     <h2 style="text-align: center;">My Profile</h2>

     <?php
      // $result=mysqli_query($con, $q);
      $row=mysqli_fetch_assoc($result);

       echo "<b>";
         echo "<table class='table table-bordered text-align:center'>";
                    
           echo "<tr>"; 
             echo "<td>";
               echo "<b>voter_id:</b> "; 
             echo "</td>"; 
             echo "<td>"; 
               echo $row['voter_id']  ;
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
               echo "<b>firstname:</b>"; 
             echo "</td>"; 
             echo "<td>"; 
               echo $row['firstname']  ; 
             echo "</td>";
           echo "</tr>";

           echo "<tr>"; 
             echo "<td>";
               echo "<b>lastname:</b>";
             echo "</td>";
             echo "<td>"; 
               echo $row['lastname'] ; 
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

           echo "<tr>";  
             echo "<td>"; 
               echo "<b>gender:</b>"; 
             echo "</td>";
             echo "<td>"; 
               echo $row['gender']  ; 
             echo "</td>"; 
           echo "</tr>";

           echo "<tr>"; 
             echo "<td>"; 
              echo "<b>phone:</b>"; 
             echo "</td>";
            echo "<td>"; 
              echo $row['phone']  ; 
            echo "</td>"; 
           echo "</tr>";

         echo "</table>";
       echo "</b>";                    
     ?>
       </div>
  </div>  

  <?php 
    include('footer.php');
  ?>
</body>
</html>
