<!DOCTYPE html>
<html>
<?php  include "../head.php";  ?>
<head><link rel="stylesheet" type="text/css" href="../style.css"></head>
<body style="text-align:left">


<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		echo '
						<div class="alert alert-warning" role="alert">
  						You need to log in first .Click here to go back to home screen.
  						<a href="login.php"><button type="button" class="btn btn-primary btn-sm">Home</button></a>
						</div>
					';
		exit();
	}
	else{
		session_destroy();
		echo '
						<div class="alert alert-success" role="alert">
  						Logged Out Successfully .Click here to go back to home screen.
  						<a href="login.php"><button type="button" class="btn btn-primary btn-sm">Home</button></a>
						</div>


		';
		
	}
	


 ?>

</body>
</html>