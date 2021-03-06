<?php
    $peticionAjax=true;
    require_once 'mainModelo.php';

    /**
     *@author David Barrios
     *Clase para cargar combobox de departamentos
     * */
    class comboxDepartamento extends mainModelo{
        protected $departamentos = "SELECT Dep_Codigo, Dep_Nombre FROM tbl_departamento ORDER BY Dep_Nombre ASC";

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
    
    