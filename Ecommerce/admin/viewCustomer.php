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
				<i class=" fa fa-dashboard"></i> Dashboard / View Customer
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class=" panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fas fa-users"></i> View Customer
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<td> Customer ID </td>
								<td> Customer Name </td>
								<td> Customer Email</td>
								<td> Customer Country</td>
								<td> Customer City</td>
								<td> Customer Contact</td>
								<td> Customer Address</td>
								<td> Customer Image</td>
								<td> Customer Delete </td>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=0;
								$get_cust="select *from customer";
								$run_cust=mysqli_query($con,$get_cust);
								while($row_cust=mysqli_fetch_array($run_cust)){
									$customer_id=$row_cust['customer_id'];
									$customer_name=$row_cust['customer_name'];
									$customer_email=$row_cust['customer_email'];
									$customer_country=$row_cust['customer_country'];
									$customer_city=$row_cust['customer_city'];
									$customer_address=$row_cust['customer_address'];
									$customer_contact=$row_cust['customer_contact'];
									$customer_image=$row_cust['customer_image'];
									$i++;
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $customer_name;?></td>
								<td><?php echo $customer_email;?></td>
								<td><?php echo $customer_country;?></td>
								<td><?php echo $customer_city;?></td>
								<td><?php echo $customer_address;?></td>
								<td><?php echo $customer_contact;?></td>
								<td>
									<img src="../customer/customer_image/<?php echo $customer_image;?>" width="70" height="70">
								</td>
								<td>
									<a href="index.php?deleteCustomer=<?php echo $customer_id;?>">
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