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
	# code...
	if(isset($_GET['ordenar'])){
		$ordem = $_GET['ordenar'];

	}else{
		$ordem = "id";
	}


		$pessoa = new Pessoa();
		$lista = $pessoa->exibir($ordem);
			
	?>
	<div class="container">
		

		<div class="row">
			
			<div class="offset-xl-2 col-xl-2 offset-lg-1 col-lg-2 offset-md-1 col-md-2 offset-2 col-2">
				<br>
				<a href="form_cadastro_pessoas.php" class="btn btn-info cadastrar">Cadastrar</a>
				
			</div>
			<div class="offset-xl-5 col-xl-2 offset-lg-7 col-lg-2 offset-md-7 col-md-2">
				<br>
				<a href="../index.php" class="btn btn-warning">Voltar</a>

			</div>
		</div>

		<div class="row">
			<div class=" offset-lg-1 col-xl-10 offset-lg-1  col-lg-10  col-md-12 col-sm-12 col-12">
			<?php
				if(isset($_SESSION['sucesso'])){ ?>
					<br><br>
							<div class="alert alert-success" role="alert">
							 	<strong><p><?= $_SESSION['sucesso'] ?></p></strong>
							</div>
					<?php }
						$_SESSION['sucesso'] = null;

						if(isset($_SESSION['excluido'])){ ?>
						<br><br>
								<div class="alert alert-warning" role="alert">
								 	<strong><p><?= $_SESSION['excluido'] ?></p></strong>
								</div>
						<?php }
							$_SESSION['excluido'] = null; 
				  	?>
			</div>
		</div>



	<?php
	if((isset($lista)) && (count($lista)!=0)){ ?>
		
					<br>
					<table class="table table-responsive ">
						<thead>
							<tr class="bg-info">
								<th><a href="exibir_lista.php?ordenar=id">NºRegistro</a></th>
								<th><a href="exibir_lista.php?ordenar=nome">NOME</a></th>
								<th><a href="exibir_lista.php?ordenar=email">EMAIL</a></th>
								<th><a href="">Profissao</a></th>
								<th><a href="">Cidade</a></th>
								<th><a href="exibir_lista.php?ordenar=cpf">CPF</a></th>
								<th><a href="exibir_lista.php?ordenar=cep">CEP</a></th>
								<th><a href="exibir_lista.php?ordenar=celular">CELULAR</a></th>
								<th><a href="exibir_lista.php?ordenar=cnpj">CPNJ</a></th>
								<th><i class="fas fa-user-edit"></i></th>
								<th><i class="fas fa-trash-alt"></i></th>
								<th></th>
							</tr>
						</thead>
						<tbody>	


				 		<?php	foreach ($lista as $key => $dados) { ?>
				
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
								<td>
									<?= $dados['profissao_id'] ?>
								</td>
								<td>
									<?= $dados['cidade_id'] ?>
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
									<a href="form_editar.php?editar=<?= $dados['id'] ?>">
										<i class="fas fa-pencil-alt"></i>
									</a>
								</td>
								<td>
									<a href="#" class="type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"">
										<i class="fas fa-times-circle"></i>
									</a>	
	 							</td>
								<td>
									<a href="chamados_pessoa.php?id_pessoa=<?= $dados['id'] ?>">
										<i class="far fa-comments chamado"></i>
									</a>
								</td>	
									
							</tr>


						</tbody>
		
				<?php  } ?>
					</table>
						
				<?php }else{ ?>

						<br>
						<div class="alert alert-danger" role="alert">
							<strong><p>Lista de pessoas vazias!</p></strong>
						</div>
				</div>	
				<?php 
				 }

}else{
	header("Location: ../login/login.php");
	$_SESSION['erro'] = "Tente fazer o login antes de acessar !";
}
	include_once("../communs/footer.php") ;
?>



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
		Tem certeza que deseja excluir essa pessoa?
      </div>
      <div class="modal-footer">
        <a href="" type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
        <a href="excluir.php?excluir=<?= $dados['id'] ?>" type="button" class="btn btn-primary">Save changes</a>
      </div>
    </div>
  </div>
</div>