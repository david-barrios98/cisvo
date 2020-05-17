<?php 
	class vistasModelo{
		protected function obtener_vistas_modelo($vistas){
			$listaBlanca=["usuariolist","usuariosearch","usuario","objeto","objetosearch","objetolist","propietario",
			"propietariolist","propietariosearch","solicitudes","solicitudeslist","solicitudsearch",
			"vehiculo","vehiculolist","vehiculosearch","home","search", "reportes", "parametros", "parametrolist", "ingresoysalidas",
			"misdatos", "micuenta"];
			//$carpeta=["usuario","objeto","propietario","solicitudes","objetolist","vehiculo","propietariolist"];
			if(in_array($vistas, $listaBlanca)){
				if(is_file("./vistas/contenidos/".$vistas."-view.php")){
					$contenido="./vistas/contenidos/".$vistas."-view.php";
				}else{
					$contenido="login";
				}
			}elseif($vistas=="login"){
				$contenido="login";
			}elseif($vistas=="index"){
				$contenido="login";
			}else{
				$contenido="404";
			}
			return $contenido;
		}
	}