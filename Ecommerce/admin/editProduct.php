<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
	
		if(isset($_GET['editProduct'])){
			$edit_id=$_GET['editProduct'];
			$get_product="select * from product where product_id='$edit_id'";
			$run_edit=mysqli_query($con,$get_product);
			$row_edit=mysqli_fetch_array($run_edit);
			$pro_id=$row_edit['product_id'];
			$product_title=$row_edit['product_title'];
			$p_cat_id=$row_edit['p_cat_id'];
			$cat_id=$row_edit['cat_id'];
			$product_image_1=$row_edit['product_image_1'];
			$product_image_2=$row_edit['product_image_2'];
			$product_image_3=$row_edit['product_image_3'];
			$product_price=$row_edit['product_price'];
			$product_desc=$row_edit['product_desc'];
			$product_keyword=$row_edit['product_keyword'];
			}
	$get_p_cat="select * from product_category where p_cat_id='$p_cat_id'";
	$run_p_cat=mysqli_query($con,$get_p_cat);
	$row_p_cat=mysqli_fetch_array($run_p_cat);
	$p_cat_title=$row_p_cat['p_cat_title'];
	
	$get_cat="select * from category where cat_id='$cat_id'";
	$run_cat=mysqli_query($con,$get_cat);
	$row_cat=mysqli_fetch_array($run_cat);
	$cat_title=$row_cat['cat_title'];
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
						Dashboard / Edit Product
					</li>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-primary ">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fas fa-swatchbook"></i> Edit Product</h3>
					</div>
					<div class="panel-body">
					<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						<div class="form-group">
							<label class=" col-md-3 control-label"> Product Title</label>
							<div class="col-md-6">
								<input type="text" name="product_title" class="form-control" required="" value="<?php echo $product_title?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label"> Product Category</label>
							<div class="col-md-6">
							<select name="product_cat" class="form-control">
								<option  value="<?php echo $p_cat_title ;?>">
									<?php
										echo $p_cat_title;
									?>
								</option>
								<?php
									$get_p_cat="select * from product_category";
									$run_p_cat=mysqli_query($con, $get_p_cat);
									while($row=mysqli_fetch_array($run_p_cat)){
										$id=$row['p_cat_id'];
										$p_cat_title=$row['p_cat_title'];
										echo"<option value='$id'>$p_cat_title</option>";
									}
								
								?>
							</select>
							</div>
						</div>
						<div class="form-group">
							<label class=" col-md-3 control-label"> Category</label>
							<div class="col-md-6">
								<select name="cat" class="form-control">
								<option value="<?php echo $cat_title?>"><?php echo $cat_title ;?></option>
								<?php
									$get_cat="select * from category";
									$run_cat=mysqli_query($con, $get_cat);
									while($row=mysqli_fetch_array($run_cat)){
										$id=$row['cat_id'];
										$cat_title=$row['cat_title'];
										echo"<option value='$id'>$cat_title</option>";
									}
								
								?>
							</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label"> Product Image 1</label>
							<div class="col-md-6">
								<input type="file" name="product_image_1" class="form-control" required="">
								<br>
								<img src="image/product_image/<?php echo $product_image_1?>" width="70" height="70">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label"> Product Image 2</label>
							<div class="col-md-6">
								<input type="file" name="product_image_2" class="form-control" required="">
								<br>
								<img src="image/product_image/<?php echo $product_image_2 ;?>" width="70" height="70" >
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label"> Product Image 3</label>
							<div class="col-md-6">
								<input type="file" name="product_image_3" class="form-control" required="">
								<br>
								<img src="image/product_image/<?php echo $product_image_3 ;?>" width="70" height="70">
							</div>
						</div>

						<div class="form-group">
							<label class=" col-md-3 control-label"> Product Price</label>
							<div class="col-md-6">
								<input type="number" name="product_price" class="form-control" required="" value="<?php echo $product_price ;?>">
							</div>
						</div>

						<div class="form-group">
						  <label class="col-md-3 control-label"> Product Keyword</label>
							<div class="col-md-6">
						 		<input type="text" name="product_keyword" class="form-control" required="" value="<?php echo $product_keyword ;?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label"> Product Description</label>
							<div class="col-md-6">
								<textarea name="product_description" class="form-control" style="resize: vertical; width: 100%" rows="5"  >
									<?php echo $product_desc ;?>
								</textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3"></label>
							<div class="col-md-6">		
								<input type="submit" name="update" value="Update Product" class="btn btn-primary form-control">
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
	$product_title=$_POST['product_title'];
	$product_cat=$_POST['product_cat'];
	$cat=$_POST['cat'];
	$product_price=$_POST['product_price'];
	$product_keyword=$_POST['product_keyword'];
	$product_description=$_POST['product_description'];
	
	$product_image_1=$_FILES['product_image_1']['name'];
	$product_image_2=$_FILES['product_image_2']['name'];
	$product_image_3=$_FILES['product_image_3']['name'];
	
	$temp_name1=$_FILES['product_image_1']['tmp_name'];
	$temp_name2=$_FILES['product_image_2']['tmp_name'];
	$temp_name3=$_FILES['product_image_3']['tmp_name'];
	
	move_uploaded_file($temp_name1,"image/product_image/$product_image_1");
	move_uploaded_file($temp_name2,"image/product_image/$product_image_2");
	move_uploaded_file($temp_name3,"image/product_image/$product_image_3");
	
	$update_product="update product set p_cat_id='$product_cat', cat_id='$cat',date=NOW(),product_title='$product_title',product_image_1='$product_image_1',product_image_2='$product_image_2',product_image_3='$product_image_3',product_price='$product_price',product_desc='$product_description',product_keyword='$product_keyword' where product_id='$pro_id'" ;
	
	$run_product=mysqli_query($con, $update_product);
	if($run_product){
		echo "
		<script>alert('Product Updated sucessfully')</script>
		<script>window.open('index.php?viewProduct','_self')</script>
		";
		
	}
}
}

?>