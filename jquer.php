<?php include 'link.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.golden{
			color: green;
		}
		
	</style>
</head>
<body>
	<div id="jam"> </div>
	<div class="wat">
	<ul id="jack">
		<li>july</li>
		<li class="mido">java</li>
		<a href="yahoo.com" id="asd" >nifungue</a>
		<a href="mlay.com">mungure</a>
		<li>jamie</li>
	</ul>
	</div>
	<div class="feli">
	<a href="goggle.com">link</a>
	</div>
	<div>

		<li><a href="">jam.com</a></li>
		<li><a href="" >jack.com</a></li>
		<li><a href="">java.com</a></li>
		<button id="kbo">kibonyezo</button>
	</div>
	<button id="poa">click me</button>
	<div id="container">
		<p id="question">what is capital city of tanzania</p>
		<input type="text" id="answer-box" name="">
		<p id="result"></p>
		<p id="answer"></p>
		<button id="vp">submit</button>

	</div>
	<div >
		<button id="btn1">attach data to div element</button>
		<button id="btn2">get data from div element</button>
		<div id="dataexample"></div>
	</div>

	<script type="text/javascript">
		$(document).ready(function()
		{
			
			$("#jam").text("hellow mlay").css('color','blue').hide(5000).show(6000);
			$("#jack").css('color','red');
			$("#jack > li:first").css('color','blue');
			$("a[href='goggle.com']").text('mlay').append("[new window]");
		});
		$("#poa").click (function(){
			$("#jam").text("hellow watson").show(3000);
			$(".wat").find("a").css('color','green');
			
			
			});
		$("#kbo").click (function(){
			$("li").eq(1);addClass('golden');
			;
			
			});
		$("#btn1").click (function(){
			$("#dataexample").data({"cart":200});
			});
		$("#btn2").click (function(){
			console.log($("#dataexample").data("cart"));
			});

		$("#vp").click(function(){
				var aise = $("#answer-box").val();
				if (aise == 'moro') {
					$("#result").text('your correct');
				}
				else{
					$("#result").html('<span style="color:red">your answer is incorrect</span>');
					$("#answer").text('the correct answer is moro');
				}



				}
				);
		
	</script>
	
	

		
</body>
</html>