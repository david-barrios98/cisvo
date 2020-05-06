<div class="container-fluid">
<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-file-text zmdi-hc-fw"></i> Solicitudes<small> PERSONAS</small></h1>
	</div>
	<p class="lead">Este modulo del sistema permitirá el registro y busqueda de solicitudes, peticiones y quejas referentes a todo suceso que se presente en el estacionamiento. </p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
		<li>
	  		<a href="<?php echo SERVERURL; ?>solicitudes/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVA SOLICITUD
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>solicitudeslist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTADO DE SOLICITUDES
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>solicitudsearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR SOLICITUD
	  		</a>
	  	</li>
	</ul>
</div>

<!-- Panel nuevo administrador -->
<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVA SOLICITUD</h3>
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
								  	<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="dni-reg" required="" maxlength="30">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombre(s) de la persona *</label>
								  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="text" name="nombre-reg" required="" maxlength="40">
								</div>
		    				</div>
							<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Apellido(s) de la persona *</label>
								  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="text" name="nombre-reg" required="" maxlength="40">
								</div>
		    				</div>
							<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Fecha de nacimiento *</label>
								  	<input class="form-control" type="date" name="nombre-reg" required="" maxlength="40">
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Detalle de solicitud</legend>
		    		<div class="container-fluid">
		    			<div class="row">
							<!--Combo box tipo de solicitud-->
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Tipo de solicitud *</label>				  	
									<select class="form-control" name ="tiposolicitud-reg" id="tiposolicitud-reg">
									</select>
								</div>
							</div>
							<!--Combo box objeto o vehiculo-->
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Selecione el objeto o vehiculo *</label>				  	
									<select class="form-control" name ="objeveh-reg" id="objeveh-reg">
									</select>
								</div>
							</div>
		    				<div class="col-xs-12 col-sm-12">
					    		<div class="form-group label-floating">
								  	<label class="control-label">Ingrese la solucitud, petición o queja*</label>
								  	<input class="form-control" type="textarea" name="descripsolicitud-reg" id="descripsolicitud-reg" required="">
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
			    <p class="text-center" style="margin-top: 20px;">
					<button type="reset" class="btn btn-danger btn-raised btn-sm"><i class="zmdi zmdi-roller"></i> &nbsp; Limpiar</button>
			    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
			    </p>
		    </form>
		</div>
	</div>
</div>