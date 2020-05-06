<?php
    $peticionAjax=true;
    require_once 'mainModelo.php';

    class comboSoliObVeh extends mainModelo{
        //protected $consulta= "SELECT Det_Codigo, Det_Desc FROM tbl_deta_parametro WHERE Det_Par_Codigo=3";

        public function cagarSoliObVeh(){
            if(isset($_POST['id'])){
                $id = $_POST['id'];
                $consulta = "SELECT Veh_Placa, Det_Desc, Veh_Color FROM tbl_vehiculo JOIN tbl_deta_parametro ON Veh_Marca=Det_Codigo WHERE Veh_Pro_Doc=$id";
                $datos=$conexion->query($consulta);
                $datos= $datos->fetchAll(); //array de datos con la consulta
                $combo='<option value=""></option>';

                    foreach ($datos as $fila) {
                        $combo.= "
                            <option value=".$fila['Veh_Placa'].">".$fila['Det_Desc']."-".$fila['Veh_Color']."</option>	
                        ";
                    }
                return $combo;
            }else{
                return false;
            }
        }
        
    }

    $ins = new comboSoliObVeh();
    echo $ins->cagarSoliObVeh();