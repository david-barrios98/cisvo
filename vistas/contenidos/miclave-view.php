<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-lock zmdi-hc-fw"></i> MI CUENTA</small></h1>
	</div>
	<p class="lead"> En esta opción del sistema prodrá cambiar su clave de ingreso al sistema.</p>
</div>

<?php 
	$datos=explode("/", $_GET['views']);

	if(isset($datos[1]) && $datos[1]=="admin" || $datos[1]=="usuadmin"){
		if($_SESSION['rol_CISVO']!='A' || $_SESSION['rol_CISVO']!='U'){
			//FORZAR CIERRE DE SESION
		}
		require_once "./controladores/usuarioControlador.php";
		$ins = new UsuarioControlador();
		$info = $ins->datos_usuario_cuenta_controlador($datos[2]);
		if($info->rowCount()==1){
			$campos=$info->fetch();
				if($campos['Usu_Doc']!=$_SESSION['usuario_CISVO']){
					//FORZAR CIERRE DE SESION
				}
?>
		<div class="container-fluid">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; MI CLAVE</h3>
				</div>
				<div class="panel-body">
					<form action="<?php echo SERVERURL?>ajax/usuarioAjax.php" method="POST" 
					data-form="update" class="FormularioAjax" name="FormularioAjax" autocomplete="on" 
					enctype="multipart/form-data">
						<fieldset>
                            <input type="hidden" name="documento" value="<?php echo $datos[2] ?>">
							<legend><i class="zmdi zmdi-lock"></i> &nbsp; Contraseña</legend>
							<p>
								Opción para modificación de contraseña. NOTA: Se recomienda que por seguridad la modifique periodicamente.
							</p>
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Contraseña actual *</label>
											<input class="form-control" type="password" name="passAntigua" required="" maxlength="70">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
											<label class="control-label">Nueva contraseña *</label>
											<input class="form-control" type="password" name="passNueva" required="" maxlength="70">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
											<label class="control-label">Repita la nueva contraseña *</label>
											<input class="form-control" type="password" name="passConfirm" required="" maxlength="70">
										</div>
									</div>
								</div>
							</div>
						</fieldset>
						<br>
						<p class="text-center" style="margin-top: 20px;">
							<button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-refresh"></i> Actualizar</button>
						</p>
						<div class="RespuestaAjax"></div>
					</form>
				</div>
			</div>
		</div>
<?php

		}else{
?>
<h1> ERROR CUENTA </h2>
<?php 
		}
	}else{
?>
	<h1> ERROR DE URL </h2>
<?php } ?>
<!-- Panel mi cuenta -->