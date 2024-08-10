<?php
session_start();

 ?>
 <?php
 if (isset($_SESSION['username'])) { 
include 'admin.php';
 	?>		
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="web-fonts-with-css/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="web-fonts-with-css/css/fontawesome-all.css">
	<script type="text/javascript" src="jquery/jquery-3.3.1.min.js"></script>
	<title></title>
	<style type="text/css">
		body{
			background: #f8f8ff;
			
			}
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
			.back{
				background: #5F9EA0;
				color: white;
				border-radius: 5px;
				padding: 10px;
				margin-top: 10px;
				font-size: 13px;
				cursor: pointer;
				

			}
			.refresh{
				background: green;
				color: white;
				border-radius: 5px;
				padding: 10px;
				font-size: 13px;
				cursor: pointer;
				

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
				margin-bottom:12px;
			}
			.bac{
				float: left; 
				margin-left: 20px;
			}
	</style>
</head>
<body>
	<?php 
		 include 'server.php';
		 	$jam= $_SESSION['id'];
		 	$bags= array();
		 	$qw= "SELECT * FROM mlays WHERE id = '$jam'";
		 	$ty=mysqli_query($conne,$qw);
		 	$jul=mysqli_num_rows($ty);
		 	if ($jul > 0) {
		 		$row=mysqli_fetch_array($ty);
		 	$id=$row['id'];
		 	$og=$row['passwedi'];
		 		if (isset($_POST['save'])) {
		 		$old=$_POST['op'];
		 	    $new=$_POST['np'];
		 	    $con=$_POST['cp'];
		 	    $oldpro=md5($old);
		 	    $newpro=md5($new);
		 	 	if (empty($old)) {
		 	 		array_push($bags, "old password need to be filled");
		 	 	}
		 	 	if (empty($new)) {
		 	 		array_push($bags, "new password need to be filled");
		 	 	}
		 	 	if (empty($con)) {
		 	 		array_push($bags, "confirm password need to be filled");
		 	 	}
		 	 	if ($new != $con) {
		 	 		array_push($bags, "new passwd and confirm paswd doesnt match");
		 	 	}
		 	 	if ($oldpro != $og) {
		 	 		array_push($bags, "old password doesnt exist");
		 	 	}
		 		if (count($bags)==0) {
		 			$tbj=mysqli_query($conne, "UPDATE mlays SET usernemu= '$name', emeil='$email',passwedi = '$newpro' WHERE id = $id");
		 			$_SESSION['msg']= "successfully updated";
		 		}
		 	
		 	 }  
		 	} ?>
		 	
		 	 <?php
		 	 $box= array();
		 	 $jam= $_SESSION['id'];
		 	$qw= "SELECT * FROM mlays WHERE id = '$jam'";
		 	$ty=mysqli_query($conne,$qw);
		 	$jul=mysqli_num_rows($ty);
		 	if ($jul > 0) {
		 		$row=mysqli_fetch_array($ty);
		 	$id=$row['id'];
		 	$og=$row['id'];
		 	 if (isset($_POST['pas'])) {
		 	 $old=$_POST['op'];
		 	 $new=$_POST['np'];
		 	 $con=$_POST['cp'];
		 	 $oldpro=md5($old);
		 	 $newpro=md5($new);

		 	 	if (empty($old)) {
		 	 		array_push($box, "old password need to be filled");
		 	 	}
		 	 	if (empty($new)) {
		 	 		array_push($box, "new password need to be filled");
		 	 	}
		 	 	if (empty($con)) {
		 	 		array_push($box, "confirm password need to be filled");
		 	 	}
		 	 	if ($new != $con) {
		 	 		array_push($box, "new passwd and confirm paswd doesnt match");
		 	 	}
		 	 	
		 	 	if (count($box)==0) {
		 	 	$ben=mysqli_query($conne, "UPDATE mlays SET passwedi='$newpro' WHERE id = $id");
		 	 	
		 	 }
		 	 
		 	 }
		 	}
		 	 
		 	 ?>
		 	  
<center>
		 	<div>	
		 		 <?php 
		 	include 'server.php';
		 	$jam= $_SESSION['id'];
		 	$jav= "SELECT * FROM mlays WHERE id = '$jam'";
		 	$july=mysqli_query($conne,$jav);
		 	$frnk=mysqli_num_rows($july);
		 	if ($frnk > 0) {
		 		$jack=mysqli_fetch_array($july);
		 	}
		 	?>
		 	<div class="bac"><button class="back"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;<a style="text-decoration: none; color: white;" href="student.php">BACK</a></button></div>
		 
		 		<div style="float: right; margin-right: 20px;"><button class="refresh"><i class="fa fa-redo-alt"></i>&nbsp;&nbsp;<b>REFRESH PAGE<b/></button><button class="btn2">SHOW DETAILS</button></div>	
		 		<div class="fomu" >
		 			<?php include 'updt.php'; ?>
		 			<?php if (isset($_SESSION['msg'])): ?> 
		 				<div class="result">
		 					<?php 
		 					echo $_SESSION['msg'];
		 					unset($_SESSION['msg']);

		 					?>
		 				</div>
		 			 <?php endif ?>
		 			<form method="POST" action="">

		 				<div style="border:1px solid silver;">UPDATE YOUR PASSWORD HERE</div>
		 				<span><b>OLD PASSWORD</b></span>
		 			<div>	<input type="text" name="op" placeholder="enter first the old password"></div>
		 				<span><b>NEW PASSWORD<b/></span>
		 			<div>	<input type="password" name="np" placeholder="enter new password" ></div>
		 				<span><b>CONFIRM PASSWORD<b/></span>
		 				<div> <input type="password" name="cp" placeholder="confirm new password"></div>
		 				<button class="btn" name="save">SAVE CHANGES</button>
		 			</form>
		 		
		 		</div>
		 		<div class="fomu2">
		 			<?php include 'box.php'; ?>
		 			<?php if (isset($_SESSION['msg'])): ?> 
		 				<div class="result">
		 					<?php 
		 					echo $_SESSION['msg'];
		 					unset($_SESSION['msg']);

		 					?>
		 				</div>
		 			 <?php endif ?>
		 			<form method="POST" action="">
		 				<div style="border:1px solid silver;">CHANGE PASSWORD</div>
		 				<span><b>OLD PASSWORD</b></span>
		 			<div>	<input type="text" name="op"></div>
		 				<span><b>NEW PASSWORD<b/></span>
		 			<div>	<input type="password" name="np" ></div>
		 				<span><b>CONFIRM PASSWORD<b/></span>
		 				<div> <input type="password" name="cp"></div>
		 				<button class="btn" name="pas">UPDATE PASSWORD</button>
		 			</form>
		 		</div>
		 	</div>
		 	</center>
</body>
</html>
<?php } else{
	echo "<script>alert('please login first command by watson');window.location.href='login.php'</script>";
} ?>
	<script type="text/javascript">
		 $(".refresh").click(function(){
	    	window.location.reload();
	    });
		 		/*$(".btn1").click(function(){
		 			$(".fomu").hide(1500);
		 			$(".fomu2").show(1500);
		 			$(".btn2").show(300);
		 			$(this).hide(300);
		 		});
		 		$(".btn2").click(function(){
		 			$(".fomu").show(1500);
		 			$(".fomu2").hide(1500);
		 			$(".btn2").hide(300);
		 			$(".btn1").show(300);
		 		});*/
		 	</script>