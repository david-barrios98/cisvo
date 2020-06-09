<!-- Content page-Descripcion del formulario -->
<div class="container-fluid">
	<div class="page-header">
		<h1 class="text-titles"><i class="zmdi zmdi-file-text zmdi-hc-fw"></i> Solicitudes</h1>
		</div>
		<p class="lead">Este modulo del sistema permitirá el registro y busqueda de solicitudes, peticiones y quejas referentes a todo suceso que se presente en el estacionamiento y con los objetos. </p>
	</div>
</div>

<!-- Anclas para cambiar las paginas (registrar,listar,buscar). -->
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

<!-- Formulario para registrar la información de la solicitud -->
<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVA SOLICITUD</h3>
		</div>
		<div class="panel-body">
			 <form action="<?php echo SERVERURL?>ajax/solicitudesAjax.php" method="POST" 
			 data-form="save" class="FormularioAjax" name="FormularioAjax" autocomplete="off" 
			 enctype="multipart/form-data" > 
			 	<!--Datos de la persona -->
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
		    		<div class="container-fluid">
		    			<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">No. Documento *</label>
								  	<input pattern="[0-9]{4,50}" class="form-control" type="text" name="docpropietario-txt" required title="El documento debe tener minimo 4 digitos!" maxlenght="50">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombre(s) de la persona *</label>
								  	<input pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,50}"  class="form-control" type="text" name="nombre-txt" required>
								</div>
		    				</div>
							<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Apellido(s) de la persona *</label>
								  	<input pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,50}" class="form-control" type="text" name="apellido-txt" required="" >
								</div>
		    				</div>
							
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
				<!--Datos de la solicitud -->
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Detalle de solicitud</legend>
		    		<div class="container-fluid">
		    			<div class="row">
							<!--Combo box tipo de solicitud-->
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Tipo de solicitud *</label>				  	
									<select class="form-control" name ="tiposolicitud-txt" id="tiposolicitud-txt" required="">
									</select>
								</div>
							</div>
							<!--Combo box objeto o vehiculo-->
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Selecione el objeto o vehiculo *</label>				  	
									<select class="form-control" name ="objveh-txt" id="objveh-txt">
									<option value="AAA-000">AAA-000</option>
									</select>
								</div>
							</div>
		    				<div class="col-xs-12 col-sm-12">
					    		<div class="form-group label-floating">
								  	<label class="control-label">Ingrese la solucitud, petición o queja*</label>
									<textarea class="form-control" name="descripsolicitud-txt" id="descripsolicitud-txt" required cols="30" rows="2" maxlength="1000"></textarea>
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
				<!-- Botones -->
			    <p class="text-center" style="margin-top: 20px;">
					<!-- <button type="reset" class="btn btn-danger btn-raised btn-sm"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>-->
			    	<button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
			    </p>
				<div class="RespuestaAjax"></div><!--MOSTRARÁ LA RESPUESTA DEL AJAX-->
		    </form>
		</div>
	</div>
</div>