<?php
	session_start();
	include("inc/db.php");
	if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
?>
<?php
	$admin_session=$_SESSION['admin_email'];
	$get_admin="select * from admin where admin_email='$admin_session'";
	$run_admin=mysqli_query($con,$get_admin);
	$row_admin=mysqli_fetch_array($run_admin);
	
	$admin_id=$row_admin['admin_id'];
	$admin_name=$row_admin['admin_name'];
	$admin_email=$row_admin['admin_email'];
	$admin_contact=$row_admin['admin_contact'];
	$admin_country=$row_admin['admin_country'];
	$admin_level=$row_admin['admin_level'];
	$about_admin=$row_admin['about_admin'];
	$admin_image=$row_admin['admin_image'];
	
	$get_pro="select * from product";
	$run_pro=mysqli_query($con,$get_pro);
	$count_pro=mysqli_num_rows($run_pro);
	
	$get_cust="select * from customer";
	$run_cust=mysqli_query($con,$get_cust);
	$count_cust=mysqli_num_rows($run_cust);
	
	$get_pro_cat="select * from product_category";
	$run_pro_cat=mysqli_query($con,$get_pro_cat);
	$count_pro_cat=mysqli_num_rows($run_pro_cat);
	
	$get_cust_order="select * from customer_order";
	$run_cust_order=mysqli_query($con,$get_cust_order);
	$count_cust_order=mysqli_num_rows($run_cust_order);
	
	
		  
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Pannel | E Commerce site</title>

        <link rel="stylesheet" href="css/style.css">
        
		<script src="https://kit.fontawesome.com/74f12b28c5.js" crossorigin="anonymous"></script>
        
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    </head>
	<body id="body">
		<div class="wrapper">
			<?php include'inc/sidebar.php' ;?>
			<div id="page-wrapper">
				<div class="container-fluid">
					<?php
						if(isset($_GET['dashboard'])){
							include 'dashboard.php';
						}
						if(isset($_GET['insert_product'])){
							include 'insert_product.php';
						}
						if(isset($_GET['viewProduct'])){
							include 'viewProduct.php';
						}
						if(isset($_GET['deleteProduct'])){
							include 'deleteProduct.php';
						}
						if(isset($_GET['editProduct'])){
							include 'editProduct.php';
						}				
						if(isset($_GET['InsertProductCategory'])){
							include 'InsertProductCategory.php';
						}
						if(isset($_GET['viewProductCategory'])){
							include 'viewProductCategory.php';
						}
						if(isset($_GET['insertCategory'])){
							include 'insertCategory.php';
						}
						if(isset($_GET['deleteProductCategory'])){
							include 'deleteProductCategory.php';
						}
						if(isset($_GET['editProductCategory'])){
							include 'editProductCategory.php';
						}
						if(isset($_GET['viewCategory'])){
							include 'viewCategory.php';
						}
						if(isset($_GET['editCategory'])){
							include 'editCategory.php';
						}
						if(isset($_GET['deleteCategory'])){
							include 'deleteCategory.php';
						}
						if(isset($_GET['viewOrder'])){
							include 'viewOrder.php';
						}
						if(isset($_GET['viewCustomer'])){
							include 'viewCustomer.php';
						}
						if(isset($_GET['viewPayment'])){
							include 'viewPayment.php';
						}
						if(isset($_GET['deleteCustomer'])){
							include 'deleteCustomer.php';
						}
						if(isset($_GET['deletePayment'])){
							include 'deletePayment.php';
						}
						if(isset($_GET['InsertSlider'])){
							include 'InsertSlider.php';
						}
						if(isset($_GET['viewSlider'])){
							include 'viewSlider.php';
						}
						if(isset($_GET['editSlider'])){
							include 'editSlider.php';
						}
						if(isset($_GET['deleteSlider'])){
							include 'deleteSlider.php';
						}
						if(isset($_GET['deleteOrder'])){
							include 'deleteOrder.php';
						}
						if(isset($_GET['InsertUser'])){
							include 'InsertUser.php';
						}
						if(isset($_GET['viewUser'])){
							include 'viewUser.php';
						}
						if(isset($_GET['EditUserProfile'])){
							include 'EditUserProfile.php';
						}
						if(isset($_GET['deleteUserProfile'])){
							include 'deleteUserProfile.php';
						}
		
					?>			
				</div>
			</div>
		</div>
		
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	</body>
</html>
<?php
		 }