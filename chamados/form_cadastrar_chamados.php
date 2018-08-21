<?php      
	include_once("../communs/header.php");
	include("../classes/Pessoa.class.php");

	$pessoa = new Pessoa();
	$selecao = $pessoa->buscar_pessoas();


?>


<div class="container">
	
	<div class="row">
		<div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 offset-md-3 col-md-6  offset-sm-3 col-sm-6 col-12">s
			<form action="cadastrar.php" method="POST">
				<h2>Cadastrar ChamadO</h2>
				<label for="idtitulo">Título</label>
				<input type="text" class="form-control" name="titulo" id="tiulo" required><br>
				<label for="iddescricao">Descrição</label>
				<textarea name="descricao" id="" cols="30" rows="10" class="form-control" required></textarea><br>
				<label for="idnome">Nome</label>
				<select name="nome" id="idnome" class="form-control"  required>
					 <option disabled="disabled" selected>Selecionar...</option>
						<?php 
							foreach ($selecao as $key => $value) { ?>
								<option value="<?= $value['id'] ?>"><?= $value['nome'] ?></option>
							<?php }

						?>
				</select><br>
				
				<button type="submit" class="btn btn-info  btn-lg btn-block ">Enviar</button>
				<a href="exibir_lista.php" class="btn btn-warning  btn-lg btn-block">Voltar</a>
				
			</form>
		</div>
	</div>
</div>



<?php include_once("../communs/footer.php")  ?>	