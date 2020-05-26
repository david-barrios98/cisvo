<?php
   $peticionAjax=true;
	require_once "../core/configGeneral.php";

	if (isset($_POST['objeto-txt'])) {
		require_once "../controladores/objetoControlador.php";
		$insObjeto= new objetoControlador();
		echo $insObjeto->registrar_objeto_controlador();
	} else {
		session_start();
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"</script>';
	}


?>