<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>E Learner's| Home</title>
	<link rel="stylesheet" href="css/style.css"/>
	<script src="https://kit.fontawesome.com/f0a643f3ae.js" crossorigin="anonymous"></script>
	
</head>

	<body>
		<?php
			include("inc/header.php");
		?>
		<div id="wrap">
			<div id='crumb'>
				<span><a href='index.php'>Home</a></span> <b>></b>
				<span>My cart</span>
			</div>
			<div id="dash">
				<h1>Instructor Dashboard</h1>
				<form method="post">
					<div id="c_form">
						<input type="text" name="c_name" placeholder="Enter course name"/>
						<button name="add_course">Create Course</button>
					</div>
				</form>
				<table cellpadding="0" cellspacing="0">
					<tr>
						<th>Name</th>
						<th></th>
						<th>Course Type</th>
						<th>Price</th>
						<th>Course Status</th>
						<th>Enrolled by</th>
						<th>Total Earnning</th>
					</tr>
					<tr>
						<td><a href="#"><img src="images/course/4.jpg"/></a></td>
						<td>
							<span><a href="#">jhdshkad dsjhsdha dsjhsda dsjhds</a></span>
							<br/>
							<span><a href="#">Edit</a></span>
						</td>
						<td>Free</td>
						<td>$100</td>
						<td>Active</td>
						<td>5</td>
						<td>$500</td>
					</tr>
					<tr>
						<td><a href="#"><img src="images/course/4.jpg"/></a></td>
						<td>
							<span><a href="#">jhdshkad dsjhsdha dsjhsda dsjhds</a></span>
							<br/>
							<span><a href="#">Edit</a></span>
						</td>
						<td>Free</td>
						<td>$100</td>
						<td>Active</td>
						<td>5</td>
						<td>$500</td>
					</tr>
					<tr>
						<td><a href="#"><img src="images/course/4.jpg"/></a></td>
						<td>
							<span><a href="#"> jhdshkad dsjhsdha dsjhsda dsjhds </a></span>
							<br/>
							<span><a href="#">Edit</a></span>
						</td>
						<td>Free</td>
						<td>$100</td>
						<td>Active</td>
						<td>5</td>
						<td>$500</td>
					</tr>

				</table>
			</div>
			
		<?php
			include("inc/footer.php");
		?>		
		</div>	
	</body>
</html>