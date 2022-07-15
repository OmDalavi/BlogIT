<!DOCTYPE html>
<html>
<?php  include "head.php";  ?>
<body style="text-align:left">
	<?php include "nav.php"; ?>
	<p class="writer-heading ms-4 mt-3">Select a writer to read blogs</p>

	<?php
		include "backend/conn.php";
		$sql="select name from users";
		$result=mysqli_query($conn,$sql);
		$numRow=mysqli_num_rows($result);
	?>
	<table class="container writers-table table">
		<?php
			$i=1;
			while($i<=$numRow){
				$row=mysqli_fetch_row($result);
				echo '
					<tr class="writer-name">
						<th>'.
							$row[0].
						'</th>
					</tr>

				';
				$i++;
			}


		?>
	</table>


	<form action="showblog.php" id="hiddenform" method="post">
		<input type="hidden" name="name" id="name">
	</form>

	<script type="text/javascript" src="writers.js"></script>
</body>
</html>