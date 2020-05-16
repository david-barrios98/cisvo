<?php
	
	if($peticionAjax){
		require_once "../modelos/ObjetoModelo.php";
	}else{
		require_once "./modelos/ObjetoModelo.php";
	}
	
	class ObjetoControlador extends ObjetoModelo{

		
		public function registrar_Objeto_controlador(){
			/*Captura de datos del formulario vehiculo-view, En variables, 
			pasando por una funcion llamada limpiar_cadena(archivo mainModelo)
		 	para evitar inyecciones sql por los formularios
			*/
			$Nombre=mainModelo::limpiar_cadena($_POST['nombre-obj']);
			$Marca=mainModelo::limpiar_cadena($_POST['marca-obj']);
			$Modelo=mainModelo::limpiar_cadena($_POST['modelo-obj']);
			$Cantidad=mainModelo::limpiar_cadena($_POST['cantidad-obj']);
			$Tipo=mainModelo::limpiar_cadena($_POST['tipo-obj']);
			$Propietario=mainModelo::limpiar_cadena($_POST['propietario-id']);
            $codigoaleatorio=1234;

			$dataobjeto=[
		        "Codigo"=>$codigoaleatorio,
				"Nombre"=>$Nombre,
				"Marca"=>$Marca,
				"Modelo"=>$Modelo,
				"Cantidad"=>$Cantidad,
				"Tipo"=>$Tipo,
				"Estado"=>'A',
				"Propietario"=>$Propietario
			];
			var_dump($dataobjeto);
			$guardarObjeto=ObjetoModelo::registrar_Objeto_modelo($dataobjeto);

			if ($guardarObjeto->rowCount()==1) {
				$alerta=[
					"Alerta"=>"limpiar",
					"Titulo"=>"Administrador registrado",
					"Texto"=>"Registro exitoso!",
					"Tipo"=>"success"
			    ];
		    }else{
				//mainModelo::eliminar_cuenta($Propietario);
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No se registro!",
					"Tipo"=>"error"
				];
		    }
			return mainModelo::sweet_alert($alerta);
		}
	}
		