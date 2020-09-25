
<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
?>

<!doctype html>
<html>
	<head>

		<meta charset="utf-8">
		<title>Insert Product</title>
		
	</head>
	<body>
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb">
					<li class="active">
						<i class="fa fa-dashboard"></i>
						Dashboard / Insert Product
					</li>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3"></div>
			<div class="col-lg-6">
				<div class="panel panel-primary ">
					<div class="panel-heading">
						<h3 class="panel-title"><i class="fa fa-money fa-w"></i> Insert Product</h3>
					</div>
					<div class="panel-body">
					<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label"> Product Title</label>
							<input type="text" name="product_title" class="form-control" required="">
						</div>
						<div class="form-group">
							<label class="control-label"> Product Category</label>
							<select name="product_cat" class="form-control">
								<option>Select product category</option>
								<?php
									$get_p_cat="select * from product_category";
									$run_p_cat=mysqli_query($con, $get_p_cat);
									while($row=mysqli_fetch_array($run_p_cat)){
										$id=$row['p_cat_id'];
										$cat_title=$row['p_cat_title'];
										echo"<option value='$id'>$cat_title</option>";
									}
								
								?>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label"> Category</label>
							<select name="cat" class="form-control">
							<option>Select category</option>
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

						<div class="form-group">
							<label class=" control-label"> Product Image 1</label>
							<input type="file" name="product_image_1" class="form-control" required="">
						</div>

						<div class="form-group">
							<label class="control-label"> Product Image 2</label>
							<input type="file" name="product_image_2" class="form-control" required="">
						</div>

						<div class="form-group">
							<label class="control-label"> Product Image 3</label>
							<input type="file" name="product_image_3" class="form-control" required="">
						</div>

						<div class="form-group">
							<label class="control-label"> Product Price</label>
							<input type="number" name="product_price" class="form-control" required="">
						</div>

						<div class="form-group">
							<label class="control-label"> Product Keyword</label>
							<input type="text" name="product_keyword" class="form-control" required="">
						</div>

						<div class="form-group">
							<label class=" control-label"> Product Description</label>
							<textarea name="product_description" class="form-control" rows="6" cols="19"></textarea>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control">
						</div>
					</form>
				</div>
					</div>
				</div>	
			<div class="col-lg-3"></div>
		</div> 
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</body>
</html>

<?php
if(isset($_POST['submit'])){
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
	
	$insert_product="insert into product(p_cat_id,cat_id,date,product_title,product_image_1,product_image_2,product_image_3,product_price,product_desc,product_keyword) values('$product_cat','$cat',NOW(),'$product_title','$product_image_1','$product_image_2','$product_image_3','$product_price','$product_description','$product_keyword')" ;
	
	$run_product=mysqli_query($con, $insert_product);
	if($run_product){
		echo "
		<script>alert('Product inserted sucessfully')</script>
		<script>window.open('index.php?viewProduct','_self')</script>
		";
		
	}
}
?>
<?php
}
?>