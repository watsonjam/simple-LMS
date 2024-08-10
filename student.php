<?php session_start(); 

	?>
<!DOCTYPE html>
<html>
<head>
	<?php
	if (!isset($_SESSION['username'])) { 
	echo "<script>alert('u need to login first');.window.location.href='login.php';<script/>";  } 
	else {

		include 'admin.php';
	 ?>
	 <link rel="stylesheet" type="text/css" href="web-fonts-with-css/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="web-fonts-with-css/css/fontawesome-all.css">
	<script type="text/javascript" src="jquery/jquery-3.3.1.min.js"></script>
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
	<?php 
		 include 'server.php';
		 	$jam= $_SESSION['id'];
		 	$bags= array();
		 	$qw= "SELECT id FROM mlays WHERE id = '$jam'";
		 	$ty=mysqli_query($conne,$qw);
		 	$jul=mysqli_num_rows($ty);
		 	if ($jul > 0) {
		 		$row=mysqli_fetch_array($ty);
		 	$id=$row['id'];
		 		if (isset($_POST['save'])) {
		 		$name=$_POST['name'];
		 		$email=$_POST['email'];
		 		if (empty($name)) {
		 	 		array_push($bags, "username need to be filled");
		 	 	}
		 	 	if (empty($email)) {
		 	 		array_push($bags, "email need to be filled");
		 	 	}
		 		if (count($bags)==0) {
		 			$tbj=mysqli_query($conne, "UPDATE mlays SET usernemu= '$name', emeil='$email' WHERE id = $id");
		 		}
		 		else{
		 			echo "<script>alert('error encounted!');.window.location.href='student.php';<script/>";
		 		}
		 	/*if ($tbj) {
		 		echo "<script>alert('successfully updated');.window.location.href='student.php';<script/>";
		 	}*/
		 	$_SESSION['msg']= "successfully updated";
		 	 } } ?>
		 	
	<div class="big">
		<?php
		if (isset($_POST['cs'])) {  
			include('server.php');

	$weka = mysqli_query($conne, "SELECT * FROM `notess`");
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
		 $as=mysqli_query($conne, "SELECT * FROM videoss");
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
		 	include 'server.php';
		 	$jam= $_SESSION['id'];
		 	$jav= "SELECT * FROM mlays WHERE id = '$jam'";
		 	$july=mysqli_query($conne,$jav);
		 	$frnk=mysqli_num_rows($july);
		 	if ($frnk > 0) {
		 		$jack=mysqli_fetch_array($july);
		 	}
		 	
		 	?>
		 	<style type="text/css">
		 		.fomu{
		 			border-radius: 4px;
		 			border:1px solid black ;
		 			width: 50%;
		 			margin-top: 20px;
		 			padding: 20px;
		 			
		 		}
		 		.fomu2{
		 			border-radius: 4px;
		 			border:1px solid black ;
		 			width: 50%;
		 			margin-top: 10px;
		 			padding: 20px;
		 			display: none;
		 		}
		 		
		 		span{
				float: left;
				display: block;
				margin: 3px;
				font-size: 20px;
			}
			    input{
				width: 94%;
				border-radius: 5px;
				border: 1px solid grey;
				font-size: 16px;
				height: 30px;
				padding: 5px 10px;
			}
			.btn{
				background: #5F9EA0;
				color: white;
				border-radius: 5px;
				padding: 10px;
				margin-top: 10px;
				font-size: 15px;
				cursor: pointer;
			}
			.btn1{
background: #5F9EA0;
				color: white;
				border-radius: 5px;
				padding: 10px;
				margin-top: 10px;
				font-size: 13px;
				cursor: pointer;
				color: black;
			}
			.btn2{
				background: #5F9EA0;
				color: white;
				border-radius: 5px;
				padding: 10px;
				margin-top: 10px;
				font-size: 13px;
				cursor: pointer;
				display: none;

			}
			.btn:hover{
				background: pink;
				transition: 0.9sec;
			}
			.result{
				border-radius: 5px;
				color: #3c763d;
				text-align: center;
				background: #dff0d8;
				border:1px solid #3c763d;
				width: 50%;
				margin-top: 8px;
			}
		 	</style>
		 	<center>
		 	<div>
		 		
		 		<div style="float: right; margin-right: 20px;"><button class="btn1"><b><a href="updtstudent.php">CHANGE PASSWORD</a><b/></button></div>

		 			<?php if (isset($_SESSION['msg'])): ?> 
		 				<div class="result">
		 					<?php 
		 					echo $_SESSION['msg'];
		 					unset($_SESSION['msg']);

		 					?>
		 				</div>
		 			 <?php endif ?>
		 			
		 		<div class="fomu" >
		 			<form method="POST" action="">
		 				<div style="border:1px solid silver;">STUDENT'S INFORMATION</div>
		 				<span><b>ID</b></span>
		 			<div>	<input type="text" name="id" value="<?php echo $jack['id'] ?>" disabled></div>
		 				<span><b>USERNAME<b/></span>
		 			<div>	<input type="text" name="name" value="<?php echo $jack['usernemu'] ?>"></div>
		 			<span><b>EMAIL<b/></span>
		 			<div>	<input type="text" name="email" value="<?php echo $jack['emeil'] ?>"></div>
		 				<span><b>LEVEL<b/></span>
		 				<div> <input type="text" name="level" value="<?php echo $jack['level'] ?>" disabled></div>
		 				<button class="btn" name="save">SAVE CHANGES</button>
		 			</form>
		 		</div>
		 	</div>
		 	</center>
		 
		 	 } 
		 	
		<?php } ?>
		 
		
		
		
	</div>
	<?php
	include 'footer.php'; 
	?>
</body>
</html>
<?php	
}
?>