<?php 
	session_start();
	include("../classes/Chamado.class.php");
	
if ($_POST['status']==3) {
		if ($_POST['solucao']=="") {
		$_SESSION['erro'] = "Aplique uma solução antes de declarar o status como feito!";
		header("Location: exibir_lista.php");
	}else{
		$chamado = new Chamado();
		$retorno = $chamado->editar_chamado($_POST['id'] ,$_POST['status'], $_POST['solucao']);
		if ($retorno) {
			$_SESSION['sucesso'] = "Status modificado com sucesso!";
			
			header("Location: exibir_lista.php");

		}else{
			header("Location: exibir_lista.php");
		}
	}
}else{
	$chamado = new Chamado();
		$retorno = $chamado->editar_chamado($_POST['id'] ,$_POST['status'], $_POST['solucao']);
		if ($retorno) {
			$_SESSION['sucesso'] = "Status modificado com sucesso!";
			
			header("Location: exibir_lista.php");

		}else{
			header("Location: exibir_lista.php");
		}

}



		
 	

	



?>