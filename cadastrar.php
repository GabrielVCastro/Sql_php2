<?php 
session_start();
	include("classes/Pessoa.class.php");
	include 'communs/conexao.php';	
	$pessoa = new Pessoa();
	$today = date("Y-m-d H:i:s");
 	$pessoa->limpar($_POST['nome'], $_POST['email'], $today, $_POST['imagem'], $_POST['cpf'],$_POST['cep'], $_POST['cel'], $_POST['cnpj']);

 		$conexao = conexao();
 		$sql = "INSERT INTO pessoas (id, nome, email, data_hora, imagem,  cpf, cep, celular, cnpj) VALUES('default', :nome, :email, '$today',  :imagem, :cpf, :cep, :celular, :cnpj)";

 		$stmt = $conexao->prepare($sql);
 		$stmt->bindParam(':nome',$pessoa->nome);
 		$stmt->bindParam(':email',$pessoa->email);
 		$stmt->bindParam(':imagem',$pessoa->imagem);
 		$stmt->bindParam(':cpf',$pessoa->cpf);
 		$stmt->bindParam(':cep',$pessoa->cep);
 		$stmt->bindParam(':celular',$pessoa->celular);
 		$stmt->bindParam(':cnpj',$pessoa->cnpj);

 		if ($stmt->execute()) {
 			$_SESSION['sucesso'] = "Usuário cadastrado com sucesso!";
 			header("Location: index.php");
 		}else{
 			$_SESSION['erro'] = "Tente novamente!";
 			header("Location: index.php");
 		}
?>