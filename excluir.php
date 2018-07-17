<?php 
	session_start();
	include("classes/Pessoa.class.php");
	$pessoa = new Pessoa();

	$retorno = $pessoa->excluir($_GET['excluir']);
	if ($retorno == "excluido") {
		$_SESSION['sucesso'] = "Usuário excluido com sucesso!";
		header("Location: index.php");

	}else{
		header("Location: index.php");
	}
?>