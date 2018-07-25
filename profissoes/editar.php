<?php    
	
	include_once("../communs/header.php");
	include("../classes/Profissao.class.php") ;

	$profissao = new Profissao();
	$retorno = $profissao->editar($_POST['nome'], $_POST['descricao'], $_POST['salario'], $_POST['id']);



	if ($retorno=="salvo") {
		$_SESSION['sucesso'] = "Profissão edita com sucesso!";
		header("Location: exibir_lista.php");
	}else{
		echo "erro";
	}

	include_once("../communs/footer.php");

?>