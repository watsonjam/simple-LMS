<?php 
session_start();
	include 'server.php';
			if (isset($_GET['del']) && isset($_GET['yes']))  {
				$id= $_GET['del'];
				$qqw= "DELETE FROM mlays WHERE id='$id'";
			$res= mysqli_query($conne, $qqw);
				if ($res) {
					echo "<script>alert('umenifikiwa kudelete');window.location.href='mu.php'</script>"; 	
				}
				else{
					echo "<script>alert('ujanifikiwa kudelete');window.location.href='mu.php'</script>";
				}
			}

else{
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
					table{
						width: 55%;
						margin: 20px auto;
						border-collapse: collapse;
						text-align: left;
						border:1px solid silver;
						
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
					.con{

			border:1px solid black;
			width: 40%;
			margin-left: 390px;
			margin-top: -300px;
			display: none;
			opacity: 1;
			background-color: green;
			position: relative;
			z-index: 100;
		}
		.danger:hover{
			background-color: red;
			transition:0.9s;
		}
		.info:hover{
			background-color: blue;
			transition:0.9s;
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
		.bac{
				float: left; 
				margin-left: 20px;
			}
				</style>
</head>
<body>
	<div class="bac"><button class="back"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;<a style="text-decoration: none; color: white;" href="admindex.php">BACK</a></button></div>
	<div style="float: right; margin-right: 20px;"><button class="refresh"><i class="fa fa-redo-alt"></i>&nbsp;&nbsp;<b>REFRESH PAGE<b/></button></div>	
	<?php include 'server.php'; 
	$per_page=4;
	$page_query=mysqli_query($conne, "SELECT * FROM mlays" );
	$jam=mysqli_fetch_array($page_query);
	$pg=count($jam);
	$pages=ceil($pg  / $per_page);
	$page= (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
	$start=($page-1) * $per_page;


				$as="SELECT * FROM mlays LIMIT $start , $per_page";
				$qw=mysqli_query($conne, $as);
				?>

				<table class="table">
					<thead>
						<tr><th>ID</th>
							<th>NAME</th>
							<th>EMAIL</th>
							<th>LEVEL</th>
							<th colspan="2">ACTION</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($row= mysqli_fetch_assoc($qw)) {?>
						<tr><td><?php echo $row['id']; ?></td>
							<td><?php echo $row['usernemu']; ?></td>
							<td><?php echo $row['emeil']; ?></td>
							<td><?php echo $row['level']; ?></td>
							<td><a class="del_btn"  href="#?del=<?php echo $row['id']; ?>" >Delete</a></td>
							<td><a class="edt_btn" href="">View</a></td>
						</tr>
						<?php } 
						
						?>
					</tbody>
				</table>
				<div style="text-align: center; margin-right: 77px; margin-top: -10px;">
						<?php 
						$prev= $page - 1;
					    $next= $page + 1;
					    if (!($page<=1)) {
						echo " <a href='mu.php?page=$prev'>PREV<a/>  ";
					}
						if ($pages>=1 && $page<=$pages) {
						for ($x=1; $x <=$pages ; $x++) { 
							echo ($x==$page) ? '<b><a style="color:black; text-decoration:none;font-size:18px;" href="?"> '.$x.' <a/></b>':'<a href="?page='.$x.'">'.$x.'<a/> ';
						}
					} 
					if (!($page>=$pages)) {
						echo "<a href='mu.php?page=$next'>NEXT<a/> ";
					}
					?>
					</div>
				
				<div class="con">
					<div style="padding: 10px;">
						<div> <i class="fa fa-trash"></i> Are you sure you want to delete this?</div>
					</div>
					  <div style="height: 65px;padding: 10px;">
                <div style="float: right;">
                    <button style="outline: none;  padding: 5px; border-radius: 4px;cursor: pointer;" class="info" id="no"><i class="fas fa-times"></i>&nbsp; No</button>
                    <button style="outline: none;  padding: 5px; border-radius: 4px;cursor: pointer;" class="danger" name="yes" id="yes"><i class="fas fa-check"></i>&nbsp; Yes</button>
                </div>
            </div>
            </div>


</body>
</html>
<?php
}
?>
<script type="text/javascript">
		 $(".refresh").click(function(){
	    	window.location.reload();
	    });
		 $(".del_btn").click(function(){
					$(".con").slideDown('slow');
					$(".table").animate({opacity:0.5},"slow").css('pointer-events','none');

				})
				$("#no").click(function(){
					$(".con").slideUp('slow');
					$(".table").animate({opacity:1},"slow").css('pointer-events','auto');
				})
				$("#yes").click(function(){
					$(".table").animate({opacity:1},"slow").css('pointer-events','auto');
			})
		 	</script>