<?php
    $peticionAjax=true;
    require_once 'mainModelo.php';

    class comboxMarVeh extends mainModelo{

        public function cagarMarVeh(){
            $conexion=mainModelo::conectar_bd();
            $id = $_POST['id'];
                $MarVeh = "SELECT Det_Codigo, Det_Desc FROM tbl_deta_parametro WHERE Det_Par_Codigo=$id";
                $datos=$conexion->query($MarVeh);
                $datos= $datos->fetchAll(); //array de datos con la consulta
                $combo='<option value=""></option>';

                    foreach ($datos as $fila) {
                        $combo.= "
                            <option value=".$fila['Det_Codigo'].">".$fila['Det_Desc']."</option>	
                        ";
                    }
                return $combo;
            if(isset($_POST['id'])){
                $id = $_POST['id'];
                $MarVeh = "SELECT Det_Codigo, Det_Desc FROM tbl_deta_parametro WHERE Det_Par_Codigo=$id";
                $datos=$conexion->query($MarVeh);
                $datos= $datos->fetchAll(); //array de datos con la consulta
                $combo='<option value=""></option>';

                    foreach ($datos as $fila) {
                        $combo.= "
                            <option value=".$fila['Det_Codigo'].">".$fila['Det_Desc']."</option>	
                        ";
                    }
                return $combo;
            }else{
                return false;
            }
        }
        
    }

    $ins = new comboxMarVeh();
    echo $ins->cagarMarVeh();