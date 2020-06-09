<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles"><i class="zmdi zmdi-settings zmdi-hc-fw"></i> MI CUENTA</small></h1>
	</div>
	<p class="lead"> En esta opción del sistema prodrá visualizar su información de cuenta y dado el caso que lo desee o lo amerite podrá actualizar la información de esta.</p>
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
					<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; MI CUENTA</h3>
				</div>
				<div class="panel-body">
					<form action="<?php echo SERVERURL?>ajax/usuarioAjax.php" method="POST" 
					data-form="update" class="FormularioAjax" name="FormularioAjax" autocomplete="on" 
					enctype="multipart/form-data">
						<fieldset>
							<input type="hidden" name="documento" value="<?php echo $datos[2] ?>">
							<legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
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
											<label class="control-label">Celular</label>
											<input pattern="[0-9+]{1,15}" class="form-control" type="text" name="celular"  id="celular" maxlength="15" value="<?php echo $campos['Usu_Celular'] ?>">
										</div>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="form-group label-floating">
											<label class="control-label">E-mail</label>
											<input class="form-control" type="email" name="email" id="email" maxlength="50" value="<?php echo $campos['Usu_Correo'] ?>">
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
												<input type="radio" name="rolusu" id="rol1-up" value="A" <?php if($campos['Usu_Rol']=="A"){  echo'checked=""';}?> disabled>
												<i class="zmdi zmdi-star"></i> &nbsp; Rol 1 Control total del sistema
											</label>
										</div>
										<div class="radio radio-primary">
											<label>
												<input type="radio" name="rolusu" id="rol2-up" value="U" <?php if($campos['Usu_Rol']=="U"){  echo'checked=""';}?> disabled>
												<i class="zmdi zmdi-star"></i> &nbsp; Rol 2 Sin permiso a reportes y registro de usuarios
											</label>
										</div>
									</div>
								</div>
							</div>
						</fieldset>
						<br>
						<fieldset>
							<legend>&nbsp; <i class="zmdi zmdi-info"></i>&nbsp; Estado</legend>
							<div class="container-fluid">
								<div class="row">
									<div class="col-xs-12 col-sm-6">
										<p class="text-left">
											<div class="label label-success">Activo</div> 
										</p>
										<p class="text-left">
											<div class="label label-primary">Inactivo</div> 
										</p>
									</div>
									<div class="col-xs-12 col-sm-6">
										<div class="radio radio-primary">
											<label>
												<input type="radio" name="estadousu" id="estadoUsuario" value="A" <?php if($campos['Usu_Estado']=="A"){  echo'checked=""';}?>>
												<i class="zmdi zmdi-info"></i> &nbsp; Activo: Tendrá acceso al sistema en cualquier momento que lo requiera 
											</label>
										</div>
										<div class="radio radio-primary">
											<label>
												<input type="radio" name="estadousu" id="estadoUsuario" value="I" <?php if($campos['Usu_Estado']=="I"){  echo'checked=""';}?>>
												<i class="zmdi zmdi-info"></i> &nbsp; Inactivo: No tendrá acesso al sistema y automaticamente se forza a cerra sesión
											</label>
										</div>
									</div>
								</div>
							</div>
						</fieldset>
						<p class="text-center" style="margin-top: 20px;">
							<button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-refresh"></i> Actualizar</button>
						</p>
						<div class="RespuestaAjax" name="RespuestaAjax" id="RespuestaAjax"></div>
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
