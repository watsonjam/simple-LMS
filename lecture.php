<?php
 session_start();
 
	 ?>
	 <?php
	 
include 'server.php';
if(isset($_POST['tuma']))
	{
		$file=$_FILES['file'];
		$name = $_FILES['file']['name'];
		$type = $_FILES['file']['type'];
		$tname = $_FILES['file']['tmp_name'];
		$size = $_FILES['file']['size']; 
		$caption = $_POST['gap'];
		$path = "mlay/";
		
		$tok1 = pathinfo($name, PATHINFO_EXTENSION);
		$tok = strtolower($tok1);
		$allowed = array('txt', 'docx', 'doc', 'pdf','pptx','png','jpeg','jpg','mp4');
		if(in_array($tok, $allowed))
		{
			if($size < 102400000)
			{
				$real = $path.$name; 
				move_uploaded_file($tname , $path.$name);
				$sql= "INSERT INTO notess (id, caption, file) VALUES (NULL,'$caption','$real')";
				$put = mysqli_query($conne, $sql);
				if($put)
				{
					echo("<script>alert('The file was  uploaded successfuly');window.location.href='lecture.php'</script>");
				}else{
					echo("<script>alert('The file was not uploaded successfuly');window.location.href='lecture.php'</script>");
				}
			}
			else
			{
				echo 'your file size is bigger';
			}
				
		
		}
		else
		{
			echo 'invallid extension';
		}
		
	}
	
	
 ?>
 <?php
include 'server.php';
if (isset($_POST['upload'])) {
	$name=$_FILES['file']['name'];
	$tmp=$_FILES['file']['tmp_name'];
	$jw="vuad/";
	$jwm=$jw.$name;
	move_uploaded_file($tmp, "vuad/".$name);
	$sql="INSERT INTO videoss(id, name) VALUES (NULL, '$jwm')";
	$result=mysqli_query($conne,$sql);
	if ($result) {
		echo "<script>alert('sent');window.location.href='lecture.php'</script>";
	}
	else{
		echo "<script>alert('not sent');window.location.href='lecture.php'</script>";
	}

}
 ?>
<?php
 if (isset($_SESSION['username'])) { 
include 'admin.php';
 	?>		
<!DOCTYPE html>
<html>
<head>
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
	</style>
</head>
<body>
<div class="boy">
		<ul>
			<form action="lecture.php" method="POST">
				<button name="staff"><li>HOME</li></button>
				<button name="cs"><li>UPLOAD CLASS NOTES</li></button>
				<button name="mu"><li>UPLOAD VIDEOS</li></button>
				<button name="mp"><li>MY PROFILE</li></button>
			</form>
		</ul>	
	</div> 
	<div class="big">
		<?php
		if (isset($_POST['cs'])) { ?>
			
			<!DOCTYPE html>
			<html>
			<head>
				<title></title>
				<style type="text/css">
					.jam{
		margin-top:60px;
		background-color: grey;
		width: 500px;
		height: 400px;
		margin-left: 260px;
		border-radius: 20px;
	}
	label{
		color: black;
		font-size: 40px;
	}
	textarea{
		margin: 9px;
		width: 350px;
		height: 100px;
		margin-left: 60px;
		border-radius: 10px;
	}
	.jack input{
		border-radius: 4px;
		width: 210px;
		margin: 9px;
		height: 50px;
		background-color: green;
	}
	.jack input:hover{
		background-color: pink;
		transition: 0.9s;
	}
				</style>
			</head>
			<body><center>
				<div class='jam'>
<label> UPLOADING NOTES</label>
<form action='lecture.php' method='POST' enctype='multipart/form-data'>
	<input type='file' name='file'><br>
	<textarea name='gap'></textarea><br>

<div class='jack'>
	<input type='submit' name='tuma' value='UPLOAD'>
	</div>
	</form>
</div>
</center>

			
			</body>
			</html>
		
		<?php } ?>
		<?php if (isset($_POST['mu'])) { ?>

			<!DOCTYPE html>
			<html>
			<head>
				<title></title>
				<style type="text/css">
					.jam{
		margin-top:60px;
		background-color: grey;
		width: 500px;
		height: 400px;
		margin-left: 260px;
		border-radius: 20px;
	}
	label{
		color: black;
		font-size: 40px;
	}
	textarea{
		margin: 9px;
		width: 350px;
		height: 100px;
		margin-left: 60px;
		border-radius: 10px;
	}
	.jack input{
		border-radius: 4px;
		width: 210px;
		margin: 9px;
		height: 50px;
		background-color: green;
	}
	.jack input:hover{
		background-color: pink;
		transition: 0.9s;
	}
	

				</style>
			</head>
			<body><center>
				<div class='jam'>
<label> UPLOADING  VIDEOS</label>
<form action='lecture.php' method='POST' enctype='multipart/form-data'>
	<input type='file' name='file'><br>
	<textarea name='gap'></textarea><br>

<div class='jack'>
	<input type='submit' name='upload' value='UPLOAD'>
	</div>
	</form>
</div>
</center>

			
			</body>
			</html>
		<?php } ?>
		
	</div>
	<?php
	include 'footer.php'; 
	?>
</body>
</html>
<?php } else{
	echo "<script>alert('please login first command by watson');window.location.href='login.php'</script>";
} ?>