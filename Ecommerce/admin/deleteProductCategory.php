<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
		if(isset($_GET['deleteProductCategory'])){
			$del_id=$_GET['deleteProductCategory'];
			$del_pro="delete from product_category where p_cat_id='$del_id'";
			$run_del=mysqli_query($con,$del_pro);
			if($run_del){
				echo(
						"<script>alert('One product category has been deleted')</script>
						<script>window.open('index.php?viewProductCategory','_self')</script>"
					);
			}
		}
	}
?>
