<?php
    if($peticionAjax){
		require_once "../core/mainModelo.php";
	}else{
		require_once "./core/mainModelo.php";
	}
	
	/**
    *@author Alex Cera
    *@version V1.0.0_Mayo2020
    *El presente archivo contiene la clase(solicitudModelo) para la interaccion directa con la base de datos.
    * 
    */

    class solicitudModelo extends mainModelo{

        /**
        *La siguiente funcion es la responsable por hacer el registro de la informacion de una solicitud.
        *@param $datos, Arrary que trae la informacion del controlador.
        **/
        protected function registrar_solicitud_modelo($datos){
            $sql=mainModelo::conectar_bd()->prepare("INSERT INTO tbl_solicitudes VALUES(:Codigo,:Tipo,:Descripcion,:FechaHora,:Estado,:Propietario,:Objeto,:Vehiculo,:Usuario)");
            $sql->bindParam(":Codigo",$datos['Codigo']);
            $sql->bindParam(":Tipo",$datos['Tipo']);
            $sql->bindParam(":Descripcion",$datos['Descripcion']);
            $sql->bindParam(":FechaHora",$datos['FechaHora']);
            $sql->bindParam(":Estado",$datos['Estado']);
            $sql->bindParam(":Propietario",$datos['Propietario']);
            $sql->bindParam(":Objeto",$datos['Objeto']);
            $sql->bindParam(":Vehiculo",$datos['Vehiculo']);
            $sql->bindParam(":Usuario",$datos['Usuario']);
            $sql->execute();
            return $sql;
        }

        /**
        *La siguiente funcion es la responsable para eliminar una solicitud de la base de datos.
        *@param $Codigo,  trae el codigo del la solicitud desde el controlador.
        **/
        protected function eliminar_solicitud_modelo($Codigo){
            $sql=mainModelo::conectar_bd()->prepare("UPDATE tbl_solicitudes SET Sol_Estado='I' WHERE Sol_Cod=:Codigo");
            $sql->bindParam(":Codigo",$Codigo);
            $sql->execute();
            return $sql;
        }

        /**
        *La siguiente funcion es la responsable de consultar por una solicitud de la base de datos.
        *@param $dato,  trae el codigo del la solicitud desde el controlador.
        **/
        protected function consultar_solicitud($dato){
            $query="SELECT * FROM tbl_solicitudes WHERE Sol_Cod='$dato' AND Sol_Estado='A'";
            $sql=mainModelo::consultas($query);
            return $sql;
        }


        /**
        *La siguiente funcion es para consultar por la existencia de un propietario  de la base de datos.
        *@param $dato,  trae el documento de la persona desde el controlador.
        **/
        protected function consultar_propietario($dato){
            $query="SELECT * FROM tbl_propietario_poseedor WHERE Pro_Doc='$dato' AND Pro_Estado='A'";
            $sql=mainModelo::consultas($query);
            return $sql;
        }

        /**
        *La siguiente funcion es la responsable para hacer conteo de solicitudes de la base de datos.
        *@param $Option,  trae un numero para el correspondiente conteo de solicitudes, desde el controlador.
        **/
        protected function conteo($Option){
            if($Option==1){
                $query="SELECT * FROM tbl_solicitudes WHERE Sol_Estado!='I'";
                $sql=mainModelo::consultas($query);
            }elseif($Option==2){
                $query="SELECT * FROM tbl_solicitudes ";
                $sql=mainModelo::consultas($query);
            }
            
            return $sql;
        }

        /**
        *La siguiente funcion es la responsable para cargar la lista de solicitudes que hay en la base de datos.
        *@param $inicio,  trae un numero, el cual permitira saber desde que registro se debe mostrar en la pagina.
        *@param $regxpagina, trae la cantidad de registro a mostrar por pagina.
        **/
        protected function config_tabla_solicitudes_modelo($inicio,$regxpagina,$busqueda,$Option){
            if($Option==1){
                $sql="SELECT SQL_CALC_FOUND_ROWS * 
                FROM tbl_solicitudes 
                INNER JOIN tbl_propietario_poseedor 
                ON Pro_Doc=Sol_Pro_Doc 
                INNER JOIN tbl_usuario
                ON Usu_Doc= Sol_Usu_doc
                INNER JOIN tbl_deta_parametro
                ON Det_Codigo= Sol_Tipo
                WHERE Sol_Estado!='I'
                LIMIT $inicio,$regxpagina";
            }elseif($Option==2){
                ECHO $sql="SELECT  * 
                FROM tbl_solicitudes 
                INNER JOIN tbl_propietario_poseedor 
                ON Pro_Doc=Sol_Pro_Doc 
                INNER JOIN tbl_usuario
                ON Usu_Doc= Sol_Usu_doc
                INNER JOIN tbl_deta_parametro
                ON Det_Codigo= Sol_Tipo
                WHERE ((Sol_Cod LIKE '%$busqueda%' OR Sol_Pro_Doc LIKE '%$busqueda%' 
                OR Sol_Objeto LIKE '%$busqueda%' OR Sol_Vehiculo LIKE '%$busqueda%') AND  (Sol_Estado!='I'))
                LIMIT $inicio,$regxpagina";
                //$sql->bindParam(":busqueda",$busqueda);
            }
            $sql=mainModelo::conectar_bd()->prepare($sql);
            $sql->execute();
            return $sql;
        }
    }