<?php
	try{
		$con = new PDO("mysql:host=localhost;dbname=mydb","root","");
		$con-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	}catch(PDOException $e){
		echo" failed" . $e->getMessage();
	}
?>