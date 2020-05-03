<?php
	if($peticionAjax){
		require_once "../core/mainModelo.php";
	}else{
		require_once "./core/mainModelo.php";
	}
	
	/**
	 * 
	 */
	class administradorModelo extends mainModelo{
		
		protected function agregar_administrador_modelo($datos){
			$sql= mainModelo::conectar_bd()->prepare("INSERT INTO admin(AdminDNI,AdminNombre,AdminApellido,AdminTelefono,AdminDireccion,CuentaCodigo) VALUES (:DNI,:Nombre,:Apellido,:Telefono,:Direccion,:Codigo)");
			$sql->bindParam(":DNI",$datos['DNI']);
			$sql->bindParam(":Nombre",$datos['Nombre']);
			$sql->bindParam(":Apellido",$datos['Apellido']);
			$sql->bindParam(":Telefono",$datos['Telefono']);
			$sql->bindParam(":Direccion",$datos['Direccion']);
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->execute();
			return $sql;
		}
		protected function agregar_usuarios($datos){
			$sql=mainModelo::conectar_bd()->prepare("INSERT INTO tbl_usuario VALUES (:Id, :Nombre, :Apellido, :Sexo, :Fnac, :Direccion, :Municipio, :Correo, :Telefono, :Clave, :Rol, :Estado);");

			/*Funcion para vincular un parametro al nombre de la variable espcificada */
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->bindParam(":Privilegio",$datos['Privilegio']);
			$sql->bindParam(":Usuario",$datos['Usuario']);
			$sql->bindParam(":Clave",$datos['Clave']);
			$sql->bindParam(":Email",$datos['Email']);
			$sql->bindParam(":Estado",$datos['Estado']);
			$sql->bindParam(":Tipo",$datos['Tipo']);
			$sql->bindParam(":Genero",$datos['Genero']);
			$sql->bindParam(":Foto",$datos['Foto']);
			$sql->execute();
			return $sql;
		}
	}