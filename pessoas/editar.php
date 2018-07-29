<?php 
	session_start();
	include("../classes/Pessoa.class.php");
	
	$pessoa = new Pessoa();
	$today = date("Y-m-d H:i:s");
	$retorno = $pessoa->editar($_POST['nome'], $_POST['email'], $today, $_POST['imagem'], $_POST['selecao'] , $_POST['cpf'],$_POST['cep'], $_POST['cel'], $_POST['cnpj'], $_POST['id']);
 
	if ($retorno=="salvo") {
		$_SESSION['sucesso'] = "Usuário editado com sucesso!";
		header("Location: http://localhost/sql_2/pessoas/exibir_lista.php");
	}else{
		header("Location: http://localhost/sql_2/index.php");
	}

?>