<?php
	if($peticionAjax){
		require_once "../core/mainModelo.php";
	}else{
		require_once "./core/mainModelo.php";
	}
	
	/**
	*@author David Barrios
	*El presente archivo contiene la clase(usuarioModelo) que interactura con la base de datos. 
	*/
	class usuarioModelo extends mainModelo{
        
		/**
		*@param $datos parametro tipo array para crear usuario 
		*/
		protected function agregar_usuarios_modelo($datos){
			//$sql=mainModelo::conectar_bd()->prepare("CALL registro_usuarios(:Id, :Nombre, :Apellido, :Sexo, :Fnac, :Direccion, :Municipio, :Correo, :Telefono, :Clave, :Rol);");
			$sql=mainModelo::conectar_bd()->prepare("INSERT INTO tbl_usuario VALUES(:Doc,:Nombre,:Apellido,:Sexo,:Fnac,:Direccion,:Municipio,:Correo,:Telefono,:Clave,:Rol,:Foto,:Estado)");
			/*Funcion para vincular un parametro al nombre de la variable espcificada */	
			$sql->bindParam(":Doc",$datos['Doc']);
			$sql->bindParam(":Nombre",$datos['Nombre']);
			$sql->bindParam(":Apellido",$datos['Apellido']);
			$sql->bindParam(":Sexo",$datos['Sexo']);
			$sql->bindParam(":Fnac",$datos['Fnac']);
			$sql->bindParam(":Direccion",$datos['Direccion']);
			$sql->bindParam(":Municipio",$datos['Municipio']);
			$sql->bindParam(":Correo",$datos['Correo']);
			$sql->bindParam(":Telefono",$datos['Telefono']);
			$sql->bindParam(":Clave",$datos['Clave']);
			$sql->bindParam(":Rol",$datos['Rol']);
			$sql->bindParam(":Foto",$datos['Foto']);
			$sql->bindParam(":Estado",$datos['Estado']);
			$sql->execute();
			return $sql;
			/*$email_to = $datos['Correo'];
			$email_subject = "Confirma tu email Photogram";
			$email_from = "reply.localhost.com";

			$email_message = "Hola ".$datos['Nombre'].", para poder disfrutar de nuestro sitio web, debes confirmar tu email\n\n";
			$email_message .= "Ingresa el siguiente codigo para confirmar tu email\n\n";
			//$email_message .= "Codigo: " . $aleatorio . "\n";


			// Ahora se envía el e-mail usando la función mail() de PHP
			$headers = 'From: '.$email_from."\r\n".
			'Reply-To: '.$email_from."\r\n" .
			'X-Mailer: PHP/' . phpversion();
			mail($email_to, $email_subject, $email_message, $headers);*/

			
		}

		 /**
		 * @param $datos parametro tipo array para crear usuario 
		 *
		*/
		/*protected function agregar2_usuarios_modelo($datos){
			
			$sql=mainModelo::conectar_bd()->prepare("CALL registro_usuarios(:Id, :Nombre, :Apellido, :Sexo, :Fnac, :Direccion, :Municipio, :Correo, :Telefono, :Clave, :Rol);");

			Funcion para vincular un parametro al nombre de la variable espcificada
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
		}*/

		protected function datos_usuario_modelo($tipo, $id_usu){
			
			if($tipo=="unico"){
				//$id_usu = mainModelo::desencryto()
				$query=mainModelo::conectar_bd()->prepare("SELECT * FROM tbl_usuario WHERE Usu_Doc=:Id");
				$query->bindParam(":Id", $id_usu);
				$query->execute();
			}elseif($tipo=="conteo"){
				$query=mainModelo::conectar_bd()->prepare("SELECT * FROM tbl_usuario WHERE Usu_Rol !='A'");
				$query->execute();
			}
			return $query;
			/*$sql=mainModelo::conectar_bd()->prepare("UPDATE tbl_usuario SET Usu_Nombre=:Nombre SET Usu_Apellido=:Apellido SET Usu_Genero=:Sexo SET Usu_FechaNac=:Fnac SET  Usu_Direccion=:Direccion SET  Usu_Municipio=:Municipio SET Usu_Correo=:Correo SET  Usu_Telefono=:Telefono SET Usu_Clave:Clave SET Usu_Rol:Rol) WHERE Usu_Doc=:doc");
			$sql->bindParam(":doc", $id);
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
			return $sql;*/
		}

		protected function eliminar_usuario_modelo($id){
			$query=mainModelo::conectar_bd()->prepare("DELETE FROM tbl_usuario WHERE Usu_Doc=:doc");
			$query->bindParam(":doc", $id);
			$query->execute();
			return $query;
		}
		
        protected function ejecutar_consulta_usuario($parametro){
			$respuesta=mainModelo::conectar_bd()->prepare("SELECT * FROM tbl_usuario WHERE Usu_Doc=:Id");
			$respuesta->bindParam(":Id",$parametro);
			$respuesta->execute();
			return $respuesta;
        }
        
        protected function ejecutar_consulta_email($parametro){
			$respuesta=mainModelo::conectar_bd()->prepare("SELECT * FROM tbl_usuario WHERE Usu_Correo=:Correo");
			$respuesta->bindParam(":Correo",$parametro);
			$respuesta->execute();
			return $respuesta;
		}

		protected function cargar_tabla_modelo($inicio, $regxpagina){
			$datos=mainModelo::conectar_bd()->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM tbl_usuario WHERE Usu_Rol !='A' ORDER BY Usu_Nombre ASC LIMIT $inicio, $regxpagina");
			$datos->bindParam(":Inicio",$inicio);
			$datos->bindParam(":Regxpagina",$regxpagina);
			$datos->execute();
			return $datos->fetchAll();
		}

		protected function total_registros_tabla(){
			$respuesta=mainModelo::conectar_bd()->query('SELECT * FROM tbl_usuario');
			$respuesta->execute();
			return $respuesta->rowCount();
		}
		
		protected function modificar_datos_usuario_modelo($datos){
			$sql=mainModelo::conectar_bd()->prepare("UPDATE tbl_usuario SET Usu_Nombre=:Nombre, Usu_Apellido=:Apellido, Usu_Genero=:Sexo, Usu_FechaNac=:Fnac , Usu_Direccion=:Direccion , Usu_Municipio=:Municipio WHERE Usu_Doc =:Id;");

			/*Funcion para vincular un parametro al nombre de la variable espcificada */
			$sql->bindParam(":Id",$datos['Documento']);
			$sql->bindParam(":Nombre",$datos['Nombre']);
			$sql->bindParam(":Apellido",$datos['Apellido']);
			$sql->bindParam(":Sexo",$datos['Sexo']);
			$sql->bindParam(":Fnac",$datos['Fnac']);
			$sql->bindParam(":Direccion",$datos['Direccion']);
			$sql->bindParam(":Municipio",$datos['Municipio']);
			$sql->execute();
			return $sql;

		}

		public function modificar_clave_usuario_modelo($datos){
			$sql=mainModelo::conectar_bd()->prepare("UPDATE tbl_usuario SET Usu_Clave=:Clave WHERE Usu_Doc =:Documento;");

			/*Funcion para vincular un parametro al nombre de la variable espcificada */
			$sql->bindParam(":Documento",$datos['Documento']);
			$sql->bindParam(":Clave",$datos['Pass']);
			$sql->execute();
			return $sql;
		}
		
		protected function modificar_cuenta_usuario_modelo($datos){
			$sql=mainModelo::conectar_bd()->prepare("UPDATE tbl_usuario SET Usu_Correo=:Correo, Usu_Celular=:Celular, Usu_Estado=:Estado WHERE Usu_Doc =:Documento;");
			/*Funcion para vincular un parametro al nombre de la variable espcificada */
			$sql->bindParam(":Documento",$datos['Documento']);
			$sql->bindParam(":Correo",$datos['Correo']);
			$sql->bindParam(":Celular",$datos['Celular']);
			//$sql->bindParam(":Rol",$datos['Rol']);
			$sql->bindParam(":Estado",$datos['Estado']);
			//$sql->bindParam(":Foto",$datos['Foto']);
			return $sql->execute();			
		}
	}