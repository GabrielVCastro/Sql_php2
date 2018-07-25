<?php 
	class Profissao{  
	
	public $nome;
	public $descricao;
	public $salario;


	public function limpar($nome, $descricao, $salario){
		$this->nome = $nome;
		$this->descricao = $descricao;
		$salario_1 = str_replace(".", "", $salario);
		$this->salario = $salario_2 = str_replace(",", "", $salario_1);

	}

	public function exibir($ordem){
		include '../communs/conexao.php';
 			$conexao = conexao();
 			$sql = "SELECT * FROM profissao ORDER BY $ordem";
 			$stmt = $conexao->prepare($sql);
 			
 			$stmt->execute();
 			$resultado = $stmt->fetchALL();	
 			return $resultado;

	}

	public function buscar($id){
		include '../communs/conexao.php';
			$conexao = conexao();
			$sql = "SELECT * from profissao where id= :id";
			$stmt = $conexao->prepare($sql);
			$stmt->bindValue(':id',$id);
			$stmt->execute();
			$result = $stmt->fetch();
			return $result;
	}

	public function editar($nome, $descricao, $salario , $id){
			include '../communs/conexao.php';
			$conexao = conexao();
			$sql = "UPDATE profissao SET nome = :nome, descricao = :descricao, salario = :salario  WHERE id = :id ";

			$stmt = $conexao->prepare($sql);
 		$stmt->bindParam(':nome',$nome);
 		$stmt->bindParam(':descricao',$descricao);
 		$stmt->bindParam(':salario',$salario);
 		$stmt->bindParam(':id',$id);

 		if ($stmt->execute()) {
 			return "salvo";
 		}else{
 			return "nao salvo";
 		}

		}

	public function excluir($id){
		
		include '../communs/conexao.php';
			$conexao = conexao();
		$sql = "DELETE from profissao where id = :id";
			$stmt = $conexao->prepare($sql);
			$stmt->bindParam(":id", $id);
			if ($stmt->execute()) {
				return "excluido";
			}else{
				return "erro";
			}

		}

	public function selecionar(){
		include '../communs/conexao.php';
			$conexao = conexao();
			$sql = "SELECT * from profissao ";
			$stmt = $conexao->prepare($sql);
			
			$stmt->execute();
			$result = $stmt->fetchAll();
			return $result;
	}
}

?>