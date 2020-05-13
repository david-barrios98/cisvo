<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i> MIS DATOS</small></h1>
	</div>
	<p class="lead">En esta opción del sistema prodrá visualizar su información personal y dado el caso que lo desee o lo amerite podrá actualizar sus datos.</p>
</div>

<!-- Panel mis datos -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; MIS DATOS</h3>
		</div>
		<div class="panel-body">
			<form>
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
		    		<div class="container-fluid">
		    			<div class="row">
							<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">No. Documento *</label>
								  	<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dni-up" id="dni-up" required="" maxlength="50">
								</div>
							</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombre(s) *</label>
								  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="text" name="nombre-up" id="nombre-up" r required="" maxlength="50">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Apellido(s) *</label>
								  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="text" name="apellido-up" id="apellido-up" required="" maxlength="50">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Fecha Nacimiento</label>
								  	<input  class="form-control" type="date" name="fnaci-reg" id="fnaci-reg" value="<?php echo date("Y-m-d");?>">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Dirección</label>
								  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="text" name="direccion-up" id="direccion-up" maxlength="70">
								</div>
		    				</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Departamento</label>				  	
									<select class="form-control" name="departamento-reg" id="departamento-reg">
									</select>
								</div>
							</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Ciudad/municipio</label>				  	
									<select class="form-control" name="municipio-reg" id="municipio-reg">
									</select>
								</div>
							</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="control-label">Genero</label>
									<div class="radio radio-primary">
										<label class="col-md-4">
											<input type="radio" name="genero-reg" id="masculino" value="M" checked="">
											<i class="zmdi zmdi-male-alt"></i> &nbsp; Masculino
										</label>
									</div>
									<div class="radio radio-primary">
										<label class="col-md-4">
											<input type="radio" name="genero-reg" id="femenino" value="F">
											<i class="zmdi zmdi-female"></i> &nbsp; Femenino
										</label>
									</div>
								</div>
		    			</div>
		    		</div>
		    	</fieldset>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-refresh"></i> Actualizar</button>
			    </p>
		    </form>
		</div>
	</div>
</div>