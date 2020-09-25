<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
		if(isset($_GET['deleteSlider'])){
			$deleteslider=$_GET['deleteSlider'];
			$slider="delete from slider where id='$deleteslider'";
			$run_del_slider=mysqli_query($con,$slider);
			if($run_del_slider){
				echo(
						"<script>alert('One Slider has been deleted')</script>
						<script>window.open('index.php?viewSlider','_self')</script>"
					);
			}
		}
	}
?>
