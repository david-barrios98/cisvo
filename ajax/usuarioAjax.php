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

	}elseif(isset($_POST['id-usu'])){
		echo $insUsu->actualizar_usuario_controlador();
	}else{
		session_start();
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"</script>';
	}