<?php  
	include_once("../communs/header_login.php");

	$_SESSION['logado'] = null;
		
?>	
	<div class="container">
		<div class="row">

		<?php 
			if(isset($_SESSION['erro'])){ ?>
			<br><br>
				<div class="col-12 alert alert-danger" role="alert">
				 	<strong><p><?= $_SESSION['erro'] ?></p></strong>
				</div>
			<?php }
				$_SESSION['erro'] = null; 

		?>

			<div class="offset-xl-3	col-xl-6  offset-lg-2 col-lg-8 offset-md-2 col-md-8 offset-sm-3 col-sm-6 offset-col-2 col-8" >
				
					<div class="row justify-content-md-center">
					    <div class="col col-lg-2">
					      
					    </div>
					    <div class="col-md-auto">
					      <a href="" class="logo">
							
							<img src="../assets/img/logo.png" alt="" id="logo">
							</a>
					    </div>
					    <div class="col col-lg-2">
					      
					    </div>
					  </div>
					<div class="row">

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12"   >
							
						</div>
					</div>	
					<form action="fazer_login.php" method="POST"  >
						<h2>Login</h2>
						
						<div class="input-group input-group-lg">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="inputGroup-sizing-lg"></label><i class="fas fa-at" ></i></span>
						  </div>
						  <input type="text" class="form-control"   name="email" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="E-mail">
						</div><br>

						<div class="input-group input-group-lg">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="inputGroup-sizing-lg"><i class="fas fa-unlock-alt"></i></span>
						  </div>
						  <input type="password" class="form-control " name="senha" aria-label="Large" aria-describedby="inputGroup-sizing-sm" placeholder="Password">
						</div><br>
						<button type="submit" class="btn btn-info  btn-lg btn-block">LOGAR</button>
					</form>	 
				</div>
			
		</div>
	</div>
<?php  include_once("../communs/footer.php")  ?>

	