<?php
	$peticionAjax=true;
	
	require_once "../core/configGeneral.php";
	require_once "../controladores/usuarioControlador.php";
	$insUsu= new usuarioControlador();

	if (isset($_POST['documento-txt']) && isset($_POST['nombre-txt']) && isset($_POST['apellido-txt']) && 
        isset($_POST['genero-txt']) && isset($_POST['password1-txt']) && isset($_POST['password2-txt']) &&
        isset($_POST['municipio-txt']) && isset($_POST['departamento-txt']) && isset($_POST['fechanac-txt']) && isset($_POST['roluser-txt'])) {
		
        echo $insUsu->agregar_usuario_controlador();
		
	}elseif(isset($_POST['id-usuario'])){
		
		echo $insUsu->eliminar_usuario_controlador();

	}elseif(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['fnac']) && isset($_POST['direccion'])){
		echo $insUsu->modificar_datos_usuario_controlador();
	}elseif(isset($_POST['celular']) && isset($_POST['email'])){
		echo $insUsu->modificar_cuenta_usuario_controlador();

	}elseif(isset($_POST['passAntigua']) && isset($_POST['passNueva']) && isset($_POST['passConfirm'])){
		echo $insUsu->modificar_clave_usuario_controlador();

	}else{
		session_start();
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"</script>';
	}