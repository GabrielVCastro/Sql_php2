<?php 
	include_once("../communs/header.php"); 
	include("../classes/Comentario.class.php");
	$comentario  = new Comentario();

	$chamado = $comentario->buscar_chamada($_GET['id']);
?>


<div class="container">
	<div class="row">
		<div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 offset-md-3 col-md-6  offset-sm-3 col-sm-6 col-12">
			
			<form action="cadastrar_comentario.php" method="POST">
				<h2>Fazer comentário</h2>
				<legend>Título do chamado: <?= $chamado[0]['titulo'] ?></legend>
				<label for="idcomentario"><strong>Comentário</strong></label>
				<textarea name="comentario" id="idcomentario" cols="30" rows="10" class="form-control" required></textarea><br>
				<input type="hidden" value="<?= $chamado[0]['id'] ?>" name='id_chamado'>
				<button type="submit" class="btn btn-info  btn-lg btn-block">Comentar</button>
				<a href="comentario.php" class="btn btn-warning  btn-lg btn-block"></a>
			</form>
		</div>
	</div>
</div>


<?php include_once("../communs/footer.php"); ?>