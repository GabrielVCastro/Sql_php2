<?php 
	include_once("communs/header.php") ;
	include("classes/Pessoa.class.php");
		
	
	$pessoa = new Pessoa();
	if (!isset($_SESSION['ordem'])) {
		$_SESSION['ordem'] = "id";
	}
	if(isset($_GET['ordenar'])){
		$_SESSION['ordem'] = $_GET['ordenar'];
	}
	$usuario = $pessoa->exibir($_SESSION['ordem']);
 	
	?>
<div class="container_fluid">

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
	<div class="row">
		<div class="offset-xl-2 col-xl-2 offset-lg-2 col-lg-2 offset-md-1 col-md-2 offset-2 col-2">
			<br>
			<a href="form_cadastro.php" class="btn btn-info">Cadastrar</a>
		</div>
	</div>

</div><br>
	<?php

	foreach ($usuario as $key => $dados) { ?>
		
			<div class="row">

				<div class="offset-xl-2 col-xl-8 offset-lg-2 col-lg-8 offset-md-1 col-md-10 col-sm-12 col-12">
					
					
					
					<table class="table table-responsive">
						<thead>
							<tr class="bg-info">
								<th><a href="index.php?ordenar=id">NºRegistro</a></th>
								<th><a href="index.php?ordenar=nome">NOME</a></th>
								<th><a href="index.php?ordenar=email">EMAIL</a></th>
								<th><a href="index.php?ordenar=cpf">CPF</a></th>
								<th><a href="index.php?ordenar=cep">CEP</a></th>
								<th><a href="index.php?ordenar=celular">CELULAR</a></th>
								<th><a href="index.php?ordenar=cnpj">CPNJ</a></th>
								<th><i class="fas fa-user-edit"></i></th>
								<th><i class="fas fa-trash-alt"></i></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<?= $dados['id'] ?>
								</td>
								
								<td>
									<?= $dados['nome'] ?>
								</td>
								<td>
									<?php echo substr($dados['email'], 0 ,12) ?>...
								</td>
								<td class="mask_cpf">
									<?= $dados['cpf'] ?>
								</td>
								<td class="mask_cep">
									<?= $dados['cep'] ?>
								</td>
								<td class="mask_celular">
									<?= $dados['celular'] ?>
								</td>
								<td class="mask_cnpj">
									<?= $dados['cnpj'] ?>
								</td>
								<td>
									<a href="form_editar.php?editar=<?= $dados['id'] ?>"><i class="fas fa-pencil-alt"></i></a>
								</td>
								<td><a href="excluir.php?excluir=<?= $dados['id'] ?>"><i class="fas fa-times-circle"></i></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		
	<?php }
?>
</div>


<?php include_once("communs/footer.php") ?>