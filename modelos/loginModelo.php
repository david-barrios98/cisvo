<?php
  if($peticionAjax){
    require_once "../core/mainModelo.php";
  }else{
    require_once "./core/mainModelo.php";
  }

  /**
  *@author Isaias Fajardo
  *@version V1.0.0_Mayo2020
  *El presente archivo contiene la clase(loginModelo) que interactua directamente con la base de datos.
  */

  class loginModelo extends mainModelo {

    /**
    *funcion para ingresar al sistema 
    *@param $datos, trae la informacion(usuario-contraseña) necesaria para validar el ingreso.
    */
    protected function iniciar_sesion_modelo($datos){
      $sql = mainModelo::conectar_bd()->prepare("SELECT * FROM tbl_usuario WHERE Usu_Doc=:Usuario AND Usu_Clave=:Clave AND Usu_Estado = 'A'");
      $sql->bindParam(":Usuario",$datos['Usuario']);
      $sql->bindParam(":Clave",$datos['Clave']);
      $sql->execute();
      return $sql;
    }

    /*consulta de todas las sesiones en la tabla sesiones */
    protected function conteo_sesiones(){
      $sql = mainModelo::conectar_bd()->prepare("SELECT Ses_Id FROM tbl_sesiones");
      $sql->execute();
      return $sql;
    }

    /**
    *funcion para generar codigos de forma aleatoria
    *@param $letra, $longitud, $num, parametros necesarios para generar un codigo unico a una sesion
    */
    protected function generar_codigo_aleatorio($letra,$longitud,$num){
      for($i=1;$i<=$longitud;$i++){
        $numero= rand(0,9);/*funcion para generar numero aleatorio*/
        $letra.= $numero;
      }

      return $letra."-".$num; 
    }

    /**
    *función para registrar la sesion iniciada (registros para el inicio de sesión
    *@param $datos, trae la informacion necesario para guardar cuando hay un inicio de sesion.
    */
    protected function guardar_sesion($datos){
      $sql=mainModelo::conectar_bd()->prepare("INSERT INTO tbl_sesiones VALUES(:Codigo,:FechaInicio,:FechaFinal,:Id)");
      $sql->bindParam(":Codigo",$datos['Codigo']);
      $sql->bindParam(":FechaInicio",$datos['FechaInicio']);
      $sql->bindParam(":FechaFinal",$datos['FechaFinal']);
      $sql->bindParam(":Id",$datos['Id']);
      $sql->execute();
      return $sql;
    }

    /**
    * función para actualizar la sesion iniciada 
    *@param $datos, array que contiene la informacion necesario para cerrar la sesion.
    */
    protected function cerrar_sesion_modelo($datos){
			if ($datos['Usuario']!="" && $datos['Token_S']==$datos['Token']) {
				$sql=mainModelo::conectar_bd()->prepare("UPDATE tbl_sesiones SET Ses_FH_Final=:FechaHora WHERE Ses_Id=:Codigo");
        $sql->bindParam(":FechaHora",$datos['FechaHora']);
        $sql->bindParam(":Codigo",$datos['Codigo_Sesion']);
        $sql->execute();
        echo $sql->rowCount();
				if($sql->rowCount()==1){
					session_unset(); //vaciar la session
					session_destroy();//destruir la sesion
					$respuesta="true";
				}else{
					$respuesta="false";
				}
			} else {
				$respuesta="false";
			}
			return $respuesta;
		}
  }