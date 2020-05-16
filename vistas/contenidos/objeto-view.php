<!-- Content page -->
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-folder"></i> Objetos </h1>
	</div>
	<p class="lead" align="justify">
		Esta funcionalidad del sistema, le permite añadir, actualizar, eliminar y consultar, información de los objetos que ingresan y salen del centro de formación!
	</p>
</div>

<!-- Acciones a realizar (AÑADIR,LISTAR,BUSCAR)-->
<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>objeto/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO OBJETO
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>objetolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTADO DE OBJETOS
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>objetosearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR OBJETOS
	  		</a>
	  	</li>
	</ul>
</div>

<!-- panel datos del vehiculo- FORMULARIO DE REGISTRO -->
<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DEL OBJETO</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL?>ajax/objetoAjax.php" method="POST" 
			 data-form="save" class="FormularioAjax" name="FormularioAjax" autocomplete="on" 
			 enctype="multipart/form-data">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-assignment"></i> &nbsp; Información del objeto</legend>
		    		<div class="full-box dashboard-sideBar-UserInfo">
						<figure class="full-box">
							<img src="<?php echo SERVERURL; ?>vistas/assets/avatars/camara.png" alt="UserIcon">
							<figcaption class="text-center text-titles"></figcaption>
						</figure>
					</div>
		    		<div class="container-fluid">
		    			<div class="row">
                            <div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombre *</label>
								  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="text" id="nombre-obj" name="nombre-obj" required="" maxlength="50">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Modelo *</label>
								  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="modelo-obj" id="modelo-obj" maxlength="4">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Marca *</label>				  	
									<select class="form-control" name="marca-obj" id="marca-obj">
									</select>
								</div>
							</div>
                            <div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Tipo *</label>				  	
									<select class="form-control" name="tipo-obj" id="tipo-obj">
									</select>
								</div>
							</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Cantidad *</label>
								  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="cantidad-obj" id="cantidad-obj" maxlength="50">
								</div>
		    				</div>	
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
		    	<fieldset> 	
				<legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos Propietario</legend>
				<div class="full-box dashboard-sideBar-UserInfo">
					<figure class="full-box">
						<img src="<?php echo SERVERURL; ?>vistas/assets/avatars/camara.png" alt="UserIcon">
						<figcaption class="text-center text-titles"></figcaption>
					</figure>
					</div>
						<div class="container-fluid">
			    			<div class="row">
			    				<div class="col-xs-12 col-sm-6">
							    	<div class="form-group label-floating">
									  	<label class="control-label">No. Documento *</label>
									  	<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="propietario-id" required="" maxlength="50">
									</div>
			    				</div>
			    				<div class="col-xs-12 col-sm-6">
							    	<div class="form-group label-floating">
									  	<label class="control-label">Nombre(s) *</label>
									  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="text" name="NOMBRE" required="" maxlength="50">
									</div>
			    				</div>
			    				<div class="col-xs-12 col-sm-6">
							    	<div class="form-group label-floating">
									  	<label class="control-label">Apellido(s) *</label>
									  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="text" name="APELLIDO" required="" maxlength="50">
									</div>
			    				</div>
			    			</div>
			    		</div>
					</div>
		    	</fieldset>
		    	<br>
			    <p class="text-center" style="margin-top: 20px;">
					<button type="reset" class="btn btn-danger btn-raised btn-sm"><i class="zmdi zmdi-roller"></i> &nbsp; Limpiar</button>
			    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i>&nbsp; Guardar</button>
					<a href="<?php echo SERVERURL; ?>vehiculo/" class=""><button type="submit" class="btn btn-warning btn-raised btn-sm"><i class="zmdi zmdi-folder">&nbsp; Guardar y Registrar Vehiculo</i> </button></a>
			    </p>
				<div class="RespuestaAjax" id="RespuestaAjax" name="RespuestaAjax"></div><!--MOSTARÁ LA RESPUESTA DEL AJAX-->
		    </form>
		</div>
	</div>
</div>