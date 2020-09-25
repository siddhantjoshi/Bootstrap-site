
<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
?>

<div class="row">
	<div class="col-lg-12">
		<div class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i>
				Dashboard / Insert User
			</li>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary ">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="fa fa-user"></i> Insert User</h3>
			</div>
			<div class="panel-body">
			<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label class=" col-md-3 control-label"> Admin Name</label>
					<div class="col-md-6">
						<input type="text" name="admin_name" class="form-control" required="">
					</div>
				</div>
				<div class="form-group">
					<label class=" col-md-3 control-label"> Admin Email </label>
					<div class="col-md-6">
						<input type="email" name="admin_email" class="form-control" required="">
					</div>
				</div>
				<div class="form-group">
					<label class=" col-md-3 control-label"> Admin Password </label>
					<div class="col-md-6">
						<input type="password" name="admin_password" class="form-control" required="">
					</div>
				</div>
				<div class="form-group">
					<label class=" col-md-3 control-label"> Admin Country </label>
					<div class="col-md-6">
						<input type="text" name="admin_country" class="form-control" required="">
					</div>
				</div>
				<div class="form-group">
					<label class=" col-md-3 control-label"> Admin Level</label>
					<div class="col-md-6">
						<input type="text" name="admin_level" class="form-control" required="">
					</div>
				</div>
				<div class="form-group">
					<label class=" col-md-3 control-label"> Admin Contact </label>
					<div class="col-md-6">
						<input type="tel" name="admin_contact" class="form-control" required="">
					</div>
				</div>
				<div class="form-group">
					<label class=" col-md-3 control-label"> About Admin </label>
					<div class="col-md-6">
						<textarea type="text" name="about_admin" class="form-control" style="resize: none" rows="5" required="">
						</textarea>
					</div>
				</div>

				<div class="form-group">
					<label class=" col-md-3 control-label"> Admin Image </label>
					<div class="col-md-6">
						<input type="file" name="admin_image" class="form-control" required="">
					</div>
				</div>

				<div class="form-group">
					<label class=" col-md-3 control-label"></label>
					<div class="col-md-6">
					<input type="submit" name="submit" value="Insert Admin " class="btn btn-primary form-control">
				</div>
				</div>
			</form>
		</div>
			</div>
		</div>	
	<div class="col-lg-3"></div>
</div> 

<?php
if(isset($_POST['submit'])){

	$admin_name=$_POST['admin_name'];
	$admin_email=$_POST['admin_email'];
	$admin_password=$_POST['admin_password'];
	$admin_contact=$_POST['admin_contact'];
	$admin_country=$_POST['admin_country'];
	$admin_level=$_POST['admin_level'];
	$about_admin=$_POST['about_admin'];
	
	$admin_image=$_FILES['admin_image']['name'];
	$temp_admin_image=$_FILES['admin_image']['tmp_name'];
	move_uploaded_file($temp_admin_image,"image/admin_image/$admin_image");
	
	$insert_admin="insert into admin (admin_name,admin_email,admin_password,admin_image,admin_contact,admin_country,admin_level,about_admin) values('$admin_name','$admin_email','$admin_password','$admin_image','$admin_contact','$admin_country','$admin_level','$about_admin')" ;
	
	$run_admin=mysqli_query($con, $insert_admin);
	if($run_admin){
		echo "
		<script>alert('Admin inserted sucessfully')</script>
		<script>window.open('index.php?viewUser','_self')</script>
		";
		
	}
}
?>
<?php
}
?>