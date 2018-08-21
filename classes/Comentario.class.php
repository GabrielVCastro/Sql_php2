<?php    
	class Comentario{

		
		public $id_chamado;
		public $data_hora;


		public function exibir_comentario($id){
			include('../communs/conexao.php');
			$sql = "SELECT comentario.* , chamado.titulo from comentario inner join chamado on chamado.id = comentario.id_chamado  where chamado.id = :id";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':id',$id);
			$stmt->execute();
 			$result = $stmt->fetchAll();
 			return $result;

		}

		public function buscar_chamada($id){
			include('../communs/conexao.php');
			$sql = "SELECT  chamado.* from chamado inner join pessoas on pessoas.id = chamado.id_pessoa where chamado.id = :id  ";
			$stmt = $pdo->prepare($sql);
			$stmt->bindParam(':id',$id);
			$stmt->execute();
			$result = $stmt->fetchAll();
			return $result;	

		}


	}



?>