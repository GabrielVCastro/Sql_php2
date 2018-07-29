<?php 
	class Admim{
		public $email;
		public $senha;


		public function fazer_login($email, $senha){
			include('../communs/conexao.php');
			$sql = "SELECT * FROM admim ";
			$stmt = $pdo->prepare($sql);
			
			
			if ($stmt->execute()) {
				$result = $stmt->fetchALL();
				return $result;
				

			}else{
				return "erro";
			}

		}

	}



?>