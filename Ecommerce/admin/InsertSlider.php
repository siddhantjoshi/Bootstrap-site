
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
						<i class="fas fa-sliders-h"></i> Insert Slider
					</h3>
				</div>
				<div class="panel-body">
					<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label class="col-md-3 control-label"> Slider Title</label>
							<div class="col-md-6">
								<input type="text" name="slider_title" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label"> Slider Image </label>
							<div class="col-md-6">
								<input type="file" name="slide_image" class="form-control" required="" >
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-6">
								<input type="submit" name="submit" value="Submit Now " class="btn btn-primary form-control">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php
		if(isset($_POST['submit'])){
			$slider_title=$_POST['slider_title'];
			
			$slide_image=$_FILES['slide_image']['name'];
			$temp_name=$_FILES['slide_image']['tmp_name'];
			
			$view_slider="select * from slider";
			$view_run_slider=mysqli_query($con,$view_slider);
			$count_slider=mysqli_num_rows($view_run_slider);
			
			if($count_slider < 5){
				move_uploaded_file($temp_name,"image/slider_image/$slide_image");
				$insert_slider="insert into slider(slider_name,slider_image) values('$slider_title','$slide_image')";
				$run_slider=mysqli_query($con,$insert_slider);
				echo "
					<script>alert('Slider inserted sucessfully')</script>
					<script>window.open('index.php?viewSlider','_self')</script>
				";
				}else{
				echo "
					<script>alert('You have already 5 slider')</script>
					<script>window.open('index.php?viewSlider','_self')</script>
				";
			}
			
		}
	
	?>

</div>

<?php
}
?>