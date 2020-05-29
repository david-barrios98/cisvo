<?php
	if($peticionAjax){
		require_once "../modelos/vehiculoModelo.php";
	}else{
		require_once "./modelos/vehiculoModelo.php";
	}
    
    /**
	*@author Jesus Orozco
	*El presente archivo contiene la clase(vehiculoControlador) que interactura con el modelo y la vista. 
	*/
	class vehiculoControlador extends vehiculoModelo{

		public function registrar_vehiculo_controlador(){
			/*Captura de datos del formulario vehiculo-view, En variables, 
			pasando por una funcion llamada limpiar_cadena(archivo mainModelo)
		 	para evitar inyecciones sql por los formularios
			*/
			$Placa=mainModelo::limpiar_cadena($_POST['placa-txt']);
			$Tipo=mainModelo::limpiar_cadena($_POST['tipovehiculo-txt']);
			$Marca=mainModelo::limpiar_cadena($_POST['marcavehiculo-txt']);
			$Modelo=mainModelo::limpiar_cadena($_POST['modelovehiculo-txt']);
			$Color=mainModelo::limpiar_cadena($_POST['colorvehiculo-txt']);
			$Tarjpro=mainModelo::limpiar_cadena($_POST['tarjetavehiculo-txt']);
			$Soat=mainModelo::limpiar_cadena($_POST['soatvehiculo-txt']);
			$Propietario=mainModelo::limpiar_cadena($_POST['docpropietario-txt']);

			/*Consulta  para validar si existe o no  el propieatario/poseedor en el sistema*/
			$consulta_placa=vehiculoModelo::consultar_vehiculo($Placa);
            if ($consulta_placa>=1) {
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"El vehiculo ya se encuentra registrado en el sistema! ",
                    "Tipo"=>"error"
                ];
            }else{
                /*Generamos un array con la informacion del vehiculo*/
                $datavehiculo=[
                    "Placa"=>$Placa,
                    "Tipo"=>$Tipo,
                    "Marca"=>$Marca,
                    "Modelo"=>$Modelo,
                    "Color"=>$Color,
                    "Tarjpro"=>$Tarjpro,
                    "Soat"=>$Soat,
                    "Estado"=>"A",
                    "Propietario"=>$Propietario
                ];

                $guardarVehiculo=vehiculoModelo::registrar_vehiculo_modelo($datavehiculo);

                if ($guardarVehiculo->rowCount()==1) {
                    $alerta=[
                        "Alerta"=>"limpiar",
                        "Titulo"=>"Vehiculo registrado",
                        "Texto"=>"Registro exitoso!",
                        "Tipo"=>"success"
                    ];
                }else{
                    $alerta=[
                        "Alerta"=>"simple",
                        "Titulo"=>"Ocurrio un error inesperado",
                        "Texto"=>"No se ha podido registrar el vehiculo! <br>Vuelve a intentar ",
                        "Tipo"=>"error"
                    ];
                }
            }
			return mainModelo::sweet_alert($alerta);
		}

		public function cargar_paginador_vehiculo($pagina, $regxpagina, $busqueda){
			$pagina=mainModelo::limpiar_cadena($pagina);
			$regxpagina=mainModelo::limpiar_cadena($regxpagina);
			$busqueda=mainModelo::limpiar_cadena($busqueda);
			$tabla="";
            
            //estructura condicional(si()-sino?), simplificada
			$pagina = (isset($pagina) && $pagina>0) ? (int)$pagina : 1;  //pagina actual
			$inicio = ($pagina > 0) ? ($pagina * $regxpagina - $regxpagina) : 0 ;  //indice de Registro a cargar por pagina

			if (isset($busqueda) && $busqueda!="") {
				$consulta="SELECT SQL_CALC_FOUND_ROWS * FROM tbl_vehiculo INNER JOIN tbl_deta_parametro WHERE ((Veh_Placa LIKE '%$busqueda%' OR Veh_Marca LIKE '%$busqueda%' OR Veh_Pro_Doc LIKE '%$busqueda%') AND (Veh_Marca=Det_Codigo))  ORDER BY Veh_Pro_Doc LIMIT $inicio, $regxpagina";
				$PAGIANURL="vehiculosearch";
			}else{
				$consulta="SELECT SQL_CALC_FOUND_ROWS * FROM tbl_vehiculo INNER JOIN tbl_deta_parametro WHERE Veh_Marca=Det_Codigo ORDER BY Veh_Pro_Doc LIMIT $inicio, $regxpagina";
                $PAGIANURL="vehiculolist";
			}


			$conexion = mainModelo::conectar_bd();
			
			$articulos = $conexion->prepare($consulta);
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
							    <th class="text-center">PROPIETARIO</th>
								<th class="text-center">PLACA</th>
								<th class="text-center">MARCA</th>
								<th class="text-center">MODELO</th>
								<th class="text-center">ACTUALIZAR</th>
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
                            <td>'.$filas['Veh_Pro_Doc'].'</td>
							<td>'.$filas['Veh_Placa'].'</td>
							<td>'.$filas['Det_Desc'].'</td>
							<td>'.$filas['Veh_Modelo'].'</td>
							
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
				                <a href="'.SERVERURL.$PAGIANURL.'/" class="btn btn-sm btn-info btn-raised">Haga clic aca para recargar el listado</a>
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
                	$tabla.='<li><a href="'.SERVERURL.$PAGIANURL.'/'.($pagina-1).'"><i class="zmdi zmdi-chevron-left"></i></a></li>';//Devuelve a la pagina anterior de la pagina activa
                }

                for ($i=1; $i <=$numeroPaginas ; $i++) { //Identifica numero de paginas
                	if ($pagina==$i) {
                		$tabla.='<li class="active"><a href="'.SERVERURL.$PAGIANURL.'/'.$i.'">'.$i.'</a></li>'; //Identifica la pagina Activa
                	}else{
                		$tabla.='<li><a href="'.SERVERURL.$PAGIANURL.'/'.$i.'">'.$i.'</a></li>';
                	}
                }

                if ($pagina==$numeroPaginas) {
                	$tabla.='<li class="disabled"><a><i class="zmdi zmdi-chevron-right"></i></a></li>';//Deshabilita el boton Siguiente cuando la pagina activa sea igual a el total de paginas
                }else{
                	$tabla.='<li><a href="'.SERVERURL.$PAGIANURL.'/'.($pagina + 1).'"><i class="zmdi zmdi-chevron-right"></i></a></li>';//Avanza a la pagina siguiente de la pagina activa
                }


				$tabla.='
			        </ul>
			        </nav>
				';
			}	

			return $tabla;

        }
	}
		