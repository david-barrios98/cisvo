<?php
	if($peticionAjax){
		require_once "../core/mainModelo.php";
	}else{
		require_once "./core/mainModelo.php";
	}
	
	class usuarioModelo extends mainModelo{
        
        
		protected function agregar_usuarios($datos){
			$sql=mainModelo::conectar_bd()->prepare("CALL registro_usuarios(:Id, :Nombre, :Apellido, :Sexo, :Fnac, :Direccion, :Municipio, :Correo, :Telefono, :Clave, :Rol);");

			/*Funcion para vincular un parametro al nombre de la variable espcificada */
			$sql->bindParam(":Id",$datos['DNI']);
			$sql->bindParam(":Nombre",$datos['Nombre']);
			$sql->bindParam(":Apellido",$datos['Apellido']);
			$sql->bindParam(":Direccion",$datos['Direccion']);
			$sql->bindParam(":Telefono",$datos['Telefono']);
			$sql->bindParam(":Clave",$datos['Clave']);
			$sql->bindParam(":Fnac",$datos['Fnacimiento']);
			$sql->bindParam(":Correo",$datos['Correo']);
			//$sql->bindParam(":Estado",$datos['Estado']);
			$sql->bindParam(":Municipio",$datos['Municipio']);
			$sql->bindParam(":Sexo",$datos['Sexo']);
			$sql->bindParam(":Rol",$datos['Rol']);
			$sql->execute();
			return $sql;
        }

        protected function ejecutar_consulta_usuario($parametro){
			$respuesta=mainModelo::conectar_bd()->prepare("SELECT Usu_Doc FROM tbl_usuario WHERE Usu_Doc='$parametro'");
			$respuesta->execute();
			return $respuesta;
        }
        
        protected function ejecutar_consulta_email($parametro){
			$respuesta=mainModelo::conectar_bd()->prepare("SELECT Usu_Correo FROM tbl_usuario WHERE Usu_Correo='$parametro'");
			$respuesta->execute();
			return $respuesta;
		}
	}