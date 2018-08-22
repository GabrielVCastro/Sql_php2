<?php 
include_once("../communs/header.php");
include("../classes/Chamado.class.php");

$chamado = new Chamado();

$verificar = $chamado->exibir_lista();
$lista =$chamado->exibir_lista();

if (count($verificar)==0) {
	$_SESSION['erro'] = "Cadastre alguma pessoa antes das pessoas!";
	header("Location: ../index.php");
}
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
										<a href="#" class="type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal""><i class="fas fa-times-circle"></i></a>
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

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Tem certeza que deseja excluir o chamado?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="excluir.php?excluir= <?= $item['id'] ?>" type="button" class="btn btn-primary">Save changes</a>
      </div>
    </div>
  </div>
</div>