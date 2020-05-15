<?php
if($peticionAjax){
    require_once "../core/mainModelo.php";
}else{
    require_once "./core/mainModelo.php";
}
 class loginModelo extends mainModelo {
  
  protected function iniciar_sesion_modelo($datos){
    $sql = mainModelo::conectar_bd()->prepare("SELECT * FROM tbl_usuario WHERE Usu_Doc=:Usuario AND Usu_Clave=:Clave AND Usu_Estado = 'A'");
    $sql->bindParam(":Usuario",$datos['Usuario']);
    $sql->bindParam(":Clave",$datos['Clave']);
    $sql->execute();
    return $sql;
  }
  
  /*consulta de todas las sesiones en la tabla sesiones */
  protected function consulta_iniciar_sesion_modelo(){
    $sql = mainModelo::conectar_bd()->prepare("SELECT Ses_Id FROM tbl_sesiones");
    $sql->execute();
    return $sql;
  }

  /*funcion para generar codigos de forma aleatoria*/
  protected function generar_codigo_aleatorio($letra,$longitud,$num){
    for($i=1;$i<=$longitud;$i++){
      $numero= rand(0,9);/*funcion para generar numero aleatorio*/
      $letra.= $numero;
    }

    return $letra."-".$num; 
  }

  /*función para agregar bitacora(registros para el inicio de sesión*/
  protected function guadar_bitacora($datos){
    $sql=mainModelo::conectar_bd()->prepare("INSERT INTO tbl_sesiones VALUES(:Codigo,:FechaInicio,:FechaFinal,:Id)");
    $sql->bindParam(":Codigo",$datos['Codigo']);
    $sql->bindParam(":FechaInicio",$datos['FechaInicio']);
    $sql->bindParam(":FechaFinal",$datos['FechaFinal']);
    $sql->bindParam(":Id",$datos['Id']);
    $sql->execute();
    return $sql;
  }
 }