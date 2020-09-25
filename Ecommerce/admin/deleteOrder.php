<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
		if(isset($_GET['deleteOrder'])){
			$del_order=$_GET['deleteOrder'];
			$order="delete from customer_order where order_id='$del_order'";
			$run_del_order=mysqli_query($con,$order);
			if($run_del_order){
				echo(
						"<script>alert('One Order has been deleted')</script>
						<script>window.open('index.php?viewOrder','_self')</script>"
					);
			}
		}
	}
?>
