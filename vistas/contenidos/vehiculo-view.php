<!-- Content page-Descripcion del formulario -->
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-car "></i> Vehiculos </h1>
	</div>
	<p class="lead" align="justify">
		Esta funcionalidad del sistema, le permite añadir, actualizar, eliminar y consultar, información de los vehiculos que ingresan y salen del centro de formación!
	</p>
</div>

<!-- Anclas para cambiar las paginas (registrar,listar,buscar). -->
<div class="container-fluid">
	<ul class="breadcrumb breadcrumb-tabs">
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>vehiculo/" class="btn btn-info">
	  			<i class="zmdi zmdi-plus"></i> &nbsp; NUEVO VEHICULO
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>vehiculolist/" class="btn btn-success">
	  			<i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; LISTADO DE VEHICULOS
	  		</a>
	  	</li>
	  	<li>
	  		<a href="<?php echo SERVERURL; ?>vehiculosearch/" class="btn btn-primary">
	  			<i class="zmdi zmdi-search"></i> &nbsp; BUSCAR VEHICULO
	  		</a>
	  	</li>
	</ul>
</div>

<!-- panel datos del vehiculo- FORMULARIO DE REGISTRO -->
<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-plus"></i> &nbsp; DATOS DEL VEHICULO</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL?>ajax/vehiculoAjax.php" method="POST" data-form="save" 
			class="FormularioAjax" name="FormularioAjax" autocomplete="off" enctype="multipart/form-data" >
				<!--Datos del vehiculo-->
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-assignment"></i> &nbsp; Información del vehiculo</legend>
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
								  	<label class="control-label">Placa *</label>
								  	<input class="form-control" type="text" name="placa-txt" id="placa-txt" maxlength="7">
								</div>
		    				</div>
		    				<!--Combo box tipo vehiculo-->
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Tipo de vehiculo *</label>				  	
									<select class="form-control" name ="tipovehiculo-txt" id="tipovehiculo-txt">
									</select>
								</div>
							</div>
							<!--Combo box marca vehiculo-->
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Marca de vehiculo *</label>				  	
									<select class="form-control" name ="marcavehiculo-txt" id="marcavehiculo-txt">
									</select>
								</div>
							</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Modelo *</label>
								  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="modelovehiculo-txt"  id="modelovehiculo-txt" required="" maxlength="50">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Color *</label>
								  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" type="text"  name="colorvehiculo-txt" id="colorvehiculo-txt" required="" maxlength="50">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Tarjeta de Propiedad *</label>
								  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="tarjetavehiculo-txt"   name="tarjetavehiculo-txt"maxlength="50">
								</div>
		    				</div>	
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">SOAT *</label>
								  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="soatvehiculo-txt" name="soatvehiculo-txt" maxlength="50">
								</div>
		    				</div>	
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
				<!-- Datos propietario -->
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
									  	<input pattern="[0-9-]{1,30}" class="form-control" type="text" name="docpropietario-txt" required="" maxlength="50">
									</div>
			    				</div>
			    				<div class="col-xs-12 col-sm-6">
							    	<div class="form-group label-floating">
									  	<label class="control-label">Nombre(s) *</label>
									  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]" class="form-control" type="text" name="nombrepropietario-txt" required="" maxlength="50">
									</div>
			    				</div>
			    				<div class="col-xs-12 col-sm-6">
							    	<div class="form-group label-floating">
									  	<label class="control-label">Apellido(s) *</label>
									  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]" class="form-control" type="text" name="apellidopropietario-txt" required="" maxlength="50">
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
					<a href="<?php echo SERVERURL; ?>objetos/" class=""><button type="submit" class="btn btn-warning btn-raised btn-sm"><i class="zmdi zmdi-folder">&nbsp; Guardar y Registrar Objeto</i> </button></a>
			    </p>
		    </form>
		</div>
	</div>
</div>