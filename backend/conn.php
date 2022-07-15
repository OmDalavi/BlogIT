<?php
	$username="root";
	$servername="localhost";
	$password="";
	$database="users";
	$conn=mysqli_connect($servername,$username,$password,$database);
	if(!$conn){
		echo "Failed to connect to the database";
	}
	

?>