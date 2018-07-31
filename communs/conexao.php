<?php 

		

	
	$user = 'root';
	$pass = '';

	try{
		$pdo = new PDO('mysql:host=localhost;dbname=sql_2', $user, $pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );

		return $pdo;
	}catch(PDOExeption $ex){
		echo 'Erro'.$ex->getMessage();
		
	}

		


?> 