<!DOCTYPE html>
<html>
<?php  include "../head.php";  ?>
<head><link rel="stylesheet" type="text/css" href="../style.css"></head>
<body style="text-align:left">

<?php 
	session_start();
	include "conn.php";
	if(isset($_SESSION['username'])){
		$blognumber=$_POST['blognumber'];
		$blogtitle=$_POST['blogtitle'];
		$blog=$_POST['blog'];
		$sql="select * from {$_SESSION['username']} where sno='$blognumber'";
		$result=mysqli_query($conn,$sql);
		$numRow=mysqli_num_rows($result);
		if($numRow>0){
			echo '
						<div class="alert alert-success" role="alert">
  						Added your blog Successfully .Click here to go back to home screen.
  						<a href="welcome.php"><button type="button" class="btn btn-primary btn-sm">Home</button></a>
						</div>


			';
			exit();
		}
		date_default_timezone_set("Asia/Calcutta");
		$time=date("d/m/Y");
		$sql="insert into {$_SESSION['username']} values ('$blognumber','$blogtitle','$blog','$time')";
		 
		$result=mysqli_query($conn,$sql);
		if($result){
			echo '
						<div class="alert alert-success" role="alert">
  						Added your blog Successfully .Click here to go back to home screen.
  						<a href="welcome.php"><button type="button" class="btn btn-primary btn-sm">Home</button></a>
						</div>


			';
		}else{
			echo $result;
		}

	}
	else{
		
		echo '
						<div class="alert alert-warning" role="alert">
  						You need to log in first .Click here to go back to home screen.
  						<a href="login.php"><button type="button" class="btn btn-primary btn-sm">Home</button></a>
						</div>
					';
		exit();
	
	}


 ?>

</body>
</html>
