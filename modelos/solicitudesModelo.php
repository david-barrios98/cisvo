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
        *@param $datos,  trae el codigo del la solicitud desde el controlador.
        **/
        protected function eliminar_solicitud_modelo($Codigo){
            $sql=mainModelo::conectar_bd()->prepare("UPDATE tbl_solicitudes SET Sol_Estado='I' WHERE Sol_Cod=:Codigo");
            $sql->bindParam(":Codigo",$datos['Codigo']);
            $sql->execute();
            return $sql;
        }

        protected function consultar_propietario($dato){
            $query="SELECT * FROM tbl_propietario_poseedor WHERE Pro_Doc='$dato' AND Pro_Estado='A'";
            $sql=mainModelo::consultas($query);
            return $sql;
        }

        protected function conteo(){
            $query="SELECT * FROM tbl_solicitudes";
            $sql=mainModelo::consultas($query);
            return $sql;
        }
    }