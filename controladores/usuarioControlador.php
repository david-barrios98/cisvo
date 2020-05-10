<?php
	if($peticionAjax){
		require_once "../modelos/usuarioModelo.php";
	}else{
		require_once "./modelos/usuarioModelo.php";
	}
	
	/**
	 * 
	 */
	class usuarioControlador extends usuarioModelo{
		
		public function agregar_usuario_controlador(){
			/*Captura de datos del formulario admin-view, En variables, 
			pasando por una funcion llamada limpiar_cadena(archivo mainModelo)
		 	para evitar inyecciones sql por los formularios
			*/
			$dni=mainModelo::limpiar_cadena($_POST['dni-reg']);
			$nombre=mainModelo::limpiar_cadena($_POST['nombre-reg']);
			$apellido=mainModelo::limpiar_cadena($_POST['apellido-reg']);
			$telefono=mainModelo::limpiar_cadena($_POST['telefono-reg']);
			$direccion=mainModelo::limpiar_cadena($_POST['direccion-reg']);
			$pass1=mainModelo::limpiar_cadena($_POST['password1-reg']);
			$fnacimiento=mainModelo::limpiar_cadena($_POST['fnaci-reg']);
			$pass2=mainModelo::limpiar_cadena($_POST['password2-reg']);
			$email=mainModelo::limpiar_cadena($_POST['email-reg']);
			$genero=mainModelo::limpiar_cadena($_POST['genero-reg']);
			$municipio=mainModelo::limpiar_cadena($_POST['municipio-reg']);

			/*Foto segun el sexo
			if ($genero=="Masculino") {
				$foto="AdminMale.png";
			} else {
				$foto="AdminFemale.png";
			}*/
			/*comprobacion de contraseña, que sean identicas*/
			if ($pass1 != $pass2) {
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"Las contraseñas que ingresaste, No coinciden, vuelve a intentarlo",
					"Tipo"=>"error"
				];
			}else{
				/*Validación de documento en el sistema*/
				$consulta_doc=usuarioModelo::ejecutar_consulta_usuario($dni);
				if ($consulta_doc->rowCount()>=1) {
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El numero de documento ingresado, ya se encuentra registrado en el sistema!",
						"Tipo"=>"error"
					];
				}else{
					/*Validación de email-correo en el sistema*/
					if($email!=""){
						$consulta_mail=usuarioModelo::ejecutar_consulta_email($email);
						$ec=$consulta_mail->rowCount();
					}else{
						$ec=0;
					}

					if($ec>=1){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"El Email ingresado, ya se encuentra registrado en el sistema!",
							"Tipo"=>"error"
						];
					}else{
						/*Validación de Usuario en el sistema*/
						$consulta_usuario=usuarioModelo::ejecutar_consulta_usuario($dni);
						if($consulta_usuario->rowCount()>=1){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"El Usuario ingresado, ya se encuentra registrado en el sistema!",
								"Tipo"=>"error"
							];
						}else{
							$clave=mainModelo::encryption($pass1);//Encripto la contraseña
							$dataAdmin=[
								"DNI"=>$dni,
								"Nombre"=>$nombre,
								"Apellido"=>$apellido,
								"Telefono"=>$telefono,
								"Direccion"=>$direccion,
								"Sexo"=>$genero,
								"Fnacimiento"=>$fnacimiento,
								"Municipio"=>$municipio,
								"Clave"=>$clave,
								//"Estado"=>'A',
								"Rol"=>'A',
								"Correo"=>$email
							];
							$guardarAdmin=usuarioModelo::agregar_usuarios($dataAdmin);

							if ($guardarAdmin->rowCount()>=1) {
								$alerta=[
									"Alerta"=>"limpiar",
									"Titulo"=>"Administrador registrado",
									"Texto"=>"Registro exitoso!",
									"Tipo"=>"success"
								];
							}else{
								//mainModelo::eliminar_cuenta($codigo);
								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrio un error inesperado",
									"Texto"=>"No se ha podido registrar al Usuario",
									"Tipo"=>"error"
								];
							}
						}
					}
				}
			}
			return mainModelo::sweet_alert($alerta);
		}
	}