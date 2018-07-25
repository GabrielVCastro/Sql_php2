	<?php 
	include_once("../communs/header.php") ;
	include("../classes/Pessoa.class.php");
	if ($_GET['editar']=="") {
		$_SESSION['erro'] = "Informe um usuário antes!";
		header("Location: index.php");
	}
	$pessoa = new Pessoa();
	$editar = $pessoa->buscar($_GET['editar']);
	


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
						<?php 
							foreach ($selecao as $key => $item) { ?>
									<option value="<?= $item['id'] ?>" ><?= $item['nome'] ?></option>
							<?php }

						?>
					</select><br>
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
					<a href="<?= $_SESSION['base'] ?>/pessoas/exibir_lista.php" class="btn btn-warning  btn-lg btn-block">Voltar</a>	


				</form>
			</div>
		</div>
	</div><br><br>	


<?php include_once("../communs/footer.php") ?>