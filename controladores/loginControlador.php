<?php
  if($peticionAjax){
    require_once "../modelos/loginModelo.php";
  }else{
    require_once "./modelos/loginModelo.php";
  }
  class loginControlador extends loginModelo {

    public function iniciar_sesion_controlador(){
      $usuario =mainModelo::limpiar_cadena($_POST['usuario']);
      $clave = mainModelo::limpiar_cadena($_POST['password']);
      $clave = mainModelo::encryption($clave);
      
      $datosLogin=[
        "Usuario"=>$usuario,
        "Clave"=>$clave
      ];
     
      $datosCuenta = loginModelo::iniciar_sesion_modelo($datosLogin);
      
      if($datosCuenta->rowCount()==1){
        $row = $datosCuenta->fetch();
        $FechaHora_Inicio = date('Y-m-d h:i:s a');
        $consulta1 =loginModelo::conteo_sesiones();
        $numero=($consulta1->rowCount())+1;
        $codigo=loginModelo::generar_codigo_aleatorio("CS",5,$numero);

        $datosSesion=[
          "Codigo"=>$codigo,
          "FechaInicio"=>$FechaHora_Inicio,
          "FechaFinal"=>'sin registro',
          "Id"=>$row['Usu_Doc']
        ];
      
        $insertarSesion=loginModelo::guardar_sesion($datosSesion);
        
        if($insertarSesion->rowCount()==1){
          session_start(['name'=>'S_CISVO']);
          $_SESSION['correo_CISVO']=$row['Usu_Correo'];
          $_SESSION['rol_CISVO']=$row['Usu_Rol'];
          $_SESSION['nombre_CISVO']=$row['Usu_Nombre'];
          $_SESSION['apellido_CISVO']=$row['Usu_Apellido'];
          $_SESSION['foto_CISVO']=$row['Usu_Foto'];
          $_SESSION['token_CISVO']=md5(uniqid(mt_rand(),true));
          $_SESSION['usuario_CISVO']=$row['Usu_Doc'];
          $_SESSION['id_sesion_CISVO']=$codigo;

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
          "Texto"=>"Error al iniciar sesion <br> Vuelve a intentar",
          "Tipo"=>"error"
          ];
        }
      }else{
          $alerta=[
            "Alerta"=>"simple",
            "Titulo"=>"Ocurrio un error inesperado",
            "Texto"=>"Credenciales Invalidas <br> Vuelve a intentar ",
            "Tipo"=>"error"
          ];
      }
      return mainModelo::sweet_alert($alerta);
    }

    public function cerrar_sesion_controlador(){
      session_start(['name'=>'S_CISVO']);
        $token_decencriptado=mainModelo::decryption($_GET['Token']);
        $fechahora_final=date("Y-m-d h:i:s a");
        $datos_Cerrar=[
          "Usuario"=>$_SESSION['usuario_CISVO'],
          "Token_S"=>$_SESSION['token_CISVO'],
          "Token"=>$token_decencriptado,
          "FechaHora"=>$fechahora_final,
          "Codigo_Sesion"=>$_SESSION['id_sesion_CISVO']
        ];
        return loginModelo::cerrar_sesion_modelo($datos_Cerrar);
    }

    public function forzar_cierre_sesion_controlador(){
      session_destroy();
      return header("Location:". SERVERURL."login/");
    }

 }