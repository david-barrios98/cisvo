<?php
	if($peticionAjax){
		require_once "../core/mainModelo.php";
	}else{
		require_once "./core/mainModelo.php";
	}
	
	/**
    *@author Hollman Ortiz
    *@version V1.0.0_Mayo2020
    *El presente archivo contiene la clase(ObjetoModelo) para la interaccion directa con la base de datos.
    * 
    */
    class objetoModelo extends mainModelo{

        protected function registrar_objeto_Modelo($objeto){
			$sql= mainModelo::conectar_bd()->prepare("INSERT INTO tbl_objeto VALUES(:Codigo,:Nombre,:Marca,:Modelo,:Cantidad,:Estado,:Tipo,:Propietario)");
			$sql->bindParam(":Codigo",$objeto['Codigo']);
			$sql->bindParam(":Nombre",$objeto['Nombre']);
			$sql->bindParam(":Marca",$objeto['Marca']);
			$sql->bindParam(":Modelo",$objeto['Modelo']);
			$sql->bindParam(":Cantidad",$objeto['Cantidad']);
			$sql->bindParam(":Estado",$objeto['Estado']);
			$sql->bindParam(":Tipo",$objeto['Tipo']);
			$sql->bindParam(":Propietario",$objeto['Propietario']);
			$sql->execute();
			return $sql;
		}

		protected function codigo_auto(){
			$sql= mainModelo::conectar_bd()->prepare("SELECT * FROM tbl_objeto");
			$sql->execute();
			return $sql;
		}

    }

    