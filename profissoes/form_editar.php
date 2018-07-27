<?php
 	include_once("../communs/header.php");
 	include("../classes/Profissao.class.php") ;


 	$profissao = new Profissao();
 	$valor =  $profissao->buscar($_GET['editar']);
 	

?>
<div class="container">
	<div class="row">
		<div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 offset-md-3 col-md-6  offset-sm-3 col-sm-6 col-12 " >
				
			<form action="editar.php" method="POST" >
				<h2> Tipo de serviço</h2>
				<label for="cnome">Nome</label>
				<input type="text" name="nome" id="mnome" class="form-control " value="<?= $valor['nome'] ?>" required>
				<br>
				<label for="dsc">Descrição</label>
				<textarea name="descricao"  cols="30" rows="10" class="form-control"  ><?= $valor['descricao'] ?></textarea><br>
				<label for="salario">Salário</label>

						<div class="input-group input-group-lg">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-hand-holding-usd"></i></span>
						  </div>
						  <input type="text" class="form-control money2" name="salario" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="R$ 00.000.00" value="<?= $valor['salario'] ?>" >

						</div><br><input type="hidden" value="<?= $valor['id'] ?>" name="id">
				
				<button type="submit" class="btn btn-info  btn-lg btn-block">Editar</button>

				<a href="<?= $_SESSION['base'] ?>/profissoes/exibir_lista.php" class="btn btn-warning  btn-lg btn-block">Voltar</a>	


			</form>
		</div>
	</div>
</div><br><br>		


<?php
 	include_once("../communs/footer.php") ;
?>