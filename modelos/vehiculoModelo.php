<?php
	if($peticionAjax){
		require_once "../core/mainModelo.php";
	}else{
		require_once "./core/mainModelo.php";
	}
    
    /**
	*@author Jesus Orozco
	*El presente archivo contiene la clase(vehiculoModelo) que interactura con la base de datos. 
	*/
    class vehiculoModelo extends mainModelo{

        /**
         * Funcion que permite el registro de un nuevo vehiculo en la base de datos
         * @param $vehiculo, array que trae la respectiva informacion del vehiculo
         */
        protected function registrar_vehiculo_modelo($datos){
			$sql= mainModelo::conectar_bd()->prepare("INSERT INTO tbl_vehiculo VALUES(:Placa,:Tipo,:Marca,:Modelo,:Color,:Tarjpro,:Soat,:Estado,:Propietario)");
			$sql->bindParam(":Placa",$datos['Placa']);
			$sql->bindParam(":Tipo",$datos['Tipo']);
			$sql->bindParam(":Marca",$datos['Marca']);
			$sql->bindParam(":Modelo",$datos['Modelo']);
			$sql->bindParam(":Color",$datos['Color']);
			$sql->bindParam(":Tarjpro",$datos['Tarjpro']);
			$sql->bindParam(":Soat",$datos['Soat']);
			$sql->bindParam(":Estado",$datos['Estado']);
			$sql->bindParam(":Propietario",$datos['Propietario']);
			$sql->execute();
			return $sql;
		}

		protected function consultar_vehiculo($Placa){
			$sql=mainModelo::consultas("SELECT * FROM tbl_vehiculo WHERE Veh_Placa='$Placa'");
			return $sql->rowCount();			
		}

    }

    