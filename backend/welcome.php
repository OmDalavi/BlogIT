<!DOCTYPE html>
<html>
<?php  include "../head.php";  ?>
<head><link rel="stylesheet" type="text/css" href="../style.css"></head>
<body style="text-align:left">
	<?php include "nav.php"; ?>


<?php 

	if(!isset($_SESSION['username'])){
		echo '
						<div class="alert alert-warning" role="alert">
  						You need to log in first .Click here to go back to home screen.
  						<a href="login.php"><button type="button" class="btn btn-primary btn-sm">Home</button></a>
						</div>
					';
		
		exit();
	}
	


 ?>


	
<!-- 	<br><button><a href="logout.php">Log Out</a></button> -->
<!-- Add a logout button -->

	
		<div class="container mt-4 col-lg-9 col-md-9 col-sm-9">
			<h4 class="mt-5">Welcome <?php echo $_SESSION['username'];?></h4>
			<form action="blog.php" method="post">Number of Blogs written till now :
				<?php 
					include "conn.php";
					$sql="select MAX(sno) from {$_SESSION['username']}";
					$result=mysqli_query($conn,$sql);
					$row=mysqli_fetch_row($result);
					if($row[0]==0){
						echo "0" ;
					}
					else{
						echo $row[0];
					}
				 ?>
				 <br>
				<input class="form-control mb-3 mt-3" type="number" name="blognumber" placeholder="Enter Current Blog Number" required>
				<input class="form-control mb-3 mt-3" type="text" name="blogtitle" placeholder="Blog Title" required>
				<textarea class="form-control mb-3" name="blog" placeholder="Write Your Blog Here" required></textarea>
				
				<button class="btn btn-primary" style="width:100%" type="submit">Submit Blog</button>
			</form>
			
			<p class="mt-3 text-center">© 2020-2021</p>


		</div>



</body>
</html>