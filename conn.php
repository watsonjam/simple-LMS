<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.error{
			width: 92%;
			padding: 10px;
			border:1px solid #a94442;
			color: #a94442;
			text-align: left;
			background: #f2dede;
			border-radius: 5px;
			margin: 0px auto;
		}
	</style>
</head>
<body>
	<?php
	if (count($errors) > 0): ?>
		<div class="error">
			<?php foreach ($errors as $error): ?>
				<p><?php echo $error; ?></p>
			<?php endforeach ?>	
		</div>
	<?php endif ?>

</body>
</html>