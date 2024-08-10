<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="web-fonts-with-css/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="web-fonts-with-css/css/fontawesome-all.css">
	<style type="text/css">
		.header{
			background: #5F9EA0;
			color: white;
			border-radius: 10px 10px 0px 0px;
			 text-align: center;
			 width: 40%;
			 border: 1px solid #B0C4DE;
			 padding: 20px;
			 margin-top: 20px;


		}
		*{
			margin: 0px;
			padding: 0px;
		}
		body{
			background: #f8f8ff;
			font-size: 120%;
			}
			form{
				border: 1px solid silver;
				background: white;
				padding: 20px;
				height: 440px;
				width: 40%;
				border-radius: 0px 0px 10px 10px;
				margin: 0px auto;

			}

			.input label{
				float: left;
				display: block;
				margin: 3px;
			}
			.input input{
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
			}
			.gf{
				color: black;
				background: silver;
			}
	</style>
	<title>train</title>
</head>
<body>
	<?php
include 'server.php';
$errors=array();
if (isset($_POST['register'])) {
	$username=$_POST['username'];
	$email=$_POST['email'];
	$passd=$_POST['password_1'];
	$passwd=$_POST['passsword_2'];
	$level="";
	if (empty($username)) {
		array_push($errors, "username inaitajika");
	}
	if (empty($email)) {
		array_push($errors, "email inaitajika");
	}
	if (empty($passd)) {
		array_push($errors, "username inaitajika");
	}
	if ($passd!=$passwd) {
		array_push($errors, "password mbili hazifani");
	}
	if (count($errors)==0) {
		$nam1=substr($username, 0,2);
		$nam2=substr($username, -2,2);
		$usernme=$nam1.$nam2;
		$randkey= rand(99,999);
		$username=$usernme.$randkey;
		$pwd=md5($passd);
		$jam= "INSERT INTO mlay (id, usernemu, emeil, passwedi, level )VALUES(NULL,'$username','$email','$pwd','student')";
		$jack= mysqli_query($conne, $jam);
		$_SESSION['username'] = $username;
		
		

		
	}

	
}
 ?>
	<center>
	<div class="header">
		<h2><i class="fas-fa home"></i> REGISTRATION FORM</h2>	
	</div>
</center>
<?php 
$java= "SELECT * FROM  mlay WHERE id=(SELECT LAST_INSERT_ID())";
$sql=mysqli_query($conne, $java);
$row= mysqli_fetch_array($sql);
$jac= $row['usernemu'];
$_SESSION['jina']=$jac;
?>
<center>
	<form method="POST" action="index.php">
		<?php include 'conn.php'; ?>
		<div class="input">
			<label>USERNAME</label>
			<input type="text" name="username" placeholder="username">
			
		</div>
		<div class="input">
			<label>EMAIL</label>
			<input type="text" name="email" placeholder="..@gmail.com">
		</div>
		<div class="input">
			<label>PASSWORD</label>
			<input type="password" name="password_1" placeholder="password">
		</div>	
		<div class="input">
			<label>CONFIRM PASSWORD</label>
			<input type="password" name="passsword_2" placeholder="confirm password">
		</div>
		<div class="input">
			<button type="submit" name="register" class="btn" >REGISTER</button>
		</div>
		<p>Already a memeber? <a style="text-decoration: none;" href="login.php">Sign up</a></p>
		<?php if (isset($_SESSION['jina'])):?>
			<div class="gf">
				<h4>
					<?php
					echo $_SESSION['jina'];
					unset($_SESSION['jina']);
					?>
				</h4>
			</div>
		<?php endif ?>	
	</form>
</center>


</body>
</html>