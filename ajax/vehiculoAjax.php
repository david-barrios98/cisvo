<?php
	$peticionAjax=true;
	require_once "../core/configGeneral.php";
	require_once "../controladores/vehiculoControlador.php";

	if(isset($_POST['placa-txt'])){
		$insVehiculo= new vehiculoControlador();
		echo $insVehiculo->registrar_vehiculo_controlador();	
	}else {
		session_start();
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"</script>';
	}

?>