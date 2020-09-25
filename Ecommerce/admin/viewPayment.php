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
				<i class=" fa fa-dashboard"></i> Dashboard / View Payment
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class=" panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fas fa-credit-card"></i> View Payment
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<td> Payment No </td>
								<td> Transitation No </td>
								<td> Invoice No </td>
								<td> Amount </td>
								<td> Payment Mode </td>
								<td> Payment Date </td>
								<td> Delete Payment </td>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=0;
								$get_payment="select * from payment";
								$run_payment=mysqli_query($con,$get_payment);
								while($row_payment=mysqli_fetch_array($run_payment)){
									$payment_id=$row_payment['payment_id'];
									$invoice_id=$row_payment['invoice_id'];
									$amount=$row_payment['amount'];
									$payment_mode=$row_payment['payment_mode'];
									$reference_no=$row_payment['reference_no'];
									$payment_date=$row_payment['payment_date'];
									$i++;
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $reference_no;?></td>
								<td bgcolor="#F2FD00"><?php echo $invoice_id;?></td>
								<td><?php echo $amount;?></td>
								<td><?php echo $payment_mode;?></td>
								<td><?php echo $payment_date;?></td>
								<td>
									<a href="index.php?deletePayment=<?php echo $payment_id;?>">
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