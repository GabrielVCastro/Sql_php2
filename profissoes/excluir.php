<?php
	session_start();	
	include("../classes/Profissao.class.php");

	$profissao = new Profissao();
	$retorno = $profissao->excluir($_GET['excluir']);


	if ($retorno == "excluido") {
		$_SESSION['sucesso'] = "Usuário excluido com sucesso!";
		header("Location: exibir_lista.php");

	}else{
		$_SESSION['erro'] = "Existe pessoas exercendo esta profissão!";
		header("Location: exibir_lista.php");
	}


?>