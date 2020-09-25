deleteslider
<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
?>
<div class="row">
	<div class=" col-lg-12">
		<ol class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i> Dashboard / View Slider
			</li>
		</ol>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fas fa-sliders-h"></i> View Slider
					</h3>
				</div>
				<div class="panel-body">
					<?php
						$get_slide="select * from slider";
						$run_slider=mysqli_query($con,$get_slide);
						while($row_slide=mysqli_fetch_array($run_slider)){
							$slide_id=$row_slide['id'];
							$slide_name=$row_slide['slider_name'];
							$slide_image=$row_slide['slider_image'];
					?>
					
					<div class="col-lg-3 col-md-3">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title" align="center">
									<?php echo $slide_name ;?>
								</h3>
							</div>
							<div class="panel-body">
								<img src="image/slider_image/<?php echo $slide_image; ?>" class="pull-left img-responsive" >
							</div>
							<div class="panel-footer">
								<center>
									<a href="index.php?deleteSlider=<?php echo $slide_id ;?>" class="pull-left">
										<i class=" fas fa-trash-alt"></i>
										 Delete
									</a>
									
									<a href="index.php?editSlider=<?php echo $slide_id ;?>" class="pull-right">
										<i class=" fas fa-pencil-alt"></i>
										 Edit
									</a>
									<div class="clearfix">
									</div>
								</center>
							</div>
						</div>
					</div>
					<?php
						}
					?>
			</div>
		</div>
	</div>
</div>

<?php
	}
?>