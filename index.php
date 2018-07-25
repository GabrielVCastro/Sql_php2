<?php 
	include_once("communs/header_index.php") ;


	?>

<div class="container">
	
	




	<?php
	$_SESSION['base']= "http://localhost/sql_2/";
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
		<div class="offset-xl-2 col-xl-2 offset-lg-1 col-lg-2 offset-md-1 col-md-2 offset-2 col-2">  
		<br> 

			<div class="btn-group" role="group">
			    <button id="btnGroupDrop1" type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			      Cadastrar
			    </button>
			    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
			      <a class="dropdown-item" href="pessoas/form_cadastro_pessoas.php">Pessoas</a>
			      <a class="dropdown-item" href="profissoes/form_cadastro_profissao.php">Profissõess</a>
			    </div>
			</div>


		</div>
		<div class="offset-xl-4 offset-lg-4 offset-md-4 offset-sm-3 offset-2">
			<br>
			<a href="pessoas/exibir_lista.php?exibir=pessoas" class="btn btn-info">Pessoas</a>
		</div>
		<div class="offset-xl-1 offset-lg-1 offset-md-1 ">
			<br>
			<a href="profissoes/exibir_lista.php?exibir=profissao" class="btn btn-info">Profissões</a>
		</div>
		
	</div>
	
</div><br>
	
	
	
</div>


<?php include_once("communs/footer.php") ?>