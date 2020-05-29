<?php
    $peticionAjax=true;
    require_once 'mainModelo.php';

    /**
     *@author David Barrios
     *Clase para cargar combobox de tipos de vehiculos
     * */
     
    class vehiculoMarca extends mainModelo{

        public function cargarMarcaVehiculo(){
            $conexion=mainModelo::conectar_bd();  
            $tipovehiculo = "SELECT Det_Codigo, Det_Desc FROM tbl_deta_parametro WHERE Det_Par_Codigo=7 or Det_Par_Codigo=8 ORDER BY Det_Desc ASC";
            $datos=$conexion->query($tipovehiculo);
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

    $ins = new vehiculoMarca();
    echo $ins->cargarMarcaVehiculo();