<?php
	if($peticionAjax){
		require_once "../core/mainModelo.php";
	}else{
		require_once "./core/mainModelo.php";
	}
	
    class ObjetoModelo extends mainModelo{

        protected function registrar_Objeto_modelo($objeto){
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


    }

    