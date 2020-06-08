<?php
    if($peticionAjax){
        require_once "../modelos/solicitudesModelo.php";
    }else{
        require_once "./modelos/solicitudesModelo.php";
    }
    
    /**
    *@author Alex Cera
    *@version V1.0.0_Mayo2020
    *El presente archivo contiene la clase(solicitudControlador) para la interaccion con el modelo de solicitudes.
    */
    class solicitudControlador extends solicitudModelo{

        /**
         * Funcion que interactua con vista y modelo para el registro de las solicitudes.
         */
        public function registrar_solicitud_Controlador(){
            $Propietario=mainModelo::limpiar_cadena($_POST['docpropietario-txt']);
            $Tipo=mainModelo::limpiar_cadena($_POST['tiposolicitud-txt']);
            $Desc=mainModelo::limpiar_cadena($_POST['descripsolicitud-txt']);
            $FechaHora= date("Y-m-d h:i:s a" );
            $Objeto=mainModelo::limpiar_cadena($_POST['objveh-txt']);
            $Vehiculo=mainModelo::limpiar_cadena($_POST['objveh-txt']);
            $codigo=solicitudModelo::conteo();
            $codigo=($codigo->rowCount()+1);
        
            $consultaPropietario=solicitudModelo::consultar_propietario($Propietario);
            $consultaPropietario=$consultaPropietario->rowCount();
            if($consultaPropietario==1){
                session_start(['name'=>'S_CISVO']);        
                $dataSoli=[
                    "Codigo"=>$codigo,
                    "Tipo"=>$Tipo,
                    "Descripcion"=>$Desc,
                    "FechaHora"=>$FechaHora,
                    "Estado"=>"A",
                    "Propietario"=>$Propietario,
                    "Objeto"=>"",
                    "Vehiculo"=>$Vehiculo,
                    "Usuario"=> $_SESSION['usuario_CISVO']
                ];
        
                $guardarSoli=solicitudModelo::registrar_solicitud_modelo($dataSoli);
                
                if ($guardarSoli->rowCount()==1) {
                    $alerta=[
                    "Alerta"=>"limpiar",
                    "Titulo"=>"Solicitud registrada",
                    "Texto"=>"Registro satisfactorio!",
                    "Tipo"=>"success"
                    ];  
                
                }else{
                    $alerta=[
                        "Alerta"=>"simple",
                        "Titulo"=>"Ocurrio un error inesperado",
                        "Texto"=>"No se ha podido registrar la solicitud!",
                        "Tipo"=>"error"
                    ];       
                }
            }else{
                $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"El propietario no esta registrado en el sistema!",
                    "Tipo"=>"error"
                ];   
            }
            return mainModelo::sweet_alert($alerta);
        }

        public function cargar_tabla_solicitudes_controlador($pagina, $regxpagina){
            $pagina=mainModelo::limpiar_cadena($pagina);
            $regxpagina=mainModelo::limpiar_cadena($regxpagina);
            $tabla="";

			$pagina= (isset($pagina) && $pagina>0) ? (int) $pagina  : 1; //pagina actual
			$inicio = ($pagina > 1) ? ($pagina * $regxpagina - $regxpagina) : 0 ;  //indice de Registro a cargar por pagina
            
            $datos=solicitudModelo::config_tabla_solicitudes_modelo($inicio,$regxpagina);

            $total_registros = solicitudModelo::conteo(1)->rowCount();
            $numeroPaginas = ceil($total_registros / $regxpagina);   //Redondear
            
            $tabla.='<div class="table-responsive"> 
            <table class="table table-hover text-center">
            <thead>
                <tr>
                    <th class="text-center">NO.</th>
                    <th class="text-center">PROPIETARIO</th>
                    <th class="text-center">TIPO</th>
                    <th class="text-center">DESCRIPCION</th>
                    <th class="text-center">FECHA</th>
                    <th class="text-center">ESTADO</th>
                    <th class="text-center">OBJ/VEH</th>
                    <th class="text-center">USUARIO</th>
                    <th class="text-center">EDITAR</th>
                    <th class="text-center">ELIMINAR</th>
                </tr>
            </thead>';

            if($total_registros >= 1 && $pagina <= $numeroPaginas){
                $conteo = $inicio+1;

                foreach($datos as $columna){
                    $tabla.= '
                        <tr>
                            <td>'.$conteo.'</td>
                            <td>'.$columna['Pro_Nombre']." ".$columna['Pro_Apellido'].'</td>
                            <td>'.$columna['Det_Desc'].'</td>
                            <td> 
                                <button type="submit" class="btn btn-info btn-raised btn-xs" title="Ver">
                                <i class="zmdi zmdi-eye"></i>
                            </button></td>
                            <td>'.$columna['Sol_Fecha_Hora'].'</td>
                            <td>'.$columna['Sol_Estado'].'</td>
                            <td>'.$columna['Sol_Vehiculo'].'</td>
                            <td>'.$columna['Usu_Nombre']." ".$columna['Usu_Apellido'].'</td>
                            <td>
                                <a href="'.SERVERURL.'solicitud/?solicitud='.mainModelo::encryption($columna['Sol_Cod']).'" class="btn btn-success btn-raised btn-xs" title="Editar">
                                    <i class="zmdi zmdi-border-color"></i>
                                </a>
                            </td>
                            <td>
                                <form action="'.SERVERURL.'ajax/solicitudesAjax.php" method="POST" 
                                data-form="delete" class="FormularioAjax" name="FormularioAjax" autocomplete="off" 
                                enctype="multipart/form-data">
                                    <input type="hidden" name="id_solicitud"  value="'.mainModelo::encryption($columna['Sol_Cod']).'">
                                    <button type="submit" class="btn btn-danger btn-raised btn-xs" title="Eliminar">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>
                                    <div class="RespuestaAjax"></div>
                                </form>
                            </td>
                        </tr>
                    ';
                    $conteo ++;
                }
            }else{
                if($total_registros>= 1){
                    $tabla.= '<tr>
                        <td colspan="15">
                            <a href="'.SERVERURL.'solicitudeslist/" class="btn btn-success btn-raised btn-xs"> Haga clik para refrescar la tabla </a>
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

            //Paginador
            if($total_registros >= 1 && $pagina <= $numeroPaginas){
				$tabla.= '<nav class="text-center">
				<ul class="pagination pagination-sm">';
                
				if($pagina==1){
                    $tabla.='<li class="disabled"><a>
                    <i class="zmdi zmdi-arrow-left"></i></a></li>';
                }else{
                    $tabla.='<li><a href="'.SERVERURL.'solicitudeslist/'.($pagina-1).'/">
                    <i class="zmdi zmdi-arrow-left"></i></a></li>';
                }
				for($i = 1; $i <= $numeroPaginas; $i++){ //Identifica la pagina Activa
					if ($pagina == $i) { 
						$tabla.= '<li class="active"><a href="'.SERVERURL.'solicitudeslist/'.$i.'/">'.$i.'</a></li>';
					} else {
						$tabla.= '<li><a href="'.SERVERURL.'solicitudeslist/'.$i.'/">'.$i.'</a></li>';
					}
				}
				if($pagina==$numeroPaginas){
					$tabla.= '<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>';
				}else{
					$tabla.= '<li><a href="'.SERVERURL.'solicitudeslist/'.($pagina+1).'/"><i class="zmdi zmdi-arrow-right"></i></a></li>';
				}
				
				$tabla.= '</ul>
                </nav>';
            }

            
            return $tabla;
        }

        public function eliminar_solicitud_controlador(){
            $id =  mainModelo::decryption($_POST['id_solicitud']);
            $id =  mainModelo::limpiar_cadena($id);

			$query1= solicitudModelo::consultar_solicitud($id);
			
			if($query1->rowCount()==1){
				$eliminacion = solicitudModelo::eliminar_solicitud_modelo($id);
				if($eliminacion->rowCount()>=1){
					$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Solcitud eliminada",
						"Texto"=>"la operación se realizó con exito",
						"Tipo"=>"success"
					];
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No se ha podido eliminar la Solicitud",
						"Tipo"=>"error"
					];
				}
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No se ha podido eliminar, Solicitud no encontrada",
					"Tipo"=>"error"
				];
			}
			return mainModelo::sweet_alert($alerta);
		}
        
    }