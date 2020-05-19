<?php

	if($peticionAjax){
		require_once "../modelos/usuarioModelo.php";
	}else{
		require_once "./modelos/usuarioModelo.php";
	}
	
	/**
	 * @return $alerta verifica los posibles errores o confirmación de registro
	 */
	class usuarioControlador extends usuarioModelo{
		
		//FUNCION PARA AGREGAR USUARIOS
		public function agregar_usuario_controlador(){
			/*Captura de datos del formulario admin-view, En variables, 
			pasando por una funcion llamada limpiar_cadena(archivo mainModelo)
		 	para evitar inyecciones sql por los formularios
			*/
			$doc=mainModelo::limpiar_cadena($_POST['documento-txt']);
			echo $doc;
			$nombre=mainModelo::limpiar_cadena($_POST['nombre-txt']);
			$apellido=mainModelo::limpiar_cadena($_POST['apellido-txt']);
			$telefono=mainModelo::limpiar_cadena($_POST['telefono-txt']);
			$fnacimiento=mainModelo::limpiar_cadena($_POST['fechanac-txt']);
			$direccion=mainModelo::limpiar_cadena($_POST['direccion-txt']);
			$pass1=mainModelo::limpiar_cadena($_POST['password1-txt']);
			$pass2=mainModelo::limpiar_cadena($_POST['password2-txt']);
			$email=mainModelo::limpiar_cadena($_POST['email-txt']);
			$genero=mainModelo::limpiar_cadena($_POST['genero-txt']);
			$municipio=mainModelo::limpiar_cadena($_POST['municipio-txt']);
			$rol=mainModelo::limpiar_cadena($_POST['roluser-txt']);

			
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
				$consulta_doc=usuarioModelo::ejecutar_consulta_usuario($doc);
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
						$consulta_usuario=usuarioModelo::ejecutar_consulta_usuario($doc);
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
								"Doc"=>$doc,
								"Nombre"=>$nombre,
								"Apellido"=>$apellido,
								"Telefono"=>$telefono,
								"Direccion"=>$direccion,
								"Sexo"=>$genero,
								"Fnacimiento"=>$fnacimiento,
								"Municipio"=>$municipio,
								"Clave"=>$clave,
								"Estado"=>'A',
								"Rol"=>$rol,
								"Correo"=>$email
							];
							
							$guardarAdmin=usuarioModelo::agregar_usuarios_modelo($dataAdmin);

							if ($guardarAdmin->rowCount()>=1) {
								$alerta=[
									"Alerta"=>"limpiar",
									"Titulo"=>"Usuario registrado",
									"Texto"=>"Registro exitoso!",
									"Tipo"=>"success"
								];
							}else{
								
								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrio un error inesperado",
									"Texto"=>"No se pudo registrar al usuario",
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
			//se limpia la cadena
			$pagina=mainModelo::limpiar_cadena($pagina);
			$regxpagina=mainModelo::limpiar_cadena($regxpagina);
			//$id_usuario=mainModelo::limpiar_cadena($id_usuario;
			$tabla="";

			$pagina = isset($pagina) ? (int)$pagina : 1;  //pagina actual
			$inicio = ($pagina > 1) ? ($pagina * $regxpagina - $regxpagina) : 0 ;  //indice de Registro a cargar por pagina
			$conexion = mainModelo::conectar_bd();
			$datos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM tbl_usuario WHERE Usu_Rol !='A' ORDER BY Usu_Nombre ASC LIMIT $inicio, $regxpagina");
			$datos->execute();
			//$datos= usuarioModelo::cargar_tabla_modelo($inicio, $regxpagina);
			$datos = $datos->fetchAll();
			$total_registros = $conexion->query('SELECT FOUND_ROWS() as total');
			//$total_registros = usuarioModelo::total_registros_tabla();
			$total_registros = $total_registros->fetch()['total'];  //Devuelve un registro (50)
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
									<a href="'.SERVERURL.'usuario/?usuario='.mainModelo::encryption($columna['Usu_Doc']).'" class="btn btn-success btn-raised btn-xs">
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
			/*$id = mainModelo::decryption($_POST['id-usuario']);
			$id =  mainModelo::limpiar_cadena($id);

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

			$consulta= usuarioModelo::ejecutar_consulta_usuario($id);
			$array = $consulta->fetch();
			if($id != $array['Usu_Doc']){

			}else*/
		}

	}
	