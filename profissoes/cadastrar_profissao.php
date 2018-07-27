<?php 
	session_start();
	include("../classes/Profissao.class.php");
	include '../communs/conexao.php';	
	$profissao = new Profissao();
	$profissao->limpar($_POST['nome'], $_POST['descricao'], $_POST['salario']);


	$sql = "INSERT INTO profissao (id, nome, descricao, salario) VALUES('default', :nome, :descricao, :salario )";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':nome',$profissao->nome);
	$stmt->bindParam(':descricao',$profissao->descricao);
	$stmt->bindParam(':salario',$profissao->salario);


	if ($stmt->execute()) {
		 $_SESSION['sucesso'] = "Profissao cadastrada com sucesso!";
		header("Location: http://localhost/sql_2/index.php");
	}else{
		 $_SESSION['erro'] = "Tente novamente!";
		header("Location: http://localhost/sql_2/index.php");
	}
 	
