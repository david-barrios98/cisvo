<?php
    $peticionAjax=true;
    require_once 'mainModelo.php';

    class comboSoliTipo extends mainModelo{
        protected $consulta= "SELECT Det_Codigo, Det_Desc FROM tbl_deta_parametro WHERE Det_Par_Codigo=3";

        public function cagarSoliTipo(){
            $conexion=mainModelo::conectar_bd();
            $consulta = $this->consulta;
            $datos=$conexion->query($consulta);
            $datos= $datos->fetchAll(); //array de datos con la consulta
            $combo='<option value=""></option>';

                foreach ($datos as $fila) {
                    $combo.= "
                        <option value=".$fila['Det_Codigo'].">".$fila['Det_Desc']."</option>	
                    ";
                }
            return $combo;
        }
        
    }

    $ins = new comboSoliTipo();
    echo $ins->cagarSoliTipo();