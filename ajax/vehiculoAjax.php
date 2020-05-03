<?php
	$peticionAjax=true;
	
	require_once "../core/configGeneral.php";

	if (isset($_POST['PLACA'])) {
		require_once "../controladores/vehiculoControlador.php";
		$insAdmin= new administradorControlador();
		echo $insAdmin->agregar_administrador_controlador();
		
	} else {
		session_start();
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"</script>';
	}