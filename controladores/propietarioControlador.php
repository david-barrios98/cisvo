<?php
	if($peticionAjax){
		require_once "../modelos/propietarioModelo.php";

	}else{
		require_once "./modelos/propietarioModelo.php";
	}

	/**
    *@author Jesus Orozco
    *@version V1.0.0_Mayo2020
    *El presente archivo contiene la clase(propietarioControlador) para la interaccion con el modelo y la vista.
    *
    */
	class propietarioControlador extends propietarioModelo{
		
        /**
        *Funcion para añadir propietarios al sistema dependiendo de su rol (Aprendiz, visitante o funcionario)
        *@return $alerta, array que notifica si hubo exito o error con la funcion
        */
		public function Registrar_Propietario_Controlador(){
			/*variables para almacenar lo que trae las cajas de texto del formulario de visitante*/
            $rol=mainModelo::limpiar_cadena($_POST['rolpropietario-txt']);
			$id=mainModelo::limpiar_cadena($_POST['documento-txt']);
			$nombre=mainModelo::limpiar_cadena($_POST['nombre-txt']);
			$apellido=mainModelo::limpiar_cadena($_POST['apellido-txt']);
			$fechanac=mainModelo::limpiar_cadena($_POST['fechanac-txt']);
			$dire=mainModelo::limpiar_cadena($_POST['direccion-txt']);
			$muni=mainModelo::limpiar_cadena($_POST['municipio-txt']);
			$email=mainModelo::limpiar_cadena($_POST['email-txt']);
			$cel=mainModelo::limpiar_cadena($_POST['telefono-txt']);
			$genero=mainModelo::limpiar_cadena($_POST['genero-txt']);			
			
			if ($genero=="Masculino") {
				$foto="./vistas/assets/avatars/camara.png";
			} else {
				$foto="./vistas/assets/avatars/camara.png";
			}

			/*Validación de documento en el sistema*/
			$consulta_doc=propietarioModelo::ejecutar_consulta_propietario($id);
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
					$consulta_mail=propietarioModelo::ejecutar_consulta_email($email);
					$ec=$consulta_mail->rowCount();
				}else{
					$ec=0;
				}

				if($ec>=1){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El Correo ingresado, ya se encuentra registrado en el sistema!",
						"Tipo"=>"error"
					];
				}else{					
					$dataPropietario=[
						"Id"=>$id,
						"Nombre"=>$nombre,
						"Apellido"=>$apellido,
						"Fnaci"=>$fechanac,
						"Dire"=>$dire,
						"Muni_Ciudad"=>$muni,
						"Correo"=>$email,
						"Telefono"=>$cel,
						"Genero"=>$genero,
						"Foto"=>$foto,
						"Estado"=>"A",
						"Usuario"=>"1002"
					];					
					$guardarPropietario=propietarioModelo::registrar_propietario_modelo($dataPropietario);

					if ($guardarPropietario->rowCount()==1) {
						/*Validamos el rol una vez guardado el propietario*/
						if ($rol=='aprendiz') {
							$centro=mainModelo::limpiar_cadena($_POST['centro-txt']);
							$especialidad=mainModelo::limpiar_cadena($_POST['especialidad-txt']);
							$ficha=mainModelo::limpiar_cadena($_POST['ficha-txt']);
							if(isset($centro)&& isset($especialidad) && isset($ficha)){
								$dataAprendiz=[
									"Centro"=>$centro,
									"Especialidad"=>$especialidad,
									"Ficha"=>$ficha,
									"Id"=>$id
								];

								$guardarAprendiz=propietarioModelo::registrar_aprendiz_modelo($dataAprendiz);

								if ($guardarAprendiz->rowCount()>=1) {
									$alerta=[
										"Alerta"=>"limpiar",
										"Titulo"=>"Propietario registrado",
										"Texto"=>"Aprendiz registrado!",
										"Tipo"=>"success"
									];
								}
							}else{
								propietarioModelo::eliminar_propietario_modelo($id);
								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrio un error inesperado",
									"Texto"=>"No se ha podido registrar al aprendiz!",
									"Tipo"=>"error"
								];
							}
						}elseif ($rol=='funcionario') {
							$vin=mainModelo::limpiar_cadena($_POST['contrato-txt']);
							$cargo=mainModelo::limpiar_cadena($_POST['area-txt']);
							$area=mainModelo::limpiar_cadena($_POST['cargo-txt']);
							if(isset($vin)&& isset($cargo)&& isset($area)){
								$datafuncionario=[
									"Vin"=>$vin,
									"Cargo"=>$cargo,
									"Area"=>$area,
									"Id"=>$id
								];
	
								$guardarfuncionario=propietarioModelo::registrar_funcionario_modelo($datafuncionario);
	
								if ($guardarfuncionario->rowCount()>=1) {
									$alerta=[
										"Alerta"=>"limpiar",
										"Titulo"=>"Propietario registrado",
										"Texto"=>"Funcionario registrado!",
										"Tipo"=>"success"
									];
								}
							}
							else{
								propietarioModelo::eliminar_propietario_modelo($id);
								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrio un error inesperado",
									"Texto"=>"No se ha podido registrar al funcionario!",
									"Tipo"=>"error"
								];
							}
						}else{
							$destino=mainModelo::limpiar_cadena($_POST['destino-txt']);
		                    $motivo=mainModelo::limpiar_cadena($_POST['motivo-txt']);
							if(isset($destino)&& isset($motivo)){
								$datavisitante=[
									"Destino"=>$destino,
									"Motivo"=>$motivo,
									"Id"=>$id
								];

								$guardarvisitante=propietarioModelo::registrar_visitante_modelo($datavisitante);

								if ($guardarvisitante->rowCount()>=1) {
									$alerta=[
										"Alerta"=>"limpiar",
										"Titulo"=>"Propietario registrado",
										"Texto"=>"Visitante registrado!",
										"Tipo"=>"success"
									];
								}
							}else{
								propietarioModelo::eliminar_propietario_modelo($id);
								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrio un error inesperado",
									"Texto"=>"No se ha podido registrar al visitante!",
									"Tipo"=>"error"
								];
							}
						}			
					}else {
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Error inesperado",
							"Texto"=>"No se ha podido al propietario!",
							"Tipo"=>"error"
						];
					}		
				}
			}		
			return mainModelo::sweet_alert($alerta);	 
		}

		/**
		*@param 
		*Funcion para paginar-listar propietario del sistema,, mediante parametros pagina(numero), regxpagina(cantidad por pagina)
		*/
		public function cargar_paginador_propietario($pagina, $regxpagina){
			$pagina=mainModelo::limpiar_cadena($pagina);
			$regxpagina=mainModelo::limpiar_cadena($regxpagina);
			$tabla="";
            
            //estructura condicional(si()-sino?), simplificada
			$pagina = (isset($_GET['pagina']) && $pagina>0) ? (int)$_GET['pagina'] : 1;  //pagina actual
			$inicio = ($pagina > 1) ? ($pagina * $regxpagina - $regxpagina) : 0 ;  //indice de Registro a cargar por pagina
			$conexion = mainModelo::conectar_bd();
			
			$articulos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM tbl_propietario_poseedor INNER JOIN tbl_municipio WHERE Pro_Municipio = Mun_Codigo ORDER BY Pro_Doc_Id LIMIT $inicio, $regxpagina");
			$articulos->execute();
			$articulos = $articulos->fetchAll();  //array de datos con la consulta 

			$totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total');  
			$totalArticulos = $totalArticulos->fetch()['total'];  //Devuelve el total de registro en el sistema (17)
			$numeroPaginas = ceil($totalArticulos / $regxpagina);//total paginas del paginador 



			$tabla.='
				<div class="table-responsive">
					<table class="table table-hover text-center">
						<thead>
							<tr>
							    <th class="text-center">#</th>
								<th class="text-center">ID</th>
								<th class="text-center">NOMBRE</th>
								<th class="text-center">APELLIDO</th>
								<th class="text-center">FECHA NACIMIENTO</th>
								<th class="text-center">DIRECCION</th>
								<th class="text-center">CIUDAD/MUNICIPIO</th>
								<th class="text-center">CORREO</th>
								<th class="text-center">GENERO</th>
								<th class="text-center">EDITAR</th>
								<th class="text-center">ELIMINAR</th>
							</tr>
						</thead>
						<tbody>
			';

			if ($totalArticulos>=1 && $pagina<=$numeroPaginas) {//Valida si hay regsitro
				$contador = $inicio + 1;

				foreach ($articulos as $filas) {//Muestra el numero de registros de la pagina activa
					$tabla.='
					     <tr>
					        <td>'.$contador.'</td>
                            <td>'.$filas['Pro_Doc_Id'].'</td>
							<td>'.$filas['Pro_Nombre'].'</td>
							<td>'.$filas['Pro_Apellido'].'</td>
							<td>'.$filas['Pro_FechaNac'].'</td>
							<td>'.$filas['Pro_Direccion'].'</td>
                            <td>'.$filas['Mun_Nombre'].'</td>
							<td>'.$filas['Pro_Correo'].'</td>
							<td>'.$filas['Pro_Genero'].'</td>
							<td>
								<a href="#!" class="btn btn-success btn-raised btn-xs">
									<i class="zmdi zmdi-refresh"></i>
								</a>
							</td>
							<td>
								<form>
									<button type="submit" class="btn btn-danger btn-raised btn-xs">
										<i class="zmdi zmdi-delete"></i>
									</button>
								</form>
							</td>
						</tr>
					';
					$contador ++;
				}
			}else{
				if ($totalArticulos>=1) {
					$tabla.='
				        <tr>
				            <td colspan="9">
				                <a href="'.SERVERURL.'propietariolist/" class="btn btn-sm btn-info btn-raised">Haga clic aca para recargar el listado</a>
				            </td>
				        </tr>
				    ';
				}else{
					$tabla.='
				        <tr>
				            <td colspan="9">No hay registro en el sistema</td>
				        </tr>
				    ';
				}
			}

			$tabla.='</tbody></table></div>';	

			if ($totalArticulos>=1 && $pagina<=$numeroPaginas) {//
				$tabla.='
			        <nav class="text-center">
				    <ul class="pagination pagination-sm">
				';
                if ($pagina==1) {
                	$tabla.='<li class="disabled"><a><i class="zmdi zmdi-chevron-left"></i></a></li>';//Deshabilita el boton Anterior cuando la pagina activva sea igual a 1
                }else{
                	$tabla.='<li><a href="'.SERVERURL.'propietariolist/'.($pagina-1).'"><i class="zmdi zmdi-chevron-left"></i></a></li>';//Devuelve a la pagina anterior de la pagina activa
                }

                for ($i=1; $i <=$numeroPaginas ; $i++) { //Identifica numero de paginas
                	if ($pagina==$i) {
                		$tabla.='<li class="active"><a href="'.SERVERURL.'propietariolist/'.$i.'">'.$i.'</a></li>'; //Identifica la pagina Activa
                	}else{
                		$tabla.='<li><a href="'.SERVERURL.'propietariolist/'.$i.'">'.$i.'</a></li>';
                	}
                }

                if ($pagina==$numeroPaginas) {
                	$tabla.='<li class="disabled"><a><i class="zmdi zmdi-chevron-right"></i></a></li>';//Deshabilita el boton Siguiente cuando la pagina activa sea igual a el total de paginas
                }else{
                	$tabla.='<li><a href="'.SERVERURL.'propietariolist/'.($pagina + 1).'"><i class="zmdi zmdi-chevron-right"></i></a></li>';//Avanza a la pagina siguiente de la pagina activa
                }


				$tabla.='
			        </ul>
			        </nav>
				';
			}	

			return $tabla;

		}
    }