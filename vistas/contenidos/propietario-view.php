<!-- Content page -->
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Propietario/Poseedor<small> PERSONAS</small></h1>
	</div>
	<p class="lead">Este modulo del sistema permitirá el registro, busqueda, modificación y eliminación de los 
	propietarios o poseedores de objetos y vehiculos, asignándoles  un rol o perfil (Aprendiz - Funcionario - Instructor - Visitante).</p>
</div>

<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>propietario/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PROPIETARIO/POSEEDOR
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>propietariolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTA DE PROPIETARIO/POSEEDOR
	  		</a>
	  	</li>
		  <li>
	  		<a href="<?php echo SERVERURL; ?>propietariosearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR PROPIETARIO
	  		</a>
	  	</li>
	</ul>
</div>

<!-- Panel nueva categoria -->
<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; NUEVO PROPIETARIO/POSEEDOR</h3>
		</div>
		<div class="panel-body">
			<form>
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-assignment"></i> &nbsp; Datos Básicos</legend>
					<div class="full-box dashboard-sideBar-UserInfo">
						<figure class="full-box">
							<img src="<?php echo SERVERURL; ?>vistas/assets/avatars/camara.png" alt="UserIcon">
							<figcaption class="text-center text-titles"></figcaption>
						</figure>
					</div>
		    		<div class="container-fluid">
		    			<div class="row">
							<div class="col-xs-6">
								<div class="form-group label-floating">
									<label class="control-label">Rol de la persona</label>
									<select class="form-control tooltips-general"  name="rol" onchange="if (this.value=='aprendiz')$.ajax({ success: function(){ $('#aprendiz').show(); $('#visitante').hide(); $('#funcionario').hide();}}); if (this.value=='visitante')$.ajax({ success: function(){$('#visitante').show(); $('#aprendiz').hide(); $('#funcionario').hide();}});
									if (this.value=='funcionario')$.ajax({ success: function(){ $('#funcionario').show(); $('#visitante').hide(); $('#aprendiz').hide();}})" 
									data-toggle="tooltip" data-placement="top" title="Elige la sección a la que pertenece el alumno">
										<option value="blanco"></option>
										<option value="aprendiz">Aprendiz</option>
										<option value="funcionario">Funcionario</option>
										<option value="visitante">Visitante</option>
                                	</select>
								</div>
                            </div>
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
							<div class="col-xs-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Dirección</label>
								  	<input class="form-control" type="text" name="direccion-reg" maxlength="170">
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
										<label>
											<input type="radio" name="GENERO" id="optionsRadios1" value="Masculino" checked="">
											<i class="zmdi zmdi-male-alt"></i> &nbsp; Masculino
										</label>
									</div>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="GENERO" id="optionsRadios2" value="Femenino">
											<i class="zmdi zmdi-female"></i> &nbsp; Femenino
										</label>
									</div>
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
				<br>
					<?php
						include "./vistas/contenidos/aprendiz-view.php";
						include "./vistas/contenidos/visitante-view.php";
						include "./vistas/contenidos/funcionario-view.php";
					?>
				<br>
				<p class="text-center" style="margin-top: 20px;">
					<button type="reset" class="btn btn-danger btn-raised btn-sm"><i class="zmdi zmdi-roller"></i> &nbsp; Limpiar</button>
					<button type="submit" class="btn btn-primary btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i>&nbsp; Guardar</button>
					<a href="<?php echo SERVERURL; ?>objetos/" class=""><button type="submit" class="btn btn-warning btn-raised btn-sm"><i class="zmdi zmdi-folder">&nbsp; Guardar y Registrar Objeto</i> </button></a>
					<a href="<?php echo SERVERURL; ?>vehiculo/" class=""><button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-directions-car">&nbsp; Guardar y Registrar Vehiculo</i></button></a>
			    </p>
		    </form>
		</div>
	</div>
</div>