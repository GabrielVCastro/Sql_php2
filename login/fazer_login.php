<?php  
	session_start();
	include('../classes/Admim.class.php');

	$adm = new Admim();
	$teste = $adm->fazer_login($_POST['email'], $_POST['senha']);
 	
	$codificada = hash('sha512', hash('sha512', $_POST['senha'])); 
	
 	foreach ($teste as $key => $item) {
 		if (($item['email']==$_POST['email']) && ($item['senha']==$codificada)) {
 			$_SESSION['logado'] = $teste;
 			header("Location: ../index.php");
 		}
 		
 	}
	

 	if (!isset($_SESSION['logado'])) {
 		$_SESSION['erro'] = "Usuário ou senha inválidos";
 		
 		header("Location: login.php");
 	}



?>