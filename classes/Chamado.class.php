<?php 
	class Chamado{

		public $id_pessoa;
		public $titulo;
		public $descricao;

		public function exibir_lista(){
			include("../communs/conexao.php");

			$sql = "SELECT chamado.id, pessoas.nome as pessoa , chamado.titulo, chamado.descricao, chamado.solucao ,chamado.status  FROM chamado inner join pessoas on  chamado.id_pessoa = pessoas.id";
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			$resultado = $stmt->fetchALL();
			if (count($resultado)>0) {
				return $resultado;
			}
		}


		public function exibir_chamado($id){
			include("../communs/conexao.php");

			$sql = "SELECT * FROM chamado where id = :id";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':id',$id);
			$stmt->execute();
			$resultado = $stmt->fetchALL();
			if (count($resultado)>0) {
				return $resultado;
			}
		}

		public function excluir($id){
			include("../communs/conexao.php");
			$sql = "DELETE  FROM chamado where id = :id";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(":id", $id);
			if ($stmt->execute()) {
				return  true;

			}
		}
		public function editar_chamado($id, $status, $solucao){
			include("../communs/conexao.php");
			$sql = "UPDATE chamado SET solucao = :solucao ,status = :status  WHERE id = :id";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':status', $status);
			$stmt->bindParam(':solucao', $solucao);
			if ($stmt->execute()) {
	 			return true;
	 		}
		}







	}


?>