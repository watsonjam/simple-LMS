<?php 
session_start();
include 'server.php'; ?>
<?php 
include 'server.php';
$errors = array();
if (isset($_POST['login'])) {
	$username=$_POST['username'];
	$password=$_POST['password_1'];
	$level="";
	$pssd=md5($password);
	if (empty($username)) {
		array_push($errors, "username inaitajika");
	}
	if (empty($password)) {
		array_push($errors, "password inaitajika");
	}
	
	
	if (count($errors)== 0) {
		
		$query="SELECT * FROM mlays WHERE usernemu='$username' AND passwedi= '$pssd'";
		$sql=mysqli_query($conne, $query);
		if ($sql) {
			$row= mysqli_num_rows($sql);
			if ($row > 0) {
				while ($data= mysqli_fetch_array($sql)) {
					
					$_SESSION['level']=$data['level'];
					$_SESSION['id'] = $data['id'];
					$_SESSION['username'] = $data['usernemu'];
					if ($_SESSION['level']== 'admin') {
						header('location: admindex.php');
					}
					
					if ($_SESSION['level']=='lecture') {
						header('location: lecture.php');
					}
					
					if ($_SESSION['level']=='student') {
						header('location: student.php');
					}
				}
			}
			else{
		array_push($errors, "username na passwedi hazjaoana");
	}
		}
		
	}
	
}

?>
<!DOCTYPE html>
<html>
<head>
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
		body{
			background: #f8f8ff;
			font-size: 120%;
			}
			form{
				border: 1px solid silver;
				background: white;
				padding: 20px;
				height: 340px;
				width: 40%;
				border-radius: 0px 0px 10px 10px;

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
	</style>
	<title>train</title>
</head>
<body>
	<center>
	<div class="header">
		<h2>LOGIN FORM</h2>	
	</div>
</center>


<center>
	<form method="POST" action="login.php">
		<?php include 'conn.php'; ?>
		<div class="input">
			<label>USERNAME</label>
			<input type="text" name="username" placeholder="username">
			
		</div>
		<div class="input">
			<label>PASSWORD</label>
			<input type="password" name="password_1" placeholder="password">
		</div>	
		
		<div class="input">
			<button type="submit" class="btn" name="login" >LOGIN</button>
		</div>
		<p>Not yet a memeber? <a style="text-decoration: none;" href="index.php">Sign in</a></p>
		
	</form>
</center>

</body>
</html>