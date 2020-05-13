<?php
	$peticionAjax=true;
	
	require_once "../core/configGeneral.php";
	require_once "../controladores/usuarioControlador.php";
	$insUsu= new usuarioControlador();

	if (isset($_POST['dni-reg']) && isset($_POST['nombre-reg']) && isset($_POST['apellido-reg']) && 
        isset($_POST['genero-reg']) && isset($_POST['password1-reg']) && isset($_POST['password2-reg']) &&
        isset($_POST['municipio-reg']) && isset($_POST['departamento-reg']) && isset($_POST['fnaci-reg'])) {
		
        echo $insUsu->agregar_usuario_controlador();
		
	}elseif(isset($_POST['id-usuario'])){
		
		echo $insUsu->eliminar_usuario_controlador();

	}elseif(isset($_POST['id-usu'])){
		echo $insUsu->actualizar_usuario_controlador();
	}else{
		session_start();
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"</script>';
	}