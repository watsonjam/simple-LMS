<?php session_start(); 
if (isset($_SESSION['username'])) { 
	?>
<!DOCTYPE html>
<html>
<head>
	<?php
		include 'admin.php';
	 ?>
	<title></title>
	<style type="text/css">
		.boy{
			background-color: aqua;
			width: 300px;
			height: 600px;
		}
		.boy button{
			margin-top: 5px;
			font-size: 20px;
			border-radius: 14px;
			background-color: silver;
			padding: 10px;
		}
		
		
		.boy button li:hover{
			background-color:pink;
			transition:0.9s;
		}
		.boy ul button li{
			padding-bottom: 20px;
			font-size: 20px;
			border-bottom: 1px solid black;
			color: white;
			padding-top: 20px;
			cursor: pointer;
			width: 200px;
			list-style: none;
			background-color: black;
			min-height: 100%;
		}
		.big{
			height: 600px;
			float: right;
			width: 1280px;
			margin-top: -600px;
		}
		fieldset{
			text-align: center;
			margin-left: 320px;
			margin-top: 10px;

		}
		a{
			text-decoration: none;
		}
		h4{
			text-align: center;
			
		}
		h2{
			text-align: center;
			margin-left: 320px;
			margin-top: 10px;
		}
	</style>
</head>
<body>
<div class="boy">
		<ul>
			<form action="student.php" method="POST">
				<button name="staff"><li>HOME</li></button>
				<button name="cs"><li>VIEW NOTES</li></button>
				<button name="li"><li>VIEW UPLOAD VIDEOS</li></button>
				<button name="my"><li>MY PROFILE</li></button>
			</form>
		</ul>	
	</div>
	<div class="big">
		<?php
		if (isset($_POST['cs'])) {  
			include('server.php');

	$weka = mysqli_query($conne, "SELECT * FROM `notes`");
	while($post = mysqli_fetch_array($weka))
	{
		
	echo"<center><fieldset>
			<legend>".$post['caption']."</legend><br>
            <a href='".$post['file']."' download>DOWNLOAD HERE</a>
			
		</fieldset></center>";
		
	}

		 } ?>
		 <?php
		 if (isset($_POST['li'])) {
		 include 'server.php';
		 $as=mysqli_query($conne, "SELECT * FROM videos");
		 echo "<h2>MY VIDEOS</h2>";

		 while ($rou=mysqli_fetch_assoc($as)) {
		 	$id=$rou['id'];
		 	$name=$rou['name'];
		 	echo "<fieldset><h4><a href='view.php?jam=$id'>".$name."</a></h4></fieldset></br>";
		 	}
		 	
		 }
		 ?>
		 <?php 
		 if (isset($_POST['my'])) {
		 	
		 }
		 ?>
		
		
		
	</div>
	<?php
	include 'footer.php'; 
	?>
</body>
</html>
<?php
 }  else {
	echo "<script>alert('u need to login');.window.location.href='login.php';<script/>";
}
?>