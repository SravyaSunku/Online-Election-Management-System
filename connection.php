<?php 
	
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpassword = "";
	$dbname = "online_election";
	
	if(!$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname)){
		die("failed to connect");
	}

 ?>