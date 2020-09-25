<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
		if(isset($_GET['deleteCategory'])){
			$del_id=$_GET['deleteCategory'];
			$del_pro="delete from category where cat_id='$del_id'";
			$run_del=mysqli_query($con,$del_pro);
			if($run_del){
				echo(
						"<script>alert('One Category has been deleted')</script>
						<script>window.open('index.php?viewCategory','_self')</script>"
					);
			}
		}
	}
?>
