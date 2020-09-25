
<div id='bodyright'>
	
	<?php if(isset($_GET['edit_lang'])){ 
		echo edit_lang();
	} else{ 
	?>
	
	<h3>View all categories</h3>
	<div id='add'>
		<details>
			<summary>Add Launguage </summary>	
			<form method="post" enctype="multipart/form-data">					
				<input type="text" name="lang_name" placeholder="Enter Launguage Name"</input>
				<center><button name="add_lang"  > Add Launguage </button></center> 
			</form>
		</details>
		<table cellspacing="0">
			<tr>
				<th>Sr No.</th>
				<th>Launguages  </th>
				<th >Action</th>
			</tr>
			<?php echo view_lang(); ?>
		</table>	
	</div>
</div>

<?php echo add_lang(); } ?>