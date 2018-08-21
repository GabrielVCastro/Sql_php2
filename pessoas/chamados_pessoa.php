<?php  
	include_once("../communs/header.php");
	include("../classes/Pessoa.class.php");


	$chamado = new Pessoa();
	
	$chamados = $chamado->buscar_chamados($_GET['id_pessoa']);
 	if (count($chamados)>0) { ?>
 		<div class="container">
 			<div class="row">
			
			<div class="offset-xl-2 col-xl-2 offset-lg-1 col-lg-2 offset-md-1 col-md-2 offset-2 col-2">
				<br>
				<a href="form_cadastro_pessoas.php" class="btn btn-info cadastrar">Cadastrar</a>
				
			</div>
			<div class="offset-xl-5 col-xl-2 offset-lg-7 col-lg-2 offset-md-7 col-md-2">
				<br>
				<a href="exibir_lista.php" class="btn btn-warning">Voltar</a>

			</div>

		</div>
		<div class="container">
			<h2 class="titulo">Nome: <?= $chamados[0]['nome'] ?></h2>
		</div>

		<table class="table table-hover">

		
			<thead>
				<tr class="bg-info">

					<th>
						N°Resgistro
					</th>
					<th>
						Descrição
					</th>
					<th>
						Solução
					</th>
					<th>
						Status
					</th>
				</tr>
			</thead>
			<?php

			foreach ($chamados as $key => $value) { ?>
					
							<tbody>
								<tr>
									<td><?= $value['id'] ?></td>
									<td>
										<?=  $value['descricao']  ?>
									</td>
									<td>
										<?= $value['solucao'] ?>
									</td>
									<td>
										<?php if ($value['status']==1) { ?>
								 	<div class="alert alert-danger" role="alert">
								 		<p><strong>Em espera.</strong></p>

									</div>
							<?php }else{
									if ($value['status']==2) { ?>
										<div class="alert alert-warning" role="alert">
								 		<p><strong>Em desenvolvimento.</strong></p>

										</div>
								  <?php }else{
								  		if ($value['status']==3) { ?>
								  			<div class="alert alert-success" role="alert">
								 			 <p><strong>Feito!</strong></p>
											</div>
								  		<?php }
								  }
							} ?>
									</td>
								</tr>
								
							</tbody>

							
							


					<br>

			<?php } ?>

					</table>	
		</div>
 	<?php }
?>

</div>









<?php 	include_once("../communs/header.php") ?>