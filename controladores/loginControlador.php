<?php
if($peticionAjax){
  require_once "../modelos/loginModelo.php";
}else{
   require_once "./modelos/loginModelo.php";
}
class loginControlador extends loginModelo {

  public function iniciar_sesion_controlador(){
    $usuario =mainModelo::limpiar_cadena($_POST['usuario']);
    $clave =mainModelo::limpiar_cadena($_POST['password']);
    $clave = mainModelo::encryption($clave);
    //$clave = "Tmk4Z0Q0U0h0K2FkMkgrZVdMZ";
    $datosLogin=[
        "Usuario"=>$usuario,
        "Clave"=>$clave
    ];
    $datosCuenta = loginModelo::iniciar_sesion_modelo($datosLogin);

    if($datosCuenta->rowCount()==1){
      $row = $datosCuenta->fetch();
      //$fechaActual = DateTime("Y-m-d H:i:s");
      $fechaActual = new DateTime();
      $fechaI = $fechaActual->format('Y-m-d H:i:sP');
      $consulta1 =loginModelo::consulta_iniciar_sesion_modelo();
      $numero=($consulta1->rowCount())+1;
      $codigoS=loginModelo::generar_codigo_aleatorio("CS",7,$numero);
      $datosSesion=[
        "Codigo"=>$codigoS,
        "FechaInicio"=>$fechaI,
        "FechaFinal"=>'sin registro',
        "Id"=>$row['Usu_Doc']
      ];
      //echo $usuario;
      $insertarSesion=loginModelo::guadar_bitacora($datosSesion);
      if($insertarSesion->rowCount()==1){
        session_start(['name'=>'S_CISVO']);
        $_SESSION['usuario_CISVO']=$row['Usu_Correo'];
        $_SESSION['rol_CISVO']=$row['Usu_Rol'];
        $_SESSION['nombre_CISVO']=$row['Usu_Nombre'];
        $_SESSION['apellido_CISVO']=$row['Usu_Apellido'];
        $_SESSION['foto_CISVO']=$row['Usu_Foto'];
        $_SESSION['token_CISVO']=md5(uniqid(mt_rand(),true));
        $_SESSION['codigo_CISVO']=$row['Usu_Doc'];
        $_SESSION['id_sesion_CISVO']=$codigoS;

        if(isset($_SESSION['id_sesion_CISVO'])){
          $url=SERVERURL."home/";
        }else{
          $url=SERVERURL."propietario/";
        }
        return $urlLocation='<script> window.location="'.$url.'"</script>';
      }else{
        $alerta=[
        "Alerta"=>"simple",
        "Titulo"=>"Ocurrio un error inesperado",
        "Texto"=>"no se a podido iniciar la sesion por problemas tecnicos
            , por favor intente nuevamente ",
        "Tipo"=>"error"
        ];
        return mainModelo::sweet_alert($alerta);
      }
    }else{
        $alerta=[
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"usuario y/o contraseña incorrectos o se encuentra inactivo",
            "Tipo"=>"error"
        ];
        return mainModelo::sweet_alert($alerta);
    }
  }

 }