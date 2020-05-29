<!-- Content page-Descripcion del formulario -->
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Propietario/Poseedor</h1>
	</div>
	<p class="lead" align="justify">Este modulo del sistema permitirá el registro, busqueda, modificación y eliminación de los 
	propietarios o poseedores de objetos y vehiculos, asignándoles  un rol o perfil (Aprendiz - Funcionario - Visitante).</p>
</div>

<!-- Anclas para cambiar las paginas (registrar,listar,buscar). -->
<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>propietario/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PROPIETARIO/POSEEDOR
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>propietariolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTADO DE PROPIETARIO/POSEEDOR
	  		</a>
	  	</li>
		  <li>
	  		<a href="<?php echo SERVERURL; ?>propietariosearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR PROPIETARIO/POSEEDOR
	  		</a>
	  	</li>
	</ul>
</div>

<!-- Formulario para registrar la información del propietario -->
<div class="container-fluid" id="propietario">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PROPIETARIO/POSEEDOR</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL?>ajax/propietarioAjax.php" method="POST" data-form="save" 
			class="FormularioAjax" name="FormularioAjax" autocomplete="off" enctype="multipart/form-data" > 
				<!-- Datos personales -->
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos Básicos</legend>
					<div class="full-box dashboard-sideBar-UserInfo">
						<figure class="full-box">
							<img src="<?php echo SERVERURL; ?>vistas/assets/avatars/camara.png" alt="UserIcon" name="propietario-img">
							<figcaption class="text-center text-titles"></figcaption>
						</figure>
					</div>
		    		<div class="container-fluid">
		    			<div class="row">
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
									<label class="control-label">Rol de la persona *</label>
									<select class="form-control tooltips-general"  id="rolpropietario-txt" name="rolpropietario-txt"
									data-toggle="tooltip" data-placement="top" title="Elige el rol de la persona">
										<option value=""></option>
										<option value="aprendiz">APRENDIZ</option>
										<option value="funcionario">FUNCIONARIO</option>
										<option value="visitante">VISITANTE</option>
                                	</select>
								</div>
                            </div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">No. Documento *</label>
									  <input pattern="[0-9]{4,50}" class="form-control" type="text" name="documento-txt" required=""  title="El documento debe tener minimo 4 digitos!">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombre(s) de la persona *</label>
								  	<input pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,50}" class="form-control" type="text" name="nombre-txt" required="" maxlength="50">
								</div>
		    				</div>
							<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Apellido(s) de la persona *</label>
								  	<input pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,50}" class="form-control" type="text" name="apellido-txt" required="" maxlength="50">
								</div>
		    				</div>
							<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Fecha de nacimiento *</label>
								  	<input class="form-control" type="date" name="fechanac-txt" required=""  value="<?php echo date("Y-m-d");?>">
								</div>
		    				</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Dirección *</label>
								  	<input class="form-control" type="text" name="direccion-txt"  maxlength="70">
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
								  	<label class="control-label">Ciudad/municipio *</label>				  	
									<select class="form-control" name="municipio-txt" id="municipio-txt">
									</select>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="control-label">Genero </label>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="genero-txt" id="masculino" value="Masculino" checked="">
											<i class="zmdi zmdi-male-alt"></i> &nbsp; Masculino
										</label>
									</div>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="genero-txt" id="femenino" value="Femenino">
											<i class="zmdi zmdi-female"></i> &nbsp; Femenino
										</label>
									</div>
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
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
				<!-- Datos de adicionales según el rol -->
				<br>
					<?php
						include "./vistas/contenidos/aprendiz-view.php";
						include "./vistas/contenidos/visitante-view.php";
						include "./vistas/contenidos/funcionario-view.php";
					?>
				<br>
				<!-- Botones -->
				<p class="text-center" style="margin-top: 20px;">
					<button type="reset" class="btn btn-danger btn-raised btn-sm"><i class="zmdi zmdi-roller"></i> &nbsp; Limpiar</button>
					<button type="submit" class="btn btn-primary btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i>&nbsp; Guardar</button>
					<a href="<?php echo SERVERURL; ?>objetos/" class=""><button type="submit" class="btn btn-warning btn-raised btn-sm"><i class="zmdi zmdi-folder">&nbsp; Guardar y Registrar Objeto</i> </button></a>
					<a href="<?php echo SERVERURL; ?>vehiculo/" class=""><button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-directions-car">&nbsp; Guardar y Registrar Vehiculo</i></button></a>
			    </p>
				<div class="RespuestaAjax" id="RespuestaAjax" name="RespuestaAjax"></div><!--MOSTRARÁ LA RESPUESTA DEL AJAX-->
		    </form>
		</div>
	</div>
</div>