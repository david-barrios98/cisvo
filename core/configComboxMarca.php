<?php
    $peticionAjax=true;
    require_once 'mainModelo.php';

    class comboxMarca extends mainModelo{
        protected $marca = "SELECT Det_Codigo, Det_Desc FROM tbl_deta_parametro WHERE Det_Par_Codigo=6";

        public function cagarMarca(){
            $conexion=mainModelo::conectar_bd();
            $marca = $this->marca;
            $datos=$conexion->query($marca);
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

    $ins = new comboxMarca ();
    echo $ins->cagarMarca();