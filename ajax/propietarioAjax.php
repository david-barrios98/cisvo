<?php
   $peticionAjax=true;
	
	require_once "../core/configGeneral.php";

	if (isset($_POST['documento-txt'])) {
		require_once "../controladores/propietarioControlador.php";
		$insPropietario= new propietarioControlador();
		echo $insPropietario->Registrar_Propietario_Controlador();
	} else {
		session_start();
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"</script>';
	}
