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
		$path = "box/";
		
		$tok1 = pathinfo($name, PATHINFO_EXTENSION);
		$tok = strtolower($tok1);
		$allowed = array('txt', 'docx', 'doc', 'pdf','pptx','png','jpeg','jpg','mp4');
		if(in_array($tok, $allowed))
		{
			if($size < 102400000)
			{
				$real = $path.$name; 
				move_uploaded_file($tname , $path.$name);
				$sql= "INSERT INTO meza (id, caption, file) VALUES (NULL,'$caption','$real')";
				$put = mysqli_query($conne, $sql);
				if($put)
				{
					echo("<script>alert('The file was  uploaded successfuly');window.location.href='trial.php'</script>");
				}else{
					echo("<script>alert('The file was not uploaded successfuly');window.location.href='trial.php'</script>");
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
<body>
	<div class='jam'>
<label> UPLOADING  VIDEOS</label>
	<form action="trial.php" method="POST" enctype="multipart/form-data">
		<input type='file' name='file'><br>
	<textarea name='gap'></textarea><br>

<div class='jack'>
	<input type='submit' name='tuma' value='UPLOAD'>
	</div>
	</form>
		
	</div>
</body>
</html>