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
				<i class=" fa fa-dashboard"></i> Dashboard / View User
			</li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class=" panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					<i class="fas fa-user"></i> View User
				</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<td> Customer ID </td>
								<td> User Name </td>
								<td> User Email</td>
								<td> User Country</td>
								<td> User Contact</td>
								<td> Admin Level</td>
								<td> About User</td>
								<td> User Image</td>
								<td> User Delete </td>
							</tr>
						</thead>
						<tbody>
							<?php
								$i=0;
								$get_admin="select * from admin";
								$run_admin=mysqli_query($con,$get_admin);
								while($row_admin=mysqli_fetch_array($run_admin)){
									$admin_id=$row_admin['admin_id'];
									$admin_name=$row_admin['admin_name'];
									$admin_email=$row_admin['admin_email'];
									$admin_image=$row_admin['admin_image'];
									$admin_contact=$row_admin['admin_contact'];
									$admin_country=$row_admin['admin_country'];
									$admin_level=$row_admin['admin_level'];
									$about_admin=$row_admin['about_admin'];
									$i++;
							?>
							<tr>
								<td><?php echo $i;?></td>
								<td><?php echo $admin_name;?></td>
								<td><?php echo $admin_email;?></td>
								<td><?php echo $admin_country;?></td>
								<td><?php echo $admin_contact;?></td>
								<td><?php echo $admin_level;?></td>
								<td><?php echo $about_admin;?></td>
								<td>
									<img src="image/admin_image/<?php echo $admin_image;?>" width="70" height="70">
								</td>
								<td>
									<a href="index.php?deleteUserProfile=<?php echo $admin_id;?>">
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