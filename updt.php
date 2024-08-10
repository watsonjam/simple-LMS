<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.error{
			width: 92%;
			padding: 10px;
			margin-bottom: 5px;
			border:1px solid #a94442;
			color: #a94442;
			text-align: left;
			background: #f2dede;
			border-radius: 5px;
			
		}
	</style>
</head>
<body>
<?php
$bag=array();
	if (count($bags) > 0): ?>
		<div class="error">
			<?php foreach ($bags as $error): ?>
				<p><?php echo $error; ?></p>
			<?php endforeach ?>	
		</div>
	<?php endif ?>

</body>
</html>