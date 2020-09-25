<div class="box">
	<center>
		<h1>Do you want to delete your account ?</h1>
		<form action="" method="post">
			<input type="submit" name="yes" value="yes, I want to delete" class="btn btn-danger">
			<input type="submit" name="no" value="No, I don't want to delete" class="btn btn-primary">
		</form>
	</center>
	
</div>
<?php
	$c_email=$_SESSION['customer_email'];
	if(isset($_POST['yes'])){
		$del="delete from customer where customer_email='$c_email'";
		$run=mysqli_query($con,$del);
		if($run){
			session_destroy();
		echo("
			<script>alert('Your accounthas being deleted')</script>
			<script>window.open('../index.php','_self')</script>
		");
		
		}
	}

?>