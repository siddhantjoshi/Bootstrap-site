<?php

	function select_cat(){
		include("inc/db.php");
		$get_cat=$con->prepare("select * from cat");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		while($row=$get_cat->fetch()):
			echo"<option value='".$row['cat_id']."'>".$row['cat_name']."</option>";
		endwhile;
	}


	function add_cat(){
		include("inc/db.php");
		if(isset($_POST['add_cat'])){
			$cat_name=$_POST['cat_name'];
			$cat_icon=$_POST['cat_icon'];
			
			
			$check=$con->prepare("select * from cat where cat_name='$cat_name'");
			$check->setFetchMode(PDO:: FETCH_ASSOC);
			$check->execute();
			$count=$check->rowCount();
			
			if($count==1){
				echo"<script>alert('Category exist')</script>";
				echo"<script>window.open('index.php?cat','_self')</script>";
			}else{
				$add_cat=$con->prepare("insert into cat(cat_name,cat_icon)values('$cat_name','$cat_icon')");
				if($add_cat->execute()){
					echo"<script>alert('category added sucessfully')</script>";
					echo"<script>window.open('index.php?cat','_self')</script>";
				}else{
					echo"<script>alert('category not added sucessfully')</script>";
					echo"<script>window.open('index.php?cat','_self')</script>";
				}	
			}
		}
	}
	
	function edit_cat(){
		include("inc/db.php");
		
		if(isset($_GET['edit_cat'])){
			$id=$_GET['edit_cat'];
			
			$get_cat=$con->prepare("select * from cat where cat_id='$id'");
			$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat->execute();
			$row=$get_cat->fetch();
			
			echo "
			<h3>Edit Categories</h3>
				<form id='edit_form' method='post' enctype='multipart/form-data'>					
					<input type='text' name='cat_name' value='".$row['cat_name']."' placeholder='Enter Category Name'</input>
					<input type='text' name='cat_icon' value='".$row['cat_icon']."'  placeholder='Enter Category icon code'</input>
					<center><button name='edit_cat'>Edit Category</button></center> 
				</form>"
			;
			
			if(isset($_POST['edit_cat'])){
				$cat_name=$_POST['cat_name'];
				$cat_icon=$_POST['cat_icon'];
				
				$up=$con->prepare("update cat set cat_name='$cat_name',cat_icon='$cat_icon' where cat_id='$id'");
				if($up->execute()){
					echo"<script>alert('category updated sucessfully')</script>";
					echo"<script>window.open('index.php?cat','_self')</script>";
				}else{
					echo"<script>alert('category not updated sucessfully')</script>";
					echo"<script>window.open('index.php?cat','_self')</script>";
				}	
			}
		}
	}
	
	function view_cat(){
		include("inc/db.php");
		$get_cat=$con->prepare("select * from cat");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		$i=1;
		while($row=$get_cat->fetch()):
			echo"<tr>
					<td>".$i++."</td>
					<td>".$row['cat_icon']."".$row['cat_name']."</td>
					<td>
						<a href='index.php?cat&edit_cat=".$row['cat_id']."'><i class='fas fa-edit'></i></a>
						<a style='color: #FF0000; margin: 5%' href='index.php?cat&del_cat=".$row['cat_id']."'><i class='fas fa-trash-alt'></i></a>
					</td>
				</tr>";
		endwhile;
		
		if(isset($_GET['del_cat'])){
			$id=$_GET['del_cat'];
			$del=$con->prepare("delete from cat where cat_id='$id'");
			if($del->execute()){
				echo"<script>alert('Category deleted sucessfully')</script>";
				echo" <script>window.open('index.php?cat','_self')</script>";
			}else{
				echo"<script>alert('Unable to delete category')</script>";
				echo" <script>window.open('index.php?cat','_self')</script>";
			}
		}
	}


	function add_sub_cat(){
		include("inc/db.php");
		if(isset($_POST['add_sub_cat'])){
			$cat_name=$_POST['sub_cat_name'];
			$cat_id=$_POST['cat_id'];
			
			$check=$con->prepare("select * from sub_cat where sub_cat_name='$cat_name'");
			$check->setFetchMode(PDO:: FETCH_ASSOC);
			$check->execute();
			$count=$check->rowCount();
			
			if($count==1){
				echo"<script>alert('Sub-category exist')</script>";
				echo"<script>window.open('index.php?sub_cat','_self')</script>";
			}else{
				$add_cat=$con->prepare("insert into sub_cat(sub_cat_name,cat_id)values('$cat_name','$cat_id')");
				if($add_cat->execute()){
					echo"<script>alert('Sub-category added sucessfully')</script>";
					echo"<script>window.open('index.php?sub_cat','_self')</script>";
				}else{
					echo"<script>alert('Sub-category not added sucessfully')</script>";
					echo"<script>window.open('index.php?sub_cat','_self')</script>";
				}	
			}
		}
	}
	
	function view_sub_cat(){
		
		include("inc/db.php");
		$get_cat=$con->prepare("select * from sub_cat");
		$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
		$get_cat->execute();
		$i=1;
		while($row=$get_cat->fetch()):
			$id=$row['cat_id'];
			$get_c=$con->prepare("select * from cat where cat_id='$id'");
			$get_c->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c->execute();
			$row_cat=$get_c->fetch();
			echo"<tr>
					<td>".$i++."</td>
					<td>".$row['sub_cat_name']."</td>
					<td>".$row_cat['cat_name']."</td>					
					<td>
						<a href='index.php?sub_cat&edit_sub_cat=".$row['sub_cat_id']."'><i class='fas fa-edit'></i></a>
						<a style='color: #FF0000; margin: 5%' href='index.php?sub_cat&del_sub_cat=".$row['sub_cat_id']."'><i class='fas fa-trash-alt'></i></a>
					</td>
					
				</tr>";
		endwhile;
		
		if(isset($_GET['del_sub_cat'])){
			$id=$_GET['del_sub_cat'];
			$del=$con->prepare("delete from sub_cat where sub_cat_id='$id'");
			if($del->execute()){
				echo"<script>alert('Sub-category deleted sucessfully')</script>";
				echo" <script>window.open('index.php?sub_cat','_self')</script>";
			}else{
				echo"<script>alert('Unable to delete sub-category')</script>";
				echo" <script>window.open('index.php?sub_cat','_self')</script>";
			}
		}
		
	}

	function edit_sub_cat(){
		include("inc/db.php");
		
		if(isset($_GET['edit_sub_cat'])){
			$id=$_GET['edit_sub_cat'];
			
			$get_cat=$con->prepare("select * from sub_cat where sub_cat_id='$id'");
			$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat->execute();
			$row=$get_cat->fetch();
			
			$cat_id=$row['cat_id'];
			
			$get_c=$con->prepare("select * from cat where cat_id='$cat_id'");
			$get_c->setFetchMode(PDO:: FETCH_ASSOC);
			$get_c->execute();
			$row_cat=$get_c->fetch();
			echo "
				<h3>Edit Sub Categories</h3>
				<form id='edit_form' method='post' enctype='multipart/form-data'>					
				<select name='cat_id'>
				<option>".$row_cat['cat_name']."</option>"
				;
			
			echo select_cat() ;
			echo"
				</select>
					<input type='text' name='sub_cat_name' value='".$row['sub_cat_name']."' placeholder='Enter Category Name'</input>
					<center><button name='edit_sub_cat'>Edit Category</button></center> 
				</form>"
				;
			
			if(isset($_POST['edit_sub_cat'])){
				$cat_name=$_POST['sub_cat_name'];
				
				$check=$con->prepare("select * from sub_cat where sub_cat_name='$cat_name'");
				$check->setFetchMode(PDO:: FETCH_ASSOC);
				$check->execute();
				$count=$check->rowCount();
				if($count==1){
					echo"<script>alert('Sub Category exist')</script>";
					echo"<script>window.open('index.php?sub_cat','_self')</script>";
				}else{
					$up=$con->prepare("update sub_cat set sub_cat_name='$cat_name' where sub_cat_id='$id'");
					if($up->execute()){
						echo"<script>alert('category updated sucessfully')</script>";
						echo"<script>window.open('index.php?sub_cat','_self')</script>";
					}else{
						echo"<script>alert('Sub category not updated ')</script>";
						echo"<script>window.open('index.php?sub_cat','_self')</script>";
					}	
				}
			}
		}
	}


	function add_lang(){
		include("inc/db.php");
		if(isset($_POST['add_lang'])){
			$lang_name=$_POST['lang_name'];
			
			$check=$con->prepare("select * from lang where lang_name='$lang_name'");
			$check->setFetchMode(PDO:: FETCH_ASSOC);
			$check->execute();
			$count=$check->rowCount();
			if($count==1){
				echo"<script>alert('Launguage exist')</script>";
				echo"<script>window.open('index.php?lang','_self')</script>";
			}else{
				$add_cat=$con->prepare("insert into lang(lang_name)values('$lang_name')");
				if($add_cat->execute()){
					echo"<script>alert('New Launguage added sucessfully')</script>";
					echo"<script>window.open('index.php?lang','_self')</script>";
				}else{
					echo"<script>alert('Launguage not added sucessfully')</script>";
					echo"<script>window.open('index.php?lang','_self')</script>";
				}	
			}
		}
	}

	function view_lang(){
		include("inc/db.php");
		$get_lang=$con->prepare("select * from lang");
		$get_lang->setFetchMode(PDO:: FETCH_ASSOC);
		$get_lang->execute();
		$i=1;
		while($row=$get_lang->fetch()):
			echo"<tr>
					<td>".$i++."</td>
					<td>".$row['lang_name']."</td>
					<td>
						<a href='index.php?lang&edit_lang=".$row['lang_id']."'><i class='fas fa-edit'></i></a>
						<a style='color: #FF0000; margin: 5%' href='index.php?lang&del_lang=".$row['lang_id']."'><i class='fas fa-trash-alt'></i></a>
					</td>
				</tr>";
		endwhile;
		
		if(isset($_GET['del_lang'])){
			$id=$_GET['del_lang'];
			$del=$con->prepare("delete from lang where lang_id='$id'");
			if($del->execute()){
				echo"<script>alert('Launguage deleted sucessfully')</script>";
				echo" <script>window.open('index.php?lang','_self')</script>";
			}else{
				echo"<script>alert('Unable to delete launguage')</script>";
				echo" <script>window.open('index.php?lang','_self')</script>";
			}
		}
	}
	
	function edit_lang(){
		include("inc/db.php");
		
		if(isset($_GET['edit_lang'])){
			$id=$_GET['edit_lang'];
			
			$get_lang=$con->prepare("select * from lang where lang_id='$id'");
			$get_lang->setFetchMode(PDO:: FETCH_ASSOC);
			$get_lang->execute();
			$row=$get_lang->fetch();
			
			echo "
			<h3>Edit Launguage</h3>
				<form id='edit_form' method='post' enctype='multipart/form-data'>					
					<input type='text' name='lang_name' value='".$row['lang_name']."' placeholder='Enter launguage Name'</input>
					<center><button name='edit_lang'>Edit launguage</button></center> 
				</form>"
			;
			
			if(isset($_POST['edit_lang'])){
				$lang_name=$_POST['lang_name'];
				
				$check=$con->prepare("select * from lang where lang_name='$lang_name'");
				$check->setFetchMode(PDO:: FETCH_ASSOC);
				$check->execute();
				$count=$check->rowCount();
				if($count==1){
					echo"<script>alert('Launguage exist')</script>";
					echo"<script>window.open('index.php?lang','_self')</script>";
				}else{
					$up=$con->prepare("update lang set lang_name='$lang_name' where lang_id='$id'");
					if($up->execute()){
						echo"<script>alert('Launguage updated sucessfully')</script>";
						echo"<script>window.open('index.php?lang','_self')</script>";
					}else{
						echo"<script>alert('Unable to update launguage')</script>";
						echo"<script>window.open('index.php?lang','_self')</script>";
					}	
				}
			}
		}
	}

	
	function view_term(){
		
		include("inc/db.php");
		$get_c=$con->prepare("select * from term ");
		$get_c->setFetchMode(PDO:: FETCH_ASSOC);
		$get_c->execute();
		$i=1;
		while( $row=$get_c->fetch()):		
			echo"<tr>
					<td>".$i++."</td>
					<td>".$row['term']."</td>
					<td>".$row['for_whom']."</td>					
					<td>
						<a href='index.php?terms&edit_term=".$row['t_id']."'><i class='fas fa-edit'></i></a>
						<a  style='color: #FF0000; margin: 5% ' href='index.php?terms&del_term=".$row['t_id']."'><i class='fas fa-trash-alt'></i></a>
					</td>

				</tr>";
		endwhile;
		
		if(isset($_GET['del_term'])){
			$id=$_GET['del_term'];
			$del=$con->prepare("delete from term where t_id='$id'");
			if($del->execute()){
				echo"<script>alert('Terms and conditions deleted')</script>";
				echo" <script>window.open('index.php?terms','_self')</script>";
			}else{
				echo"<script>alert('Unable to delete Terms and conditions')</script>";
				echo" <script>window.open('index.php?terms','_self')</script>";
			}
		}
		
	}
	
	function add_term(){
		include("inc/db.php");
		if(isset($_POST['add_term'])){
			$cat_name=$_POST['term'];
			$cat_id=$_POST['for_whom'];
			
			$check=$con->prepare("select * from term where term='$cat_name'");
			$check->setFetchMode(PDO:: FETCH_ASSOC);
			$check->execute();
			$count=$check->rowCount();
			
			if($count==1){
				echo"<script>alert('Terms and conditions exist')</script>";
				echo"<script>window.open('index.php?terms','_self')</script>";
			}else{
				$add_cat=$con->prepare("insert into term(term,for_whom)values('$cat_name','$cat_id')");
				if($add_cat->execute()){
					echo"<script>alert('Terms and conditions added sucessfully')</script>";
					echo"<script>window.open('index.php?terms','_self')</script>";
				}else{
					echo"<script>alert('something went wrong')</script>";
					echo"<script>window.open('index.php?terms','_self')</script>";
				}	
			}
		}
	}

	function edit_term(){
		include("inc/db.php");
		
		if(isset($_GET['edit_term'])){
			$id=$_GET['edit_term'];
			
			$get_cat=$con->prepare("select * from term where t_id='$id'");
			$get_cat->setFetchMode(PDO:: FETCH_ASSOC);
			$get_cat->execute();
			$row=$get_cat->fetch();
			
			echo "
				<h3>Edit terms & conditions</h3>
				<form id='edit_form' method='post' enctype='multipart/form-data'>					
				<select name='for_whom'>
				<option value='".$row['for_whom']."'>".$row['for_whom']."</option>
				<option value='Student'>Student</option>
				<option value='Instructor'>Instuctor</option>"
				;
			
			echo"
				</select>
					<input type='text' name='term' value='".$row['term']."' placeholder='Enter new terms and conditions'</input>
					<center><button name='edit_t'>Edit terms and conditions</button></center> 
				</form>"
				;
			
			if(isset($_POST['edit_t'])){
				$cat_name=$_POST['term'];
				$cat_id=$_POST['for_whom'];
				
				
				$up=$con->prepare("update term set term='$cat_name' ,for_whom='$cat_id' where t_id='$id'");
				if($up->execute()){
					echo"<script>alert('terms and conditions updated')</script>";
					echo"<script>window.open('index.php?terms','_self')</script>";
				}else{
					echo"<script>alert('Something when wrong ')</script>";
					echo"<script>window.open('index.php?terms','_self')</script>";
				}	
			}
		}
	}

	function contact(){
		include("inc/db.php");
		$get_con=$con->prepare("select * from contact");
		$get_con->setFetchMode(PDO:: FETCH_ASSOC);
		$get_con->execute();
		$row=$get_con->fetch();
		echo " 
		<form method='post' enctype='multipart/form-data'>					
			<table>
				<tr>
					<td>Update contact number </td>
					<td><input type='tel' value='".$row['phone']."' name='phone'</input></td>
				</tr>
				<tr>
					<td>Update email </td>
					<td><input type='email' value='".$row['email']."' name='email'</input></td>
				</tr>
				<tr>
					<td>Update Address line 1</td>
					<td><input type='text'value='".$row['add1']."' name='add1'</input></td>
				</tr>
				<tr>
					<td>Update  Address line 2</td>
					<td><input type='text'value='".$row['add2']."' name='add2'</input></td>
				</tr>
				<tr>
					<td>Youtube link </td>
					<td><input type='text' value='".$row['youtube']."' name='youtube'</input></td>
				</tr>
				<tr>
					<td>Facebook link </td>
					<td><input type='text'value='".$row['facebook']."' name='facebook'</input></td>
				</tr>
				<tr>
					<td>Google-plus link </td>
					<td><input type='text' value='".$row['google_plus']."' name='google_plus'</input></td>
				</tr>
				<tr>
					<td>Twitter link </td>
					<td><input type='text' value='".$row['twitter']."'name='twitter'</input></td>
				</tr>
				<tr>
					<td>Linkedin link </td>
					<td><input type='text' value='".$row['linkdin']."' name='linkdin'</input></td>
				</tr>
			</table>
			<center><button name='up_con'> Save details</button></center> 
		</form>
		";
		
		if(isset($_POST['up_con'])){
			$phone=$_POST['phone'];
			$email=$_POST['email'];
			$add1=$_POST['add1'];
			$add2=$_POST['add2'];
			$youtube=$_POST['youtube'];
			$facebook=$_POST['facebook'];
			$google_plus=$_POST['google_plus'];
			$twitter=$_POST['twitter'];
			$linkdin=$_POST['linkdin'];
			
			$up=$con->prepare(
				"update contact set phone='$phone',email='$email',add1='$add1',add2='$add2',youtube='$youtube',
				facebook='$facebook',google_plus='$google_plus',twitter='$twitter',linkdin='$linkdin'");
			if($up->execute()){
				echo "<script>window.open('index.php?contact','_self')</script> ";
			}
		}
	}

	
	function add_faqs(){
		include("inc/db.php");
		
		if(isset($_POST['add_faqs'])){
			$question=$_POST['question'];
			$answer=$_POST['answer'];
			
			$check=$con->prepare("select * from faqs where question='$question'");
			$check->setFetchMode(PDO:: FETCH_ASSOC);
			$check->execute();
			$count=$check->rowCount();
			if($count==1){
				echo"<script>alert('FAQs exist')</script>";
				echo"<script>window.open('index.php?faqs','_self')</script>";
			}else{
				$faq=$con->prepare("insert into faqs(question,answer) values('$question','$answer')");
				if($faq->execute()){
					echo"<script>alert('New FAQs added sucessfully')</script>";
					echo"<script>window.open('index.php?faqs','_self')</script>";
				}else{
					echo"<script>alert('Something went wrong')</script>";
					echo"<script>window.open('index.php?faqs','_self')</script>";
				}	
			}
		}
	}
	
	function view_faqs(){
		include("inc/db.php");
		$get_faqs=$con->prepare(" select * from faqs");
		$get_faqs->setFetchMode(PDO:: FETCH_ASSOC);
		$get_faqs->execute();
		while($row=$get_faqs->fetch()):
			
			echo "
				<details>
				<summary>".$row['question']."</summary>	
				<form method='post' enctype='multipart/form-data'>					
					<input type='text'  value='".$row['question']."' name='up_question' placeholder='Enter question'</input>
					<input type='hidden' name='id' value='".$row['q_id']."'>
					<textarea name='up_answer' placeholder='Enter answer' >".$row['question']."</textarea>
					<center><button name='up_add_faqs' > Update FAQ's</button></center> 
				</form>
			</details>
			<br>
			";
		endwhile;
		if(isset($_POST['up_add_faqs'])){
			$question=$_POST['up_question'];
			$answer=$_POST['up_answer'];
			$id=$_POST['id'];
			
			
			$up_faq=$con->prepare("update faqs set question='$question',answer='$answer' where q_id='$id'");
			if($up_faq->execute()){
				echo"<script>alert('FAQs updated')</script>";
				echo"<script>window.open('index.php?faqs','_self')</script>";
			}else{
				echo"<script>alert('Something went wrong')</script>";
				echo"<script>window.open('index.php?faqs','_self')</script>";
			}	
		}
	}

	function about(){
		include("inc/db.php");
		$about=$con->prepare(" select * from about");
		$about->setFetchMode(PDO:: FETCH_ASSOC);
		$about->execute();
		$row=$about->fetch();
		echo"
		<form method='post'>
			<textarea name='about'>".$row['about']."</textarea>
			<center><button name='up_about'> Save </button></center>
		</form>
		";
		if(isset($_POST['up_about'])){
			$info=$_POST['about'];
			$up_about=$con->prepare("update about set about='$info'");
			if($up_about->execute()){
				echo"<script>alert('Infromation updated')</script>";
				echo"<script>window.open('index.php?about','_self')</script>";
			}else{
				echo"<script>alert('Something went wrong')</script>";
				echo"<script>window.open('index.php?about','_self')</script>";
			}
			
		}
		
	}
?>










