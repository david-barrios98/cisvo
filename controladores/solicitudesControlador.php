<?php
    if($peticionAjax){
        require_once "../modelos/solicitudesModelo.php";
    }else{
        require_once "./modelos/solicitudesModelo.php";
    }
    
    /**
    *@author Alex Cera
    *@version V1.0.0_Mayo2020
    *El presente archivo contiene la clase(solicitudControlador) para la interaccion con el modelo de solicitudes.
    */
    class solicitudControlador extends solicitudModelo{

        /**
         * Funcion que interactua con vista y modelo para el registro de las solicitudes.
         */
        public function registrar_solicitud_Controlador(){
            $Propietario=mainModelo::limpiar_cadena($_POST['docpropietario-txt']);
            $Tipo=mainModelo::limpiar_cadena($_POST['tiposolicitud-txt']);
            $Desc=mainModelo::limpiar_cadena($_POST['descripsolicitud-txt']);
            $FechaHora= date("Y-m-d h:i:s a" );
            $Objeto=mainModelo::limpiar_cadena($_POST['objveh-txt']);
            $Vehiculo=mainModelo::limpiar_cadena($_POST['objveh-txt']);
            $codigo=solicitudModelo::conteo();
            $codigo=($codigo->rowCount()+1);
        
            $consultaPropietario=solicitudModelo::consultar_propietario($Propietario);
            $consultaPropietario=$consultaPropietario->rowCount();
            if($consultaPropietario==1){
                session_start(['name'=>'S_CISVO']);        
                $dataSoli=[
                    "Codigo"=>$codigo,
                    "Tipo"=>$Tipo,
                    "Descripcion"=>$Desc,
                    "FechaHora"=>$FechaHora,
                    "Estado"=>"A",
                    "Propietario"=>$Propietario,
                    "Objeto"=>"",
                    "Vehiculo"=>$Vehiculo,
                    "Usuario"=> $_SESSION['usuario_CISVO']
                ];
        
                $guardarSoli=solicitudModelo::registrar_solicitud_modelo($dataSoli);
                
                if ($guardarSoli->rowCount()==1) {
                    $alerta=[
                    "Alerta"=>"limpiar",
                    "Titulo"=>"Solicitud registrada",
                    "Texto"=>"Registro satisfactorio!",
                    "Tipo"=>"success"
                    ];  
                
                }else{
                    $alerta=[
                        "Alerta"=>"simple",
                        "Titulo"=>"Ocurrio un error inesperado",
                        "Texto"=>"No se ha podido registrar la solicitud!",
                        "Tipo"=>"error"
                    ];       
                }
            }else{
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"El propietario no esta registrado en el sistema!",
                    "Tipo"=>"error"
                ];   
            }
            return mainModelo::sweet_alert($alerta);
        }

        
    }