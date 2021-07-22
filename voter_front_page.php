<?php 
	session_start();
	include("connection.php");
	include("functions.php");
	//$user_data=getuser($con);

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Voter Module</title>
 	<style type="text/css">
 		body{
 			background-image: linear-gradient(to right,#99edc3,#fff9c4);
  			padding: 0 10px;
 		}
 		.sideleft{
			background-color: #b2d3c2;
			//margin: 10px;
			text-align: center;
			margin-left:10px;
			/*margin-right: 320px;*/
			margin-top: 10px;
			margin-bottom: 10px;
			border-radius: 7px;
			padding: 20px;
			width: 300px;
			font-size:120%;
		}
 	</style>
 </head>
 <body>
 	<?php 
		include('logout_btn.php');
	?>

	<div style="text-align: center; font-size: 60px; color: grey; margin: 0; padding: 0;">
		<?php
		echo "WELCOME ".$_SESSION['voter_id']; 
		?>
	</div>

	<div class="sideleft">

		<img src="voter.png"><br/>
		<a href="profile.php">View Profile</a><br/>
		<a href="poll_index.php">View Ongoing Elections</a>
        
        

	</div>





 	<?php 
		include('footer.php');
	?>
 </body>
 </html>