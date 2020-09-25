<div class="box">
<?php
	$session_email=$_SESSION['customer_email'];
	$select_customer="select * from customer where customer_email='$session_email'";
	$run_customer=mysqli_query($con, $select_customer);
	$row_customer=mysqli_fetch_array($run_customer);
	$customer_id=$row_customer['customer_id'];
	
	
?>
	<h1 class="text-center">Payment option</h1>
	<p class="lead text-center">
		<a href="order.php?customer_id=<?php echo $customer_id;?>" >Pay Offline</a>
	</p>
	<center>
		<p class="lead">
			<a href="#">
				Pay with paypal
				<img src="image/payment/paypal.png" class="img-responsive">
			</a>
		</p>
		
	</center>
</div>