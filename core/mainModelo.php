<?php
	//$peticionAjax=true;
	if($peticionAjax){
		require_once "../core/configApp.php";
	}else{
		require_once "./core/configApp.php";
	}

	class mainModelo {
		/*función para conexion a la base de datos*/
		protected function conectar_bd(){
			$enlace= new PDO(SGBD,USUARIO,CLAVE);
			return $enlace;		
		}
		
		/*funcion para ejecutar consultas sencillas */
		protected function ejecutar_consulta_simple($consulta){
			$respuesta=mainModelo::conectar_bd()->prepare($consulta);
			$respuesta->execute();
			return $respuesta;
		}

		
		/*funcion para añadir usuarios en la bd con un array */
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

		/*funcion para añadir cuentas en la bd con un array */
		protected function agregar_cuenta($datos){
			$sql=mainModelo::conectar_bd()->prepare("INSERT INTO cuenta(CuentaCodigo,CuentaPrivilegio,CuentaUsuario,CuentaClave,CuentaEmail,CuentaEstado,CuentaTipo,CuentaGenero,CuentaFoto) VALUES(:Codigo,:Privilegio,:Usuario,:Clave,:Email,:Estado,:Tipo,:Genero,:Foto)");

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

		/*funcion para eliminar cuentas en la bd con un array */
		protected function eliminar_cuenta($codigo){
			$sql=self::conectar_bd()->prepare("DELETE FROM cuenta WHERE CuentaCodigo=:Codigo");
			$sql->bindParam(":Codigo",$codigo);
			$sql->execute();
			return $sql;
		}

		/*función para agregar bitacora(registros para el inicio de sesión*/
		protected function guadar_bitacora($datos){
			$sql=mainModelo::conectar_bd()->prepare("INSERT INTO bitacora(BitacoraCodigo,BitacoraFecha,BitacoraHoraInicio,BitacoraHoraFinal,BitacoraTipo,BitacoraYear,CuentaCodigo) VALUES(:Codigo,:Fecha,:HoraInicio,:HoraFinal,:Tipo,:Year,:Cuenta)");
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->bindParam(":Fecha",$datos['Fecha']);
			$sql->bindParam(":HoraInicio",$datos['HoraInicio']);
			$sql->bindParam(":HoraFinal",$datos['HoraFinal']);
			$sql->bindParam(":Tipo",$datos['Tipo']);
			$sql->bindParam(":Year",$datos['Year']);
			$sql->bindParam(":Cuenta",$datos['Cuenta']);
			$sql->execute();
			return $sql;
		}

		/*función para actualizar la hora final del inicio de sesión  en la Bitacora*/
		protected function actualizar_bitacora($codigo,$hsora){
			$sql=mainModelo::conectar_bd()->prepare("UPDATE BitacoraHoraFinal=:Hora WHERE BitacoraCodigo=:Codigo");
			$sql->bindParam(":Hora",$hora);
			$sql->bindParam(":Codigo",$codigo);
			$sql->execute();
			return $sql;
		}



		/*funcion para encriptar informacion */
		public function encryption($string){
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
		}

		/*funcion para desepcriptar informacion*/
		protected function decryption($string){
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
		}

		/*funcion para generar codigos de forma aleatoria*/
		protected function generar_codigo_aleatorio($letra,$longitud,$num){
			for($i=1;$i<=$longitud;$i++){
				$numero= rand(0,9);/*funcion para generar numero aleatorio*/
				$letra.= $numero;
			}

			return $letra."-".$num; 
		}

		/*funcion para limpiar cadenas de texto de formularios*/
		protected function limpiar_cadena($cadena){
			$cadena=trim($cadena); /*funcion trim: elimina espacios en blanco al inicio o al final*/
			$cadena=stripcslashes($cadena);/*funcion stripcslashes: quita las barra invertidas(\)*/
			$cadena=str_ireplace("<script>", "", $cadena);
			$cadena=str_ireplace("</script>", "", $cadena);
			$cadena=str_ireplace("<script src", "", $cadena);
			$cadena=str_ireplace("<script type=", "", $cadena);
			$cadena=str_ireplace("SELECT * FROM", "", $cadena);
			$cadena=str_ireplace("DELETE FROM", "", $cadena);
			$cadena=str_ireplace("INSERT INTO", "", $cadena);
			$cadena=str_ireplace("UPDATE SET", "", $cadena);
			$cadena=str_ireplace("--", "", $cadena);
			$cadena=str_ireplace("^", "", $cadena);
			$cadena=str_ireplace("[", "", $cadena);
			$cadena=str_ireplace("]", "", $cadena);
			$cadena=str_ireplace("==", "", $cadena);
			$cadena=str_ireplace(";", "", $cadena);
			return $cadena;
		}

		/*funcion para mostrar notificaciones, alertas*/
		protected function sweet_alert($datos){
			if ($datos['Alerta']=="simple") {
				$alerta="
					<script> 
						swal(
							'".$datos['Titulo']."',
							'".$datos['Texto']."',
							'".$datos['Tipo']."'
						);
					</script>
				";
			}elseif($datos['Alerta']=="recargar"){
				$alerta="
					<script> 
						swal({
							title:	'".$datos['Titulo']."',
							text:	'".$datos['Texto']."',
							type:	'".$datos['Tipo']."',
							confirmButtonText:	'Aceptar'
						}).then(function ()){
							location.reload();
						});
					</script>
				";
			}elseif($datos['Alerta']=="limpiar"){
				$alerta="
					<script> 
						swal({
							title:	'".$datos['Titulo']."',
							text:	'".$datos['Texto']."',
							type:	'".$datos['Tipo']."',
							confirmButtonText:	'Aceptar'
						}).then(function (){
							$('.FormularioAjax')[0].reset();
						});
					</script>
				";
			}
			return $alerta;
		}

	}