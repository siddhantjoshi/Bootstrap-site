
<div id='bodyright'>
	
	<?php if(isset($_GET['edit_term'])){ 
		echo edit_term();
	} else{ 
	?>
	
	<h3>View all Terms & Conditions </h3>
	<div id='add'>
		<details>
			<summary>Add New Terms & Conditions </summary>	
			<form method="post" enctype="multipart/form-data">	
				<select name="for_whom" required>
					<option value=""> Select terms & conditions for</option>
					<option value="Student">Student</option>
					<option value="Instructor">Instuctor</option>
				</select>
				<input type="text" name="term" placeholder="Add New Terms & Conditions"</input>
				<center><button name="add_term"  > Add Terms & Conditions</button></center> 
			</form>
		</details>
		<table cellspacing="0">
			<tr>
				<th>Sr No.</th>
				<th>Terms & Conditions  </th>
				<th>User</th>
				<th>Action</th>
			</tr>
			<?php echo view_term(); ?>
		</table>	
	</div>
</div>

<?php echo add_term(); } ?>