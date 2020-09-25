<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
	
		if(isset($_GET['EditUserProfile'])){
			$edit_id=$_GET['EditUserProfile'];
			$get_admin="select * from admin where admin_id='$edit_id'";
			$run_edit=mysqli_query($con,$get_admin);
			$row_edit=mysqli_fetch_array($run_edit);
			
			$admin_id=$row_edit['admin_id'];
			$admin_name=$row_edit['admin_name'];
			$admin_email=$row_edit['admin_email'];
			$admin_password=$row_edit['admin_password'];
			$admin_image=$row_edit['admin_image'];
			$admin_contact=$row_edit['admin_contact'];
			$admin_country=$row_edit['admin_country'];
			$admin_level=$row_edit['admin_level'];
			$about_admin=$row_edit['about_admin'];
			}
?>

<!doctype html>
<div class="row">
	<div class="col-lg-12">
		<div class="breadcrumb">
			<li class="active">
				<i class="fa fa-dashboard"></i>
				Dashboard / Edit User
			</li>
		</div>
	</div>
</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary ">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="fas fa-user"></i> Edit User</h3>
				</div>
				<div class="panel-body">
				<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label class=" col-md-3 control-label"> Admin Name </label>
						<div class="col-md-6">
							<input type="text" name="admin_name" class="form-control" required="" value="<?php echo $admin_name?>">
						</div>
					</div>
					<div class="form-group">
						<label class=" col-md-3 control-label"> Admin Email </label>
						<div class="col-md-6">
							<input type="email" name="admin_email" class="form-control" required="" value="<?php echo $admin_email?>">
						</div>
					</div>
					<div class="form-group">
						<label class=" col-md-3 control-label"> Admin Password </label>
						<div class="col-md-6">
							<input type="text" name="admin_password" class="form-control" required="" value="<?php echo $admin_password?>">
						</div>
					</div>
					<div class="form-group">
						<label class=" col-md-3 control-label"> Admin Contact </label>
						<div class="col-md-6">
							<input type="tel" name="admin_contact" class="form-control" required="" value="<?php echo $admin_contact?>">
						</div>
					</div>
					<div class="form-group">
						<label class=" col-md-3 control-label"> Admin Country </label>
						<div class="col-md-6">
							<input type="text" name="admin_country" class="form-control" required="" value="<?php echo $admin_country?>">
						</div>
					</div>
					<div class="form-group">
						<label class=" col-md-3 control-label"> Admin Level  </label>
						<div class="col-md-6">
							<input type="text" name="admin_level" class="form-control" required="" value="<?php echo $admin_level?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-3 control-label"> Admin Image </label>
						<div class="col-md-6">
							<input type="file" name="admin_image" class="form-control" required="">
							<br>
							<img src="image/admin_image/<?php echo $admin_image?>" width="70" height="70">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-3 control-label"> About Admin </label>
						<div class="col-md-6">
							<textarea name="about_admin" class="form-control" style="resize: vertical; width: 100%" rows="5"  >
								<?php echo $about_admin ;?>
							</textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3"></label>
						<div class="col-md-6">		
							<input type="submit" name="update" value="Update Information " class="btn btn-primary form-control">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>	
</div> 
<?php
if(isset($_POST['update'])){
	$admin_name=$_POST['admin_name'];
	$admin_email=$_POST['admin_email'];
	$admin_password=$_POST['admin_password'];
	$admin_contact=$_POST['admin_contact'];
	$admin_country=$_POST['admin_country'];
	$about_admin=$_POST['about_admin'];
	$admin_level=$_POST['admin_level'];
	
	$admin_image=$_FILES['admin_image']['name'];
	$temp_name=$_FILES['admin_image']['tmp_name'];
	
	move_uploaded_file($temp_name,"image/admin_image/$admin_image");
	
	$update_admin="update admin set admin_name='$admin_name',admin_email='$admin_email',admin_password='$admin_password', admin_image='$admin_image', admin_contact='admin_contact', admin_country='$admin_country', admin_level='$admin_level', about_admin='$about_admin' where admin_id ='$admin_id'" ;
	
	$run_admin=mysqli_query($con, $update_admin);
	if($run_admin){
		echo "
		<script>alert('Admin Informatation Updated sucessfully')</script>
		<script>window.open('logout.php','_self')</script>
		";
		
	}
}
}

?>