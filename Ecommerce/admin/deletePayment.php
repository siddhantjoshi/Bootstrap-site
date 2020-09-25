<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
		if(isset($_GET['deletePayment'])){
			$del_payment=$_GET['deletePayment'];
			$payment="delete from payment where payment_id='$del_payment'";
			$run_del_payment=mysqli_query($con,$payment);
			if($run_del_payment){
				echo(
						"<script>alert('One Payment has been deleted')</script>
						<script>window.open('index.php?viewPayment','_self')</script>"
					);
			}
		}
	}
?>
