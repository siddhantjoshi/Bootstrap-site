<?php
	include("inc/db.php");
	include("function/function.php");

?>
<?php
	if(isset($_GET['customer_id'])){
		$customer_id=$_GET['customer_id'];	
	}
	$customer_IP=getUserIP();
	$status="pending";
	$invoice_no=mt_rand();

	$select_cart="select * from cart where ip_address='$customer_IP'";
	$run_cart=mysqli_query($con,$select_cart);
	while($row_cart=mysqli_fetch_array($run_cart)){
		$product_id=$row_cart['product_id'];
		$quantity=$row_cart['quantity'];
		$product_size=$row_cart['product_size'];
		
		$select_product="select * from product where product_id='$product_id'";
		$run_product=mysqli_query($con, $select_product);
		while($row_product=mysqli_fetch_array($run_product)){
			
			$sub_total=$row_product['product_price'] * $quantity;
			
			$insert_cust="insert into customer_order(customer_id,product_id,due_amount,invoice_no,quantity,size,order_date,order_status) value('$customer_id','$product_id','$sub_total','$invoice_no','$quantity','$product_size', NOW(),'$status')";
			$run_cust=mysqli_query($con,$insert_cust);
			
//			$insert_customer_pending_order="insert into pending_order(customer_id,invoice_no,product_id,quantity,size,order_status) values('$customer_id','$invoice_no','$product_id','$quantity','$product_size','$status')";
//			$run_customer_pending_order_order=mysqli_query($con,$insert_customer_pending_order);
//			
			$delete_cart="delete from cart where ip_address='$customer_IP'";
			$run_delete=mysqli_query($con,$delete_cart);
			echo("<script>alert('Order as been submited')</script>");
			echo("<script>window.open('customer/myAccount.php?myOrder','_self')</script>");
			
			
		}
	}

?>