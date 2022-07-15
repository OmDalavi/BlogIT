<!DOCTYPE html>
<html>
<?php 	
		include "head.php";
		include "nav.php";
		include "backend/conn.php";
		$name=$_POST['name'];
?>

	<body>
		
		<?php
			$sql="select username from users where name='$name'";
			$result=mysqli_query($conn,$sql);
			$username=mysqli_fetch_row($result)[0];
			$sql="select * from $username";
			$result=mysqli_query($conn,$sql);
			$numRow=mysqli_num_rows($result);
			$allRows=mysqli_fetch_all($result);

			$i=$numRow-1;
			while($i>=0){
				$row=$allRows[$i];
				echo '
					
					<div class="container mt-5 blog" >
							<p class="h2">'.nl2br($row[1]).'</p>
							<p class="namedate ms-5"><span class="me-3">- '.nl2br($name).'</span>@ '.nl2br($row[3]).'</p>
						
						   <p>'.nl2br($row[2]).'</p>
						


							<br><hr>
					</div>
					';

				$i--;
			}


		?>



		<p class="text-center text-primary mb-4" style="min-height: 1000px;"><strong>© 2020-2021<br> BlogIT</strong></p>
	</body>
</html>