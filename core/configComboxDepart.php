<?php
    $peticionAjax=true;
    require_once 'mainModelo.php';

    class comboxDepartamento extends mainModelo{
        protected $departamentos = "SELECT Dep_Codigo, Dep_Nombre FROM tbl_departamento";

        public function cagarDepartamentos(){
            $conexion=mainModelo::conectar_bd();
            $departamentos = $this->departamentos;
            $datos=$conexion->query($departamentos);
            $datos= $datos->fetchAll(); //array de datos con la consulta
            $combo='<option value=""></option>';

                foreach ($datos as $fila) {
                    $combo.= "
                        <option value=".$fila['Dep_Codigo'].">".$fila['Dep_Nombre']."</option>	
                    ";
                }
            return $combo;
        }
        
    }

    $ins = new comboxDepartamento();
    echo $ins->cagarDepartamentos();
    
    