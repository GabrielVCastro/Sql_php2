<?php 
	session_start();
	include("classes/Pessoa.class.php");
	
	$pessoa = new Pessoa();
	$today = date("Y-m-d H:i:s");
	$retorno = $pessoa->editar($_POST['nome'], $_POST['email'], $today, $_POST['imagem'], $_POST['cpf'],$_POST['cep'], $_POST['cel'], $_POST['cnpj'], $_POST['id']);
 
	if ($retorno=="salvo") {
		$_SESSION['sucesso'] = "Usuário editado com sucesso!";
		header("Location: index.php");
	}else{
		header("Location: index.php");
	}

?>