<?php 
session_start();
include 'admin.php';
include 'server.php';
  ?>
  <?php
  if (isset($_SESSION['username'])) 
	{ ?>
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
			<form action="admindex.php" method="POST">
				<button name="staff"><li>HOME</li></button>
				<button name="cs"><li>CREATE USER</li></button>
				<button name="mu"><li>MANAGE USERS</li></button>
			</form>
		</ul>	
	</div>
<?php
			if (isset($_GET['del'])) {
				$id= $_GET['del'];
				$qqw= "DELETE FROM mlay WHERE id='$id'";
			$res= mysqli_query($conne, $qqw);
				if ($res) {
					echo "<script>alert('umenifikiwa kudelete');window.location.href='admindex.php'</script>"; 	
				}
				else{
					echo "<script>alert('ujanifikiwa kudelete');window.location.href='admindex.php'</script>";
				}
			}?>
	<div class="big">

		<?php if (isset($_POST['cs'])) {
			?>
			<!DOCTYPE html>
			<html>
			<head>
				<title></title>
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
		.jp form{
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
			.input select{
				width: 99%;
				border-radius: 5px;
				border: 1px solid grey;
				font-size: 16px;
				height: 40px;
				padding: 5px 10px;
				margin-top: 5px;
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
			</head>
			<body>
				<center>
				<div class="header">
		<h2><i class="fas-fa home"></i> REGISTRATION FORM</h2>	
	</div></center>
	<div class="jp">
	<center>
				<form  method="POST" action="admindex.php">
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
			<select name="usertype">
			<option>select user type</option>
			<option>lecture</option>
			<option>student</option>
			</select>
		</div>	
		<div class="input">
			<button type="submit" name="regi" class="btn" >REGISTER</button>
		</div>
	</form>
			</center>
			</div>
			</body>
			</html>
<?php
if (isset($_POST['regi'])) {
	$username=$_POST['username'];
	$email=$_POST['email'];
	$passwd=$_POST['password_1'];
	$select=$_POST['usertype'];
	$pwd=md5($passwd);
	$asd= "INSERT INTO mlay (id, usernemu, emeil, passwedi, level )VALUES(NULL,'$username','$email','$pwd','$select')";
	$result=mysqli_query($conne, $asd);
	if ($result) {
		echo "<script>alert('umefanikiwa kusajili');window.location.href='admindex.php';</script>";
	}
	else{
		echo "<script>alert('ujafanikiwa kusajili');window.location.href='admindex.php';</script>";
	}
	
}
 ?>
		
		<?php } ?>
		<?php include 'server.php';
		if (isset($_POST['mu'])) { ?>
			<!DOCTYPE html>
			
			<html>
			<head>
				<title></title>
				<style type="text/css">
					table{
						width: 50%;
						margin: 15px auto;
						border-collapse: collapse;
						text-align: left;
						
					}
					tr{
						border-bottom: 1px solid black;
					}
					th, td{
						border:none;
						height: 30px;
						padding: 2px;
					}
					tr:hover{
						background-color:silver;
					}
					.edt_btn{
						text-decoration: none;
						padding: 2px 5px;
						background-color: #2E8B57;
						color: white;
						border-radius: 3px;
					}
					.del_btn{text-decoration: none;
						padding: 2px 5px;
						background-color: #800000;
						color: white;
						border-radius: 3px;

					}
					.box{
						background: silver;
						color: white;
						height: 80px;
						width: 75px;
					}
				</style>
			</head>
			<body>
				<?php include 'server.php'; 
				$as="SELECT * FROM mlay";
				$qw=mysqli_query($conne, $as);
				?>
				<table>
					
					<thead>
						<tr><th>ID</th>
							<th>NAME</th>
							<th>EMAIL</th>
							<th>LEVEL</th>
							<th colspan="2">ACTION</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($row= mysqli_fetch_array($qw)) {?>
						<tr><td><?php echo $row['id']; ?></td>
							<td><?php echo $row['usernemu']; ?></td>
							<td><?php echo $row['emeil']; ?></td>
							<td><?php echo $row['level']; ?></td>
							<td><a class="del_btn" href="admindex.php?del=<?php echo $row['id']; ?>">Delete</a></td>
							<td><a class="edt_btn" href="">View</a></td>
						</tr>

						<?php } ?>
					</tbody>
				</table>
				
			</body>
			</html>
			
			
		<?php } ?>
		
	</div>

	<?php include 'footer.php'; ?>
	<?php 
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header('location:login.php');
	}
	?>

</body>
</html>
<?php } 
else {
	echo "<script>alert('u need to login');.window.location.href='login.php';<script/>";
}
 ?>

