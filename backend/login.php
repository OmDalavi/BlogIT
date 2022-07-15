<!DOCTYPE html>
<html>
<?php  include "../head.php";  ?>
<head><link rel="stylesheet" type="text/css" href="../style.css"></head>
<body class="text-center">
	<?php include "nav.php" ?>



<?php
	include "conn.php";
	if($_SERVER['REQUEST_METHOD']=="POST" && $conn){
		
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql="select * from users where username='$username'";
		$result=mysqli_query($conn,$sql);
		$numRow=mysqli_num_rows($result);
		if($numRow=1){
			$row=mysqli_fetch_row($result);
			if(password_verify($password, $row[3])){
				$_SESSION['username']=$username;
			
				header("location:welcome.php");
			}else{
				$error=2;
			}
			
		}else{
			$error=1;
		}

	}
?>


		<h4 class="mt-5">Log in to BlogIT</h4>
		<div class="container mt-4 col-lg-3 col-md-6 col-sm-6">
			<form action="login.php" method="post">
				<input class="form-control mb-3" type="text" name="username" placeholder="Username" required>
				<input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
				<?php 
					if(isset($error)){
						if($error==1){
							echo "<p class='text-danger'>Invalid Username</p>" ;
						}
						if($error==2){
							echo "<p class='text-danger'>Invalid Password</p>" ;
						}
						
						unset($error);
					}

				?>
				<button class="btn btn-primary" style="width:100%" type="submit">Log In</button>
			</form>
			<p class="mt-3">New to BlogIT ? Sign Up <a href="signup.php">Here</a></p>
			<hr>
			<p>© 2020-2021</p>


		</div>
		

</body>
</html>