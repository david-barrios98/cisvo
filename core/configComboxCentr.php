<?php
    $peticionAjax=true;
    require_once 'mainModelo.php';

    class comboxSede extends mainModelo{
        protected $centro = "SELECT Sed_Codigo, Sed_Nombre FROM tbl_sede";

        public function cagarSedes(){
            $conexion=mainModelo::conectar_bd();
            $centro = $this->centro;
            $datos=$conexion->query($centro);
            $datos= $datos->fetchAll(); //array de datos con la consulta
            $combo='<option value=""></option>';

                foreach ($datos as $fila) {
                    $combo.= "
                        <option value=".$fila['Sed_Codigo'].">".$fila['Sed_Nombre']."</option>	
                    ";
                }
            return $combo;
        }
        
    }

    $ins = new comboxSede();
    echo $ins->cagarSedes();