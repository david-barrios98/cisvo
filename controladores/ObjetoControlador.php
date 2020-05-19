<?php
	
	if($peticionAjax){
		require_once "../modelos/objetoModelo.php";
	}else{
		require_once "./modelos/objetoModelo.php";
	}
	
	/**
    *@author Hollman Ortiz
    *@version V1.0.0_Mayo2020
    *El presente archivo contiene la clase(objetoControlador) para la interaccion con el modelo y la vista.
    *
    */
	class objetoControlador extends objetoModelo{
		
		public function registrar_objeto_controlador(){
			/*Captura de datos del formulario objeto-view, En variables, 
			pasando por una funcion llamada limpiar_cadena(archivo mainModelo)
		 	para evitar inyecciones sql por los formularios
			*/
			$Nombre=mainModelo::limpiar_cadena($_POST['objeto-txt']);
			$Marca=mainModelo::limpiar_cadena($_POST['marcaobjeto-txt']);
			$Modelo=mainModelo::limpiar_cadena($_POST['modeloobjeto-txt']);
			$Cantidad=mainModelo::limpiar_cadena($_POST['cantidadobjeto-txt']);
			$Tipo=mainModelo::limpiar_cadena($_POST['tipoobjeto-txt']);
			$Propietario=mainModelo::limpiar_cadena($_POST['docpropietario-txt']);     
			$codigo= objetoModelo::codigo_auto();
			$codigo= ($codigo->rowCount()+1);
			
			$dataobjeto=[
		        "Codigo"=>$codigo,
				"Nombre"=>$Nombre,
				"Marca"=>$Marca,
				"Modelo"=>$Modelo,
				"Cantidad"=>$Cantidad,
				"Tipo"=>$Tipo,
				"Estado"=>'A',
				"Propietario"=>$Propietario
			];
			
			$guardarObjeto=ObjetoModelo::registrar_objeto_modelo($dataobjeto);

			if ($guardarObjeto->rowCount()==1) {
				$alerta=[
					"Alerta"=>"limpiar",
					"Titulo"=>"Objeto registrado",
					"Texto"=>"Registro exitoso!",
					"Tipo"=>"success"
			    ];
		    }else{
				
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No se ha podido registrar el objeto!",
					"Tipo"=>"error"
				];
		    }
			return mainModelo::sweet_alert($alerta);
		}
	}
		