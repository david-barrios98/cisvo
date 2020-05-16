<?php
   $peticionAjax=true;
	
	require_once "../core/configGeneral.php";

	if (isset($_POST['nombre-obj'])) {
		require_once "../controladores/ObjetoControlador.php";
		$insAdmin= new objetoControlador();
		echo $insAdmin->registrar_Objeto_controlador();
	} else {
		session_start();
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"</script>';
	}


?>