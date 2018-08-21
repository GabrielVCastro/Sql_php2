<?php 
	include_once("../communs/header.php"); 
	include("../classes/Comentario.class.php");

	$comentario = new Comentario();

	$comentarios = $comentario->exibir_comentario($_GET['chamado']);
	
	
?>

<div class="container">
	<br>
	<h2>Comentários</h2>
	<br>
	<div class="row">
		<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2">
			<a href="form_comentario.php?id= <?= $_GET['chamado'] ?>"  class="btn btn-primary">Fazer comentário</a>
		</div>
		<div class="offset-xl-8 col-xl-2 offset-lg-8 col-lg-2 offset-md-8 col-md-2 offset-sm-8 col-sm-2 offset-8 col-2">
			<a href="../chamados/exibir_lista.php"  class="btn btn-warning">Voltar</a>
		</div>

	</div>
</div><br>

<?php
if (count($comentarios)==0) { ?>
			<div class="container">
				<br><br>
				<div class="alert alert-warning" role="alert">
				 	<p><strong>Nenhum comentário  feito!</strong></p>
				</div>
			</div>
 	<?php }	else{ ?>
			<div class="container">
					<?php

				if(isset($_SESSION['sucesso'])){ ?>
					<br><br>
						<div class="alert alert-success" role="alert">
						 	<strong><p><?= $_SESSION['sucesso'] ?></p></strong>
						</div>
				<?php }
					$_SESSION['sucesso'] = null;

					if(isset($_SESSION['erro'])){ ?>
					<br><br>
						<div class="alert alert-danger" role="alert">
						 	<strong><p><?= $_SESSION['erro'] ?></p></strong>
						</div>
				<?php }
					$_SESSION['erro'] = null;
				?>
				
				<table class="table table-responsive">
					<thead>
						<tr class="bg-info">
							<th>tittulo</th>
							<th>Hora</th>
							<th>Comentario</th>

						</tr>
						<?php 
							foreach ($comentarios as $key => $value) { ?>
									<tbody>
										<tr>
											<td>
												<?= $value['titulo'] ?>

											</td>
											<td>
												<?= $value['data_hora'] ?>
											</td>
											<td>
												
												<?= $value['comentario']?>
											</td>
										</tr>
									</tbody>	
						   <?php }

						?>
					</thead>
				</table>
			</div>
 	<?php }
?>




	
	

<?php include_once("../communs/footer.php") ?>