<?php 
	class Pessoa{

		public $nome;
		public $email;
		public $data;
		public $imagem;
		public $profissao_id;
		public $cidade_id;
		public $cpf;
		public $cep;
		public $celular;
		public $cnpj;

		

		public function limpar($nome, $email, $data, $imagem, $profissao_id, $cidade_id , $cpf, $cep, $cel, $cnpj){
		$this->nome = $nome;
		$this->email = $email;


		$this->data = str_replace("/", "-", $data);
		$this->imagem = $imagem;
		$this->profissao_id = $profissao_id;
		
		$this->cidade_id = $cidade_id	;
		$cpf_1 = str_replace(".", "", $cpf);
		$this->cpf = str_replace("-", "", $cpf_1);
		$cnpj_1 = str_replace(".", "", $cnpj);
		$cnpj_2 = str_replace("/", "", $cnpj_1);
		$this->cnpj = str_replace("-", "", $cnpj_2);
		$this->cep = str_replace("-", "", $cep);
		$celular_1 = str_replace("(", "", $cel);
		$celular_2 = str_replace(")", "", $celular_1);
		

		$celular_3 = str_replace("-", "", $celular_2);
		$this->celular = str_replace(" ", "", $celular_3);
		
 		}

 		public function buscar($id){
 			include('../communs/conexao.php');
 			
 			$sql = "SELECT  * from pessoas where id = :id";
 			$stmt = $pdo->prepare($sql);
 			$stmt->bindValue(':id',$id);
 			$stmt->execute();
 			$result = $stmt->fetch();
 			
 			return $result;
 			
 		}

 		public function exibir($parametro){
 			include('../communs/conexao.php');
 			
 			$sql = "SELECT pessoas.id ,pessoas.nome, pessoas.email, pessoas.cpf, pessoas.cep, pessoas.celular, pessoas.cnpj, profissao.nome as profissao_id, cidade.nome as cidade_id from pessoas inner join profissao on profissao.id = pessoas.profissao_id inner join cidade on pessoas.cidade_id = cidade.id ;";
 			$stmt = $pdo->prepare($sql);
 			
 			$stmt->execute();
 			$resultado = $stmt->fetchALL();
 		
 			return $resultado;
 		}

 		public function editar($nome, $email, $data, $imagem, $profissao_id, $cidade, $cpf, $cep, $cel, $cnpj,$id){
 			include('../communs/conexao.php');
 			
 			$sql = "UPDATE pessoas SET nome = :nome, email = :email, data_hora = :data, imagem = :imagem, profissao_id = :profissao_id , cidade_id = :cidade  ,cpf = :cpf, cep = :cep, celular = :celular, cnpj = :cnpj WHERE id = :id ";

 			$stmt = $pdo->prepare($sql);
	 		$stmt->bindParam(':nome',$nome);
	 		$stmt->bindParam(':email',$email);
	 		$stmt->bindParam(':data',$data);
	 		$stmt->bindParam(':imagem',$imagem);
	 		$stmt->bindParam(':profissao_id',$profissao_id);
	 		$stmt->bindParam(':cidade',$cidade);
	 		$stmt->bindParam(':cpf',$cpf);
	 		$stmt->bindParam(':cep',$cep);
	 		$stmt->bindParam(':celular',$cel);
	 		$stmt->bindParam(':cnpj',$cnpj);
	 		$stmt->bindParam(':id',$id);

	 		if ($stmt->execute()) {
	 			return "salvo";
	 		}else{
	 			return "nao salvo";
	 		}

 		}

 		public function excluir($id){
 		
			include('../communs/conexao.php');
 			
			$sql = "DELETE from pessoas where id = :id";
 			$stmt = $pdo->prepare($sql);
 			$stmt->bindParam(":id", $id);
 			if ($stmt->execute()) {
 				return "excluido";
 			}else{
 				return "erro";
 			}

 		}
 		public function buscar_profissao(){
			include('../communs/conexao.php');
 			
 			$sql = "SELECT * FROM profissao ";
 			$stmt = $pdo->prepare($sql);
		
 			$stmt->execute();
 			$resultado = $stmt->fetchALL();
 			
 			return $resultado;
 		}

 		public function buscar_cidade(){
 			include("../communs/conexao.php");

 			$sql = "SELECT cidade.id, cidade.nome , estado.uf   from cidade  join estado on cidade.estado = estado.id  ";

 			$stmt = $pdo->prepare($sql);
 			$stmt->execute();

 			$resultado = $stmt->fetchALL();

 			if (count($resultado)>0) {
 				return $resultado; 
 			}	

 		}





	}




?>