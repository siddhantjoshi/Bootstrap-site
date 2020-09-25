<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
	
		if(isset($_GET['editSlider'])){
			$edit_id=$_GET['editSlider'];
			
			$get_slider="select * from slider where id='$edit_id'";
			$run_slider=mysqli_query($con,$get_slider);
			$row_edit=mysqli_fetch_array($run_slider);
			
			$slide_id=$row_edit['id'];
			$slide_name=$row_edit['slider_name'];
			$slide_image=$row_edit['slider_image'];
			
		}
?>

<!doctype html>
<div class="row">
	<div class="col-lg-12">
		<div class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i>
				Dashboard / Edit Slider
			</li>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary ">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fas fa-sliders-h"></i> Edit Slider</h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label class=" col-md-3 control-label"> Slider Title</label>
						<div class="col-md-6">
							<input type="text" name="slider_title" class="form-control" required="" value="<?php echo $slide_name?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Slider Image </label>
						<div class="col-md-6">
							<input type="file" name="slider_image" class="form-control" required="">
							<br>
							<img src="image/slider_image/<?php echo $slide_image?>" width="130" height="100">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"></label>
						<div class="col-md-6">		
							<input type="submit" name="update" value="Update Slider" class="btn btn-primary form-control">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>	
</div> 

<?php
if(isset($_POST['update'])){
	$slider_name=$_POST['slider_title'];
	$slider_image=$_FILES['slider_image']['name'];
	$slider_image_temp=$_FILES['slider_image']['tmp_name'];
	move_uploaded_file($slider_image_temp,"image/slider_image/$slider_image");
	
	$update_slider="update slider set slider_name='$slide_name',slider_image='$slider_image' where id='$slide_id'" ;
	
	$run_slider=mysqli_query($con, $update_slider);
	if($run_slider){
		echo "
		<script>alert('Slider Updated sucessfully')</script>
		<script>window.open('index.php?viewSlider','_self')</script>
		";
		
	}
}
}

?>