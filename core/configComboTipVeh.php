<?php 
    $peticionAjax=true;
    require_once 'mainModelo.php';

    class comboxCargos extends mainModelo{
        protected $area = "SELECT Det_Codigo, Det_Desc FROM tbl_deta_parametro WHERE Det_Par_Codigo=7";

        public function cagarCargo(){
            $conexion=mainModelo::conectar_bd();
            $area = $this->area;
            $datos=$conexion->query($area);
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

    $ins = new comboxCargos();
    echo $ins->cagarCargos();