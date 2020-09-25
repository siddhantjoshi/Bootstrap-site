<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
	
		if(isset($_GET['editProductCategory'])){
			$edit_p_cat_id=$_GET['editProductCategory'];
			$edit_p_cat_query="select * from product_category where p_cat_id='$edit_p_cat_id'";
			$run_edit_p_cat=mysqli_query($con,$edit_p_cat_query);
			$row_edit=mysqli_fetch_array($run_edit_p_cat);
			
			$p_cat_id=$row_edit['p_cat_id'];
			$p_cat_title=$row_edit['p_cat_title'];
			$p_cat_desc=$row_edit['p_cat_desc'];
			}
?>

<!doctype html>
<html>
	<head>

		<meta charset="utf-8">
		<title>Edit Product</title>
		
	</head>
	<body>
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb">
					<li class="active">
						<i class="fa fa-dashboard"></i>
						Dashboard / Edit Product Category
					</li>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary ">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fas fa-th-list"></i> Edit Product Category</h3>
					</div>
					<div class="panel-body">
					<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						<div class="form-group">
							<label class=" col-md-3 control-label"> Product Category Title</label>
							<div class="col-md-6">
								<input type="text" name="p_cat_title" class="form-control" required="" value="<?php echo $p_cat_title?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"> Edit Product Category Description</label>
							<div class="col-md-6">
								<textarea type="number" style="resize: none" rows="5" name="p_cat_desc" class="form-control" required="" >
									<?php echo $p_cat_desc ;?>
								</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3"></label>
							<div class="col-md-6">		
								<input type="submit" name="update" value="Update Product Category" class="btn btn-primary form-control">
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
	$p_cat_title=$_POST['p_cat_title'];
	$p_cat_desc=$_POST['p_cat_desc'];
	
	$update_product="update product_category set p_cat_title='$p_cat_title', p_cat_desc='$p_cat_desc' where p_cat_id='$p_cat_id'" ;
	
	$run_product=mysqli_query($con, $update_product);
	if($run_product){
		echo "
		<script>alert('Product Category Updated sucessfully')</script>
		<script>window.open('index.php?viewProductCategory','_self')</script>
		";
		
	}
}
}

?>