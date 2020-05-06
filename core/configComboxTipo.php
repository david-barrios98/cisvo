<?php
    $peticionAjax=true;
    require_once 'mainModelo.php';

    class comboxTipo extends mainModelo{
        protected $tipo = "SELECT Det_Codigo, Det_Desc FROM tbl_deta_parametro WHERE Det_Par_Codigo=2";

        public function cagarTipo(){
            $conexion=mainModelo::conectar_bd();
            $tipo = $this->tipo;
            $datos=$conexion->query($tipo);
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

    $ins = new comboxTipo();
    echo $ins->cagarTipo();