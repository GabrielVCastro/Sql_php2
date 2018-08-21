<?php 
	session_start();
	include("../classes/Chamado.class.php");
	$chamado = new Chamado();
	$retorno = $chamado->excluir($_GET['excluir']);
	if ($retorno) {
		$_SESSION['sucesso'] = 'Excluído com sucesso!';
		header("Location: exibir_lista.php");

	}else{
		header("Location: exibir_lista.php");
	}


?>