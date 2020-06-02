<!-- Content page-Descripcion del formulario -->
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-accounts-alt "></i> Usuarios </h1>
	</div>
	<p class="lead" align="justify">
		Esta funcionalidad del sistema, le permite añadir, actualizar, eliminar y consultar, información de las personas que hacen uso(Empresa de Vigilancia) de las distintas funciones que permite realizar el sistema!
	</p>
</div>

<!-- Anclas para cambiar las paginas (registrar,listar,buscar). -->
<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>usuario/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO USUARIO
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>usuariolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTADO DE USUARIOS
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>usuariosearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR USUARIO
	  		</a>
	  	</li>
	</ul>
</div>

<!-- Formulario para registrar la información del usuario -->
<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DEL USUARIO</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL?>ajax/usuarioAjax.php" method="POST" 
			 data-form="save" class="FormularioAjax" name="FormularioAjax" autocomplete="off" 
			 enctype="multipart/form-data" > 
			 	<!-- Datos personales -->
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos básicos</legend>
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
									<input pattern="[0-9]{4,50}" class="form-control" type="text" name="documento-txt" required=""  title="El documento debe tener minimo 4 digitos!"  maxlegth="50">
								</div>
							</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombre(s) *</label>
								  	<input pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,50}" class="form-control" type="text" name="nombre-txt" id="nombre-txt" r required="" maxlength="50">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Apellido(s) *</label>
								  	<input pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,50}" class="form-control" type="text" name="apellido-txt" id="apellido-txt" required="" maxlength="50">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Fecha Nacimiento</label>
								  	<input class="form-control" type="date" name="fechanac-txt" id="fechanac-txt" value="<?php echo date("Y-m-d");?>">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Dirección *</label>
								  	<input class="form-control" type="text" name="direccion-txt" id="direccion-txt" maxlength="70">
								</div>
		    				</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Departamento *</label>				  	
									<select class="form-control" name="departamento-txt" id="departamento-txt">
									
									</select>
								</div>
							</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Ciudad/municipio</label>				  	
									<select class="form-control" name="municipio-txt" id="municipio-txt">
									</select>
								</div>
							</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="control-label">Genero</label>
									<div class="radio radio-primary">
										<label class="col-md-4">
											<input type="radio" name="genero-txt" id="masculino" value="M" checked="">
											<i class="zmdi zmdi-male-alt"></i> &nbsp; Masculino
										</label>
									</div>
									<div class="radio radio-primary">
										<label class="col-md-4">
											<input type="radio" name="genero-txt" id="femenino" value="F">
											<i class="zmdi zmdi-female"></i> &nbsp; Femenino
										</label>
									</div>
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
				<br>
		    	<!-- Datos de contacto -->
		    	<fieldset>
					<legend><i class="zmdi zmdi-assignment-o"></i> &nbsp; Datos de Contacto</legend>
		    		<div class="container-fluid">
		    			<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Teléfono *</label>
								  	<input pattern="[0-9]{1,10}" class="form-control" type="text" name="telefono-txt"  id="telefono-txt" required>
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">E-mail</label>
								  	<input class="form-control" type="email" name="email-txt" id="email-txt" maxlength="50">
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
				<br>
				<!-- Datos de para la cuenta -->
				<fieldset>
					<legend><i class="zmdi zmdi-account"></i> &nbsp; Datos de Usuario</legend>
		    		<div class="container-fluid">
		    			<div class="row">
						<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Contraseña *</label>
								  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="password" name="password1-txt" id="password1-txt"required="" maxlength="25">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Confirme contraseña *</label>
								  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="password" name="password2-txt" id="password2-txt" required="" maxlength="25">
								</div>
		    				</div>
		    		</div>
		    	</fieldset>
				<br>
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-star"></i> &nbsp; Roles</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12 col-sm-6">
					    		<p class="text-left">
			                        <div class="label label-success">Rol 1</div> Administrador
			                    </p>
			                    <p class="text-left">
			                        <div class="label label-primary">Rol 2</div> Usuario 
			                    </p>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="radio radio-primary">
									<label>
										<input type="radio" name="roluser-txt" id="roluser-txt" value="A">
										<i class="zmdi zmdi-star"></i> &nbsp; Rol 1 Control total del sistema
									</label>
								</div>
								<div class="radio radio-primary">
									<label>
										<input type="radio" name="roluser-txt" id="roluser-txt" value="U">
										<i class="zmdi zmdi-star"></i> &nbsp; Rol 2 Sin permiso a reportes y registro de usuarios
									</label>
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
				<div class="RespuestaAjax" id="RespuestaAjax" name="RespuestaAjax"></div><!--MOSTRARÁ LA RESPUESTA DEL AJAX-->
		    </form>
		</div>
	</div>
</div>