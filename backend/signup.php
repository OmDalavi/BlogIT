<!DOCTYPE html>
<html>
<?php  include "../head.php";  ?>
<head><link rel="stylesheet" type="text/css" href="../style.css"></head>
<body class="text-center">
	<?php include "nav.php" ?>


<?php
	include "conn.php";
	if($_SERVER['REQUEST_METHOD']=="POST" && $conn){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];
		if($password!=$cpassword){
			$error=1;
			
			
		}else{
			$sql="select * from users where username='$username'";
			$result=mysqli_query($conn,$sql);
			$numRow=mysqli_num_rows($result);
			if($numRow>0){
				$error=2;

			}else{
				$hash=password_hash($password, PASSWORD_DEFAULT);
				$sql="insert into users (name,email,username,password) values ('$name','$email','$username','$hash')";
				$result=mysqli_query($conn,$sql);
				if($result){
					echo '
						<div class="alert alert-success" role="alert">
  						Your Account has been created Successfully .You can login now
  						<a href="login.php"><button type="button" class="btn btn-primary btn-sm">Log in</button></a>
						</div>
					';
					
					$sql="create table $username (sno INT,blogtitle VARCHAR(30),blog text,dtime VARCHAR(20))";
					$result=mysqli_query($conn,$sql);
					if($result){
						exit();
					}else{
						echo var_dump($result);
						exit();
					}
					
				}
			}
		}
	}


?>


	
	<h4 class="mt-5">Sign Up to BlogIT</h4>
		<div class="container mt-4 col-lg-3 col-md-6 col-sm-6">
			<form action="signup.php" method="post">
				<input class="form-control mb-3" type="text" maxlength="30" name="name" placeholder="Your Name" required>
				<input class="form-control mb-3" type="email" maxlength="30" name="email" placeholder="Your Email" required>
				<input class="form-control mb-3" type="text" maxlength="15" name="username" placeholder="Username" required>
				<input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
				<input class="form-control mb-3" type="password" name="cpassword" placeholder="Confirm Password" required>
				<?php 
					if(isset($error)){
						if($error==1){
							echo "<p class='text-danger'>Passwords dont match</p>" ;
						}
						else{
							echo "<p class='text-danger'>Username already taken</p>" ;
						}
						
						unset($error);
					}

				?>
				<button class="btn btn-primary" style="width:100%" type="submit">Sign Up</button>
			</form>
			<p class="mt-3">Already have an account ? Log In <a href="login.php">Here</a></p>
			<hr>
			<p>© 2020-2021</p>


		</div>

</body>
</html>