<?php 
	include_once("../communs/header.php") ;
	include("../classes/Pessoa.class.php");
	include("../classes/Profissao.class.php");
	$profissao = new Profissao();
	$verificar = $profissao->selecionar();
	if (count($verificar)==0) {
		$_SESSION['erro'] = "Cadastre alguma profissão antes das pessoas!";
		header("Location: ../index.php");
	}	
	if (isset($_SESSION['logado'])) {
		if ($_GET['editar']=="") {
			$_SESSION['erro'] = "Informe um usuário antes!";
			header("Location: index.php");
		}
		$pessoa = new Pessoa();
		$editar = $pessoa->buscar($_GET['editar']);
		$profissao = $pessoa->buscar_profissao();

 		$cidades = $pessoa->buscar_cidade();

		

?>	
		<div class="container">
			<div class="row">
				<div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 offset-md-3 col-md-6  offset-sm-3 col-sm-6 col-12 " >
						
					<form action="editar.php" method="POST" >
						<h2>Editar</h2>
						<label for="cnome">Nome</label>
						<input type="text" name="nome" id="mnome" class="form-control " value="<?= $editar['nome'] ?>" required><br>
						<label for="cemail">Email</label>
						<input type="email" name="email" id="memail" class="form-control" value="<?= $editar['email'] ?>" required><br>
					
						
						<label for="cimg">Imagem</label>
						<input type="url" name="imagem" id="mimg" class="form-control" value="<?= $editar['imagem'] ?>" required><br>
						<label for="selecao">Profissão</label>
						<select class="form-control" id="selecao" name="selecao" >
							<option selected disabled value="<?= $editar['profissao_id']?>"><?= $editar['nome_profissao']?></option>
							<?php 
								foreach ($profissao as $key => $item) { ?>

										<option value="<?= $item['id'] ?>" ><?= $item['nome'] ?></option>
								<?php }
	 
							?>
						</select><br>
						<label for="idestado">Cidade/Estado</label>
						<select class="form-control" name="cidade" >
							
								<?php 
									foreach ($cidades as $key => $cidade) {  ?>

										<option  value="<?= $cidade['id'] ?>"><?php echo $cidade['nome']." - ".$cidade['uf'] ?></option>
									<?php }

								?>			
				
						</select>
						<br>
						<label for="icpf">CPF</label>
						<input type="text" name="cpf" id="mcpf" class="form-control mask_cpf" value="<?= $editar['cpf'] ?>" required>
						<label for="cep">CEP</label>
						<input type="text" name="cep" id="mcep" class="form-control mask_cep" value="<?= $editar['cep'] ?>" required><br>
						<label for="Cel">Celular</label>
						<input type="text" name="cel" id="mphone" class="form-control mask_celular" value="<?= $editar['celular'] ?>" required><br>
						<label for="cnpj">CNPJ</label>
						<input type="text" name="cnpj" id="mcnpj" class="form-control mask_cnpj" value="<?= $editar['cnpj'] ?>" required><br>
						<input type="hidden" name="id" value="<?= $editar['id'] ?>">
						<button type="submit" class="btn btn-info  btn-lg btn-block">Editar</button>
						<a href="exibir_lista.php" class="btn btn-warning  btn-lg btn-block">Voltar</a>	


					</form>
				</div>
			</div>
		</div><br><br>	


<?php 
}else{
	header("Location: ../login/login.php");
	$_SESSION['erro'] = "Tente fazer o login antes de acessar !";

}
	include_once("../communs/footer.php");
?>