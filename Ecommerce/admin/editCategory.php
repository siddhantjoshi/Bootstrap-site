<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
	
		if(isset($_GET['editCategory'])){
			$edit_cat_id=$_GET['editCategory'];
			$edit_cat_query="select * from category where cat_id='$edit_cat_id'";
			$run_edit_cat=mysqli_query($con,$edit_cat_query);
			$row_edit=mysqli_fetch_array($run_edit_cat);
			
			$cat_id=$row_edit['cat_id'];
			$cat_title=$row_edit['cat_title'];
			$cat_desc=$row_edit['cat_desc'];
			}
?>

<!doctype html>
<html>
	<head>

		<meta charset="utf-8">
		<title>Edit Category</title>
		
	</head>
	<body>
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb">
					<li class="active">
						<i class="fa fa-dashboard"></i>
						Dashboard / Edit Category
					</li>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary ">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fas fa-th-list"></i> Edit Category</h3>
					</div>
					<div class="panel-body">
					<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						<div class="form-group">
							<label class=" col-md-3 control-label"> Category Title</label>
							<div class="col-md-6">
								<input type="text" name="cat_title" class="form-control" required="" value="<?php echo $cat_title?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"> Edit Category Description</label>
							<div class="col-md-6">
								<textarea type="number" style="resize: none" rows="5" name="cat_desc" class="form-control" required="" >
									<?php echo $cat_desc ;?>
								</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3"></label>
							<div class="col-md-6">		
								<input type="submit" name="update" value="Update Category" class="btn btn-primary form-control">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>	
	</div> 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</body>
</html>

<?php
if(isset($_POST['update'])){
	$cat_title=$_POST['cat_title'];
	$cat_desc=$_POST['cat_desc'];
	
	$update_product="update category set cat_title='$cat_title', cat_desc='$cat_desc' where cat_id='$cat_id'" ;
	
	$run_product=mysqli_query($con, $update_product);
	if($run_product){
		echo "
		<script>alert('Category Updated sucessfully')</script>
		<script>window.open('index.php?viewCategory','_self')</script>
		";
		
	}
}
}

?>