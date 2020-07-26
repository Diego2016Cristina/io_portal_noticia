<?php
	
	$foto = $photo_user;

?>
<!DOCTYPE html>
<html>
<head>
	<title>Informações Pessoais</title>

	<link rel="stylesheet" type="text/css" href="assets/dist/css/main.css">

</head>
	<body>
		<script type="text/javascript">
			setTimeout(function() {
			      $(".alert-success, .alert-danger").fadeOut().empty();
			}, 5000);

		</script>
		<div class="container-fluid">
			<?php
	        	getMsg('msgUpdate');
	      	?>
			<div class="row">
				<div class="col-sm-12">
					<h2><?= $subtitulo ?></h2>
					<form  name="updateUser" action="updateUser" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-sm-6">
							  <div class="form-group">
							  	<div class="row">
							  		<div class="col-sm-4">
							  			<label>Data de cadastro</label>
							    		<input type="text" class="form-control" value="<?= $dt_cadastro ?>" id="dtCadastro" disabled="disabled">
							  		</div>
							  		<div class="col-sm-4"></div>
							  		<div class="col-sm-4"></div>
							  	</div>
							  </div>
							  <div class="form-group">
							    <label for="firstName">Nome</label>
							    <input type="text" class="form-control" name="firstName" value="<?= $first_name ?>" id="firstName" aria-describedby="firstName">
							  </div>
							  <div class="form-group">
							    <label for="lastName">Sobrenome</label>
							    <input type="text" class="form-control" name="lastName" value="<?= $last_name ?>" id="lastName" aria-describedby="lastName">
							  </div>
							  <div class="form-group">
							    <div class="row">
							    	<div class="col-sm-4">
							    		<label for="nation">País</label><br/>
							    		<select class="form-control">
							    			<option>Brasil</option>
							    		</select>
							    	</div>
							    	<div class="col-sm-4">
							    		<label for="state">Estado</label><br/>
							    		<select class="form-control">
							    			<option>Selecione</option>
							    			<option>Amazonas</option>
							    			<option>São Paulo</option>
							    		</select>
							    	</div>
							    	<div class="col-sm-4">
							    		<label for="city">Cidade</label><br/>
							    		<select class="form-control">
							    			<option>Selecione</option>
							    			<option>Manaus</option>
							    			<option>São Paulo</option>
							    		</select>
							    	</div>
							    </div>
							  </div>
							  <label for="exampleInputEmail1">Endereço de email</label>
							    <input type="email" class="form-control" value="<?= $email ?>" id="exampleInputEmail1" aria-describedby="emailHelp" disabled="disabled">
							    <small id="emailHelp" class="form-text text-muted">Nunca vamos compartilhar seu email, com ninguém.</small>
							    <?php
							    	/** 
							    	* Campo invisivel para usuario
							    	usado apenas para espaço
							    	*/
							    ?>
							  <div class="form-group">
							    <label for="exampleInputPassword1"></label>
							    <input type="text" class="form-control" style="visibility: hidden;">
							  </div>
							  	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
				                	Alterar senha
				              	</button>
							   <input type="button" class="btn btn-primary" value="Salvar" onclick="document.updateUser.submit();">
			
							  <!-- Inicio modal -->
								<div class="modal modal-default fade" id="modal-default">
						          <div class="modal-dialog">
						            <div class="modal-content">
						              <div class="modal-header">
						                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						                  <span aria-hidden="true">&times;</span></button>
						                <h4 class="modal-title">Alterar senha</h4>
						              </div>
						              <div class="modal-body">
						                <form>
										  <div class="form-group">
										    <label for="exampleFormControlFile1">Entre com o email cadastrado.</label>
										    <input class="form-control form-control-sm" type="text" placeholder="email">
										    <small>Encaminharemos um link para o email informado em alguns minutos... Verifcar caixa de entrada.</small>
										  </div>
										</form>
						              </div>
						              <div class="modal-footer">
						                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancelar</button>
						                <button type="button" class="btn btn-success">Enviar</button>
						              </div>
						            </div>
						            <!-- /.modal-content -->
						          </div>
						          <!-- /.modal-dialog -->
						        </div>
						        <!-- /.modal -->
							<!-- Fim da modal -->

						</div>
						<div class="col-sm-6">
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-6">
									<div class="row">
										<div class="col-sm-12">&nbsp;</div>
 
										<div class="col-sm-12 foto_cicle">

											<input type="file" name="arquivo" class="form-control" id="arquivo" onChange="mostraImagem(this)"/>
									        <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
		                                    <?php if(!empty($foto)) { ?>
		                                        <input type="hidden" name="id_oculto" id="id_oculto" value="1">
		                                        <img class="img-fluid rounded-circle" id="foto" src="<?php echo base_url('assets/uploads/fotos/'.@$foto) ?>">

		                                    <?php }else { ?>
		                                        <input type="hidden" name="id_oculto" id="id_oculto" value="2">
		                                        <img class="img-fluid rounded-circle" id="foto" src="<?php echo base_url('assets/img/sem_foto.png'); ?>">

		                                    <?php } ?>

										</div>
										<div class="col-sm-12"></div>
									</div><!-- Fim da row -->
									<div class="col-sm-3"></div>
								</div>
							</div>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
<script src="<?php echo base_url('assets/dist/js/jquery.js'); ?>"></script>
<script src="<?php echo base_url('assets/dist/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/dist/js/main.js'); ?>"></script>
