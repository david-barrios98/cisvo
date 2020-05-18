<?php
    $peticionAjax=true;
    require_once 'mainModelo.php';

    /**
     *@author David Barrios
     *Clase para cargar combobox en el rol de funcionario 
     * */
    class comboxArea extends mainModelo{
        protected $area = "SELECT Det_Codigo, Det_Desc FROM tbl_deta_parametro WHERE Det_Par_Codigo=9";
        public function cagarArea(){
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

    $ins = new comboxArea();
    echo $ins->cagarArea();
