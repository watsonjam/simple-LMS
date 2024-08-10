<?php include 'link.php'; ?>
<!DOCTYPE html>
			
			<html>
			<head>
				<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
				<title></title>
				<link rel="stylesheet" type="text/css" href="web-fonts-with-css/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="web-fonts-with-css/css/fontawesome-all.css">
				<script type="text/javascript" src="jquery/jquery-3.3.1.min.js"></script>
				<style type="text/css">
					table{
						width: 50%;
						margin: 15px auto;
						border-collapse: collapse;
						text-align: left;
						border: 1px solid black;
						
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
			.header{
			background: #5F9EA0;
			color: white;
			border-radius: 10px 10px 0px 0px;
			 text-align: center;
			 width: 40%;
			 border: 1px solid #B0C4DE;
			 padding: 20px;
			 margin-top: 20px;
			 height: 60px;
		}
		.bx{
			display: none;
			z-index: 100;
			border-radius: 4px;
			margin-top: -200px;
			position: relative;
			opacity: 1;
		}
		#close{
			color: red;
			cursor: pointer;
		}
		.con{
			border:1px solid black;
			z-index: 100;
			width: 40%;
			margin-left: 390px;
			margin-top: -200px;
			
			position: relative;
			opacity: 1;
			background-color: silver;
		}
				</style>
			</head>
			<body>
				<?php include 'server.php'; 
				$as="SELECT * FROM mlays";
				$qw=mysqli_query($conne, $as);
				?>
				<table >
					<center><button class="btn btn-primary" id="ad">ADD NEW</button></center>
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
							<td><a class="del_btn" href="#?del=<?php echo $row['id']; ?>"> Delete</a></td>
							<td><a class="edt_btn" href="">View</a></td>
						</tr>

						<?php } ?>
					</tbody>
				</table>
				<div class="con">
					<div style="padding: 10px;">
						<div> <i class="fa fa-trash"></i> Are you sure you want to delete this?</div>
					</div>
					  <div style="height: 65px;padding: 10px;">
                <div style="float: right;">
                    <button style="outline: none;" class="btn btn-info" id="no"><i class="fas fa-times"></i>&nbsp; No</button>
                    <button style="outline: none;" class="btn btn-danger" id="yes" name="ys"><i class="fas fa-check"></i>&nbsp; Yes</button>
                </div>
            </div>
				</div>
				<div class="bx">
				<center>
	<div class="header">
		<h2>ADD NEW MEMBER &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label style="color: black; font-size: 20px;" ><i class="fa fa-times" id="close"></i> close </label></h2>	
		
	</div>
</center>
<center>
	<form method="POST" action="login.php">
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
</div>
<?php
include 'server.php';
if (isset($_GET['ys'])) {
	if (isset($_GET['del'])) {
				$id= $_GET['del'];
				$qqw= "DELETE FROM mlays WHERE id='$id'";
			$res= mysqli_query($conne, $qqw);
}
}
 ?>
			</body>
			</html>
			<script type="text/javascript">
				$(document).ready(function () {
				$("#ad").click(function(){
					$(".bx").slideDown('slow');

				});
				$("#close").click(function(){
					$(".bx").slideUp('slow');

				});
				$(".del_btn").click(function(){
					<?php

					 ?>
					$(".con").show();
				})
				$("#no").click(function(){
					$(".con").slideUp('slow');
				})
			
				});

			</script>
			 
