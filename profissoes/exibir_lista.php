<?php 

include_once("../communs/header.php") ;
include("../classes/Profissao.class.php") ;

$profissao = new Profissao();
	

if(isset($_GET['ordenar_prof'])){
	$ordem = $_GET['ordenar_prof'];
}else{
	$ordem = "id";
}

$lista = $profissao->exibir($ordem);

?>	

	<div class="container">
		<div class="row">
			<div class="offset-xl-2 col-xl-2 offset-lg-1 col-lg-2 offset-md-1 col-md-2 offset-2 col-2">
				<br>
				<a href="form_cadastro_profissao	.php" class="btn btn-info cadastrar">Cadastrar</a>
				
			</div>
			<div class="offset-xl-5 col-xl-2 offset-lg-7 col-lg-2 offset-md-7 col-md-2">
				<br>
				<a href="<?= $_SESSION['base'] ?>index.php" class="btn btn-warning">Voltar</a>

			</div>
		</div>
	</div>

<div class="container">
	<?php 
		if((isset($lista)) && (count($lista)!=0)){  ?>
			<br>
				<table class="table ">
						<thead>	
							<tr class="bg-info">
								<th><a href="exibir_lista.php?ordenar_prof=id">NºRegistro</a></th>
								<th><a href="exibir_lista.php?ordenar_prof=nome">NOME</a></th>
								<th><a href="exibir_lista.php?ordenar_prof=descricao">Descrição</a></th>
								<th><a href="exibir_lista.php?ordenar_prof=salario">Salário Min</a></th>
								<th><i class="fas fa-user-edit"></i></th>
								<th><i class="fas fa-trash-alt"></i></th>
								
							</tr>
						</thea>
					<tbody>
					 
				<?php foreach ($lista as $key => $item) { ?>
						<tr>
							<td>
							 	<?= $item['id'] ?>
							</td>
							<td>
								<?= $item['nome'] ?>
							</td>
							<td>
								<?php echo substr($item['descricao'], 0,8) ?>
							</td>
							<td class="money2">
								<?php echo $item['salario'] ?>
								
							</td>
							<td>
								<a href="form_editar.php?editar=<?= $item['id'] ?>"><i class="fas fa-pencil-alt"></i></a>
							</td>
							<td><a href="excluir.php?excluir=<?= $item['id'] ?>"><i class="fas fa-times-circle"></i></a>
							</td>
						</tr>
					</tbody>
				<?php } ?>
				</table>
		<?php }else{ ?>
				<br>
				<div class="alert alert-danger" role="alert">
					<strong><p>Lista de profissões vazias!</p></strong>
				</div>
		<?php } ?>
</div>
<?php  include_once("../communs/footer.php") ; ?>
