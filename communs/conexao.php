<?php 

		
	function conexao(){
		$conexao = 'mysql:host=localhost;dbname=sql_2';
		$user = 'root';
		$pass = '';
		try{
			$pdo = new PDO($conexao, $user, $pass);
			return $pdo;
		}catch(PDOExeption $ex){
			echo 'Erro'.$ex->getMessage();
		}
		}
		


?> 