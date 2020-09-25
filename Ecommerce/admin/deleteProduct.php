<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
		if(isset($_GET['deleteProduct'])){
			$del_id=$_GET['deleteProduct'];
			$del_pro="delete from product where product_id='$del_id'";
			$run_del=mysqli_query($con,$del_pro);
			if($run_del){
				echo(
						"<script>alert('One product has been deleted')</script>
						<script>window.open('index.php?viewProduct','_self')</script>"
					);
			}
		}
	}
?>
