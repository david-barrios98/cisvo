<?php
	$peticionAjax=true;
	
	require_once "../core/configGeneral.php";

	if (isset($_POST['dni-reg']) && isset($_POST['nombre-reg']) && isset($_POST['apellido-reg']) && 
        isset($_POST['genero-reg']) && isset($_POST['password1-reg']) && isset($_POST['password2-reg']) &&
        isset($_POST['municipio-reg']) && isset($_POST['departamento-reg']) && isset($_POST['fnaci-reg'])) {
		require_once "../controladores/usuarioControlador.php";
        
        $insAdmin= new usuarioControlador();
        echo $insAdmin->agregar_usuario_controlador();
		
	} else {
		session_start();
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"</script>';
	}