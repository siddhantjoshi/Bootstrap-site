<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>E Learner's| Course Detail</title>
	<link rel="stylesheet" href="css/style.css"/>
	<script src="https://kit.fontawesome.com/f0a643f3ae.js" crossorigin="anonymous"></script>
	
</head>

	<body>
		<?php
			include("inc/header.php");
		?>
		<div id="wrap">
		<?php
			echo course_detail();
			include("inc/footer.php");
		?>		
		</div>	
	</body>
</html>