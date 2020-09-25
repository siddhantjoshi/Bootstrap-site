<?php
if(!isset($_SESSION['admin_email'])){
		echo("
			<script>window.open('login.php','_self')</script>
		");
	}else{
?>
<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb"> 
			<li class="active">
				<i class=" fa fa-dashboard"></i> Dashboard / View Order's
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class=" panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fa fa-money"></i> View Order's
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<td> Order ID </td>
								<td> Customer Email </td>
								<td> Invoice No</td>
								<td> Product Title </td>
								<td> Quantity </td>
								<td> Product size</td>
								<td> Order Date </td>
								<td> Order Status </td>
								<td> Due Amount </td>
								<td> Product Delete </td>
							</tr>
						</thead>
						<tbody>
							<?php
								
								$i=0;
								$get_order="select * from customer_order";
								$run_order=mysqli_query($con,$get_order);
								while($row_order=mysqli_fetch_array($run_order)){
									$order_id=$row_order['order_id'];
									$due_amount=$row_order['due_amount'];
									$invoice_no=$row_order['invoice_no'];
									$quantity=$row_order['quantity'];
									$size=$row_order['size'];
									$order_date=$row_order['order_date'];
									$order_status=$row_order['order_status'];
									$customer_id=$row_order['customer_id'];
									$product_id=$row_order['product_id'];
									
									$get_cust="select * from customer where customer_id='$customer_id'";
									$run_cust=mysqli_query($con, $get_cust);
									$row_cust=mysqli_fetch_array($run_cust);
									$customer_email=$row_cust['customer_email'];
									
									$get_pro="select * from product where customer_id='$product_id'";
									$run_pro=mysqli_query($con, $get_pro);
 									$row_pro=mysqli_fetch_array($run_pro);
									$product_title=$row_pro['product_title'];
									
									$i++;
							?>
							
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $customer_email;?></td>
								<td bgcolor="#EBDF1A"><?php echo $invoice_no;?></td>
								<td><?php echo $product_title;?></td>
								<td><?php echo $quantity;?></td>
								<td><?php echo $size;?></td>
								<td><?php echo $order_date;?></td>
								<td><?php echo $order_status;?></td>
								<td> Rs: <?php echo $due_amount;?></td>
								<td>
									<a href="index.php?deleteOrder=<?php echo $order_id;?>">
										<i class="fas fa-trash-alt"></i> Delete
									</a>
								</td>
								<?php
								}
								?>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
		 }
?>
