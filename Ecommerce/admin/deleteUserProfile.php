<?php

if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
		if(isset($_GET['deleteUserProfile'])){
			$del_admin=$_GET['deleteUserProfile'];
			$admin="delete from admin where admin_id='$del_admin'";
			$run_del_admin=mysqli_query($con,$admin);
			if($run_del_admin){
				echo(
						"<script>alert('One User has been deleted')</script>
						<script>window.open('index.php?viewUser','_self')</script>"
					);
			}
		}
	}
?>
