<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i> MIS DATOS</small></h1>
	</div>
	<p class="lead">En esta opción del sistema prodrá visualizar su información personal y dado el caso que lo desee o lo amerite podrá actualizar sus datos.</p>
</div>

<!-- Panel mis datos -->
<div class="container-fluid">
	<?php
		$datos=explode("/", $_GET['views']);
		if(isset($datos[1]) && $datos[1]=="admin" || $datos[1]=="usuadmin"):
			if($_SESSION['rol_CISVO']!='A' || $_SESSION['rol_CISVO']!='U'){
				//FORZAR CIERRE DE SESION
			}
			require_once "./controladores/usuarioControlador.php";
			$ins = new usuarioControlador();
			$info = $ins->datos_usuario_controlador("unico", $datos[2]);
			if($info->rowCount()==1){
				$campos=$info->fetch();
				if($campos['Usu_Doc']!=$_SESSION['usuario_CISVO']){
					//FORZAR CIERRE DE SESION
				}
	?>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; MIS DATOS</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL?>ajax/usuarioAjax.php" method="POST" 
			 data-form="update" class="FormularioAjax" name="FormularioAjax" autocomplete="off" 
			 enctype="multipart/form-data">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
		    		<div class="container-fluid">
						<input type="hidden" name="documento" value="<?php echo $datos[2] ?>">
		    			<div class="row">
							<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">No. Documento *</label>
								  	<input pattern="[0-9-]{1,30}" disabled class="form-control" type="text" name="doc" id="doc" value="<?php echo $campos['Usu_Doc'] ?>" required="" maxlength="50">
								</div>
							</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombre(s) *</label>
								  	<input pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,50}" class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $campos['Usu_Nombre'] ?>" required="" maxlength="50">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Apellido(s) *</label>
								  	<input pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{2,50}" class="form-control" type="text" name="apellido" id="apellido" value="<?php echo $campos['Usu_Apellido'] ?>" required="" maxlength="50">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Fecha Nacimiento</label>
								  	<input  class="form-control" type="date" name="fnac" id="fnac" value="<?php echo $campos['Usu_FechaNac'] ?>">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Dirección</label>
								  	<input pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{5,70}" class="form-control" type="text" name="direccion" id="direccion" value="<?php echo $campos['Usu_Direccion'] ?>" maxlength="70">
								</div>
		    				</div>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Departamento</label>				  	
									<select class="form-control" selected='selected' name="departamento-txt" id="departamento-txt">
									</select>
								</div>
							</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Ciudad/municipio</label>				  	
									<select class="form-control" selected='selected' name="municipio-txt" id="municipio-txtttt">
									</select>
								</div>
							</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="control-label">Genero</label>
									<div class="radio radio-primary">
										<label class="col-md-4">
											<input type="radio" name="genero" <?php if($campos['Usu_Genero']=="M"){  echo'checked=""';}?>id="masculino" value="M" checked="">
											<i class="zmdi zmdi-male-alt"></i> &nbsp; Masculino
										</label>
									</div>
									<div class="radio radio-primary">
										<label class="col-md-4">
											<input type="radio" name="genero" <?php if($campos['Usu_Genero']=="F"){  echo'checked=""';}?> id="femenino" value="F">
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
				<div class="RespuestaAjax" name="RespuestaAjax"></div>
		    </form>
			
		</div>
	</div>
	<?php

			}else{
	?>
	<h2>ERROR ENVIO DE INFORMACION</h2>
	<?php
			}
		else:	
	?>
	<h2>ERROR DE URL</h2>
	<?php endif; ?>
	
</div>