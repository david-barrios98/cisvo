<?php
    $peticionAjax=true;	
	require_once "../core/configGeneral.php";
    require_once "../controladores/solicitudesControlador.php";
    
    if(isset($_POST['docpropietario-txt'])){      
        $insSolicitud= new solicitudControlador();
        echo $insSolicitud->registrar_solicitud_Controlador();
    }else{
        session_start();
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"</script>';
    }

?>