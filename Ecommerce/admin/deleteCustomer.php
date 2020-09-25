<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
		if(isset($_GET['deleteCustomer'])){
			$del_cust=$_GET['deleteCustomer'];
			$cust="delete from customer where customer_id='$del_cust'";
			$run_del_cust=mysqli_query($con,$cust);
			if($run_del_cust){
				echo(
						"<script>alert('One Customer has been deleted')</script>
						<script>window.open('index.php?viewCustomer','_self')</script>"
					);
			}
		}
	}
?>
