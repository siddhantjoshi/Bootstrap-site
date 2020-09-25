
<div id='bodyright'>
	
	<?php if(isset($_GET['edit_cat'])){ 
		echo edit_cat();
	} else{ 
	?>
	
	<h3>View all FAQ's</h3>
	<div id='add'>
		<details style="width: 40%">
			<summary>Add FAQ's</summary>	
			<form method="post" enctype="multipart/form-data">					
				<input type="text" name="question" placeholder="Enter question"</input>
				<textarea name="answer" placeholder="Enter answer"></textarea>
				<center><button  name="add_faqs">Add FAQs</button></center> 
			</form>
		</details><br>
	<?php echo view_faqs() ;?>
	</div>
</div>

<?php echo add_faqs(); } ?>