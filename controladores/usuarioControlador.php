<?php
	use phpmailer\PHPMailer\PHPMailer;
	use phpmailer\PHPMailer\Exception;


	if($peticionAjax){
		require_once "../modelos/usuarioModelo.php";
		require_once "../core/PHPMailer/Exception.php";
		require_once '../core/PHPMailer/PHPMailer.php';
		require_once '../core/PHPMailer/SMTP.php';
		
	}else{
		require_once "./modelos/usuarioModelo.php";
		require_once "./core/PHPMailer/Exception.php";
		require_once './core/PHPMailer/PHPMailer.php';
		require_once './core/PHPMailer/SMTP.php';
	}
	
	/**
	 * @return $alerta verifica los posibles errores o confirmación de registro
	 */
	class usuarioControlador extends usuarioModelo{
		
		//FUNCION PARA AGREGAR USUARIOS
		public function agregar_usuario_controlador(){
			$mail = new PHPMailer(true);
			/*Captura de datos del formulario admin-view, En variables, 
			pasando por una funcion llamada limpiar_cadena(archivo mainModelo)
		 	para evitar inyecciones sql por los formularios
			*/
			$docu=mainModelo::limpiar_cadena($_POST['documento-txt']);
			$nombre=mainModelo::limpiar_cadena($_POST['nombre-txt']);
			$apellido=mainModelo::limpiar_cadena($_POST['apellido-txt']);
			$telefono=mainModelo::limpiar_cadena($_POST['telefono-txt']);
			$direccion=mainModelo::limpiar_cadena($_POST['direccion-txt']);
			$pass1=mainModelo::limpiar_cadena($_POST['password1-txt']);
			$fnacimiento=mainModelo::limpiar_cadena($_POST['fechanac-txt']);
			$pass2=mainModelo::limpiar_cadena($_POST['password2-txt']);
			$email=mainModelo::limpiar_cadena($_POST['email-txt']);
			$genero=mainModelo::limpiar_cadena($_POST['genero-txt']);
			$municipio=mainModelo::limpiar_cadena($_POST['municipio-txt']);
			$rol=mainModelo::limpiar_cadena($_POST['roluser-txt']);

			//Foto segun el sexo
			if ($genero=="Masculino") {
				$foto="AdminMale.png";
			} else {
				$foto="AdminFemale.png";
			}
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
				$consulta_doc=usuarioModelo::ejecutar_consulta_usuario($docu);
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
						$consulta_usuario=usuarioModelo::ejecutar_consulta_usuario($docu);
						if($consulta_usuario->rowCount()>=1){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"El Usuario ingresado, ya se encuentra registrado en el sistema!",
								"Tipo"=>"error"
							];
						}else{
							$clave=mainModelo::encryption($pass1);//Encripto la contraseña
							/*$dataAdmin=[
								"Docu"=>$docu,
								"Nombre"=>$nombre,
								"Apellido"=>$apellido,
								"Telefono"=>$telefono,
								"Direccion"=>$direccion,
								"Sexo"=>$genero,
								"Fnacimiento"=>$fnacimiento,
								"Municipio"=>$municipio,
								"Clave"=>$clave,
								//"Estado"=>'A',
								"Rol"=>$rol,
								"Correo"=>$email
							];*/
							$dataAdmin=[
								"Doc"=>$docu,
								"Nombre"=>$nombre,
								"Apellido"=>$apellido,
								"Sexo"=>$genero,
								"Fnac"=>$fnacimiento,
								"Direccion"=>$direccion,
								"Municipio"=>$municipio,
								"Correo"=>$email,
								"Telefono"=>$telefono,
								"Clave"=>$clave,
								"Rol"=>$rol,
								"Foto"=>$foto,
								"Estado"=>'A'
							];
							$guardarAdmin=usuarioModelo::agregar_usuarios_modelo($dataAdmin);

							if ($guardarAdmin->rowCount()>=1) {
								try {
									//Server settings
									$mail->SMTPOptions = array(
										'ssl' => array(
										'verify_peer' => false,
										'verify_peer_name' => false,
										'allow_self_signed' => true
										)
									);
								
									$mail->SMTPDebug = 0;                      // Enable verbose debug output
									$mail->isSMTP();                                            // Send using SMTP
									$mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
									$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
									$mail->Username   = EMAIL_HOST;                    // SMTP username
									$mail->Password   = EMAIL_KEY;                               // SMTP password
									$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
									$mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
								
									//Recipients
									$mail->setFrom(EMAIL_HOST, 'CISVO WEB');
									$mail->addAddress($email, $nombre);     // Add a recipient
								
									// Attachments
									//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
									//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
								
									// Content
									$mail->isHTML(true);                                  // Set email format to HTML
									$mail->Subject = 'REGISTRO EXITOSO!';
									$correo = "<div style='width:90%; border:4px ridge #FF6600; padding:6px;'>";
									$correo .= "<h1 color='black';>EN BUENA HORA, HAS REALIZADO TU REGISTRO DE FORMA EXITOSA </h1>";
									$correo .= "</div>";
									$correo .= "<div width:90%;>";
									//$correo .= "<img src='CISVO/vistas/assets/img/logo_cisvo.png'  width='100%'>"; // OJO con la imagen. Hablaremos de esto en el próximo apartado.
									$correo .= "Sr(a) $nombre, Se ha completado de forma exitosa tu registro en nuestra plataforma CISVO, el
									usuario y clave sumistrado sera para utilización netamente laboral del CENTRO INDUSTRIAL Y DE AVIACIÓN <br><br>";
									$correo .= "Tus credenciales para inicio de sesión son:";
									$correo .= "<ul>";
									$correo .= "<li>Usuario: $docu</li>";
									$correo .= "<li>Clave: $pass2</li><br>";
									$correo .= "<p>Para iniciar sesion haga click <a href='http://localhost/CISVO/' target='_blank'>aquí</a></p>";
									$correo .= "</ul>";
									$correo .= "<p>NOTA: El usuario y clave anteriormente suminstrados deben ser de caracter personal, no permite que terceros hagan uso de esto ya que puede generarle
									graves problemas laborales</p>";
									$correo .= "</div>";
									// En nuestro correo incluimos hasta un formulario.
									$mail->Body = $correo;
									$mail->AltBody = 'Para mas infomación contactate a tu jefe de area';
							
									if($mail->send()) {
										//echo 'SE ENVIO CORREO SATISFACTORIAMENTE';
										$alerta=[
											"Alerta"=>"limpiar",
											"Titulo"=>"Administrador registrado",
											"Texto"=>"NOTA: Su usuario y clave fueron enviados al correo ".$email,
											"Tipo"=>"success"
										];
									} else {
										//echo 'Detalles del error: '.$mail->ErrorInfo;
									}
									
								} catch (Exception $e) {
									///echo "FALLIDO ENVIO: $e";
								}
								
							}else{
								
								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrio un error inesperado",
									"Texto"=>"No se pudo registrar al Usuario",
									"Tipo"=>"error"
								];
							}
						}
					}
				}
			}
			return mainModelo::sweet_alert($alerta);
		}

		//FUNCION PARA CONFIGURAR TABLA
		/**
		 * @param $pagina pagina actual
		 * @param $regxpagina numero de registros que se mostraran
		 * @param $id_usuario usuario que esta dentro del sistema. Esto para no mostrar los datos en la tabla
		 * del usuario esta manipulando el sistema
		 * @return $tabla retorna la estructura de la tabla con su consulta 
		 */
		public function config_tabla_controlador($pagina, $regxpagina){
			if($_SESSION['rol_CISVO']=="A"){
				$rol="admin";
			}else{
				$rol="con acceso restringido";
			}
			//se limpia la cadena
			$pagina=mainModelo::limpiar_cadena($pagina);
			$regxpagina=mainModelo::limpiar_cadena($regxpagina);
			//$id_usuario=mainModelo::limpiar_cadena($id_usuario;
			$tabla=""; //variable que almacenará los datos de la consulta de los usuarios
			$pagina = isset($pagina) ? (int)$pagina : 1;  //pagina actual
			$inicio = ($pagina > 1) ? ($pagina * $regxpagina - $regxpagina) : 0 ;  //indice de Registro a cargar por pagina
			$datos = usuarioModelo::cargar_tabla_modelo($inicio, $regxpagina);
			$total_registros = usuarioModelo::total_registros_tabla();
			$numeroPaginas = ceil($total_registros / $regxpagina);   //Redondear fracciones hacia arriba

			$tabla.= '<div class="table-responsive">
			<table class="table table-striped table-bordered text-center" cellspacing="0">
				<thead>
					<tr>
						<th class="text-center" scope="col">N°</th>
						<th class="text-center" scope="col">DOCUMENTO</th>
						<th class="text-center" scope="col">NOMBRE(S)</th>
						<th class="text-center" scope="col">APELLIDO(S)</th>
						<th class="text-center" scope="col">SEXO</th>
						<th class="text-center" scope="col">FECHA NACIMIENTO</th>
						<th class="text-center" scope="col">MUNICIPIO</th>
						<th class="text-center" scope="col">DIRECCION</th>
						<th class="text-center" scope="col">EMAIL</th>
						<th class="text-center" scope="col">TELEFONO</th>
						<th class="text-center" scope="col">ROL</th>
						<th class="text-center" scope="col">ESTADO</th>
						<th class="text-center" scope="col">FECHA DE REGISTRO</th>
						<th class="text-center" scope="col">ACTUALIZAR</th>
						<th class="text-center" scope="col">ELIMINAR</th>
					</tr>
				</thead>
				<tbody>';

				if($total_registros >= 1 && $pagina <= $numeroPaginas){
					$cont = $inicio+1;

					foreach($datos as $columna){
						$tabla.= '
							<tr>
								<td scope="col">'.$cont.'</td>
								<td scope="col">'.$columna['Usu_Doc'].'</td>
								<td scope="col">'.$columna['Usu_Nombre'].'</td>
								<td scope="col">'.$columna['Usu_Apellido'].'</td>
								<td scope="col">'.$columna['Usu_Genero'].'</td>
								<td scope="col">'.$columna['Usu_FechaNac'].'</td>
								<td scope="col">'.$columna['Usu_Municipio'].'</td>
								<td scope="col">'.$columna['Usu_Direccion'].'</td>
								<td scope="col">'.$columna['Usu_Correo'].'</td>
								<td scope="col">'.$columna['Usu_Celular'].'</td>
								<td scope="col">'.$columna['Usu_Rol'].'</td>
								<td scope="col">'.$columna['Usu_Estado'].'</td>
								<td scope="col">'.$columna['Usu_Registro'].'</td>
								<td>
									<a href="'.SERVERURL.'usuario/'.$rol."/".mainModelo::encryption($columna['Usu_Doc']).'" class="btn btn-success btn-raised btn-xs">
										<i class="zmdi zmdi-border-color"></i>
									</a>
								</td>
								<td>
									<form action="'.SERVERURL.'ajax/usuarioAjax.php" method="POST" 
									data-form="delete" class="FormularioAjax" name="FormularioAjax" autocomplete="off" 
									enctype="multipart/form-data">
										<input type="hidden" name="id-usuario" id="id-usuario" value="'.mainModelo::encryption($columna['Usu_Doc']).'">
										<button type="submit" class="btn btn-danger btn-raised btn-xs">
											<i class="zmdi zmdi-delete"></i>
										</button>
										<div class="RespuestaAjax"></div>
									</form>
								</td>
							</tr>
						';
						$cont ++;
					}
				}else{
					if($total_registros>= 1){
						$tabla.= '<tr>
							<td colspan="15">
								<a href="'.SERVERURL.'usuariolist/" class="btn btn-success btn-raised btn-xs"> Haga clik para refrescar la tabla </a>
							</td>
						</tr>';
					}else{
						$tabla.= '<tr>
							<td colspan="15"> no hay registos de usuarios</td>
						</tr>';
						//$tabla.= var_dump($datos);
					}
				}

			$tabla.= "</tbody>
			</table>
			</div>";

			if($total_registros >= 1 && $pagina <= $numeroPaginas){
				$tabla.= '<nav class="text-center">
				<ul class="pagination pagination-sm">';

				if($pagina==1){
					$tabla.= '<li class="disabled"><a><-</a></li>';
				}else{
					$tabla.= '<li><a href="'.SERVERURL.'usuariolist/'.($pagina-1).'/"><-</a></li>';
				}
				for($i = 1; $i <= $numeroPaginas; $i++){ //Identifica la pagina Activa
					if ($pagina === $i) { 
						$tabla.= '<li class="active"><a href="'.SERVERURL.'usuariolist/'.$i.'/">'.$i.'</a></li>';
					} else {
						$tabla.= '<li><a href="'.SERVERURL.'usuariolist/'.$i.'/">'.$i.'</a></li>';
					}
				}
				if($pagina==$numeroPaginas){
					$tabla.= '<li class="disabled"><a>-></a></li>';
				}else{
					$tabla.= '<li><a href="'.SERVERURL.'usuariolist/'.($pagina+1).'/">-></a></li>';
				}
				
				$tabla.= '</ul>
				</nav>';
			}

			return $tabla; 
		}

		public function eliminar_usuario_controlador(){
			$id = mainModelo::decryption($_POST['id-usuario']);
			$id =  mainModelo::limpiar_cadena($id);

			$query1= usuarioModelo::ejecutar_consulta_usuario($id);
			//$usuario = $query1->fetch();
			
			if($query1->rowCount()>=1){
				$eliminacion = usuarioModelo::eliminar_usuario_modelo($id);
				if($eliminacion->rowCount()>=1){
					$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Usuario eliminado",
						"Texto"=>"la eliminación realizó con exito",
						"Tipo"=>"success"
					];
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No se puedo eliminar usuario, problema de eliminación",
						"Tipo"=>"error"
					];
				}
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No pudo eliminar, usuario no encontrado",
					"Tipo"=>"error"
				];
			}
			return mainModelo::sweet_alert($alerta);
		}

		public function datos_usuario_controlador($tipo, $id_usu){
			$id_usu = mainModelo::decryption($id_usu);
			$tipo =  mainModelo::limpiar_cadena($tipo);

			return usuarioModelo::datos_usuario_modelo($tipo, $id_usu);
		}

		public function datos_usuario_cuenta_controlador($doc){
			$doc= mainModelo::limpiar_cadena($doc);
			$doc=mainModelo::decryption($doc);
			return usuarioModelo::ejecutar_consulta_usuario($doc);
		}

		public function modificar_cuenta_usuario_controlador(){
			session_start(['name'=>'S_CISVO']);
			extract($_POST);
			$doc= mainModelo::limpiar_cadena($documento);
			$doc=mainModelo::decryption($doc);
			$celular= mainModelo::limpiar_cadena($celular);
			$correo= mainModelo::limpiar_cadena($email);
			//$rol= mainModelo::limpiar_cadena($rolusu);
			$estado= mainModelo::limpiar_cadena($estadousu);
			//$foto = "foto_actualizada.png";
			$datos=[
				"Documento"=>$doc,
				"Celular"=>$celular,
				"Correo"=>$correo,
				//"Rol"=>$rol,
				"Estado"=>$estado
				//"Foto"=>$foto
			];

			$consulta_usuario =usuarioModelo::ejecutar_consulta_usuario($doc);
			//NUEVA CONSULTA CON PARAMETRO DE CORREO Y SECCION
			$info = $consulta_usuario->fetch();
			if($consulta_usuario->rowCount()==1){
				if($info['Usu_Doc'] != $_SESSION['usuario_CISVO']){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"Usted intenta modificar infomación de otro usuario/adminsutador",
						"Tipo"=>"error"
					];
				}else{
					if($info['Usu_Correo'] == $email){
						$actualizacion=usuarioModelo::modificar_cuenta_usuario_modelo($datos);
						if($actualizacion>0){
							$alerta=[
								"Alerta"=>"limpiar",
								"Titulo"=>"Administrador modificado1",
								"Texto"=>"Registro exitoso!",
								"Tipo"=>"success"
							];
						}
					}else{
						$consulta_email =usuarioModelo::ejecutar_consulta_email($email);
						if($consulta_email->rowCount()==1){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"El correo ingresado ya se encuentra registrado",
								"Tipo"=>"error"
							];
						}else{
							$actualizacion=usuarioModelo::modificar_cuenta_usuario_modelo($datos);
							if($actualizacion>0){
								$alerta=[
									"Alerta"=>"limpiar",
									"Titulo"=>"Administrador registrado2",
									"Texto"=>"Registro exitoso!",
									"Tipo"=>"success"
								];
								
							}
						}
					}
					
				}
				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No existe usuario",
					"Tipo"=>"error"
				];
			}
			return mainModelo::sweet_alert($alerta);
		}

		public function modificar_datos_usuario_controlador(){
			extract($_POST);
			session_start(['name'=>'S_CISVO']);
			$documento= mainModelo::limpiar_cadena($documento);
			$documento= mainModelo::decryption($documento);
			$nombre= mainModelo::limpiar_cadena($nombre);
			$apellido= mainModelo::limpiar_cadena($apellido);
			$direccion= mainModelo::limpiar_cadena($direccion);
			$genero= mainModelo::limpiar_cadena($genero);
			$fnac= mainModelo::limpiar_cadena($fnac);
			$municipio=mainModelo::limpiar_cadena($_POST['municipio-txt']);

			$datos =[
				"Documento"=>$documento,
				"Nombre"=>$nombre,
				"Apellido"=>$apellido,
				"Direccion"=>$direccion,
				"Sexo"=>$genero,
				"Fnac"=>$fnac,
				"Municipio"=>$municipio
			];

			$consulta=usuarioModelo::ejecutar_consulta_usuario($documento);
			$info= $consulta->fetch();

			if($info['Usu_Doc'] != $_SESSION['usuario_CISVO'] || $documento != $_SESSION['usuario_CISVO'] ){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"Usted intenta modificar infomación de otro usuario/adminsutador",
					"Tipo"=>"error"
				];
			}else{
				$modificacion=usuarioModelo::modificar_datos_usuario_modelo($datos);
				if($modificacion->rowCount()==1){
					$alerta=[
						"Alerta"=>"limpiar",
						"Titulo"=>"Modificación exitosa",
						"Texto"=>"Los datos se modificaron exitosamente!",
						"Tipo"=>"success"
					];
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No se pudo efectuar la actualización",
						"Tipo"=>"error"
					];
				}
			}
			return mainModelo::sweet_alert($alerta);
		}

		public function modificar_clave_usuario_controlador(){
			extract($_POST);
			$documento= mainModelo::limpiar_cadena($documento);
			$documento=mainModelo::decryption($documento);
			$passAntigua= mainModelo::limpiar_cadena($passAntigua);
			$passAntigua =mainModelo::encryption($passAntigua);
			$passNueva= mainModelo::limpiar_cadena($passNueva);
			$passConfirm= mainModelo::limpiar_cadena($passConfirm);

			if($passNueva != $passConfirm){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"Verifique nueva clave y confirmación de clave",
					"Tipo"=>"error"
				];
			}else{
				$consulta=usuarioModelo::ejecutar_consulta_usuario($documento);
				$info= $consulta->fetch();
				if($passAntigua != $info['Usu_Clave']){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"Su clave actual es incorrecta",
						"Tipo"=>"error"
					];
				}else{
					$pass =mainModelo::encryption($passNueva);
					if($pass == $info['Usu_Clave']){
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"La clave nueva que desea modificar es igual a la anterior",
							"Tipo"=>"error"
						];
					}else{
						$datos =[
							"Documento"=>$documento,
							"Pass"=>$pass
						];
						$modificacion=usuarioModelo::modificar_clave_usuario_modelo($datos);
						if($modificacion->rowCount()==1){
							$alerta=[
								"Alerta"=>"limpiar",
								"Titulo"=>"Modificación exitosa",
								"Texto"=>"La contraseña se modificó exitosamente!",
								"Tipo"=>"success"
							];
						}else{
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"No se pudo modificar contraseña",
								"Tipo"=>"error"
							];
						}
					}
				}
			}
			return mainModelo::sweet_alert($alerta);
		}

	}
	