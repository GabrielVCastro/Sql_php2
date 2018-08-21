<?php 

	include_once("../communs/header.php");
	include("../classes/Chamado.class.php");
	$chamado = new Chamado();
	$exibir = $chamado->exibir_chamado($_GET['id']);

?> 



<div class="container">
	<div class="row">
		<div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-6 offset-md-3 col-md-6  offset-sm-3 col-sm-6 col-12"">
			<div class="chamada">
				<?php 

					
				?>
				<form action="resolver_chamado.php" method="POST">
				<?php 
					foreach ($exibir as $key => $value) {
						if ($value['status']==3) {?>
							<h2><?= $value['titulo'] ?></h2>
							<strong>Descricão do problema</strong></label>
							<p>
								<?= $value['descricao'] ?></p>

														<!-- Button trigger modal -->
							
							<label for=""><strong>Aplicar solução</strong></label>
							<textarea name="solucao" id="" cols="15" rows="7" class="form-control"><?= $value['solucao'] ?></textarea>
							<label for="idstatus"><strong>Status</strong></label>
							<select name="status" id="idstatus" class="form-control">
								 <option  disabled selected>Feito</option>
								 
								 

							
							</select>	<br><br>
						<?php }else{
							if ($_GET['id']==$value['id']) { ?>
							<h2><?= $value['titulo'] ?></h2>
							<strong>Descricão do problema</strong></label>
							<p>
								<?= $value['descricao'] ?></p>

														<!-- Button trigger modal -->
							
							<label for=""><strong>Aplicar solução</strong></label>
							<textarea name="solucao" id="" cols="15" rows="7" class="form-control"><?php if($value['solucao']!=0){
								echo $value['solucao'];
							} ?></textarea>
							<label for="idstatus"><strong>Status</strong></label>
							<select name="status" id="idstatus" class="form-control">
								 <option  value="1" selected>Espera</option>
								 <option value="2">Desenvolvimento</option>
								 <option value="3">Feito</option>
								 

							
							</select>	<br><br>
							<input type="hidden" name="id" value="<?= $value['id']?>">
							<button type="submit" class="btn btn-success  btn-lg btn-block">OK</button>
							

						<?php }
						

						}
					}




				?>
			
				
				<a href="exibir_lista.php" class="btn btn-warning  btn-lg btn-block">Voltar</a>

				</form>
				
				


			</div>
			

		</div>
	</div>
</div>










<?php include_once("../communs/footer.php"); ?>