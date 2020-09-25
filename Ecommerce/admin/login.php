<?php
	session_start();
	include("inc/db.php");

?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title> Admin | Login </title>
		<link rel="stylesheet" href="css/login.css">
        
		<script src="https://kit.fontawesome.com/74f12b28c5.js" crossorigin="anonymous"></script>
        
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	</head>
	<body style="background-color: teal; padding: 10%">
		<div class="container">
			<form class="form-login" action="" method="post">
				<h2 class="form-login-heading"> Admin Login </h2>
				<input type="email" class="form-control" name="admin_email" placeholder="Email Address" required>
				<input type="password" class="form-control" name="admin_password" placeholder="Password" required>
				<button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login"> Login </button>
				<h4 class="forgot-password">
					<a href="forgotPassword.php">Forgot password?</a>
				</h4>
			</form>
		</div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</body>
</html>

<?php
	if(isset($_POST['admin_login'])){
		$adminEmail=mysqli_real_escape_string($con,$_POST['admin_email']);
		$adminPassword=mysqli_real_escape_string($con,$_POST['admin_password']);
		$get_admin="select * from admin where admin_email='$adminEmail' AND admin_password='$adminPassword'";
		$run_admin=mysqli_query($con,$get_admin);
		$count=mysqli_num_rows($run_admin);
		if($count==1){
			$_SESSION['admin_email']=$adminEmail;
			echo("
				<script>alert('your are logged in')</script>
				<script>window.open('index.php?dashboard','_self')</script>
			");
		}else{
			echo("
				<script>alert('Email/Password incorrect')</script>
				<script>window.open('login.php','_self')</script>
			");
		}
	}

?>