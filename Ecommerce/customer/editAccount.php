
<?php

	include("inc/db.php");
	include("function/function.php");
	
	$customer_email=$_SESSION['customer_email'];
	$get_customer="select * from customer where customer_email='$customer_email'";
	$run_customer=mysqli_query($con,$get_customer);
	
	$row_customer=mysqli_fetch_array($run_customer);
	$customer_name=$row_customer['customer_name'];
	$customer_email=$row_customer['customer_email'];
	$customer_pass=$row_customer['customer_pass'];
	$customer_country=$row_customer['customer_country'];
	$customer_city=$row_customer['customer_city'];
	$customer_contact=$row_customer['customer_contact'];
	$customer_address=$row_customer['customer_address'];
	$customer_image=$row_customer['customer_image'];
	$customer_id=$row_customer['customer_id'];

?>


<div class="box">
	<div class="box-header">
		<center>
			<h2>Edit your account</h2>
		</center>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Customer Name</label>
			<input type="text" name="c_name" required="" value="<?php echo  $customer_name; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Customer Email</label>
			<input type="email" name="c_email" required="" value="<?php echo  $customer_email; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Country</label>
			<input type="text" name="c_country" required="" value="<?php echo  $customer_country; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>City</label>
			<input type="text" name="c_city" required="" value="<?php echo  $customer_city; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Contact Number</label>
			<input type="tel" name="c_number" required="" value="<?php echo  $customer_contact; ?>" class="form-control">
		</div>
		<div class="form-group">
			<label>Address</label>
			<input type="text" name="c_address" required="" value="<?php echo  $customer_address; ?>"  height="40px" class="form-control">
	<!--		<textarea style="width: 100% ;resize: vertical;" name="c_address" value="<?php echo  $customer_name; ?>"class="form-control">					</textarea>
	-->
		</div>
		<div class="form-group">
			<label>Image</label>
			<input type="file" name="c_image" required="" class="form-control">
			<img src="customer_image/<?php echo $customer_image; ?>"  class="img-responsive" height="100px" width="100px">
		</div>
		<div class="text-center">
			<button type="submit" name="update" class="btn btn-primary">
				<i class="fas fa-user"></i> Update Now
			</button>
		</div>
	</form>
</div>
<?php

	if(	isset($_POST['update'])){
		$update_id=$customer_id;
		$c_name=$_POST['c_name'];
		$c_email=$_POST['c_email'];
		$c_country=$_POST['c_country'];
		$c_city=$_POST['c_city'];
		$c_number=$_POST['c_number'];
		$c_address=$_POST['c_address'];
		$c_image=$_FILES['c_image']['name'];
		$c_temp_image=$_FILES['c_image']['tmp_name'];
		$userIP=getUserIP();

		move_uploaded_file($c_temp_image,"customer/customer_image/$c_image");

		$update_customer="update customer set customer_name='$c_name', customer_email='$c_email', customer_country='$c_country', customer_city='$c_city', customer_contact='$c_number',customer_address='$c_address' ,customer_image='$c_image' ,customer_ip='$userIP' where customer_id='$customer_id'";

		$run_customer_query=mysqli_query($con,$update_customer);

		if($run_customer_query){
			echo("
				<script>alert('You details are updated')</script>
				<script>window.open('../logout.php','_self')</script>
			");
		}
	}

?>

