<?php 
		session_start();
		include("../communs/conexao.php");
		$sql = "INSERT INTO chamado (id, id_pessoa, titulo, descricao, status) VALUES ('default', :id_pessoa, :titulo, :descricao, '1')";

		$stmt = $pdo->prepare($sql);
		$stmt->bindParam(':id_pessoa',$_POST['nome']);
		$stmt->bindParam(':titulo',$_POST['titulo']);
		$stmt->bindParam(':descricao',$_POST['descricao']);

		if ($stmt->execute()) {
			$_SESSION['sucesso'] = "Chamado enviada com sucesso!";
			header("Location: ../index.php");
		}else{
			$_SESSION['erro'] = "Tente novamente!";
			header("Location: ../index.php");
		}
?> 		