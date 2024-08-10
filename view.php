<?php
include 'server.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		a{
			text-decoration: none;
			padding: 15px;
		}
		
		.boc{
			border: 3px solid #B0C4DE;
			background-color: #F8F8FF;
		}
		button{
			margin-top: 10px;
			background-color: pink;

		}
	</style>
</head>
<body><div class="boc">
	<center >
		<button><a href="student.php">BACK</a></button>
	<?php
if (isset($_GET['jam'])) {
		 		$id= $_GET['jam'];
		 		$qw="SELECT name FROM videoss WHERE id = '$id'";
		 		$qa=mysqli_query($conne, $qw);
		 		$rw=mysqli_fetch_array($qa);
		 		$name=$rw['name'];


		 		echo "<h1>your are watching ".$name." <h1/>";}
		 	
		 	?>
		 	<video width="620px" height="320" controls>
		 		<source src="<?php echo $name;?>" type="video/mp4">
		 	</video>
		 	</center>
		 	</div>
</body>
</html>