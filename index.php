<?php 
	include_once("communs/header_index.php") ;
	if (isset($_SESSION['logado'])) {
		# code...
	

	?>

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

	<div class="row">
		
		<div class=" col-xl-2 offset-lg-1 col-lg-2 offset-md-1 col-md-1 offset-2 col-2">  
		<br> 
			<a href="chamados/exibir_lista.php"  class="btn btn-primary">Chamados</a>
		</div>

		
		<div class="offset-xl-4 offset-lg-3 offset-md-4 offset-sm-1 offset-1">
			<br>
			<a href="pessoas/exibir_lista.php?exibir=pessoas" class="btn btn-info">Pessoas</a>
		</div>
		<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 ">
			<br>
			<a href="profissoes/exibir_lista.php?exibir=profissao" class="btn btn-info">Profissões</a>
		</div>

		<div class="offset-1 col-1">
			<br>
				<a href="login/login.php" class="btn">
				<i class="fas fa-sign-out-alt" style="font-size: 25px;"></i>
				</a>
			
			
		</div>
		
		
	</div>
	
</div><br>
	
	
	
</div>


<?php 
}else{
	header("Location: login/login.php");
	$_SESSION['erro'] = "Tente fazer o login antes de acessar !";
}
include_once("communs/footer.php");
 ?>