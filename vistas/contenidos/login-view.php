<div class="full-box login-container cover">
	<form action="" method="POST" autocomplete="off" class="logInForm">
		<p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
		<p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta </p>
		<div class="form-group label-floating">
		  <label class="control-label" for="UserName">Usuario</label>
		  <input pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ]{4,50}" required="" class="form-control" 
		  id="UserName" name="usuario" type="text" style="color: #FFF;" title="El usuario debe contener minimo 4 carácteres">
		  <p class="help-block">Escribe tú nombre de usuario</p>
		</div>
		<div class="form-group label-floating">
		  <label class="control-label" for="UserPass">Contraseña</label>
		  <input required="" class="form-control" id="UserPass" name="password" type="password" style="color: #FFF;">
		  <p class="help-block">Escribe tú contraseña</p>
		</div>
		<div class="form-group text-center">
			<input type="submit" value="Iniciar sesión" class="btn btn-info" style="color: #FFF;">
		</div>
	</form>
</div>
<?php
  include "./vistas/modulos/script.php";
  if(isset($_POST['usuario']) && isset($_POST['password'])){
	require_once "./controladores/loginControlador.php";
	$login = new loginControlador();
	echo $login->iniciar_sesion_controlador();
  }
?>