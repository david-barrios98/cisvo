<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-settings zmdi-hc-fw"></i> MI CUENTA</small></h1>
	</div>
	<p class="lead"> En esta opción del sistema prodrá visualizar su información de cuenta y dado el caso que lo desee o lo amerite podrá actualizar la información de esta.</p>
</div>

<!-- Panel mi cuenta -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; MI CUENTA</h3>
		</div>
		<div class="panel-body">
			<form>
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
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
								  	<label class="control-label">Teléfono</label>
								  	<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="telefono-up"  id="telefono-up" maxlength="15">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">E-mail</label>
								  	<input class="form-control" type="email" name="email-up" id="email-up" maxlength="50">
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-lock"></i> &nbsp; Contraseña</legend>
		    		<p>
						Opción para modificación de contraseña. NOTA: Se recomienda que por seguridad la modifique periodicamente.
		    		</p>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12">
								<div class="form-group label-floating">
								  	<label class="control-label">Contraseña actual *</label>
								  	<input class="form-control" type="password" name="password-up" required="" maxlength="70">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Nueva contraseña *</label>
								  	<input class="form-control" type="password" name="newPassword1-up" required="" maxlength="70">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Repita la nueva contraseña *</label>
								  	<input class="form-control" type="password" name="newPassword2-up" required="" maxlength="70">
								</div>
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
										<input type="radio" name="rol-up" id="rol1-up" value="A">
										<i class="zmdi zmdi-star"></i> &nbsp; Rol 1 Control total del sistema
									</label>
								</div>
								<div class="radio radio-primary">
									<label>
										<input type="radio" name="rol-up" id="rol2-up" value="U">
										<i class="zmdi zmdi-star"></i> &nbsp; Rol 2 Sin permiso a reportes y registro de usuarios
									</label>
								</div>
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