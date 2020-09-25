
<div class="box">
	<div class="box-header">
		<center>
			<h2>Login</h2>
			<p class="lead">Already our customer</p>
		</center>
	</div>
	<form action="checkout.php" method="post">
		<div class="form-group">
			<label>Email</label>
			<input type="email" required="" class="form-control" name="c_email">
		</div>
		
		<div class="form-group">
			<label>Password</label>
			<input type="password" required="" class="form-control" name="c_password">
		</div>
		
		<div class="text-center">
			<button name="login" value="login" class="btn btn-primary">
				<i class="fa fa-sign-in"></i> Login
			</button>
		</div>
	</form>
	<center>
		<h3>New ?<a href="customerRegister.php"> Register Now</a></h3>
	</center>
</div>

<?php
	if(isset($_POST['login'])){
		$customer_email=$_POST['c_email'];
		$customer_password=$_POST['c_password'];
		$select_customer="select * from customer where customer_email='$customer_email' AND customer_pass='$customer_password'";
		$customerIP=getUserIP();
		
		$run_customer=mysqli_query($con,$select_customer);
		$check_customer=mysqli_num_rows($run_customer);
		
		$select_cart="select * from cart where ip_address='$customerIP'";
		$run_cart=mysqli_query($con,$select_cart);
		$check_cart=mysqli_fetch_row($run_cart);
		
		if($check_customer==0){
			echo("<script>alert('password/ Email is wrong')</script>");
			exit();
		}
		if($check_customer==1 AND $check_cart==0){
			$_SESSION['customer_email']=$customer_email;
			echo("<script>alert('You are Logged in')</script>");
			echo("<script>window.open('customer/myAccount.php','_self')</script>");
		}else{
			$_SESSION['customer_email']=$customer_email;
			echo("<script>alert('You are Logged in')</script>");
			echo("<script>window.open('checkout.php','_self')</script>");
			
		}
		
	}

?>