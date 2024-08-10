<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.display {
			border:1px solid black;
			width: 40%;
			margin-left: 390px;
			margin-top: -50px;
			display: none;
			opacity: 1;
			background-color: #F8F8FF;
		}
		.danger:hover{
			background-color: red;
			transition:0.9s;
		}
		.info:hover{
			background-color: blue;
			transition:0.9s;
		}
	</style>
</head>
<body><?php
	if(isset($_POST['drug2']))
{
	$drug2=$_POST['drug2'];
	?>
<div class="display">
					<div style="padding: 10px;">
						<div> <i class="fa fa-trash"></i> Are you sure you want to delete this?</div>
					</div>
					  <div style="height: 65px;padding: 10px;">
                <div style="float: right;">
                    <button style="outline: none;  padding: 5px; border-radius: 4px;cursor: pointer;" class="info" id="no"><i class="fas fa-times"></i>&nbsp; No</button>
                    <button style="outline: none;  padding: 5px; border-radius: 4px;cursor: pointer;" class="danger" id="yes"><i class="fas fa-check"></i>&nbsp; Yes</button>
                </div>
            </div>
            <input type="text" name="drgId" id="drgId" value="<?php echo $drugId2; ?>" style="">
				</div> <?php } ?>
				<?php 
				if(isset($_POST['drgId']))
{
	$drgId=$_POST['drgId'];

	$delete=mysqli_query($conne,"delete from drugs where id='$drgId'");
}
				?>
				<script type="text/javascript">
					$("#no").click(function(){
			$(".display").slideUp('slow');
		});
					$("#yes").click(function(){
			var drgId=$("#drgId").val();
			$.ajax({
				url:'deleterec.php',
				method:"post",
				data:{"drgId":drgId},
				success:function()
				{
					
					$(".display").slideDown('slow');
				}
			});
		});

				</script>
</body>
</html>