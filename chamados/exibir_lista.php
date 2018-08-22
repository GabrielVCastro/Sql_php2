<?php 
include_once("../communs/header.php");
include("../classes/Chamado.class.php");

$chamado = new Chamado();
$lista =$chamado->exibir_lista();

?>

<div class="container">
	<div class="row	">
		<div class="offset-xl-2 col-xl-2 offset-lg-1 col-lg-2 offset-md-1 col-md-2 offset-2 col-2">
			<br>
			<a href="form_cadastrar_chamados.php" class="btn btn-info cadastrar">Cadastrar</a>
			
		</div>
		<div class="offset-xl-5 col-xl-2 offset-lg-7 col-lg-2 offset-md-7 col-md-2">
			<br>
			<a href="../index.php" class="btn btn-warning">Voltar</a>

		</div>
	</div>

<?php
if((isset($lista) && (count($lista)>0))){ ?>
		<div class="container">
			<br>


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
			
			</div><br>
			<div class="row">
				<h2>Lista de chamados</h2>

			
					
					
				
					
				<table class="table">
					<thead>
						<tr class="bg-info">
							<th>N°</th>
							<th>Pessoa</th>
							<th>Título</th>
							<th>Descrição</th>
							<th>Status</th>
							<th><i class="fas fa-trash-alt icone"></i></th>
							<th><i class="far fa-comments icone"></i></th>
							<th><i class="far fa-eye icone"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach ($lista as $key => $item) { ?>
								<tr>
									<td><?= $item['id'] ?></td>
									<td><?= $item['pessoa'] ?></td>
									<td><?= $item['titulo']?></td>
									<td><?= $item['descricao'] ?></td>
									<td><?php if ($item['status']==1) { ?>
										<span class="badge badge-pill badge-danger">Em espera</span>
									<?php }else{
										if ($item['status']==2) { ?>
											<span class="badge badge-pill badge-warning">Em desenvolvimento</span>
										<?php }else{
											if ($item['status']==3) { ?>
												<span class="badge badge-pill badge-success">Feito</span>
											<?php }
										}
									} ?>
										
									</td>
									<td>
										<a href="excluir.php?excluir= <?= $item['id'] ?>"><i class="fas fa-times-circle"></i></a>
									</td>
									<td><a href="../comentario/comentario.php?chamado= <?= $item['id'] ?>">Comentario</a></td>
									
									<td>
									
									<a href="exibir_chamado.php?id= <?= $item['id'] ?>">Ver</a>
										
									</td>
								</tr>	
					</tbody>
							<?php } 
						?>
					
				</table>
			</div>
		</div>
<?php }else{ ?>
			<div class="container">

				<br><br>
				<div class="alert alert-warning" role="alert">
				 	<p><strong>Nenhum chamado feito!  feito!</strong></p>
				</div>
			</div>
<?php }
?>

<?php include_once("../communs/footer.php") ?>