<?php
    $peticionAjax=true;	
	require_once "../core/configGeneral.php";
    require_once "../controladores/solicitudesControlador.php";
     $insSolicitud= new solicitudControlador();

    if(isset($_POST['docpropietario-txt'])){      
        echo $insSolicitud->registrar_solicitud_Controlador();
    }elseif(isset($_POST["id_solicitud"])){
        echo $insSolicitud->eliminar_solicitud_Controlador();
    }
    else{
        session_start();
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/"</script>';
    }

?>