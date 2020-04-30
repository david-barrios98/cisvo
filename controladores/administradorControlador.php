<?php
	if($peticionAjax){
		require_once "../modelo/administradorModelo.php";
	}else{
		require_once "./modelo/administradorModelo.php";
	}
	
	/**
	 * 
	 */
	class administradorControlador extends administradorModelo{
		
		public function agregar_administrador_controlador(){
			/*Captura de datos del formulario admin-view, En variables, 
			pasando por una funcion llamada limpiar_cadena(archivo mainModelo)
		 	para evitar inyecciones sql por los formularios
			*/
			$dni=mainModelo::limpiar_cadena($_POST['dni-reg']);
			$nombre=mainModelo::limpiar_cadena($_POST['nombre-reg']);
			$apellido=mainModelo::limpiar_cadena($_POST['apellido-reg']);
			$telefono=mainModelo::limpiar_cadena($_POST['telefono-reg']);
			$direccion=mainModelo::limpiar_cadena($_POST['direccion-reg']);

			$usuario=mainModelo::limpiar_cadena($_POST['usuario-reg']);
			$pass1=mainModelo::limpiar_cadena($_POST['password1-reg']);
			$pass2=mainModelo::limpiar_cadena($_POST['password2-reg']);
			$email=mainModelo::limpiar_cadena($_POST['email-reg']);
			$genero=mainModelo::limpiar_cadena($_POST['optionsGenero']);
			$privilegio=mainModelo::limpiar_cadena($_POST['optionsPrivilegio']);

			/*Foto segun el sexo*/
			if ($genero=="Masculino") {
				$foto="AdminMale.png";
			} else {
				$foto="AdminFemale.png";
			}

			/*comprobacion de contraseña, que sean identicas*/
			if ($pass1!=$pass2) {
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"Las contraseñas que ingresaste, No coinciden, vuelve a intentarlo",
					"Tipo"=>"error"
				];
			}else{
				/*Validación de documento en el sistema*/
				$consulta_doc=mainModelo::ejecutar_consulta_simple("SELECT AdminDNI FROM admin WHERE AdminDNI='$dni'");
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
						$consulta_mail=mainModelo::ejecutar_consulta_simple("SELECT CuentaEmail FROM cuenta WHERE CuentaEmail='$email'");
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
						$consulta_usuario=mainModelo::ejecutar_consulta_simple("SELECT CuentaUsuario FROM cuenta WHERE CuentaUsuario='$usuario'");
						if($consulta_usuario->rowCount()>=1){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"El Usuario ingresado, ya se encuentra registrado en el sistema!",
								"Tipo"=>"error"
							];
						}else{
							/*Validación de Usuario en el sistema*/
							$consulta_id=mainModelo::ejecutar_consulta_simple("SELECT id FROM cuenta");
							$cantidad=$consulta_id->rowCount()+1;
							$codigo=mainModelo::generar_codigo_aleatorio("AC",5,$cantidad);//genero el codigo aleatorio
							$clave=mainModelo::encryption($pass1);//Encripto la contraseña

							$dataCuenta=[
								"Codigo"=>$codigo,
								"Privilegio"=>$privilegio,
								"Usuario"=>$usuario,
								"Clave"=>$clave,
								"Email"=>$email,
								"Estado"=>"Activo",
								"Tipo"=>"Administrador",
								"Genero"=>$genero,
								"Foto"=>$foto
							];

							$guardarCuenta=mainModelo::agregar_cuenta($dataCuenta);


							if ($guardarCuenta->rowCount()>=1) {
								$dataAdmin=[
									"DNI"=>$dni,
									"Nombre"=>$nombre,
									"Apellido"=>$apellido,
									"Telefono"=>$telefono,
									"Direccion"=>$direccion,
									"Codigo"=>$codigo
								];

								$guardarAdmin=administradorModelo::agregar_administrador_modelo($dataAdmin);

								if ($guardarAdmin->rowCount()>=1) {
									$alerta=[
										"Alerta"=>"limpiar",
										"Titulo"=>"Administrador registrado",
										"Texto"=>"Registro exitoso!",
										"Tipo"=>"success"
									];
								}else{
									mainModelo::eliminar_cuenta($codigo);
									$alerta=[
										"Alerta"=>"simple",
										"Titulo"=>"Ocurrio un error inesperado",
										"Texto"=>"No se ha podido registrar al Administrador!",
										"Tipo"=>"error"
									];
								}	
							} else {
								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrio un error inesperado",
									"Texto"=>"No se ha podido registrar al Administrador!",
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