<?php 

		

	
	$user = 'root';
	$pass = '';
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=sql_2', $user, $pass);
		return $pdo;
	}catch(PDOExeption $ex){
		echo 'Erro'.$ex->getMessage();
		
	}

		


?> 