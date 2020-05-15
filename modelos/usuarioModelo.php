<?php
	if($peticionAjax){
		require_once "../core/mainModelo.php";
	}else{
		require_once "./core/mainModelo.php";
	}
	
	class usuarioModelo extends mainModelo{
        
        /**
		 * @param $datos parametro tipo array para crear usuario 
		 */
		protected function agregar_usuarios_modelo($datos){
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

			$email_to = $datos['Correo'];
			$email_subject = "Confirma tu email Photogram";
			$email_from = "reply.localhost.com";

			$email_message = "Hola ".$datos['Nombre'].", para poder disfrutar de nuestro sitio web, debes confirmar tu email\n\n";
			$email_message .= "Ingresa el siguiente codigo para confirmar tu email\n\n";
			//$email_message .= "Codigo: " . $aleatorio . "\n";


			// Ahora se envía el e-mail usando la función mail() de PHP
			$headers = 'From: '.$email_from."\r\n".
			'Reply-To: '.$email_from."\r\n" .
			'X-Mailer: PHP/' . phpversion();
			mail($email_to, $email_subject, $email_message, $headers);

			return $sql;
		}

		protected function datos_usuario_modelo($tipo, $id_usu){
			
			if($tipo=="unico"){
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
			$respuesta=mainModelo::conectar_bd()->prepare("SELECT Usu_Correo FROM tbl_usuario WHERE Usu_Correo=:Correo");
			$respuesta->bindParam(":Correo",$parametro);
			$respuesta->execute();
			return $respuesta;
		}
		protected function cargar_tabla_modelo($inicio, $regxpagina){
			$datos=mainModelo::conectar_bd()->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM tbl_usuario WHERE Usu_Rol !='A' ORDER BY Usu_Nombre ASC LIMIT :Inicio, :Regxpagina");
			$datos->bindParam(":Inicio",$inicio);
			$datos->bindParam(":Regxpagina",$regxpagina);
			$datos->execute();
			return $datos;
		}

		protected function total_registros_tabla(){
			$respuesta=mainModelo::conectar_bd()->query('SELECT FOUND_ROWS() as total');
			//$respuesta->execute();
			return $respuesta;
		}
	}