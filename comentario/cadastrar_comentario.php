<?php
	session_start();
	include("../communs/conexao.php");
	$today = date("Y-m-d H:i:s");
	$id_chamado = $_POST['id_chamado'];
	$sql  = "INSERT INTO  comentario (id, id_chamado, data_hora, comentario) VALUES('default', :id_chamado, :data_hora, :comentario )";
	
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':id_chamado',$id_chamado);
	$stmt->bindParam(':data_hora',$today);
	$stmt->bindParam(':comentario',$_POST['comentario']);

	if ($stmt->execute()) {
		 $_SESSION['sucesso'] = "Comentário feito com sucesso!!";
		
		header("Location: comentario.php?chamado=".$id_chamado);
	}else{
		$_SESSION['erro'] = "Tente novamente!";
		header("Location: comentario.php");
	}
 		

	



 ?>