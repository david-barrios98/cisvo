<?php
    $peticionAjax=true;
    require_once 'mainModelo.php';

    class comboxPrograma extends mainModelo{
        protected $programa = "SELECT Det_Codigo, Det_Desc FROM tbl_deta_parametro WHERE Det_Par_Codigo=5";

        public function cagarProgramas(){
            $conexion=mainModelo::conectar_bd();
            $programa = $this->programa;
            $datos=$conexion->query($programa);
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

    $ins = new comboxPrograma();
    echo $ins->cagarProgramas();